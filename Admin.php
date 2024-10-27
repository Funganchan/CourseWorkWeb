<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dolce Vittoria</title>
    <link rel="shortcut icon" href="pictures/logo.png" type="image/x-icon">
    <style type="text/css">@import url("Style.css");</style>

  <ul text-align= center>
      <li><a href="Main.html">Главная</a></li>
      <li><a href='#'>Команда</a>
          <ul>
              <li><a href="Table.html">Таблица</a></li>
              <li><a href="Team.html">Состав</a></li>
              <li><a href="#">Достижения</a></li>
          </ul>
      </li>  
      <li><a href="News.html">Новости</a></li>
      <li><a href="#">Контакты</a></li>
      
    </ul>
  <br><br>
  </head>

<?php
$des = mysqli_connect("MySQL-5.7", "root", "", "football_pl_db");
if($des === false) {
  die("Error: Could not connect. " . mysqli_connect_error());
}
mysqli_set_charset($des, "utf8");
$rez = mysqli_query($des, "SELECT Команда, Игры, Победы, Ничьи, Поражения, Очки FROM Teams_table");

if ($rez) {
  echo "<table border='1'>";
  echo "<tr>
  			<th>Команда</th>
  			<th>Игры</th>
  			<th>Победы</th>
  			<th>Ничьи</th>
  			<th>Поражения</th>
  			<th>Очки</th>
  		</tr>";
  while ($row = mysqli_fetch_array($rez)) {
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
  die('Error: ' . mysqli_error($des));
}
?>

