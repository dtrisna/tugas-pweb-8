<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Menu Kopi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>🔧 Kelola Menu Kopi</h2>
    <a href="{{ url('/menu/dbhelper/create') }}">➕ Tambah Menu</a><br><br>

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
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->kategori ?? '-' }}</td>
                    <td>{{ $item->tersedia ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        <a href="{{ url('/menu/dbhelper/' . $item->id . '/edit') }}">✏️ Edit</a> |
                        <form action="{{ url('/menu/dbhelper/' . $item->id) }}" method="POST" style="display:inline;">
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
        <a href="{{ url('/menu/querybuilder/manage') }}">🔗 Lihat dengan Query Builder</a>
    </div>
</body>
</html>
