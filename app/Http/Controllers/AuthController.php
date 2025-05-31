<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'username' => 'required|string|max:255|unique:users,username',
        'password' => 'required|confirmed|min:6',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Gagal mendaftar. Periksa kembali data Anda.');
    }

    try {
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    } catch (\Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Terjadi kesalahan pada server. Coba lagi nanti.');
    }
}


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
 $validator = Validator::make($request->all(), [
        'username' => 'required',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Gagal mendaftar. Periksa kembali data Anda.');
    }

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {

            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }else {
            return redirect()->back()->with(['error' => 'Invalid credentials.'])->withInput();
        }

    }


    public function logout()
    {
        $user = Auth::user();
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
