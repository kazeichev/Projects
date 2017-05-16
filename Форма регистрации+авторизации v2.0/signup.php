<?php
  //Подключаем RedBean
  require 'db.php';

  $data = $_POST;
  if (isset($data['do_signup'])) {
    $errors = array();
    if (trim($data['login']) == "") {
      $errors[] = "Введите логин!";
    }
    if (trim($data['email']) == "") {
      $errors[] = "Введите email!";
    }
    if ($data['password'] == "") {
      $errors[] = "Введите пароль!";
    }
    if ($data['password'] != $data['password_2']) {
      $errors[] = "Повторный пароль неверный!";
    }
    //Проверка на наличие такого логина или мыла в базе
    if (R::count('users', "email = ?", array($data['email'])) > 0) {
      $errors[] = "Пользователь с таким e-mail уже существует!";
    }
    if (R::count('users', "login = ?", array($data['login'])) > 0) {
      $errors[] = "Пользователь с таким логином уже существует!";
    }
    if (empty($errors)) {
      //Отправляем полученные данные в бд
      $user = R::dispense('users');
      $user->login = $data['login'];
      $user->email = $data['email'];
      //Создаем шифрование пароля
      $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
      R::store($user);
      echo '<div style="color: green">Вы успешно зарегистрированы!</div><hr />';
    } else {
      echo '<div style="color: red">'.array_shift($errors).'</div><hr />';
    }
  }
?>
<!-- Создаем форму регистрации -->
<form action="/signup.php" method="post">
  <p>
    <p><strong>Ваш логин</strong>:</p>
    <input type="text" name="login" value="<?=@$data['login']?>">
  </p>

  <p>
    <p><strong>Ваш E-mail</strong>:</p>
    <input type="email" name="email" value="<?=@$data['email']?>">
  </p>

  <p>
    <p><strong>Ваш пароль</strong>:</p>
    <input type="password" name="password" value="<?=@$data['password']?>">
  </p>

  <p>
    <p><strong>Введите пароль еще раз</strong>:</p>
    <input type="password" name="password_2" value="<?=@$data['password_2']?>">
  </p>

  <p>
    <button type="submit" name="do_signup">Зарегистрироваться</button>
  </p>
</form>
