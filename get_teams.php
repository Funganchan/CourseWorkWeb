<?php
$servername = "MySQL-5.7";
$username = "root";
$password = "";
$dbname = "football_pl_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Команда FROM Teams_table";
$result = $conn->query($sql);

$teams = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $teams[] = $row["Команда"];
    }
}

echo json_encode($teams);
$conn->close();
?>
