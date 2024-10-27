<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dolce Vittoria</title>
  <link rel="shortcut icon" href="pictures/logo.png" type="image/x-icon">
  <!-- Импорт стилей -->
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

    .container {
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
    <br><br>
    <p><h2><big><big><big><big>Турнирная таблица</big></big></big></big></h2></p>
    <p><h2>Urban-Cup Дивизион Чертаново</h2></p>
    
    <!-- Таблица -->
    <table>
       
    <?php
      $servername = "MySQL-5.7";
      $username = "root";
      $password = "";
      $dbname = "football_pl_db";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT Команда, Игры, Победы, Ничьи, Поражения, Очки FROM Teams_table";

      if(isset($_GET['sort'])){
       $sort = $_GET['sort'];

       switch($sort){
          case 21:
            $sql = "SELECT * FROM `Teams_table` ORDER BY `Teams_table`.`Очки` ASC";
            break;
          case 22:     
            $sql = "SELECT * FROM `Teams_table` ORDER BY `Teams_table`.`Очки` DESC";
            break;
       }
      }

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
       echo "<table>";
       echo "<tr>";
       echo "<td>Команда</td>";
       echo "<td>Игры</td>";
       echo "<td>Победы</td>";
       echo "<td>Ничьи</td>";
       echo "<td>Поражения</td>";
       echo "<td><div style='position: relative;'>Очки<div style='position: absolute; left: 100%; margin-left: -32.5px; top: 50%; transform: translateY(-50%);'>
            <a href='Table.php?sort=21' '>   &#9650;</a>
            <a href='Table.php?sort=22' >   &#9660;</a>
        </div></div></td>";
       echo "</tr>";
        
       while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['Команда'] . "</td>";
          echo "<td>" . $row['Игры'] . "</td>";
          echo "<td>" . $row['Победы'] . "</td>";
          echo "<td>" . $row['Ничьи'] . "</td>";
          echo "<td>" . $row['Поражения'] . "</td>";
          echo "<td>" . $row['Очки'] . "</td>";
          echo "</tr>";
       }
        
       echo "</table>";
      } else {
       echo "0 results";
      }

      $conn->close();
      ?>

<!-- Авторизация -->
    <?php
      session_start();

      if(isset($_POST['password'])) {
          $password = $_POST['password'];

          if($password == "Dolce") {
              $_SESSION['password'] = $password;
              header("Location: Admin_1.php");
          } else {
              echo "Неправильный пароль!";
          }
      }
    ?>

    <div class="container">
    <form method="post">
        <label for="password">Авторизация администратора:</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Войти" class="btn">
    </form>
</div>


  </body>
</html>
