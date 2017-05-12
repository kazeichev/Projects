<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Welcome!</title>
</head>
<body>
  <script type="text/javascript">
  function show(state){
    document.getElementById('window').style.display = state;
    document.getElementById('wrap').style.display = state;
  }
  </script>
  <div id="window" style="display: none">
    <form action="" method="post">
      <input type="text" name="ip" value="
      <?php
      if(isset($_SERVER['REMOTE_ADDR'])) {
        echo trim($_SERVER['REMOTE_ADDR']);
      }
      ?>" id="yourIP">
    </form>
  </div>
  <button type="button" id="btn" name="button" onclick="show('block')">Узнай свой IP!</button>

</body>
</html>
