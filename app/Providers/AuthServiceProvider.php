<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Review;
use App\Models\TransactionHeader;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('review-product', function ($user, $transactionId, $productId) {
            $transaction = TransactionHeader::where('id', $transactionId)->first();
            if ($transaction === null) {
                return false;
            }
            $product = Product::where('id', $productId)->first();
            if ($product === null) {
                return false;
            }

            $review = Review::where('transaction_id', $transactionId)->where('product_id', $productId)->where('user_id', $user->id)->first();
            if($review !== null){
                return false;
            }

            return true;
        });

        Gate::define('merchant-view', function ($user) {
            return $user->isMerchant();
        });

        Gate::define('merchant-edit', function ($user, $merchantId) {
            $user = auth()->user();
            if($user === null){
                return false;
            }
            $merchant = $user->Merchant;
            if($merchant === null){
                return false;
            }
            if($merchant->id != $merchantId){
                return false;
            }
            return true;
        });
    }


}
