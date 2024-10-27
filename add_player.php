<?php
// Определение параметров подключения к базе данных
$servername = "MySQL-5.7"; // Название сервера MySQL
$username = "root"; // Имя пользователя базы данных
$password = ""; // Пароль базы данных
$dbname = "football_pl_db"; // Название базы данных

// Подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверка, было ли отправлено изображение
if (isset($_FILES["player_image"]) && $_FILES["player_image"]["error"] === UPLOAD_ERR_OK) {
    // Получение данных из формы
    $name = $_POST['name'];
    $position = $_POST['position'];
    $goals = $_POST['goals'];
    $assists = $_POST['assists'];

    // Определение директории и имени файла
    $target_dir = "pictures/";
    $target_file = basename($_FILES["player_image"]["name"]); // ТОЛЬКО имя файла
    // полный путь для сохранения

    // Разрешённые форматы файлов
    $allowed_types = ['jpg', 'jpeg', 'png'];
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (!in_array($imageFileType, $allowed_types)) {
        echo json_encode(["success" => false, "message" => "Неправильный формат изображения. Допустимы только JPG, JPEG, PNG."]);
        exit;
    }

    // Перемещение загруженного файла в целевую директорию
    if (move_uploaded_file($_FILES["player_image"]["tmp_name"], $target_path)) {
        // Подготовка и выполнение SQL-запроса
        $stmt = $conn->prepare("INSERT INTO players (img, name, position, goals, assists) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiii", $target_file, $name, $position, $goals, $assists);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Игрок успешно добавлен."]);
        } else {
            echo json_encode(["success" => false, "message" => "Ошибка: " . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Ошибка при загрузке изображения."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Изображение не задано или возникла ошибка при загрузке."]);
}

// Закрытие соединения
$conn->close();
?>
