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

$sql = "DELETE FROM Teams_table WHERE Команда = '$team'";

if ($conn->query($sql) === TRUE) {
    echo "Команда успешно удалена";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
