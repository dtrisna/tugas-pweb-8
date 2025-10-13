<?php

namespace App\Http\Controllers\QB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuQueryBuilderController extends Controller
{
    public function index()
    {
        $menu = DB::table('menu_kopi')->get();
        return view('menu.QB.index', compact('menu'));
    }

    public function create()
    {
        return view('menu.QB.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'harga' => 'required|integer|min:0',
            'kategori' => 'nullable|string|max:50',
            'tersedia' => 'required|boolean',
        ]);

        DB::table('menu_kopi')->insert([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'tersedia' => $request->tersedia,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('querybuilder.manage')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $menu = DB::table('menu_kopi')->where('id', $id)->first();
        return view('menu.QB.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'harga' => 'required|integer|min:0',
            'kategori' => 'nullable|string|max:50',
            'tersedia' => 'required|boolean',
        ]);

        DB::table('menu_kopi')->where('id', $id)->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'tersedia' => $request->tersedia,
            'updated_at' => now(),
        ]);

        return redirect()->route('querybuilder.manage')->with('success', 'Menu berhasil diupdate!');
    }

    public function destroy($id)
    {
        DB::table('menu_kopi')->where('id', $id)->delete();
        return redirect()->route('querybuilder.manage')->with('success', 'Menu berhasil dihapus!');
        

    }

    public function manage()
    {
        $menu = DB::table('menu_kopi')->get();
        return view('menu.QB.manage', compact('menu'));
    }

}
