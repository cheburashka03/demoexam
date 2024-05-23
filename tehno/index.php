<?
session_start();

$link = mysqli_connect('localhost', 'root', '', 'tehno');

if(!empty($_POST['login']) && !empty($_POST['password'])){
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $result = mysqli_query($link, "SELECT * FROM users WHERE login = '$login' AND password = '$password'");
    $user = mysqli_fetch_assoc($result);

    if(!empty($user)) {
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $user['login'];
        $_SESSION['status'] = $user['status'];
        if($_SESSION['status'] == '0'){
            header("Location: problems.php");
        }
        elseif($_SESSION['status'] == '1'){
            header("Location: admpanel/index.php");
    }else{
        echo 'Неверный логин и пароль';
    }
}
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Техносервис</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>ООО Техносервис</h1>
    </header>
    <nav>
        <a href="/index.php">Главная</a>
        <a href="/problems.php">Подать заявку</a>
        <a href="/problems_all.php">Все заявки</a>
    </nav>
    <main>
        <h2>Авторизация</h2>
        <form method="POST">
            <label> Логин </label>
                <input type="text" name="login">
            <label> Пароль </label>
            <input type="password" name="password">
            <button>Войти</button>
        </form>
    </main>
</body>
</html>