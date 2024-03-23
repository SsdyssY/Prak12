<?php
session_start();
$login = "";

// Подключение к базе данных
$db = mysqli_connect('11prak', 'root', '', 'Net');
// Обработка данных при отправке формы
// выход из аккаунта
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['login']);
    header("location: ../index.php");
}
// регистрация
if (isset($_POST['register_but'])) {
    
    // Получение данных из формы
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $patronymic = $_POST["patronymic"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Проверка на пустоту полей
    if (isset($_POST['register_but']) & empty($name) || empty($surname) || empty($patronymic) || empty($tel) || empty($email) || empty($login) || empty($password)) {
        echo"Все поля должны быть заполнены";
    } else {
    // Простейший запрос для вставки данных
    $sql = "INSERT INTO Users (name, surname, patronymic, tel, email, login, password) VALUES ('$name', '$surname', '$patronymic', '$tel', '$email', '$login', '$password')";


    mysqli_query($db, $sql);
    header("location: login.php");
    }
}

// Обработка данных при отправке формы
if (isset($_POST['login_but']))  {
    // Получение данных из формы
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Простейший запрос для проверки данных
    $sql = "SELECT * FROM Users WHERE login='$login' AND password='$password'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Вход успешен, установка сессии
        $_SESSION['login'] = $login;
        header('Location: ../index.php'); // Переадресация на страницу приветствия
    } else {
        // Ошибка входа
        echo"Неверный логин или пароль";
    }
}

// заявление новое

// Обработка данных при отправке формы
if (isset($_POST['submit_statement'])) {
    // Получение данных из формы
    $car_number = $_POST["car_number"];
    $violation_description = $_POST["violation_description"];
    $login_user = $_SESSION['login'];
    // Запрос к базе данных для получения id пользователя по логину
    $query = "SELECT id FROM Users WHERE login = '$login_user'";
    $result = mysqli_query($db, $query);
    // Получение результата запроса в виде ассоциативного массива
    $user_data = mysqli_fetch_assoc($result);
    // Получение id пользователя
    $user_id = $user_data['id'];
    
    // Проверка на заполненность полей
    if (empty($_POST["car_number"]) || empty($_POST["violation_description"])) {
        echo "Пожалуйста, заполните все поля";
    } else {
        //  запрос для вставки данных
        $sql = "INSERT INTO Statements (user_id, car_number, violation_description, status) VALUES ('$user_id', '$car_number', '$violation_description', 'новое')";
        if (mysqli_query($db, $sql)) {
            echo "Заявление успешно отправлено!";
            // После успешной обработки формы перенаправляем пользователя на другую страницу
            header('Location: myStatement.php');

        }
    }
}
?>