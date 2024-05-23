<?php
session_start();

$link = mysqli_connect('localhost', 'root', '', 'tehno');
$counter = mysqli_query($link, "SELECT COUNT(*) as count FROM problems WHERE status = 'выполнено'");

$res = mysqli_fetch_assoc($counter);
$count = $res['count'];

$avg_time_query = mysqli_query($link, "SELECT AVG(TIMESTAMPDIFF(SECOND, date_start, date_end)) AS avg_time FROM problems WHERE status = 'выполнено'");

$res = mysqli_fetch_assoc($avg_time_query);
$avg_time_seconds = $res['avg_time'];

// Преобразуем среднее время выполнения из секунд в дни, часы, минуты и секунды
$avg_days = floor($avg_time_seconds / (60 * 60 * 24));
$avg_hours = floor(($avg_time_seconds - ($avg_days * 60 * 60 * 24)) / (60 * 60));
$avg_minutes = floor(($avg_time_seconds - ($avg_days * 60 * 60 * 24) - ($avg_hours * 60 * 60)) / 60);
$avg_seconds = $avg_time_seconds % 60;

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
        <h2>Панель администратора</h2>
        <p>Количество выполненных заявок: <? echo $count ?></p>
        <p>Среднее время выполнения заявки: <? echo "$avg_days дней, $avg_hours часов, $avg_minutes минут, $avg_seconds секунд"; ?></p>
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
            <th>Дата завершения</th>
            <th>Оборудование</th>
            <th>Тип неисправности</th>
            <th>Описание проблемы</th>
            <th>ФИО клиента</th>
            <th>Статус заявки</th>
            <th>Исполнитель</th>
        </tr>

    <?php
$link = mysqli_connect('localhost', 'root', '', 'tehno');

if (!empty($_POST['fio'])) {
    $search = mysqli_query($link, ("SELECT * FROM problems WHERE fio = '{$_POST['fio']}'"));
    while ($res = mysqli_fetch_assoc($search)) {
        echo "<tr>
        <td>$res[id]</td>
        <td>$res[date_start]</td>
        <td>$res[date_end]</td>
        <td>$res[oborud]</td>
        <td>$res[neispravnost]</td>
        <td>$res[opisanie]</td>
        <td>$res[fio]</td>
        <td>$res[status]</td>
        <td>$res[worker]</td>
        </tr>";
    }
} else {
    $result = mysqli_query($link, ("SELECT * FROM problems ORDER BY id DESC"));
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>$row[id]</td>
        <td>$row[date_start]</td>
        <td>$row[date_end]</td>
        <td>$row[oborud]</td>
        <td>$row[neispravnost]</td>
        <td>$row[opisanie]</td>
        <td>$row[fio]</td>
        <td>$row[status]</td>
        <td>$row[worker]</td>
        </tr>";
    }
}
?>
        </table>
    </main>
</body>
</html>


