<?php

Broadcast::channel('chat.{receiverId}', function ($user, $receiverId) {
    return (int) $user->id === (int) $receiverId;
});

Broadcast::channel('grupo.{groupId}', function ($user, $groupId) {
    return $user->groups()->where('id', $groupId)->exists();
});
