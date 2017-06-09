<?php
  // Подключаем ReadBean
  require 'libs/rb.php';
  R::setup( 'mysql:host=127.0.0.1;dbname=my_base',
      'root', '' );
session_start();
?>
