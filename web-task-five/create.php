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
    <a href="delete.php">delete.php</a><br>

    <form action="#" method="POST">
      <input type="number" name="id" placeholder="ID Пользователя"><br>
      <input type="text" name="name" placeholder="Имя"><br>
      <input type="text" name="city" placeholder="Город"><br>
      <label for="birth">Дата рождения:</label>
      <input type="date" name="birth"><br>
      <input type="submit" name="submit" value="Подтвердить">
    </form>
  </body>
</html>
<?php
require_once('db_utils.php');
if (isset($_POST['submit']))
  newUser();
?>
