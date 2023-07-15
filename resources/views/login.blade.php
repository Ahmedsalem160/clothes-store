<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login for User</h1>
    <form action="{{route('user.login')}}" method="post">
        @csrf
        <input type="email" name="email" placeholder="email"/><br/>
        <input type="password" name="password" placeholder="password"/><br/>
        <input type="submit" value="Login">
    </form>
</body>
</html>
