<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    // Return Midtrans' snap token in JSON to be passed on to the mobile app
    function getSnapToken(Request $request) {
        // Set your Merchant Server Key
        Config::$serverKey = 'SB-Mid-server-KfV0RcPrjlTs3hf9D1jVRIgU';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;

        $user = User::query()->findOrFail($request->userID);
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
        $snapURL = Snap::getSnapUrl($params);

        return response()->json([
            'status' => 'success',
            'snapURL' => $snapURL
        ]);
    }

    // Logs the order from the JSON request to the database
    function createOrder(Request $request) {
        $order = Order::query()->create([
            'user_id' => User::query()->findOrFail($request->userID)->id,
            'date' => Carbon::now(),
        ]);

        foreach ($request->cart as $meal) {
            OrderDetail::query()->create([
                'user_id' => $request->userID,
                'meal_id' => $meal['meal_id'],
                'order_id' => $order->id,
                'portion' => $meal['meal_id'],
                'date' => $meal['date'],
            ]);
        }

        return response()->json([
            'status' => 'success',
            'order' => $order,
            'orderDetails' => OrderDetail::query()->where('order_id', $order->id)->get(),
        ]);
    }
}
