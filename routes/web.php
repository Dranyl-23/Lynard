<?php

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

use Illuminate\Http\Request;
use Pusher\Pusher;

Route::post('/broadcasting/auth', function (Request $request) {
    $pusher = new Pusher(
        env('REVERB_APP_KEY'),
        env('REVERB_APP_SECRET'),
        env('REVERB_APP_ID'),
        [
            'host' => env('REVERB_HOST'),
            'port' => env('REVERB_PORT'),
            'scheme' => env('REVERB_SCHEME'),
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
});

use App\Models\Message;
use App\Events\MessageSent;

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
});

Route::post('/messages', function (Request $request) {
    $request->validate([
        'content' => 'required|string|min:1|max:500',
    ]);

    $sessionUser = session('chat_user');
    
    if (!$sessionUser || !$sessionUser['name']) {
        return response()->json(['error' => 'Set a name first'], 403);
    }

    $message = Message::create([
        'username' => e($sessionUser['name']),
        'location' => e($sessionUser['location']),
        'avatar' => $sessionUser['avatar'],
        'content' => e($request->content),
    ]);

    broadcast(new MessageSent($message))->toOthers();

    return response()->json($message);
})->middleware('throttle:10,1');

Route::post('/set-name', function (Request $request) {
    $request->validate(['name' => 'required|string|min:2|max:20']);
    $sessionUser = session('chat_user');
    
    if ($sessionUser) {
        $sessionUser['name'] = e($request->name);
        $sessionUser['avatar'] = "https://api.dicebear.com/9.x/pixel-art/svg?seed=" . urlencode($request->name);
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
});

Route::get('/me', function () {
    return response()->json(session('chat_user'));
});

// Temporary route to run migrations on Vercel
Route::get('/deploy-migrate', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return 'Migrations executed successfully! ' . \Illuminate\Support\Facades\Artisan::output();
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});
