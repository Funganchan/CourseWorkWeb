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

if ($games<0){
    $games=0;
}

if ($wins<0){
    $wins=0;
}

if ($draws<0){
    $draws=0;
}

if ($losses<0){
    $losses=0;
}

if ($points<0){
    $points=0;
}

$sql = "INSERT INTO Teams_table (Команда, Игры, Победы, Ничьи, Поражения, Очки) VALUES ('$team', '$games', '$wins', '$draws', '$losses', '$points')";

if ($conn->query($sql) === TRUE) {
    echo "Команда успешно добавлена";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
