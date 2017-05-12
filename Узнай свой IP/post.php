<?php
  if((($_SERVER ['REQUEST_METHOD']=='POST'))&&($_POST['submit'] == 'Узнай свой IP!')) {
    $gameName = $_SERVER['REMOTE_ADDR'];
  }
?>
