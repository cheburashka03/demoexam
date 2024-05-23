<?
session_start();

if(empty($_SESSION['auth'])) {
    header("Location: index.php");
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
        <a href="/">Главная</a>
        <a href="/problems.php">Подать заявку</a>
        <a href="/problems_all.php">Все заявки</a>
        <a href="/logout.php">Выход</a>
    </nav>
    <main>
        <h2>Подать заявку</h2>
        <form class="form1" action="" method="POST">
        <table>
        <tr>
            <td>Оборудование</td>
            <td><input type="text" name="oborud"></td>
        </tr>

        <tr>
            <td>Тип неисправности</td>
            <td><input type="text" name="neispravnost"></td>
        </tr>

        <tr>
            <td>Описание проблемы</td>
            <td><textarea name="opisanie"></textarea></td>
        </tr>

        <tr>
            <td>ФИО клиента</td>
            <td><input type="text" name="fio"></td>
        </tr>

        <tr>
            <td></td>
            <td><button>Отправить<button></td>
        </tr>
        </form>
        </table>
    </main>


<?

$link = mysqli_connect('localhost', 'root', '', 'tehno');

if(!empty($_POST['oborud']) && !empty($_POST['neispravnost'])  && !empty($_POST['neispravnost'])  && !empty($_POST['opisanie'])  && !empty($fio = $_POST['fio'])) {
    
    $oborud = $_POST['oborud'];
    $neispravnost = $_POST['neispravnost'];
    $opisanie = $_POST['opisanie'];
    $fio = $_POST['fio'];

    $result = mysqli_query($link, "INSERT INTO problems(oborud, neispravnost, opisanie, fio) VALUES ('$oborud', '$neispravnost', '$opisanie', '$fio')");

    if($result == 'true') {
        header("Location: problems_all.php");
    }else{
        echo 'Информация не добавлена';
    }
}
?>



</body>
</html>