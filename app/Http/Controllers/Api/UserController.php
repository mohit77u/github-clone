<?php

namespace App\Http\Controllers\Api;

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
    
}
