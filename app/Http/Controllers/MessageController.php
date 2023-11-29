<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        if (!$request->filled('message')) {
            return response()->json([
                'message' => 'No message to send'
            ], 422);
        }

        // TODO: Sanitize input

        event(new NewChatMessage($request->message, $request->user));

        return response()->json([], 200);
    }
}
