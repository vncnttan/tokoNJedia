<?php

namespace App\View\Components\profile;

use App\Models\Cart;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileTransaction extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     **/
    public function render(): View|Factory|Application
    {
        $user = User::find(auth()->user()->id);
        $transactionDetails = TransactionDetail::whereHas('transactionHeader', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['transactionHeader', 'product', 'product.merchant', 'product.productImages', 'product.merchant.location', 'shipment'])
            ->paginate(5);
        return view('components.profile-transaction', ['user' => $user, 'transactionDetails' => $transactionDetails]);
    }
}
