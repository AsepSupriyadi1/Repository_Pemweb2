<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
  public function register()
  {
    return view('public.register');
  }

  public function registerPost(Request $request)
  {
    Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:8|same:password_confirmation',
      'password_confirmation' => 'required|string|min:8',
    ])->validate();

    $existingUser = User::where('email', $request->email)->first();
    if ($existingUser) {
      return redirect()->back()->withErrors(['email' => 'Email already exists.']);
    }

    User::create([
      'name' => $request->name . " " . $request->last_name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
    ]);

    return redirect()->route('public.login');
  }

  public function login()
  {
    return view('public.login');
  }

  public function loginPost(Request $request)
  {
    $request->validate([
      'email' => 'required|email|max:255',
      'password' => 'required|string|min:8',
    ]);

    if (auth()->attempt($request->only('email', 'password'))) {
      return redirect()->route('dashboard');
    }

    if (!User::where('email', $request->email)->exists()) {
      return redirect()->back()->with('error', 'Account not found.');
    }

    return redirect()->back()->with('error', 'Invalid email or password.');
  }


  public function logout(Request $request)
  {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
  }

}
