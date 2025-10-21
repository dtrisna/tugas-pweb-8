<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
            'nohp' => 'required|string',
        ]);

        $user = DB::table('users')
            ->where('name', $request->name)
            ->where('password', $request->password)
            ->where('nohp', $request->nohp)
            ->first();

        if (!$user) {
            return redirect()->route('login.form')->with('error', 'Login gagal! Periksa kembali data Anda.');
        }

        session([
            'login' => true,
            'user_id' => $user->id,
            'name' => $user->name,
        ]);

        return redirect()->route('home');
    }

    public function home()
    {
        if (!session('login')) {
            return redirect()->route('login.form')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('home');
    }

    public function logout()
    {
        session()->forget(['login', 'user_id', 'name']);
        return redirect()->route('login.form');
    }
}
