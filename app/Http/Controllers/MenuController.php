<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuKopi;


class MenuController extends Controller
{

public function index() {
    $menu = MenuKopi::with('transaksi')->get(); 
    return view('menu.index', compact('menu'));
}


public function store(Request $request)
{

    $request->validate([
        'nama' => 'required|string|max:100',
        'harga' => 'required|integer|min:0',
        'kategori' => 'nullable|string|max:50',
        'tersedia' => 'required|boolean',
    ]);


    MenuKopi::create([
        'nama' => $request->nama,
        'kategori' => $request->kategori,
        'harga' => $request->harga,
        'tersedia' => $request->tersedia,
    ]);


    return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
}

    public function create()
{
    return view('menu.create');
}


    public function show(string $id)
    {
        //
    }


    public function edit($id)
{
    $menu = MenuKopi::findOrFail($id);
    return view('menu.edit', compact('menu'));
}



    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:100',
        'harga' => 'required|integer|min:0',
        'kategori' => 'nullable|string|max:50',
        'tersedia' => 'required|boolean',
    ]);

    $menu = MenuKopi::findOrFail($id);
    $menu->update([
        'nama' => $request->nama,
        'harga' => $request->harga,
        'kategori' => $request->kategori,
        'tersedia' => $request->tersedia,
    ]);

    return redirect()->route('menu.index')->with('success', 'Menu berhasil diupdate!');
}



    public function destroy($id)
{
    $menu = MenuKopi::findOrFail($id);
    $menu->delete();

    return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
}

}
