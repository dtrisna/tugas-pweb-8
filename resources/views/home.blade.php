<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard CRUD</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>Selamat Datang di Dashboard CRUD Menu Kopi</h2>
    <p>Pilih metode yang ingin kamu gunakan:</p>

    <div style="margin-top: 20px;">
        <a href="{{ url('/menu') }}">🔗 Lihat dengan ORM</a><br><br>
        <a href="{{ url('/menu/querybuilder/manage') }}">🔗 Lihat dengan Query Builder</a><br><br>
        <a href="{{ url('/menu/dbhelper/manage') }}">🔗 Lihat dengan DB Helper</a><br><br>
        <a href="{{ route('transaksi.index') }}">🔗 Lihat Daftar Pemesanan</a><br><br>


    </div>
</body>
</html>
