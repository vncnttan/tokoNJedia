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
    public $users;
    public $currUser;

    public function mount()
    {
        $user = User::find(auth()->id());
        $this->rooms = $user->Rooms()->with(['Users' => function ($query) use ($user) {
            $query->where('users.id', '!=', $user->id)->first();
        }])->get();
        $this->currRoom = null;
    }
    public function getRoom($userId)
    {
        $user = User::find(auth()->id());
        // $this->currRoom = $room;
        // $this->currUser = $room->users->reject(function ($u) use ($user) {
        //     return $u->id === $user->id;
        // })->first();
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
        $this->currUser = $user;
        $this->emit('roomChanged', $this->currRoom->id, $userId);
    }



    public function render()
    {
        return view('livewire.merchant.merchant-chat');
    }
}
