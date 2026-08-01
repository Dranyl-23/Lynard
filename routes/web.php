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
    $origin = $request->header('Origin');
    $host = $origin ? parse_url($origin, PHP_URL_HOST) : null;
    
    // Allow localhost, 127.0.0.1, vercel.app subdomains, or configured APP_URL
    if ($host && !preg_match('/(localhost|127\.0\.0\.1|vercel\.app)$/i', $host) && $origin !== config('app.url')) {
        abort(403, 'Invalid origin');
    }

    $key = config('broadcasting.connections.pusher.key');
    $secret = config('broadcasting.connections.pusher.secret');
    $appId = config('broadcasting.connections.pusher.app_id');

    if (!$key || !$secret || !$appId) {
        return response()->json(['auth' => 'disabled']);
    }

    try {
        $pusher = new Pusher(
            $key,
            $secret,
            $appId,
            [
                'cluster' => config('broadcasting.connections.pusher.options.cluster', 'mt1'),
                'useTLS' => true,
            ]
        );

        $sessionUser = session('chat_user', [
            'id' => (string) str()->uuid(),
            'name' => 'Guest-' . rand(1000, 9999),
            'location' => 'Unknown',
            'avatar' => 'https://api.dicebear.com/9.x/pixel-art/svg?seed=Guest'
        ]);

        $auth = $pusher->presence_auth($request->channel_name, $request->socket_id, $sessionUser['id'], ['user_id' => $sessionUser['id'], 'user_info' => $sessionUser]);
        return response($auth);
    } catch (\Exception $e) {
        return response()->json(['auth' => 'disabled']);
    }
})->middleware('throttle:30,1');

use Illuminate\Support\Facades\Http;

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
        ['role' => 'system', 'content' => "You are a friendly, concise AI assistant for Alfie Lynard's portfolio website. Guidelines: 1) Keep responses short, clean, and conversational. 2) Format lists using simple bullet points with clear line breaks so they are easy to read. 3) Use bold text (**like this**) for emphasis. 4) Avoid giant walls of text. Be welcoming and easy to understand for clients."]
    ]);

    $history[] = ['role' => 'user', 'content' => $request->content];

    $apiKey = env('GEMINI_API_KEY');
    
    if (!$apiKey) {
        return response()->json([
            'id' => uniqid(),
            'username' => 'AI Assistant',
            'avatar' => 'https://api.dicebear.com/9.x/bottts/svg?seed=assistant',
            'location' => 'System Server',
            'content' => "Error: GEMINI_API_KEY is not set in the .env file. Please configure it.",
            'created_at' => now()->toIso8601String(),
        ]);
    }

    try {
        $geminiContents = [];
        $systemPrompt = $history[0]['content'];
        
        foreach ($history as $msg) {
            if ($msg['role'] === 'system') continue;
            $geminiContents[] = [
                'role' => $msg['role'] === 'user' ? 'user' : 'model',
                'parts' => [['text' => $msg['content']]],
            ];
        }

        $modelsToTry = ['gemini-2.5-flash', 'gemini-2.0-flash', 'gemini-flash-latest'];
        $aiMessage = null;

        foreach ($modelsToTry as $model) {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->timeout(8)->post("https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}", [
                'system_instruction' => [
                    'parts' => ['text' => $systemPrompt]
                ],
                'contents' => $geminiContents
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $aiMessage = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
                if ($aiMessage) break;
            }
        }

        if ($aiMessage) {
            $history[] = ['role' => 'assistant', 'content' => $aiMessage];
            
            if (count($history) > 11) {
                $history = array_merge([$history[0]], array_slice($history, -10));
            }
            session(['ai_chat_history' => $history]);
        } else {
            $aiMessage = "The AI is currently experiencing high demand. Please try sending your message again in a few seconds!";
        }
    } catch (\Exception $e) {
        $aiMessage = "Sorry, I'm having trouble connecting right now. Please try again in a moment.";
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
    return Cache::remember('github_contributions_v3_' . $username, 14400, function() use ($username) {
        try {
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
            ])->timeout(10)->get("https://github.com/users/{$username}/contributions");

            if (!$response->successful()) {
                return ['total' => '0', 'days' => [], 'error' => 'HTTP ' . $response->status()];
            }

            $html = $response->body();

            $total = '0';
            if (preg_match('/([\d,]+)\s+contributions/i', $html, $m)) {
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

            // GitHub HTML table is structured by row (by day of week).
            // Sort chronologically by date so the frontend receives sequential days!
            usort($days, function($a, $b) {
                return strcmp($a['date'], $b['date']);
            });

            return [
                'total' => $total,
                'days' => $days
            ];
        } catch (\Exception $e) {
            return ['total' => '0', 'days' => [], 'error' => $e->getMessage()];
        }
    });
})->where('username', '[a-zA-Z0-9_-]+')->middleware('throttle:10,1');

