<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Броневик</title>
  </head>
  <body>
    <a href="list.php">list.php</a><br>
    <a href="update.php">update.php</a><br>
    <a href="create.php">create.php</a><br>

    <form action="#" method="POST">
      <input type="number" name="id" placeholder="ID Пользователя"><br>
      <input type="submit" name="submit" value="Удалить">
    </form>

    <form action="#" method="POST">
      <input type="number" name="id" placeholder="ID Пользователя"><br>
      <input type="submit" name="return" value="Перейти">
    </form>
  </body>
</html>
<?php
require_once('db_utils.php');

if (isset($_POST['submit']))
  deleteUser();

if (isset($_POST['return'])) {
    if (!is_numeric(strval($_POST['id'])))
      exit ('Некорректный id');
    teleport();
}
?>
