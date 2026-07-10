<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ChatLocationService
{
    /**
     * Determine the location string for a chat message.
     * Uses Vercel geo headers first, then falls back to ip-api.com.
     */
    public static function getLocation(Request $request): string
    {
        $userAgent = $request->header('user-agent', '');
        $isMobile = (bool) preg_match('/Mobile|Android|iP(hone|od|ad)|Windows Phone/i', $userAgent);
        $deviceIcon = $isMobile ? '??' : '??';

        // Vercel provides these headers automatically on production
        $city    = urldecode($request->header('x-vercel-ip-city', ''));
        $country = urldecode($request->header('x-vercel-ip-country', ''));

        if (!$city) {
            $ip = $request->ip();

            // On local dev, skip geo lookup
            if ($ip === '127.0.0.1' || $ip === '::1') {
                return 'Local Area ' . $deviceIcon;
            }

            $geo = Cache::remember('geo_' . $ip, 3600, function () use ($ip) {
                try {
                    $response = Http::timeout(2)->get("http://ip-api.com/json/{$ip}");
                    if ($response->successful() && $response->json('status') === 'success') {
                        return [
                            'city'    => $response->json('city'),
                            'country' => $response->json('countryCode'),
                        ];
                    }
                } catch (\Exception $e) {
                    // Silently fall back
                }

                return ['city' => 'Earth', 'country' => ''];
            });

            $city    = $geo['city'] ?? 'Earth';
            $country = $geo['country'] ?? '';
        }

        $location = $city;
        if ($country) {
            $location .= ', ' . $country;
        }

        return $location . ' ' . $deviceIcon;
    }
}
