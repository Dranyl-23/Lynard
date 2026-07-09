<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Since we are using our own anonymous /broadcasting/auth route,
// the presence authorization is already handled in web.php.
// But we still need these channel declarations to exist and return truthy.
Broadcast::channel('site', function ($user) {
    return true;
});

Broadcast::channel('chat', function ($user) {
    return true;
});

Broadcast::channel('game', function ($user) {
    return true;
});
