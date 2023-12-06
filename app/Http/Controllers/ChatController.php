<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function index($merchantId = null){
        $room = null;
        if($merchantId) {
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
            } else {
                $room = $isExist;
            }
        }
        return view('pages.chat.chat', ['room' => $room]);
    }

//    public function chatMerchant($id){
//        $user = User::find(auth()->id());
//        $isExist = $user->Rooms()->whereHas("Merchants", function ($query) use ($id) {
//            $query->where("id", $id);
//        })->first();
//
//        if (!$isExist) {
//            $room = new Room();
//            $room->id = Str::uuid();
//            $room->save();
//            $room->Merchants()->attach($id);
//            $room->Users()->attach($user->id);
//        }
//        return redirect('/chat');
//    }
}
