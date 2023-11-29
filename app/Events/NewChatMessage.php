<?php

namespace App\Events;

use App\Http\Controllers\Controller;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $user;
    public $room;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $user, $room)
    {
        $this->message = $message;
        $this->user = $user;
        $this->room = $room;
    }

    public function broadcastWith(){
        return [
            'user_id' => $this->user->id,
            'room_id' => $this->room->id,
            'message' => $this->message->message
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat.'.$this->room->id);
    }
}
