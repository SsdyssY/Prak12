<?php include('server.php')?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Логин</title>
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
        <div class="form-container">
            <form method="post" action="login.php">
            <h1 class="def">Авторизация</h1>
                Логин: <input type="text" class="input-group" name="login"><br>
                Пароль: <input type="password" class="input-group" name="password"><br>
                <input type="submit" name="login_but" class="but-new but-new2" value="Войти"><br>
                <a class="form-a register-link" href="register.php">Зарегистрироваться</a>
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