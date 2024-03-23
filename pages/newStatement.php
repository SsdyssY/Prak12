<?php include('server.php');
if (!isset($_SESSION['login'])) {
    header("location: login.php");
}

 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/state.css">
    <title>Нарушениям.Нет</title>
</head>
<body>
    <header class="header">
        <div class="widthContainer">
            <nav class="menu">
                <ul>
                    <li class="li" ><a href="../index.php" >Главная</a></li>
                    <li class="li"><a href="newStatement.php">Оставить заявление</a></li>
                    <li class="li"><a href="myStatement.php">Мои заявления</a></li>
                    <li class="li">
                        <!-- выход из акаунта -->
                        <a href="../index.php?logout='1'">
                        <a class="li" href="../index.php?logout='1'">Выйти</a>
                        </a> 
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="body">
        <div class="form-container">
            <h1>Оставить заявление</h1>
            <form method="post" action="newStatement.php">
                Номер автомобиля: <input type="text" class="input-group " name="car_number" required><br>
                Описание нарушения: <textarea class="input-group textarea" name="violation_description" required></textarea><br>
                <input type="submit" class="but-new but-new2" name="submit_statement" value="Отправить заявление">
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