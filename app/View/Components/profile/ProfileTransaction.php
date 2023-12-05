<?php

namespace App\View\Components\profile;

use App\Models\Cart;
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
        $transactions = TransactionHeader::where('user_id', auth()->user()->id)->with(['location', 'transactionDetails', 'transactionDetails.product', 'transactionDetails.product.merchant', 'transactionDetails.product.productImages', 'transactionDetails.product.merchant.location', 'transactionDetails.shipment'])->get();
        return view('components.profile-transaction', ['user' => $user, 'transactions' => $transactions]);
    }
}
