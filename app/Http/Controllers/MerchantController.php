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
use Illuminate\Validation\Rule;

class MerchantController extends Controller
{
    public function index()
    {
        $merchantId = Auth::user()->Merchant->id;
        $pendingOrders = TransactionDetail::whereHas('product', function ($query) use ($merchantId) {
            $query->where('merchant_id', $merchantId);
        })->with(['product', 'productVariant', 'transactionHeader', 'transactionHeader.user'])->where('status', 'pending')->get();
        $shippingOrders = TransactionDetail::whereHas('product', function ($query) use ($merchantId) {
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

    public function updateProfile(Request $request)
    {
        $messages = [
            'required' => "All Fields Must Be Filled",
            'name.min' => "Merchant Name Must Be At Least 3 Characters",
            'name.max' => "Merchant Name Must Not More Than 25 Characters",
            'process_time.min' => "Process Time Must Be At Least 5 Characters",
            'process_time.max' => "Process Time Must Not More Than 10 Characters",
            'operationalTime.min' => "Operational Time Must Be At Least 5 Characters",
            'operationalTime.max' => "Operational Time Must Not More Than 30 Characters",
            'status.in' => "Status Must Be Online, Offline, Or Closed",
            'description.max' => "Description Must Not More Than 200 Characters",
            'profileImage.image' => "Image Must Be An Image",
            'profileImage.mimes' => "Image Must Be A File Of Type: jpeg, png, jpg, gif, svg",
            'profileImage.max' => "Image Must Not More Than 2MB",
            'bannerImage.image' => "Image Must Be An Image",
            'bannerImage.mimes' => "Image Must Be A File Of Type: jpeg, png, jpg, gif, svg",
            'bannerImage.max' => "Image Must Not More Than 2MB",
            'catchphrase.max' => "Catch Phrase Must Not More Than 50 Characters",
            'desc.max' => "Full Description Must Not More Than 250 Characters",
            'fullDescription.max' => "Full Description Must Not More Than 250 Characters",
        ];
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'min:3', 'max:25'],
            'processTime' => ['required', 'min:5', 'max:10'],
            'operationalTime' => ['required', 'min:5', 'max:30'],
            'status' => ['required', Rule::in(['Online', 'Offline', 'Close'])],
            'description' => ['max:200'],
            'profileImage' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'bannerImage' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'catchphrase' => ['max:50'],
            'desc' => ['max:250'],
            'fullDescription' => ['max:250'],
        ], $messages);

        if ($validate->fails()) {
            toastr()->error($validate->errors()->first(), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return redirect()->back()->withErrors($validate)->withInput($request->input);
        }

//        dd($request->all());

        $merchant = Auth::user()->Merchant;
        $merchant->name = $request->name;
        $merchant->process_time = $request->processTime;
        $merchant->operational_time = $request->operationalTime;
        $merchant->status = $request->status;
        $merchant->description = $request->desc ?? "";
        $merchant->catch_phrase = $request->catchphrase ?? "";
        $merchant->full_description = $request->fullDescription ?? "";


        if ($request->hasFile('profileImage')) {
            $profileImage = $request->file('profileImage');
            $profileImageName = time() . '-' . $profileImage->getClientOriginalName();
            $profileImage->move(public_path('storage/merchant/profile'), $profileImageName);
            $merchant->image = $profileImageName;
        }

        $merchant->save();

        toastr()->success("Success To Update Profile", '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        return redirect('/merchant/'.$merchant->id);
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

    public function profile()
    {
        $merchant = Auth::user()->Merchant;
        return view('pages.merchant.merchant-profile', ['merchant' => $merchant]);
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

    public function merchantTransactions()
    {
        $merchant = Auth::user()->Merchant;

        $transactionDetails = TransactionDetail::whereHas('product.merchant', function ($query) use ($merchant) {
            $query->where('id', $merchant->id);
        })->where('status', '!=', 'pending')->where('status', '!=', 'shipping')
            ->with(['transactionHeader', 'product', 'product.merchant', 'product.productImages', 'product.merchant.location', 'shipment'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.merchant.merchant-transaction', ['merchant' => $merchant, 'historyTransaction' => $transactionDetails]);
    }
}
