<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spatie | Login</title>
</head>
<body>
    <form action="{{ route('login.attempt')}}" method="POST">
        @csrf
        <input type="text" placeholder="email" name="email">
        <input type="password" placeholder="Password" name="password">
        <button type="submit">Login</button>
    </form>
</body>
</html>