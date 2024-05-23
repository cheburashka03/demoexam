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
        <h2>Поиск заявки</h2>
        <form method="POST">
        <label>Введите ФИО клиента</label>
        <input type="text" name="fio">
        <button>Найти</button>
        </form>

        <h2>Все заявки</h2>
        <table>
        <tr>
            <th>Номер заявки</th>
            <th>Дата добавления</th>
            <th>Оборудование</th>
            <th>Тип неисправности</th>
            <th>Описание проблемы</th>
            <th>ФИО клиента</th>
            <th>Статус заявки</th>
        </tr>

    <?php
$link = mysqli_connect('localhost', 'root', '', 'tehno');

if (!empty($_POST['fio'])) {
    $search = mysqli_query($link, ("SELECT * FROM problems WHERE fio = '{$_POST['fio']}'"));
    while ($res = mysqli_fetch_assoc($search)) {
        echo "<tr>
        <td>$res[id]</td>
        <td>$res[date_start]</td>
        <td>$res[oborud]</td>
        <td>$res[neispravnost]</td>
        <td>$res[opisanie]</td>
        <td>$res[fio]</td>
        <td>$res[status]</td>
        </tr>";
    }
} else {
    $result = mysqli_query($link, ("SELECT * FROM problems ORDER BY id DESC"));
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>$row[id]</td>
        <td>$row[date_start]</td>
        <td>$row[oborud]</td>
        <td>$row[neispravnost]</td>
        <td>$row[opisanie]</td>
        <td>$row[fio]</td>
        <td>$row[status]</td>
        </tr>";
    }
}
?>

</table>

</main>

</body>
</html>