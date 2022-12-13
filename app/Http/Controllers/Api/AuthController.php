<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    // get login page
    public function LoginPage()
    {
        return view('auth.login');
    }

    // get signup page
    public function SignupPage()
    {
        return view('auth.signup');
    }

    public function register(Request $request)
    {
        $input = $request->validate([
            'name'                       => 'required',
            'username'                   => 'required',
            'email'                      => 'required|unique:users|email',
            'password'                   => 'required',
            'password_confirmation'      => 'required|same:password',
        ]);
        
        // bycrypt password
        $input['password'] = Hash::make($input['password']);

        // store data
        User::create([
            'name'              => $input['name'],
            'username'          => $input['username'],
            'email'             => $input['email'],
            'password'          => $input['password'],
        ]);

        // return response
        return redirect()->route('login');
        // return response([
        //     'message' => 'User successfully registered',
        // ], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'      => 'required|email',
            'password'   => 'required',
        ]);

        $login = $request->only('email', 'password');

        if (!Auth::attempt($login)) {
            throw ValidationException::withMessages([
                'email'     => 'Email does not exist or not verified',
                'password'  => 'Password incorrect/invalid',
            ]);
        }

        $user = Auth::user();

        return redirect('/' .strtoLower($user->username) . '/home');
    }

    // to redirect to github login page
    public function gitRedirect()
    {
        return Socialite::driver('github')->redirect();
    }
       
    // get the callback to store dtails and login user
    public function gitCallback()
    {
        $user = Socialite::driver('github')->user();

        $user = User::updateOrCreate([
            'github_id' => $user->id,
        ], [
            'name'                  => $user->getName() ? $user->getName() : $user->getNickname(),
            'username'              => $user->getNickname(),
            'email'                 => $user->getEmail(),
            'password'              => Hash::make('password'),
            'github_id'             => $user->getId(),
            'auth_type'             => 'github',
        ]);

        // make user to auth user
        Auth::login($user);
    
        // redirect to home page
        return redirect('/');
    }

    // forgot password
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');

    }

    // forgot password
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $email = $request->email;

        if(User::where('email', $email)->doesntExist()){
            return response([
                'message'=>'User with this email does not exists!'
            ], 200);
        }
        $token = Str::random(100);

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now()->addHours(6)
        ]);

        $data = [
            'token' =>$token,
            'user'  => User::where('email', $email)->first(),
        ];

        // Send Mail
        // Mail::to($email)->send(new ForgotPasswordMail($data));

        return response([
            'message' => 'Check your email.'
        ], 200);
    }

    // forgot password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        $token = $request->token;
        $passwordRest = DB::table('password_resets')->where('token', $token)->first();

        // Verify
        if(!$passwordRest)
        {
            return response(['message' => 'Token Not Found.'], 200);
        }

        // Validate exipire time
        if(!$passwordRest->created_at >= now())
        {
            return response([
                'message' => 'Token has expired.'
            ], 200);
        }

        $user = User::where('email', $passwordRest->email)->first();

        if(!$user)
        {
            return response([
                'message' => 'User does not exists.'
            ], 200);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_resets')->where('token', $token)->delete();;

        return response([
            'message'=>'Password Successfully Updated.'
        ], 200);
    }

    
}
