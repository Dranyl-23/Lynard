---
title: "Building a Real-Time Community Chat with Laravel & Alpine.js"
excerpt: How to build a lightweight, highly-interactive websocket chat application without reaching for a massive Javascript framework.
date: Jul 2026
readTime: 6 min
image: images/blog/chat.jpg
---

If you look closely at the sidebar of this portfolio, you'll see a live "Community Chat" feature. It features an interactive 8-bit game canvas and a real-time messaging system.

A few years ago, building this would have required a heavy Single Page Application (SPA) framework like React or Vue, combined with complex state management like Redux. Today, I built the entire thing using just Laravel, Alpine.js, and Pusher.

## The Architecture

The backend is surprisingly simple. Laravel handles the authentication and message storage. When a user sends a message, Laravel broadcasts a `MessageSent` event over WebSockets using Laravel Reverb (or Pusher).

```php
class MessageSent implements ShouldBroadcastNow
{
    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('community-chat');
    }
}
```

## Alpine.js for the Frontend

Instead of loading React just for this one component, I used Alpine.js. Alpine allows you to sprinkle reactive behavior directly into your HTML.

Using Laravel Echo, Alpine simply listens for the WebSocket event and pushes the new message onto its local data array.

```html
<div x-data="communityChat()" 
     x-init="
        Echo.channel('community-chat')
            .listen('MessageSent', (e) => {
                messages.push(e.message);
                scrollToBottom();
            });
     ">
```

By keeping the state local to the component and relying on WebSockets for real-time updates, the chat feels instantly responsive without the massive JavaScript bundle overhead. It's a testament to how far the "HTML-over-the-wire" ecosystem has come!
