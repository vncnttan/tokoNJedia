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
    public $room;
    public $messages;
    public $users;
    public $currUser;
    public $message;

    // protected $listeners = [];
    public function mount()
    {
        $user = User::find(auth()->id());
        $this->rooms = $user->Rooms()->with(['Users' => function ($query) use ($user) {
            $query->where('users.id', '!=', $user->id)->first();
        }])->get();
        $this->users = User::all();

        // $this->messages = $this->rooms->Messages;
    }
    public function getRoom($userId)
    {
        $user = User::find(auth()->id());

        $isExist = $user->Rooms()->whereHas("users", function ($query) use ($userId) {
            $query->where("roomable_id", $userId)
                ->where('roomable_type', User::class);
        })->with(['Messages' => function ($query) {
            $query->orderBy('created_at', 'asc');
        }])->first();
        if (!$isExist) {
            $room = new Room();
            $room->id = Str::uuid();
            $room->Users()->attach($userId);
            $room->Users()->attach($user->id);
            $room->save();
            $this->room = $room;
            $this->currUser = User::find($userId);
        } else {
            $this->room = $isExist;
            $this->currUser = User::find($userId);
            $this->messages = $this->room->Messages;
        }
    }



    public function sendMessage(){
        if ($this->message == null) {
            return;
        }

        $message = new Message();
        $message->id = Str::uuid();
        $message->message = $this->message;
        $message->user_id = auth()->user()->id;
        // $message->room_id = $this->room->id;
        // $message->save();
        $this->room->Messages()->save($message);

        broadcast(new NewChatMessage($message, Auth::user(), $this->room));
    }
    public function getListeners(){
        if($this->room){
            return [
                "echo-private:chat.{$this->room->id},NewChatMessage" => 'newChat'
            ];
        }
    }


    public function newChat($data){
        Controller::SuccessMessage("Send Message Successs");
        dd($data);
    }
    public function render()
    {
        return view('livewire.merchant.merchant-chat');
    }
}
