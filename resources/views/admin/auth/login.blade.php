<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
</head>
<body>
    <form action="{{ route('admin.auth') }}" method="post">
        <input type="email" name="password">
        <input type="password" name="password">
        <button type="submit">Login</button>
        <label for="forgot-password">
            Forgot pasword ?
        </label>
    </form>
</body>
</html>