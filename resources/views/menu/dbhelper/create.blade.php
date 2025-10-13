<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<h2>Tambah Menu Kopi (DB Helper)</h2>
<form method="POST" action="{{ route('dbhelper.store') }}">
    @csrf
    <label>Nama:</label>
    <input type="text" name="nama" required>

    <label>Kategori:</label>
    <input type="text" name="kategori">

    <label>Harga:</label>
    <input type="number" name="harga" required>

    <label>Tersedia:</label>
    <select name="tersedia">
        <option value="1">Ya</option>
        <option value="0">Tidak</option>
    </select>

    <button type="submit">Tambah Menu</button>
</form>
<a href="{{ url('/menu/dbhelper/manage') }}">🔙 Kembali ke Kelola Menu</a>