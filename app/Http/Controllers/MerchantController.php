<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MerchantController extends Controller
{
    public function index()
    {
        // TODO: CREATE MIDDLEWARE FOR THIS
        if (Auth::user()->Merchant == null) {
            return redirect('/merchant/create');
        }
        $merchantId = Auth::user()->Merchant->id;
        $pendingOrders = TransactionDetail::whereHas('product', function($query) use ($merchantId) {
            $query->where('merchant_id', $merchantId);
        })->with(['product', 'productVariant', 'transactionHeader', 'transactionHeader.user'])->where('status', 'pending')->get();
        $shippingOrders = TransactionDetail::whereHas('product', function($query) use ($merchantId) {
            $query->where('merchant_id', $merchantId);
        })->with(['product', 'shipment', 'productVariant', 'transactionHeader', 'transactionHeader.location'])->where('status', 'shipping')->get();
        return view('pages.merchant.merchant-home', ['pendingOrders' => $pendingOrders, 'shippingOrders' => $shippingOrders]);
    }

    public function create()
    {
        return view('pages.merchant.merchant-create');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => "All Fields Must Be Filled",
            'phone.unique' => "Phone Number Has Already Been Taken",
            'phone.starts_with' => "Phone Number Must Starts With '0'",
            'phone.digits' => "Phone Number Must Be 12 Characters",
            'phone.numeric' => "Phone Number Must Be Numeric",
            'name.min' => "Merchant Name Must Be At Least 3 Characters",
            'name.max' => "Merchant Name Must Not More Than 25 Characters",
            'city.min' => "City Length Must Be At Least 3 Characters",
            'city.max' => "City Length Must Not More Than 20 Characters",
            'country.min' => "Country Length Must Be At Least 3 Characters",
            'country.max' => "Country Length Must Not More Than 30 Characters",
            'address.min' => "Address Length Must Be At Least 5 Characters",
            'address.max' => "Address Length Must Not More Than 255 Characters",
            'postal_code.digits' => "Postal Code Length Must Be 5 Characters",
            'postal_code.numeric' => "Postal Code Must Be Numeric"
        ];
        $validate = Validator::make($request->all(), [
            'phone' => ['required', 'unique:merchants,phone', 'starts_with:0', 'digits:12', 'numeric'],
            'name' => ['required', 'min:3', 'max:25'],
            'city' => ['required', 'min:3', 'max:20'],
            'country' => ['required', 'min:3', 'max:30'],
            'address' => ['required', 'min:5', 'max:255'],
            'postal_code' => ['required', 'digits:5', 'numeric'],
        ], $messages);
        if ($validate->fails()) {
            toastr()->error($validate->errors()->first(), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return redirect()->back()->withErrors($validate)->withInput($request->input);
        }
        $merchant = new Merchant();
        $merchant->id = Str::uuid();
        $merchant->name = $request->name;
        $merchant->user_id = Auth::user()->id;
        $merchant->phone = $request->phone;
        $merchant->save();

        $location = new Location();
        $location->id = Str::uuid();
        $location->city = $request->city;
        $location->country = $request->country;
        $location->address = $request->address;
        $location->postal_code = $request->postal_code;
        $location->latitude = $request->lat;
        $location->longitude = $request->long;
        $location->notes = $request->notes;
        $location->locationable_type = "merchant";

        $merchant->location()->save($location);

        toastr()->success("Success To Open A Merchant", '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        return redirect('/merchant');
    }

    public function chat()
    {
        return view('pages.merchant.merchant-chat');
    }

    public function addProduct()
    {
        return view('pages.merchant.merchant-create-product');
    }

    public function manageProduct()
    {
        return view('pages.merchant.merchant-manage-product');
    }

    public function homepage(string $id)
    {
        $merchant = Merchant::find($id);
        return view('pages.merchant.merchant-homepage', ['merchant' => $merchant]);
    }

    public function merchantProduct(string $id)
    {
        $merchant = Merchant::find($id);
        $products = $merchant->Products()->with(['ProductCategory', 'ProductVariants', 'ProductImages'])->get();
        return view('pages.merchant.merchant-product', ['merchant' => $merchant, 'products' => $products]);
    }
}
