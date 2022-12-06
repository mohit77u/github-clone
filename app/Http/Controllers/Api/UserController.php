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

    public function updateUsername(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'id'        => 'required',
        ]);

        $user = User::find($request->id);
        // dd($user);
        $username = $request->username;

        $user->update([
            'username' => $username,
        ]);

        return response([
            'message'   => 'Username updated successfully.',
            'user'      => $user,
        ]);
    }
    
}
