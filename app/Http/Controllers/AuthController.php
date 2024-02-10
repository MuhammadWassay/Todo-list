<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'email_verified_at' => null,
    ]);

    event(new Registered($user)); // Fire registered event for email verification

    Session::flash('success', 'User registered successfully');

    // Redirect the user to the login page
    return redirect()->route('login')->with('success', 'User registered successfully');
}

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'verification_code' => 'required|numeric',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        if ($user->verification_code != $request->verification_code) {
            return response()->json(['error' => 'Invalid verification code'], 422);
        }

        $user->email_verified_at = now();
        $user->save();

        return response()->json(['message' => 'Email verified successfully']);
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/todos');
        }

        return redirect('/login')->with('error', 'Invalid credentials');
    }

    public function logout(Request $request)
{
    Auth::logout(); // Logs the user out

    // Optionally, you can revoke the user's token if you are using token-based authentication
    // $request->user()->token()->revoke();

    // Redirect the user to the login page after logout
    return redirect()->route('login')->with('success', 'Successfully logged out');
}
}
