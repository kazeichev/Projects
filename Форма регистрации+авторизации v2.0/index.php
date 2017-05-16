<?php
  require 'db.php';
?>

<?php
  if (isset($_SESSION['logged_user'])) {
    echo '<div style="color: green"><b>Вы авторизованы! Привет: '.$_SESSION['logged_user']->login.'!</b></div><br /><hr />';
    echo '<a href="logout.php">Выйти</a>';
  } else {
    echo '<div style="color: red"><b>Вы не авторизованы!</b></div>';
    echo '<a href="login.php"><b>Авторизация</b></a>';
    echo '<a href="signup.php"><b>Регистрация</b></a>';
  }
?>
