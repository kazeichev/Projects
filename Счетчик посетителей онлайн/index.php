<?php
  require 'rb.php';
  R::setup( 'mysql:host=localhost;dbname=online',
        'root', '' );

  $ip = $_SERVER['REMOTE_ADDR'];
  $online = R::findOne('onlines', 'ip = ?', array($ip));
  if ($online) {
    $online->lastvisit = time();
    R::store($online);
  } else {
    $online = R::dispense('onlines');
    $online->lastvisit = time();
    $online->ip = $ip;
    R::store($online);
  }
  $online_count = R::count('onlines', 'lastvisit >' . ( time() - 3600))
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <b>Сейчас онлайн: <?php echo $online_count; ?></b>
  </body>
</html>
