<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dolce Vittoria</title>
    <link rel="shortcut icon" href="pictures/logo.png" type="image/x-icon">
    <style type="text/css">@import url("Style.css");
      h2 {
        font-family: Times New Roman, sans-serif;
        color: white;
        text-align: center;
        padding: 5px;
        
      }

    body {
        font-family: Arial, sans-serif;
        background-color: hsl(256, 100%, 5%);
    }
      .autorise {
        width: 300px;
        padding: 16px;
        background-color: white;
        margin-right: 20px;
        margin-top: 100px;
        border: 1px solid black;
        border-radius: 4px;
    }

    input[type=text], input[type=password] {
        width: 90%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    .btn {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .btn:hover {
        opacity:1;
    }
    </style>
 
  <!-- Горизонтальное меню -->
  <ul text-align= center>
      <li><a href="Main.html">Главная</a></li>
      <li><a href='#'>Команда</a>
          <ul>
              <li><a href="Table.php">Таблица</a></li>
              <li><a href="Team.php">Состав</a></li>
          </ul>
      </li>  
      <li><a href="News.html">Новости</a></li>
      <li><a href="#">Контакты</a>
        <ul>
            <li><a href="https://t.me/fcdolcevittoria">Telegram</a></li>
            <li><a href="http://www.youtube.com/@dolcevittoriateam">YouTube</a></li>
            <li><a href="https://vk.com/dolcevittoriateam">VKontakte</a></li>
        </ul>
      </li>
    </ul>
  <br><br>
  </head>
  <body>
    <p align="center"><img src="pictures/2324/1.jpg" width="960" height="603" align="center" position="center" alt="Командное фото"></p>
    <h1>Состав команды</h1>
    <!-- Карточки игроков -->
    <?php
session_start(); // Начинаем сессию в самом начале

$servername = "MySQL-5.7";
$username = "root";
$password = "";
$dbname = "Football_pl_db";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Подключение не удалось: " . $conn->connect_error);
}

// Аутентификация администратора
if (isset($_POST['password'])) {
    $password = $_POST['password'];

    if ($password == "Dolce") {
        $_SESSION['password'] = $password;
        header("Location: Admin_2.php");
        exit(); // Завершаем выполнение скрипта
    } else {
        echo "Неправильный пароль!";
    }
}
?>

<html>
<head>
    <title>Команда</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Предполагаемый CSS файл -->
</head>
<body>
    <div class="container">
        <div class="team">
            <?php
            $sql = "SELECT * FROM Players_table";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // выводим данные каждого игрока
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='player'>";
                    echo "<img src='pictures/" . htmlspecialchars($row['img']) . "' alt='" . htmlspecialchars($row['alt']) . "'>";
                    echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                    echo "<p>Позиция: " . htmlspecialchars($row['position']) . "</p>";
                    echo "<p>Голы: " . htmlspecialchars($row['goals']) . "</p>";
                    echo "<p>Передачи: " . htmlspecialchars($row['assists']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "0 результатов";
            }

            // Закрываем соединение с базой данных
            $conn->close();
            ?>
        </div>
    </div>

    <div class="autorise">
        <form method="post">
            <label for="password">Авторизация администратора:</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Войти" class="btn">
        </form>
    </div>

</body>
</html>
