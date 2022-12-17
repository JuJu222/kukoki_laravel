<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    // Get Midtrans' snap token to be passed on to the mobile app
    function getSnapToken(Request $request) {
        // Set your Merchant Server Key
        Config::$serverKey = 'SB-Mid-server-KfV0RcPrjlTs3hf9D1jVRIgU';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;
        $user = User::query()->find($request->userID);
        // Seperate user's name into array of strings
        $nameArray = explode(" ", $user->full_name);
        $lastName = array_pop($nameArray);
        $firstName = implode(" ", $nameArray);
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->total,
            ),
            'customer_details' => array(
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $user->email,
                'phone' => $user->phone,
            ),
        );

        $snapToken = Snap::getSnapToken($params);

        return response()->json([
            'snapToken' => $snapToken,
        ]);
    }
}
