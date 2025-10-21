<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuDBHelperController extends Controller
{
    public function index()
    {
        $menu = DB::select('SELECT * FROM menu_kopi');
        return view('menu.dbhelper.index', compact('menu'));
    }

    public function create()
    {
        return view('menu.dbhelper.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:100',
            'harga' => 'required|integer|min:0',
            'kategori' => 'nullable|string|max:50',
            'tersedia' => 'required|boolean',
        ]);

        DB::insert('INSERT INTO menu_kopi (nama, harga, kategori, tersedia, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)', [
            $request->nama,
            $request->harga,
            $request->kategori,
            $request->tersedia,
            now(),
            now()
        ]);

        return redirect()->route('dbhelper.manage')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $menu = DB::selectOne('SELECT * FROM menu_kopi WHERE id = ?', [$id]);
        return view('menu.dbhelper.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'harga' => 'required|integer|min:0',
            'kategori' => 'nullable|string|max:50',
            'tersedia' => 'required|boolean',
        ]);

        DB::update('UPDATE menu_kopi SET nama = ?, harga = ?, kategori = ?, tersedia = ?, updated_at = ? WHERE id = ?', [
            $request->nama,
            $request->harga,
            $request->kategori,
            $request->tersedia,
            now(),
            $id
        ]);

        return redirect()->route('dbhelper.manage')->with('success', 'Menu berhasil ditambahkan!');

    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM menu_kopi WHERE id = ?', [$id]);
        return redirect()->route('dbhelper.manage')->with('success', 'Menu berhasil dihapus!');
    }

    public function manage()
    {
        $menu = DB::select('SELECT * FROM menu_kopi');
        return view('menu.dbhelper.manage', compact('menu'));
    }


}
