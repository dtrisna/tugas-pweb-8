<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Menu Kopi (Query Builder)</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>Form Tambah Menu Kopi (Query Builder)</h2>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('querybuilder.store') }}">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Kategori:</label><br>
        <input type="text" name="kategori"><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" required><br><br>

        <label>Tersedia:</label><br>
        <select name="tersedia">
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </select><br><br>

        <button type="submit">Tambah Menu</button>
    </form>

    <h2>Data Menu Kopi</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Tersedia</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menu as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->tersedia ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        <a href="{{ route('querybuilder.edit', $item->id) }}">✏️ Edit</a>
                        <form action="{{ route('querybuilder.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin hapus?')">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
     <div style="margin-top: 20px;">
        <a href="{{ url('/menu') }}">🔗 Lihat dengan ORM</a> |
        <a href="{{ url('/menu/dbhelper/manage') }}">🔗 Lihat dengan DB Helper</a>
    </div>
</body>
</html>
