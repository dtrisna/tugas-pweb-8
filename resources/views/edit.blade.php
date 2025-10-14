<h2>Edit Menu Kopi</h2>

<form method="POST" action="{{ route('menu.update', $menu->id) }}">
    @csrf
    @method('PUT')

    <label>Nama Kopi:</label>
    <input type="text" name="nama" value="{{ $menu->nama }}" required>

    <label>Harga:</label>
    <input type="number" name="harga" value="{{ $menu->harga }}" required>

    <button type="submit">Update</button>
</form>
