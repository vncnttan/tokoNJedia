<?php

namespace App\Http\Livewire;

use App\Models\Merchant;
use App\Models\Room;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class Chat extends Component
{
    public $rooms;
    public $currRoom;
    public $message;
    public $users;
    public $currMerchant;
    public function mount(){
        $user = User::find(auth()->id());
        $this->rooms = $user->Rooms()->with(['Merchants'])->get();
        $this->currRoom = null;
    }

    public function getRoom($merchantId)
    {
        $user = User::find(auth()->id());
        $isExist = $user->Rooms()->whereHas("Merchants", function ($query) use ($merchantId) {
            $query->where("id", $merchantId);
        })->first();
        if (!$isExist) {
            $room = new Room();
            $room->id = Str::uuid();
            $room->save();
            $room->Merchants()->attach($merchantId);
            $room->Users()->attach($user->id);
            $this->currRoom = $room;

        }
        else {
            $this->currRoom = $isExist;
        }
        $this->currMerchant = Merchant::find($merchantId);
        $this->emit('roomChanged', $this->currRoom->id, $merchantId);
    }

    public function render()
    {
        return view('livewire.chat.chat');
    }
}
