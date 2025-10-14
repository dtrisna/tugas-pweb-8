<h2>Daftar Transaksi</h2>

<table>
    <thead>
        <tr>
            <th>Menu</th>
            <th>Nama Pemesan</th>
            <th>No HP</th>
            <th>Tanggal</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksi as $trx)
        <tr>
            <td>{{ $trx->menu->nama }}</td>
            <td>{{ $trx->nama_pemesan }}</td>
            <td>{{ $trx->nohp_pemesan }}</td>
            <td>{{ $trx->tanggal_pesan }}</td>
            <td>{{ $trx->waktu_pesan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
