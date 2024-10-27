<?php
$servername = "MySQL-5.7";
$username = "root";
$password = "";
$dbname = "Football_pl_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Не удалось подключиться к базе данных']));
}

$id = $_POST['id'];

$sql = "DELETE FROM Players_table WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    $response = ['message' => 'Игрок удален успешно'];
} else {
    $response = ['error' => 'Ошибка: ' . $conn->error];
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);
?>
