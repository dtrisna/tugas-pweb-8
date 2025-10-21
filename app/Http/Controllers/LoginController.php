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
            'nama' => 'required|string',
            'password' => 'required|string',
            'nohp' => 'required|string',
        ]);

        $user = DB::table('users')
            ->where('nama', $request->nama)
            ->where('password', $request->password) // sebaiknya pakai Hash
            ->where('nohp', $request->nohp)
            ->first();

        if ($user) {
            session(['login' => true, 'nama' => $user->nama]);
            return redirect()->route('home');
        }

        return redirect()->route('login.form')->with('error', 'Login gagal! Periksa kembali data Anda.');
    }
}
