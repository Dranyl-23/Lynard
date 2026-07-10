<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/experience', function () {
    return view('experience');
});

Route::get('/stack', function () {
    return view('stack');
});

use App\Models\Post;

Route::get('/blog', function () {
    return view('blog', [
        'posts' => Post::all()
    ]);
});

Route::get('/blog/{slug}', function ($slug) {
    $post = Post::find($slug);
    
    if (!$post) {
        abort(404);
    }
    
    return view('blog-show', [
        'post' => $post
    ]);
});

Route::get('/gear', function () {
    return view('gear');
});

Route::get('/resources', function () {
    return view('resources');
});

Route::get('/certifications', function () {
    return view('certifications');
});

Route::get('/collabs', function () {
    return view('collabs');
});

Route::get('/recommendations', function () {
    $path = resource_path('data/recommendations.json');
    $recommendations = [];
    if (file_exists($path)) {
        $recommendations = json_decode(file_get_contents($path), true) ?? [];
    }
    return view('recommendations', ['recommendations' => collect($recommendations)]);
});

use Illuminate\Http\Request;
use Pusher\Pusher;

Route::post('/broadcasting/auth', function (Request $request) {
    // Validate Origin header to prevent cross-origin forgery
    $origin = $request->header('Origin');
    $allowedOrigins = [config('app.url'), 'https://lynard.vercel.app'];
    if ($origin && !in_array($origin, $allowedOrigins)) {
        abort(403, 'Invalid origin');
    }

    $pusher = new Pusher(
        config('broadcasting.connections.pusher.key'),
        config('broadcasting.connections.pusher.secret'),
        config('broadcasting.connections.pusher.app_id'),
        [
            'cluster' => config('broadcasting.connections.pusher.options.cluster'),
            'useTLS' => true,
        ]
    );

    $sessionUser = session('chat_user');
    
    // Fallback if session wasn't set for some reason
    if (!$sessionUser) {
        $sessionUser = [
            'id' => (string) str()->uuid(),
            'name' => 'Guest-' . rand(1000, 9999),
            'location' => 'Unknown',
            'avatar' => 'https://api.dicebear.com/9.x/pixel-art/svg?seed=Guest'
        ];
        session(['chat_user' => $sessionUser]);
    }

    $socketId = $request->socket_id;
    $channelName = $request->channel_name;

    $presenceData = [
        'user_id' => $sessionUser['id'],
        'user_info' => $sessionUser
    ];

    try {
        $auth = $pusher->presence_auth($channelName, $socketId, $sessionUser['id'], $presenceData);
        return response($auth);
    } catch (\Exception $e) {
        $auth = $pusher->socket_auth($channelName, $socketId);
        return response($auth);
    }
})->middleware('throttle:30,1');

use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

function getChatUserLocation($request) {
    $userAgent = $request->header('user-agent', '');
    $isMobile = preg_match('/Mobile|Android|iP(hone|od|ad)|Windows Phone/i', $userAgent);
    $deviceIcon = $isMobile ? '📱' : '💻';

    $city = urldecode($request->header('x-vercel-ip-city', ''));
    $country = urldecode($request->header('x-vercel-ip-country', ''));

    if (!$city) {
        // Fallback to IP Geolocation
        $ip = $request->ip();
        // If testing locally, fake an IP for testing (or use ip-api without IP to get current)
        if ($ip == '127.0.0.1' || $ip == '::1') $ip = ''; 
        
        $geo = Cache::remember('geo_'.$ip, 3600, function() use ($ip) {
            $url = $ip ? "http://ip-api.com/json/{$ip}" : "http://ip-api.com/json/";
            try {
                $response = Http::timeout(2)->get($url);
                if ($response->successful() && $response->json('status') === 'success') {
                    return [
                        'city' => $response->json('city'),
                        'country' => $response->json('countryCode')
                    ];
                }
            } catch (\Exception $e) {}
            return ['city' => 'Earth', 'country' => ''];
        });
        
        $city = $geo['city'];
        $country = $geo['country'];
    }

    $location = $city;
    if ($country) {
        $location .= ', ' . $country;
    }
    
    return $location . ' ' . $deviceIcon;
}

Route::get('/messages', function (Request $request) {
    $query = Message::orderBy('created_at', 'desc');
    
    if ($request->has('before')) {
        $query->where('id', '<', (int) $request->before);
    }
    
    $messages = $query->take(50)->get()->reverse()->values();
    
    return response()->json([
        'messages' => $messages,
        'has_more' => $messages->count() === 50,
        'oldest_id' => $messages->first()?->id,
    ]);
})->middleware('throttle:30,1');

Route::post('/messages', function (Request $request) {
    $request->validate([
        'content' => 'required|string|min:1|max:500',
    ]);

    $sessionUser = session('chat_user');
    
    if (!$sessionUser || !$sessionUser['name']) {
        return response()->json(['error' => 'Set a name first'], 403);
    }

    // Always re-evaluate location on message send to ensure accuracy and fix stale sessions
    $currentLocation = getChatUserLocation($request);
    
    $message = Message::create([
        'username' => e($sessionUser['name']),
        'location' => $currentLocation,
        'avatar' => $sessionUser['avatar'],
        'content' => e($request->content),
    ]);

    // Update session location quietly
    $sessionUser['location'] = $currentLocation;
    session(['chat_user' => $sessionUser]);

    broadcast(new MessageSent($message))->toOthers();

    return response()->json($message);
})->middleware('throttle:10,1');

Route::post('/set-name', function (Request $request) {
    $request->validate(['name' => 'required|string|min:2|max:20']);
    $sessionUser = session('chat_user');
    
    if ($sessionUser) {
        $sessionUser['name'] = e($request->name);
        $sessionUser['avatar'] = "https://api.dicebear.com/9.x/pixel-art/svg?seed=" . urlencode($request->name);
        $sessionUser['location'] = getChatUserLocation($request);
        session(['chat_user' => $sessionUser]);
        return response()->json($sessionUser);
    }
    
    return response()->json(['error' => 'No session'], 400);
})->middleware('throttle:5,1');

Route::get('/ajax/github-contributions/{username}', function($username) {
    return Cache::remember('github_contributions_' . $username, 43200, function() use ($username) {
        $options = [
            "http" => [
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n"
            ]
        ];
        $context = stream_context_create($options);
        $html = @file_get_contents("https://github.com/users/{$username}/contributions", false, $context);
        
        if (!$html) {
            return ['error' => 'Failed to fetch'];
        }

        $total = '0';
        if (preg_match('/<h2[^>]*>\s*([\d,]+)\s+contributions/i', $html, $m)) {
            $total = trim($m[1]);
        }

        preg_match_all('/data-date="([^"]+)"[^>]*data-level="([^"]+)"/i', $html, $matches);
        
        $days = [];
        for ($i = 0; $i < count($matches[1]); $i++) {
            $days[] = [
                'date' => $matches[1][$i],
                'level' => (int)$matches[2][$i]
            ];
        }

        return [
            'total' => $total,
            'days' => $days
        ];
    });
})->where('username', '[a-zA-Z0-9_-]+')->middleware('throttle:10,1');

Route::get('/me', function () {
    $user = session('chat_user');
    if ($user) {
        return response()->json([
            'id' => $user['id'] ?? null,
            'name' => $user['name'] ?? null,
            'avatar' => $user['avatar'] ?? null,
        ]);
    }
    return response()->json(null);
});

