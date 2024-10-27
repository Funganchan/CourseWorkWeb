<?php
$servername = "MySQL-5.7";
$username = "root";
$password = "";
$dbname = "Football_pl_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Не удалось подключиться к базе данных']));
}

$sql = "SELECT * FROM Players_table";
$result = $conn->query($sql);
$players = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $players[] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'position' => $row['position'],
            'goals' => $row['goals'],
            'assists' => $row['assists'],
            'img' => $row['img']
        ];
    }
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($players);
?>
