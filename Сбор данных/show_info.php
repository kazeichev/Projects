<!DOCTYPE html>
<html>
  <head>
    <title>Information!</title>
  </head>
  <body>
    <a href="index.php">Главная</a>
    <table border="1px">
      <thead>
        <th>Имя</th>
        <th>E-mail</th>
        <th>IP</th>
        <th>Реферальная страница</th>
        <th>Браузер</th>
      </thead>
      <?php
        $array = file("info.txt");
        for ($i=0; $i < count($array); $i += 5) {
          echo "<tr>";
            echo "<td>".$array[$i]."</td>";
            echo "<td>".$array[$i+1]."</td>";
            echo "<td>".$array[$i+2]."</td>";
            echo "<td>".$array[$i+3]."</td>";
            echo "<td>".$array[$i+4]."</td>";
          echo "</tr>";
        }
      ?>
    </table>
  </body>
</html>
