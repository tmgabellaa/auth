
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../../public/style.css">
    <base href="/app1/app/Views">
</head>
<body>
<div class="container">
    <h2>Регистрация</h2>
    <form action="../Controllers/UserControllers.php" method="POST">
        <label>
            <input type="text" name="name" placeholder="Имя" required>
        </label>
        <label>
            <input type="email" name="email" placeholder="Email" required>
        </label>
        <label>
            <input type="text" name="role" placeholder="role" required>
        </label>
        <label>
            <input type="password" name="password" placeholder="Пароль" required>
        </label>
        <label>
            <input type="password" name="confirm_password" placeholder="Подтверждение пароля" required>
        </label>
        <button type="submit" name="add">Зарегистрироваться</button>
    </form>
    <p>Уже есть аккаунт? <a href="/app1/app/Views/login.php">Войти</a></p>
</div>
</body>
</html>


