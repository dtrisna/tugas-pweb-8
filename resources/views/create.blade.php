<h2>Tambah Menu Kopi</h2>

<form method="POST" action="{{ route('menu.store') }}">
    @csrf
    <label>Nama Kopi:</label>
    <input type="text" name="nama" required>

    <label>Harga:</label>
    <input type="number" name="harga" required>

    <button type="submit">Simpan</button>
</form>
