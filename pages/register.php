<?php include('server.php');
if (isset($_SESSION['login'])) {
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Регистрация</title>
</head>
<body>
    <header class="header">
        <div class="widthContainer">
            <nav class="menu">
                <ul>
                    <li class="li" ><a href="../index.php" >Главная</a></li>
                    <li class="li"><a href="newStatement.php">Оставить заявление</a></li>
                    <li class="li"><a href="myStatement.php">Мои заявления</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="body">
        <div class="form">
            <form method="post" action="register.php">
            <h1>Регистрация
            </h1>
                Фамилия: <input class="input-group" type="text" name="name" required><br>
                Имя: <input class="input-group" type="text" name="surname" required><br>
                Отчество: <input class="input-group" type="text" name="patronymic" required><br>
                Телефон: <input class="input-group" type="text" name="tel" required ><br>
                email: <input class="input-group" type="email" name="email" required><br>
                Логин: <input class="input-group" type="text" name="login" required><br>
                Пароль: <input class="input-group" type="password" name="password" required><br>
                <input type="submit" class="but-new but-new2" name="register_but" value="Зарегистрироваться"><br>
                Уже есть аккаунт?<a class="form-a register-link"href="login.php"> Войти</a>
            </form>
        </div>
    </div>
    <footer class="footer">
        <div class="widthContainer">
            <div class="footer-logo">
                <!-- <img src="../imgs/logo.svg" alt="Логотип"> -->
            </div>
          
            <p>Сайт защищен &copy; Нарушениям.Нет</p>
        </div>    
    </footer>
</body>
</html>