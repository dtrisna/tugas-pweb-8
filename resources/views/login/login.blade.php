
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Kopi Kenongo</title>
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <h1>Login ke Website Kopi Kenongo</h1>

  @if(session('error'))
    <p style="color:red; text-align:center;">{{ session('error') }}</p>
  @endif

  <form method="POST" action="{{ route('login.process') }}">
    @csrf
    <label for="nama">Nama:</label><br>
    <input type="text" name="nama" id="nama" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" required><br><br>

    <label for="nohp">Nomor HP:</label><br>
    <input type="text" name="nohp" id="nohp" required><br><br>

    <button type="submit">Login</button>
  </form>
</body>
</html>
