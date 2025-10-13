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



    public function store(Request $request)
    {
        DB::insert('INSERT INTO menu_kopi (nama, harga, kategori, tersedia, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)', [
            $request->nama,
            $request->harga,
            $request->kategori,
            $request->tersedia,
            now(),
            now()
        ]);
        return redirect()->route('dbhelper.index');
    }

    public function update(Request $request, $id)
    {
        DB::update('UPDATE menu_kopi SET nama = ?, harga = ?, kategori = ?, tersedia = ?, updated_at = ? WHERE id = ?', [
            $request->nama,
            $request->harga,
            $request->kategori,
            $request->tersedia,
            now(),
            $id
        ]);
        return redirect()->route('dbhelper.edit');
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM menu_kopi WHERE id = ?', [$id]);
        return redirect()->route('dbhelper.index');
    }
}

