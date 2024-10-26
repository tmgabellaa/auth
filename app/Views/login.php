
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="/app1/public/style.css">
</head>
<body>
<div class="container">
    <h2>Вход</h2>
    <form action="/app1/public/login" method="POST">
        <label>
            <input type="email" name="email" placeholder="Email" required>
        </label>
        <label>
            <input type="password" name="password" placeholder="Пароль" required>
        </label>
        <button type="submit">Войти</button>
    </form>
    <p>Нет аккаунта? <a href="register.php">Регистрация</a></p>
</div>
</body>
</html>

