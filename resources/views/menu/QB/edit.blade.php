<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Menu Kopi (Query Builder)</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>Edit Menu Kopi</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('querybuilder.update', $menu->id) }}">
        @csrf
        @method('PUT')

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $menu->nama }}" required><br><br>

        <label>Kategori:</label><br>
        <input type="text" name="kategori" value="{{ $menu->kategori }}"><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="{{ $menu->harga }}" required><br><br>

        <label>Tersedia:</label><br>
        <select name="tersedia">
            <option value="1" {{ $menu->tersedia ? 'selected' : '' }}>Ya</option>
            <option value="0" {{ !$menu->tersedia ? 'selected' : '' }}>Tidak</option>
        </select><br><br>

        <button type="submit">Update Menu</button>
    </form>

    <br>
    <a href="{{ route('querybuilder.manage') }}">⬅️ Kembali ke Kelola Menu</a>
</body>
</html>
