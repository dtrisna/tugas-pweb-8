<h2>Detail Menu Kopi</h2>

<p><strong>Nama:</strong> {{ $menu->nama }}</p>
<p><strong>Harga:</strong> Rp{{ number_format($menu->harga, 0, ',', '.') }}</p>

<a href="{{ route('menu.index') }}">← Kembali</a>
