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

class MerchantChat extends Component
{
    public $rooms;
    public $currRoom;
    public $message;
    public $messages;
    public $users;
    public $currUser;
    protected $listeners = ['NewChat' => 'newChat'];

    public function mount()
    {
        $user = User::find(auth()->id());
        $this->rooms = $user->Rooms()->with(['Users' => function ($query) use ($user) {
            $query->where('users.id', '!=', $user->id)->first();
        }])->get();
        $this->users = User::all();
        $this->currRoom = $this->rooms->first();
        $this->currUser = $this->users->first();
    }
    public function getRoom($userId)
    {
        $user = User::find(auth()->id());

        $isExist = $user->Rooms()->whereHas("users", function ($query) use ($userId) {
            $query->where("roomable_id", $userId)
                ->where('roomable_type', User::class);
        })->first();
        if (!$isExist) {
            $room = new Room();
            $room->id = Str::uuid();
            $room->save();
            $room->Users()->attach($userId);
            $room->Users()->attach($user->id);
            $this->currRoom = $room;
        } else {
            $this->currRoom = $isExist;
        }
        $this->currUser = User::find($userId);
        $this->messages = $this->currRoom->Messages;
    }
    public function send(){
        $message = new Message();
        $message->id = Str::uuid();
        $message->message = $this->message;
        $message->user_id = auth()->user()->id;
        $message->room_id = $this->currRoom->id;
        // $message->save();
        // broadcast(new NewChatMessage($message, $this->currRoom, Auth::user()));
        event(new NewChatMessage($this->message));
    }
    public function newChat($event){
        Controller::SuccessMessage($event["message"]);

        // $message = $event["message"];
        // $room = $event["room"];
        // $user = $event["user"];
    }
    public function render()
    {
        return view('livewire.merchant.merchant-chat');
    }
}
