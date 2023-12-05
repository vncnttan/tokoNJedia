<?php

use App\Models\Room;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('chat', function(){
    return true;
});
// Broadcast::channel('chat.{room}', function($rooms, $roomId){
//     $roomIds = array_column($rooms, 'id');
//     return in_array($roomId, $roomIds);
//     // return true;
// });

Broadcast::channel('chat.{roomId}', function($user, $roomId){
    $room = Room::find($roomId);
    return true;
});
