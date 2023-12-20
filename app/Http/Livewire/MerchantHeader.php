<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\TransactionHeader;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class MerchantHeader extends Component
{
    public $merchant;
    public $following;
    public function mount($merchant){

        $this->merchant = $merchant;
        $this->following = auth()->user()->Following()->where('merchant_id', $merchant->id)->first();
    }
    public function chat(){
        $user = User::find(auth()->id());
        $merchantId = $this->merchant->id;
        $rooms = $user->Rooms()->with(["Merchants"])->get();
//         dd($rooms);
        $isExist = $user->Rooms()->whereHas("Merchants", function ($query) use ($merchantId) {
            $query->where("id", $merchantId);
        })->first();
        // dd($isExist);
        if (!$isExist) {
            $room = new Room();
            $room->id = Str::uuid();
            $room->save();
            $room->Merchants()->attach($merchantId);
            $room->Users()->attach($user->id);
        }
        return redirect('/chat');
    }

    public function render()
    {
        return view('components.merchant.merchant-header');
    }
}
