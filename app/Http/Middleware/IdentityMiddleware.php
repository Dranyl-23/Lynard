<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;

class IdentityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('chat_user')) {
            $ip = $request->ip();
            $location = 'Unknown Location';
            
            if ($ip && $ip !== '127.0.0.1' && $ip !== '::1') {
                try {
                    $response = Http::timeout(3)->get("http://ip-api.com/json/{$ip}");
                    if ($response->successful() && $response->json('status') === 'success') {
                        $location = $response->json('city') . ', ' . $response->json('countryCode');
                    }
                } catch (\Exception $e) {
                    // Ignore API errors
                }
            } else {
                $location = 'Local Area';
            }

            $request->session()->put('chat_user', [
                'id' => (string) str()->uuid(),
                'name' => null,
                'location' => $location,
                'avatar' => null,
            ]);
        } else {
            // Retroactively fix existing sessions that were assigned a 'Guest-XXXX' name
            $chatUser = $request->session()->get('chat_user');
            $changed = false;
            
            if (isset($chatUser['name']) && str_starts_with($chatUser['name'], 'Guest-')) {
                $chatUser['name'] = null;
                $chatUser['avatar'] = null;
                $changed = true;
            }
            
            // Retroactively fix avatars to use pixel-art
            if (isset($chatUser['avatar']) && (str_contains($chatUser['avatar'], 'ui-avatars.com') || str_contains($chatUser['avatar'], 'open-peeps'))) {
                $seed = isset($chatUser['name']) ? $chatUser['name'] : 'Guest';
                $chatUser['avatar'] = "https://api.dicebear.com/9.x/pixel-art/svg?seed=" . urlencode($seed);
                $changed = true;
            }
            
            if ($changed) {
                $request->session()->put('chat_user', $chatUser);
            }
        }

        return $next($request);
    }
}
