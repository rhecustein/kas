<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class AuthenticationController extends Controller
{

    public function admin():View
    {
        return view('authentication.login');
    }
    /**
     * Show the login form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showLoginForm(): View
    {
        return view('authentication.student.login');
    }

    /**
     * Authenticate user from login page with credentials.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $fields = ['password'];
        if (request()->has('username')) {
            $fields[] = 'username';
        } elseif (request()->has('email')) {
            $fields[] = 'email';
        }

        if (auth()->attempt($request->only($fields))) {
            $request->session()->regenerate();
            $role_admin = Role::where('name','admin')->get()->first()->id;
            $user_role = Auth::user()->role_id;
            if($user_role != $role_admin) return redirect()->route('cash-transactions.report.index');
            return redirect()->intended('dashboard');
        }

        return redirect()->route('login')->with('error', 'Username atau password salah!');
    }

    /**
     * Logout the user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout dari aplikasi!');
    }
}
