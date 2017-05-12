<?php
  $users = array(
    "login;password",
    "admin;123",
    "dima;000",
    "_test;034A",
    "people;444",
  );
  if(isset($_POST["send"])) {
    $user_name = trim($_POST["user-name"]);
    $user_password = trim($_POST["user-password"]);
    if(!empty($user_name) && !empty($user_password)) {
      $result = "";
      for($i = 0; $i < count($users); $i++) {
        $info = explode(';', $users[$i]);
        if($info[0] == $user_name && $info[1] == $user_password) {
          $result = "Добро пожаловать, <strong>" . $info[0] . "!</strong>";
          break;
        }
      }
      if(!empty($result)) {
        echo $result;
      }
      else {
        echo "Ошибка авторизации!";
      }
    }
    else {
      echo "Неверный логин / пароль";
    }
  }
  else {
    echo "Ошибка авторизации!";
  }
?>
