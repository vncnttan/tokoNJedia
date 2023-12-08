<?php

namespace App\Events;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    public $room;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $room, $user)
    {
        $this->message = $message;
        $this->room = $room;
        $this->user = $user;
    }
    public function broadcastWith(){

        return [
            "message" => $this->message,
            "room" => $this->room,
            "user" => $this->user
        ];
    }
    public function broadcastAs(){
        return "NewChat";
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->room->id);
    }
}
