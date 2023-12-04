<?php

namespace App\Http\Livewire;

use App\Events\NewChatMessage;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class MerchantChatBox extends Component
{
    public $room;
    public $messages;
    public $user;
    public $message;

    public function getListeners()
    {
        return [
            "NewChat" => "newChat",
            "roomChanged" => 'onRoomChanged'
        ];
    }

    public function mount($room, $user)
    {
        $this->room = $room;
        $this->user = $user;
        $this->refreshMessage();
    }

    public function send()
    {
        if($this->message!=null){
            $message = new Message();
            $message->id = Str::uuid();
            $message->message = $this->message;
            $message->user_id = auth()->user()->id;
            $message->room_id = $this->room->id;
            if (auth()->user()->id != $this->user->id) {
                $this->message = "";
            }
            $message->save();
            $this->pushMessage($message);
            broadcast(new NewChatMessage($message, $this->room, Auth::user()));
        }
    }

    public function newChat($event)
    {
        $message = Message::find($event["message"]["id"]);
        $room = Room::find($event["room"]["id"]);
        $user = User::find($event["user"]["id"]);
        if (auth()->user()->id != $user->id) {
            $this->pushMessage($message);
        }
        else{
        }

    }

    public function onRoomChanged($roomId, $userId)
    {
        $this->room = Room::find($roomId);
        $this->user = User::find($userId);
        $this->dispatchBrowserEvent('room-updated', ['roomId' => $roomId]);
        $this->refreshMessage();
    }

    private function pushMessage($message){
        $this->messages->push($message);
        $this->dispatchBrowserEvent('rowChatToBottom');
    }

    private function refreshMessage(){
        if($this->room){
            $this->messages = $this->room->Messages()->orderBy('created_at', 'asc')->get();
            $this->dispatchBrowserEvent('rowChatToBottom');
        }
    }
    public function render()
    {
        return view('livewire.merchant.merchant-chat-box');
    }
}
