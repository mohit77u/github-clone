@extends('layouts.auth')

@section('content')

<div class="auth py-20 flex items-center justify-center backdrop-blur-[20px]">
        <div class="sm:min-w-[330px] max-w-[330px]">
            <div class="text-center mb-4">
                <svg height="48" aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="48" data-view-component="true" class="mx-auto" fill="white">
                    <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
                </svg>
                <h1 class="text-[25px] tracking-wide text-slate-400 font-light mt-5">Sign up to GitHub</h1>
                <p class="text-gray-500 text-xs my-3">Enter your original GitHub details while signing up to connect with your GitHub account otherwise it will not be connected.</p>
            </div>
            <div class="p-6 rounded bg-white/5 border border-white/10">
                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="block mb-2 text-xs text-slate-300">Name</label>
                        <input type="text" name="name" class="@error('name')
                        border-red-500
                        @else
                        border-white/10 
                        @enderror 
                        w-full text-xs bg-transparent focus:outline-none text-slate-300 border px-2 py-2 rounded">
                        @error('name')
                        <p class="text-red-500 text-xs my-2" >{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="block mb-2 text-xs text-slate-300">Username</label>
                        <input type="text" name="username" class="@error('username')
                        border-red-500
                        @else
                        border-white/10 
                        @enderror 
                        w-full text-xs bg-transparent focus:outline-none text-slate-300 border px-2 py-2 rounded">
                        @error('username')
                        <p class="text-red-500 text-xs my-2" >{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="block mb-2 text-xs text-slate-300">Email</label>
                        <input type="email" name="email" class="@error('email')
                        border-red-500
                        @else
                        border-white/10 
                        @enderror 
                        w-full text-xs bg-transparent focus:outline-none text-slate-300 border px-2 py-2 rounded">
                        @error('email')
                        <p class="text-red-500 text-xs my-2" >{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="block mb-2 text-xs text-slate-300">Password</label>
                        <input type="password" name="password" class="@error('password')
                        border-red-500
                        @else
                        border-white/10 
                        @enderror 
                        w-full text-xs bg-transparent focus:outline-none text-slate-300 border px-2 py-2 rounded">
                        @error('password')
                        <p class="text-red-500 text-xs my-2" >{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="block mb-2 text-xs text-slate-300">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="@error('password_confirmation')
                        border-red-500
                        @else
                        border-white/10 
                        @enderror 
                        w-full text-xs bg-transparent focus:outline-none text-slate-300 border px-2 py-2 rounded">
                        @error('password_confirmation')
                        <p class="text-red-500 text-xs my-2" >{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                         <button type="submit" class="w-full text-sm bg-green-primary text-center text-white px-2 py-2 rounded flex justify-center items-center">
                            <span>Sign Up</span> 
                        </button>
                    </div>
                </form>
            </div>
            <div class="p-4 rounded bg-white/5 border border-white/10 mt-3 text-center">
                <p class="text-slate-300 text-sm">Already have an account? <a href='/login' class="text-blue-500"> Sign in →</a></p>
            </div>
            <div class="p-4 rounded bg-white/5 border border-white/10 mt-3 text-center">
                <a href="{{ route('github.login') }}" class="text-slate-300 text-sm">Sign Up with <span class="text-blue-500">GitHub →</span></a>
            </div>
        </div>
    </div>

@endsection