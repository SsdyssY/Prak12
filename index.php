<?php 
include('pages/server.php');
if (!isset($_SESSION['login'])) {
    header("location: pages/login.php");
} else {
    $sql = "SELECT admin FROM Users WHERE login='{$_SESSION['login']}'";
    $result = mysqli_query($db, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row['admin'] == 1) {
            header("location: pages/adminStatement.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Нарушениям.Нет</title>
</head>
<body>
    <header class="header">
        <div class="widthContainer">
            <nav class="menu">
                <ul>
                    <li class="li" ><a href="index.php" >Главная</a></li>
                    <li class="li"><a href="pages/newStatement.php">Оставить заявление</a></li>
                    <li class="li"><a href="pages/myStatement.php">Мои заявления</a></li>
                    <li class="li">

                        <a href="../index.php?logout='1'">
                        <a class="li" href="../index.php?logout='1'">Выйти</a>
                        </a> 
                    </li>
                </ul>
            </nav>
        </div>
    </header>
  
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <p>Здравствуйте <?php echo $_SESSION['login']; ?></p>
                <h2>О нашем портале</h2>
                <p>Портал сознательных граждан "Нарушениям.Нет" создан для тех, кто стремится к безопасности на дорогах и поддерживает порядок в обществе. Мы предоставляем вам возможность активно участвовать в фиксации нарушений правил дорожного движения и оказывать поддержку полиции в поддержании общественной безопасности.</p>
                <p>С вашей помощью мы стремимся сделать дороги более безопасными и ответственными для всех участников движения.</p>
            </div>
        </div>
    </div>
    <div class="banner-container">
    <img src="style/download.png" alt="Баннер">
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Наши услуги</h2>
            <p>Мы предоставляем широкий спектр услуг для улучшения безопасности на дорогах, включая:</p>
            <ul>
                <li>Фиксацию нарушений с помощью мобильного приложения</li>
                <li>Обратную связь с полицией и другими участниками</li>
                <li>Статистику нарушений и их решения</li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Как начать использовать</h2>
            <p>Просто зарегистрируйтесь на нашем портале и начните фиксировать нарушения. Вы сможете отслеживать их статус и вносить свой вклад в поддержание безопасности на дорогах.</p>
            <p><a class="form-a register-link" href="register.php">Зарегистрироваться</a></p>
        </div>
    </div>
</div>
    <footer class="footer">
        <div class="widthContainer">
            <div class="footer-logo">
            </div>
          
            <p>Сайт защищен &copy; Нарушениям.Нет</p>
        </div>    
    </footer>
</body>
</html>