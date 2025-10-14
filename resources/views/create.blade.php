<link rel="stylesheet" href="{{ asset('css/style.css') }}">


<h2>Form Pemesanan Kopi</h2>

<form method="POST" action="{{ route('transaksi.store') }}">
    @csrf

    <label>Menu Kopi:</label>
    <select name="menu_id" required>
        @foreach($menu as $item)
            <option value="{{ $item->id }}">{{ $item->nama }} - Rp{{ $item->harga }}</option>
        @endforeach
    </select>

    <label>Nama Pemesan:</label>
    <input type="text" name="nama_pemesan" required>

    <label>No HP:</label>
    <input type="text" name="nohp_pemesan" required>

    <label>Tanggal Pesan:</label>
    <input type="date" name="tanggal_pesan" required>

    <label>Waktu Pesan:</label>
    <input type="time" name="waktu_pesan" required>

    <button type="submit">Pesan</button>
</form>
