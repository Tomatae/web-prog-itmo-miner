<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Броневик</title>
  </head>
  <body>
    <a href="list.php">list.php</a><br>
    <a href="create.php">create.php</a><br>
    <a href="update.php">update.php</a><br>
    <a href="delete.php">delete.php</a><br>
  </body>
</html>
<?php
  require_once('db_utils.php');
  echo(listDB());
?>
