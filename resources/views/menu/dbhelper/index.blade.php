
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <h2>Menu Kopi (DB Helper)</h2>

    Form Tambah Menu
    <form method="POST" action="{{ route('dbhelper.store') }}">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>Harga:</label>
        <input type="number" name="harga" required>

        <label>Kategori:</label>
        <input type="text" name="kategori">

        <label>Tersedia:</label>
        <select name="tersedia">
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </select>

        <button type="submit">Tambah Menu</button>
    </form>

    Tabel Data Menu
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Tersedia</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menu as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->tersedia ? 'Ya' : 'Tidak' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Navigasi ke metode lain -->
    <div style="margin-top: 20px;">
        <a href="{{ url('/menu') }}">🔗 Lihat dengan ORM</a> |
        <a href="{{ url('/menu/querybuilder') }}">🔗 Lihat dengan Query Builder</a>
    </div>
