<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuKopi;


class MenuController extends Controller
{

public function index() {
    $menu = MenuKopi::with('transaksi')->get(); // ambil menu beserta transaksi
    return view('menu.index', compact('menu'));
}


public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:100',
        'harga' => 'required|integer|min:0',
        'kategori' => 'nullable|string|max:50',
        'tersedia' => 'required|boolean',
    ]);

    // Insert data ke database
    MenuKopi::create([
        'nama' => $request->nama,
        'harga' => $request->harga,
        'kategori' => $request->kategori,
        'tersedia' => $request->tersedia,
    ]);

    // Redirect atau response
    return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
}

    public function create()
{
    return view('menu.create');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $menu = MenuKopi::findOrFail($id);
    return view('menu.edit', compact('menu'));
}


    /**
     * Update the specified resource in storage.
     */
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $menu = MenuKopi::findOrFail($id);
    $menu->delete();

    return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
}

}
