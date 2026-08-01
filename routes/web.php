<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'posts' => \App\Models\Post::all()->take(3)
    ]);
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

use Illuminate\Pagination\LengthAwarePaginator;

Route::get('/blog', function () {
    $allPosts = Post::all();
    $page = request()->get('page', 1);
    $perPage = 6;
    $paginatedPosts = new LengthAwarePaginator(
        $allPosts->forPage($page, $perPage),
        $allPosts->count(),
        $perPage,
        $page,
        ['path' => request()->url(), 'query' => request()->query()]
    );

    return view('blog', [
        'posts' => $paginatedPosts
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
use App\Services\ChatLocationService;

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
        if (str_starts_with($channelName, 'presence-')) {
            $auth = $pusher->presence_auth($channelName, $socketId, $sessionUser['id'], $presenceData);
        } else {
            $auth = $pusher->socket_auth($channelName, $socketId);
        }
        return response($auth)->header('Content-Type', 'application/json');
    } catch (\Exception $e) {
        return response()->json(['error' => 'Auth failed'], 403);
    }
})->middleware('throttle:30,1');

use Illuminate\Support\Facades\Http;
use OpenAI;

Route::get('/ai-chat-history', function (Request $request) {
    $history = session('ai_chat_history', []);
    
    // Convert history to UI format
    $messages = [];
    foreach ($history as $index => $msg) {
        if ($msg['role'] === 'system') continue;
        
        $messages[] = [
            'id' => 'msg-' . $index,
            'username' => $msg['role'] === 'user' ? 'You' : 'AI Assistant',
            'avatar' => $msg['role'] === 'user' 
                ? 'https://api.dicebear.com/9.x/pixel-art/svg?seed=You'
                : 'https://api.dicebear.com/9.x/bottts/svg?seed=assistant',
            'location' => $msg['role'] === 'user' ? 'Virtual Office' : 'System Server',
            'content' => $msg['content'],
            'created_at' => now()->subMinutes(count($history) - $index)->toIso8601String(),
        ];
    }
    
    // Add welcome message if history is empty (only system prompt exists)
    if (count($history) <= 1) {
        $messages[] = [
            'id' => 'welcome',
            'username' => 'AI Assistant',
            'avatar' => 'https://api.dicebear.com/9.x/bottts/svg?seed=assistant',
            'location' => 'System Server',
            'content' => "Hello! I'm Alfie's AI assistant. I can help you navigate his portfolio or answer any questions you have about his work and experience. What can I help you with today?",
            'created_at' => now()->toIso8601String(),
        ];
    }
    
    return response()->json([
        'messages' => $messages,
        'has_more' => false,
    ]);
});

Route::post('/ai-chat', function (Request $request) {
    $request->validate([
        'content' => 'required|string|min:1|max:1000',
    ]);

    // Load conversation history from session
    $history = session('ai_chat_history', [
        ['role' => 'system', 'content' => "You are a helpful and professional AI assistant for Alfie Lynard's portfolio website. You guide visitors, answer questions about his experience, projects, and skills. Be concise, friendly, and helpful. You live in a 2D interactive virtual office."]
    ]);

    $history[] = ['role' => 'user', 'content' => $request->content];

    $apiKey = env('OPENAI_API_KEY');
    
    if (!$apiKey) {
        return response()->json([
            'id' => uniqid(),
            'username' => 'AI Assistant',
            'avatar' => 'https://api.dicebear.com/9.x/bottts/svg?seed=assistant',
            'location' => 'System Server',
            'content' => "Error: OPENAI_API_KEY is not set in the .env file. Please ask Alfie to configure it.",
            'created_at' => now()->toIso8601String(),
        ]);
    }

    try {
        $client = OpenAI::client($apiKey);
        $response = $client->chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => $history,
        ]);
        
        $aiMessage = $response->choices[0]->message->content;
        $history[] = ['role' => 'assistant', 'content' => $aiMessage];
        
        // Keep last 10 messages to save session space (plus system prompt)
        if (count($history) > 11) {
            $history = array_merge([$history[0]], array_slice($history, -10));
        }
        session(['ai_chat_history' => $history]);

    } catch (\Exception $e) {
        $aiMessage = "Sorry, I'm having trouble connecting right now. " . $e->getMessage();
    }

    return response()->json([
        'id' => uniqid(),
        'username' => 'AI Assistant',
        'avatar' => 'https://api.dicebear.com/9.x/bottts/svg?seed=assistant',
        'location' => 'System Server',
        'content' => $aiMessage,
        'created_at' => now()->toIso8601String(),
    ]);
})->middleware('throttle:20,1');

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

