<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<h2>Edit Menu Kopi</h2>

<form method="POST" action="{{ route('dbhelper.update', $menu->id) }}">
    @csrf
    @method('PUT')

    <label>Nama:</label>
    <input type="text" name="nama" value="{{ $menu->nama }}" required>

    <label>Kategori:</label>
    <input type="text" name="kategori" value="{{ $menu->kategori }}">

    <label>Harga:</label>
    <input type="number" name="harga" value="{{ $menu->harga }}" required>

    <label>Tersedia:</label>
    <select name="tersedia">
        <option value="1" {{ $menu->tersedia ? 'selected' : '' }}>Ya</option>
        <option value="0" {{ !$menu->tersedia ? 'selected' : '' }}>Tidak</option>
    </select>

    <button type="submit">Update Menu</button>
</form>
