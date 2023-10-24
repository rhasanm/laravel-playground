<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FCMTokenController extends Controller
{
    public function store(Request $request)
    {
        $token = $request->input('token'); // Token sent from the client

        // Store the token in your database or perform any other necessary actions

        return response()->json(['message' => 'Token stored successfully']);
    }
}
