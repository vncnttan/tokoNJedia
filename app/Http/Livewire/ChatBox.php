<?php

namespace App\Http\Livewire;

use App\Events\NewChatMessage;
use App\Models\Merchant;
use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;

class ChatBox extends Component
{
    public $room;
    public $messages;
    public $merchant;
    public $message;

    public function getListeners()
    {
        return [
            "NewChat" => "newChat",
            "hydrate" => "hydrate",
            "roomChanged" => 'onRoomChanged'
        ];
    }

    public function mount($room, $merchant)
    {
        $this->room = $room;
        $this->merchant = $merchant;
        $this->refreshMessage();
    }

    public function send()
    {
        if ($this->message != null) {
            $message = new Message();
            $message->id = Str::uuid();
            $message->message = $this->message;
            $message->room_id = $this->room->id;
            $message->messageable_id = auth()->id();
            $message->messageable_type = User::class;
            $this->resetMessage();
            $message->save();
            $this->pushMessage($message);
        }
    }

    public function resetMessage()
    {
        if (auth()->user()->Merchant != null) {
            if (auth()->user()->Merchant->id != $this->merchant->id) {
                $this->message = "";
            }
        } else {
            $this->message = "";
        }
    }

    public function hydrate()
    {
        $this->refreshMessage();
    }

    public function newChat($event)
    {
        $message = Message::find($event["message"]["id"]);
        $room = Room::find($event["room"]["id"]);
        $user = User::find($event["user"]["id"]);
        if (auth()->user()->id != $user->id) {
            $this->pushMessage($message);
        } else {
        }
    }

    public function onRoomChanged($roomId, $merchantId)
    {
        $this->room = Room::find($roomId);
        $this->merchant = Merchant::find($merchantId);
        $this->dispatchBrowserEvent('room-updated', ['roomId' => $roomId]);
        $this->refreshMessage();
    }

    private function pushMessage($message)
    {
        $this->messages->push($message);
        $this->dispatchBrowserEvent('rowChatToBottom');
    }

    private function refreshMessage()
    {
        if ($this->room) {
            $this->messages = $this->room->Messages()->with('Messageable')->orderBy('created_at', 'asc')->get();


            $this->dispatchBrowserEvent('rowChatToBottom');
        }
    }

    public function render()
    {
        return view('livewire.chat.chat-box');
    }
}
