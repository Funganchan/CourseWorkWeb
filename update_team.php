<?php
$servername = "MySQL-5.7";
$username = "root";
$password = "";
$dbname = "football_pl_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$team = $_POST['Команда'];
$games = $_POST['Игры'];
$wins = $_POST['Победы'];
$draws = $_POST['Ничьи'];
$losses = $_POST['Поражения'];
$points = $_POST['Очки'];

$sql = "UPDATE Teams_table SET Игры='$games', Победы='$wins', Ничьи='$draws', Поражения='$losses', Очки='$points' WHERE Команда='$team'";

if ($conn->query($sql) === TRUE) {
    echo "Данные команды успешно обновлены";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
