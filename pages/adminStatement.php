<?php 
include('server.php');
if (!isset($_SESSION['login'])) {
    header("location: login.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['login']);
    header("location: ../index.php");
}

if (isset($_POST['change_status'])) {
    $statement_id = $_POST['statement_id'];
    $new_status = $_POST['new_status'];


    $update_query = "UPDATE Statements SET status = '$new_status' WHERE id = '$statement_id'";
    mysqli_query($db, $update_query);
}

$select_query = "SELECT s.id, u.name, u.surname, s.car_number, s.violation_description, s.status
                 FROM Statements s
                 JOIN Users u ON s.user_id = u.id
                 ORDER BY s.id DESC";
$result = mysqli_query($db, $select_query);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <style>
   .allForm {
    display: flex;
    flex-direction: column;
    border: 3px solid #2176af;
    margin-bottom: 15px;
    padding: 10px;
    box-sizing: border-box; 
}

.topForm {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.admin-statement-item {
    flex: 1;
    min-width: 0;
}

.admin-statement-item p {
    margin: 5px 0;
}

.footForm {
    margin-left: 20px;
    flex-shrink: 0;
    overflow: hidden; 
}

.farm {
    display: flex;
    flex-direction: column;
    align-items: flex-start; 
}

.farm select,
.farm input[type="submit"] {
    margin-top: 5px;
    padding: 8px;
    font-size: 14px;
}

        </style>
    <title>Нарушениям.Нет</title>
</head>
<body>
    <header class="header">
        <div class="widthContainer">
            <nav class="menu">
                <ul>
                    <li class="li">

                       
                        <a class="li" href="../index.php?logout='1'">Выйти</a>
                           
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="body">
        <div class="statements-container">
            <h1>Панель администратора - Заявления</h1>

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="allForm">';
                    echo '<div class="topForm">';
                        echo '<div class="admin-statement-item">';
                        echo '<p><strong>Подавший заявление: </strong>' . $row['name'] . ' ' . $row['surname'] . ' ' . $row['patronymic'] . '</p>';
                        echo '<p><strong>Номер автомобиля: </strong>' . $row['car_number'] . '</p>';
                        echo '<p><strong>Описание нарушения: </strong>' . $row['violation_description'] . '</p>';
                        echo '<p><strong>Статус: </strong>' . $row['status'] . '</p><br>';
                    echo '</div>';
                    echo '<div class="footForm">';
                        echo '<form method="post" class="farm" action="adminStatement.php">';
                        echo '<input type="hidden" name="statement_id" value="' . $row['id'] . '">';
                        echo '<select name="new_status">
                                <option value="новое">Новое</option>
                                <option value="подтверждено">Подтверждено</option>
                                <option value="отклонено">Отклонено</option>
                            </select>';
                        echo '<input type="submit" name="change_status" value="Изменить статус">';
                        echo '</form>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            ?>

        </div>
    </div>
    <footer class="footer">
        <div class="widthContainer">
            <p>Сайт защищен &copy; Нарушениям.Нет</p>
        </div>    
    </footer>
</body>
</html>