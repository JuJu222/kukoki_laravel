<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\User;

class UserController extends Controller
{
    // Return user object in JSON by user ID
    function getUser($user_id) {
        $user = User::findOrFail($user_id);

        return response()->json([
            'status' => 'success',
            'user' => $user
        ]);
    }
}
