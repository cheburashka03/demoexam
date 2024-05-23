<?
session_start();
if(empty($_SESSION['auth'])) {
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
        <a href="index.php">Главная</a>
        <a href="insert_worker.php">Добавить исполнителя </a>
        <a href="update.php">Изменить статус заявки</a>
        <a href="update_problem.php">Изменить описание проблемы</a>
        <a href="/logout.php">Выход</a>
    </nav>
    <main>
        <h2>Изменить описание проблемы</h2>
            <form class="form1"action=""method="POST">
            <table>
                <tr>
                    <td>Номер заявки</td>
                    <td><input type="text" name="id"></td>
                </tr>
                <tr>
                    <td>Сменить описание</td>
                <td><textarea name="opisanie"></textarea></td>

                </tr>
                <tr>
                    <td></td>
                    <td><button>Изменить</button></td>
                    </tr>
            </form>

<?
$link = mysqli_connect('localhost', 'root', '', 'tehno');

if(!empty($_POST['id']) && !empty($_POST['opisanie'])) {
    
    $id = $_POST['id'];
    $opisanie = $_POST['opisanie'];

    $result = mysqli_query($link, "UPDATE problems SET opisanie = '$opisanie' WHERE id = '$id'");

    if($result == 'true') {
        header("Location: index.php");
    }else{
        echo 'Ошибка';
    }
}
?>


            </table>
    </main>
</body>
</html>