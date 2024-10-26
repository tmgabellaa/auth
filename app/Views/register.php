
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="/app1/public/style.css">
</head>
<body>
<div class="container">
    <h2>Регистрация</h2>
    <form action="/app1/public/register" method="POST">
        <label>
            <input type="text" name="name" placeholder="Имя" required>
        </label>
        <label>
            <input type="email" name="email" placeholder="Email" required>
        </label>
        <label>
            <input type="password" name="password" placeholder="Пароль" required>
        </label>
        <label>
            <input type="password" name="confirm_password" placeholder="Подтверждение пароля" required>
        </label>
        <button type="submit" name="add">Зарегистрироваться</button>
    </form>
    <p>Уже есть аккаунт? <a href="#">Войти</a></p>
</div>
</body>
</html>


