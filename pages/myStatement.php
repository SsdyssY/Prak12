<?php 
include('server.php');

if (!isset($_SESSION['login'])) {
    header("location: login.php");
    exit();
}

$login_user = $_SESSION['login'];

// Получение id пользователя
$query = "SELECT id FROM Users WHERE login = '$login_user'";
$result = mysqli_query($db, $query);
$user_data = mysqli_fetch_assoc($result);
$user_id = $user_data['id'];

// Получение всех заявлений пользователя
$query_statements = "SELECT * FROM Statements WHERE user_id = '$user_id'";
$result_statements = mysqli_query($db, $query_statements);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Мои заявления</title>
</head>
<body>
    <header class="header">
        <div class="widthContainer">
            <nav class="menu">
                <ul>
                    <li class="li"><a href="../index.php" >Главная</a></li>
                    <li class="li"><a href="newStatement.php">Оставить заявление</a></li>
                    <li class="li"><a href="myStatement.php">Мои заявления</a></li>
                    <li class="li">
                        <!-- выход из аккаунта -->
                        <a class="li" href="../index.php?logout='1'">Выйти</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="body">
        <div class="statements-container">
        <h1>Мои заявления</h1>
<div class="statements-container">
    <?php
    // Проверяем, есть ли заявления
    if (mysqli_num_rows($result_statements) > 0) {
        // Выводим каждое заявление
        echo "<div class='statement-grid'>";
        while ($row = mysqli_fetch_assoc($result_statements)) {
            echo "<div class='statement-item'>";
            echo "<p><strong>Описание:</strong> " . $row['violation_description'] . "</p>";
            echo "<p><strong>Номер автомобиля:</strong> " . $row['car_number'] . "</p>";
            echo "<p><strong>Статус:</strong> " . $row['status'] . "</p>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "У вас пока нет заявлений.";
    }
    ?>
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
