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

  <form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="text" name="nohp" placeholder="Nomor HP" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
</body>
</html>
