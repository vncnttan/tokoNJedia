<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Controller;
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
    public function mount()
    {
        $user = User::find(auth()->id());
        $this->rooms = $user->Rooms()->with(['Users' => function ($query) use ($user) {
            $query->where('users.id', '!=', $user->id)->first();
        }])->get();
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
            $this->room = $room;
            $this->currUser = User::find($userId);
        } else {
            $this->room = $isExist;
            $this->currUser = User::find($userId);
        }
    }
    public function render()
    {
        return view('livewire.merchant.merchant-chat');
    }
}
