<?php

namespace App\View\Components;

use App\Models\Merchant;
use App\Models\MerchantFollower;
use App\Models\Room;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class MerchantHeader extends Component
{
    private Merchant $merchant;
    private mixed $following;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($merchantId)
    {
//        dd(MerchantFollower::where('user_id', auth()->id())->first());
        $this->following = MerchantFollower::where('user_id', auth()->id())->where('merchant_id', $merchantId)->first();
        $this->merchant = Merchant::where('id', $merchantId)->first();
    }

    public function chat(){
        dd("test");
        // $user = User::find(auth()->id());
        // $merchantId = $this->merchant->id;
        // $isExist = $user->Rooms()->whereHas("users", function ($query) use ($merchantId) {
        //     $query->where("roomable_id", $merchantId)
        //         ->where('roomable_type', Merchant::class);
        // })->first();
        // if (!$isExist) {
        //     $room = new Room();
        //     $room->id = Str::uuid();
        //     $room->save();
        //     $room->Users()->attach($merchantId);
        //     $room->Users()->attach($user->id);
        // }
        // return redirect('/chat');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        Log::info('MerchantHeader component is being rendered');
        return view('components.merchant.merchant-header', ['merchant' => $this->merchant, 'following' => $this->following]);
    }
}
