<?php

namespace App\Http\Livewire;

use App\Events\NewChatMessage;
use App\Http\Controllers\Controller;
use App\Models\Merchant;
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
    public $search = '';

    public function mount()
    {

        $this->currRoom = null;
    }
    public function getRoom($userId)
    {
        $merchant = Merchant::find(auth()->user()->Merchant->id);
        $isExist = $merchant->Rooms()->whereHas("Users", function ($query) use ($userId) {
            $query->where("id", $userId);
        })->first();
        if($isExist){
            $this->currRoom = $isExist;
            $this->currUser = User::find($userId);
            $this->emit('roomChanged', $this->currRoom->id, $userId);
        }
    }

    public function render()
    {
        $merchant = Merchant::find(auth()->user()->Merchant->id);
        $this->rooms = $merchant->Rooms()->with(['Users'])->has("Messages")
        ->whereHas("Users", function($query){
            $query->where('username', 'like', '%' . $this->search . '%');
        })
        ->get()->sortByDesc(function ($room) {
            return $room->Messages->max('created_at');
        });
        return view('livewire.merchant.merchant-chat');
    }
}
