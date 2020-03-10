<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Epoka</title>
</head>
<body>
<div class="title">EPOKA</div>
    <div class="auth-panel">
    <span class="msg">Veuillez vous connecter</span><br><br>
        <form method="POST" action="/login">
        @csrf
            Login : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="fields" required maxlenght=10 name='login'><br/>
            Password : <input type="password" class="fields" required maxlenght=10 name='passwd'><br/>
            <br><input type="submit" value="Se connecter">
        </form>
    </div>
</body>
</html>