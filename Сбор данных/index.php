<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Проверь свои данные</title>
  </head>
  <body>
    <a href="show_info.php">Посмотреть данные</a>
    <a href="?clear">Очистить</a>

    <form method="post">
      <label>Имя: <input type="text" name="name"/></label>
      <label>E-mail: <input type="text" name="email"/></label>
      <input type="submit" name="send-info" value="Записать!">
        <?php
          if (isset($_SERVER['HTTP_REFERER'])) {
            $print = $_SERVER['HTTP_REFERER'];
          }
        ?>
      <div>
        <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>">
        <input type="hidden" name="http-referer" value="<?php echo $print ?>">
        <input type="hidden" name="http-user-agent" value="<?php echo $_SERVER['HTTP_USER_AGENT'] ?>">
      </div>
    </form>

    <?php
      if (isset($_POST['send-info'])) {
          $name = $_POST['name'];
          // Паттерн для проверки корректности email
          $pattern_email = '/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u';
            if (preg_match($pattern_email, $_POST['email'])) {
              $email = $_POST['email'];
            }
            else {
              echo "Введите корректный e-mail!";
            }
          $ip = $_POST['ip'];
          $http_referer = $_POST['http-referer'];
          $http_user_agent = $_POST['http-user-agent'];
          echo "Ваши данные были записаны!";
        }
        $message = $name . "\r\n";
        $message .= $email . "\r\n";
        $message .= $ip . "\r\n";
        $message .= $http_referer . "\r\n";
        $message .= $http_user_agent . "\r\n";

        //Записываем данные в фаил .txt
        $file = fopen("info.txt", "a");
        fwrite($file, $message);
        fclose($file);
        if (isset($_GET['clear'])) {
          file_put_contents('info.txt', "");
        }
    ?>

  </body>
</html>
