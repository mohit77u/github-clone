<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function authUser()
    {
        $user = Auth::user();

        return response([
            'user' => $user,
        ]);
    }

    public function updateToken(Request $request)
    {
        $request->validate([
            'token'     => 'required',
            'id'        => 'required',
        ]);

        $user = User::find($request->id);
        // dd($user);
        $token = $request->token;

        $user->update([
            'access_token' => $token,
        ]);

        return response([
            'message'   => 'Token updated successfully.',
            'user'      => $user,
        ]);
    }
    
}
