<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegister()
    {
        // return view('auth.register');
    }

    /**
     * Handle user registration.
     */
    public function register(Request $request)
    {
        // $validated = $request->validate([
        //     'name'     => 'required|string|max:255',
        //     'email'    => 'required|email|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);
        // $user = User::create([...$validated, 'password' => Hash::make($validated['password'])]);
        // Auth::login($user);
        // $this->mergeGuestCart($user);
        // return redirect()->intended('/')->with('success', 'Welcome!');
    }

    /**
     * Show the login form.
     */
    public function showLogin()
    {
        // return view('auth.login');
    }

    /**
     * Handle user login.
     */
    public function login(Request $request)
    {
        // $credentials = $request->validate(['email' => 'required|email', 'password' => 'required']);
        // if (!Auth::attempt($credentials, $request->boolean('remember'))) {
        //     return back()->withErrors(['email' => 'Invalid credentials.']);
        // }
        // $request->session()->regenerate();
        // $this->mergeGuestCart(Auth::user());
        // return redirect()->intended('/');
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        // Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        // return redirect('/');
    }

    /**
     * Merge a guest cart into the authenticated user's cart on login/register.
     * Called after successful authentication.
     */
    private function mergeGuestCart(User $user): void
    {
        // TODO: if session has a cart_token, find the guest Cart and reassign or
        // merge its items into the user's Cart, then delete the guest Cart.
    }
}
