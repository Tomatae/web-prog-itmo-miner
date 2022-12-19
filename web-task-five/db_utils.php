<?php

$dbhost = "localhost";
$dbname = "db";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$dbhost; dbname=$dbname", $username, $password);

function isTaken($id) {
  $request = "SELECT id FROM users";
  global $conn;
  $users = $conn->query($request);

  foreach ($users as $user) {
    if ($user['id'] == $id) return true;
  }
  return false;
}

function getById($id) {
  $request = "SELECT * FROM users WHERE id=$id";
  global $conn;
  $user = $conn->query($request);

  return $user->fetch();
}

function parseInfo() {
  $request = "SELECT * FROM users";
  global $conn;
  $users = $conn->query($request);
  $info = "<table><tr><th>id</th><th>name</th><th>city</th><th>birth</th></tr>";

  foreach ($users as $user){
    $info .= '<tr><td>'.strval($user['id']).'</td><td>'.strval($user['name']).'</td><td>'.strval($user['city']).'</td><td>'.strval($user['birth']).'</td></tr>';
  }
  $info .= "</table>";
  return $info;
}

function newUser() {
  $id = $_POST['id'];

  if (!is_numeric($id))
    exit ('Некорректный id');

  if (isTaken($_POST['id']))
    exit ('Данный id уже занят');

  $name = trim($_POST['name']);
  $city = trim($_POST['city']);
  $birth = $_POST['birth'];

  $request = "INSERT INTO users (id, name, city, birth) VALUES (?,?,?,?)";
  global $conn;
  $conn->prepare($request)->execute([$id, $name, $city, $birth]);
  teleport();
}

function deleteUser() {
  $id = strval($_POST['id']);

  if (!is_numeric($id))
    exit ('Некорректный id');

  if (!isTaken($_POST['id']))
    exit ('Данный id не существует');

  $request = "DELETE FROM Users WHERE id=?";
  global $conn;
  $conn->prepare($request)->execute([$id]);
}

function updateUser() {
  $id = strval($_POST['id']);

  if (!is_numeric($id))
    exit ('Некорректный id');

  if (!isTaken($_POST['id']))
    exit ('Данный id не существует');

  $name = trim($_POST['name']);
  $city = trim($_POST['city']);
  $birth = $_POST['birth'];

  $request = "UPDATE users SET name=?, city=?, birth=? WHERE id=?";
  global $conn;
  $conn->prepare($request)->execute([$name, $city, $birth, $id]);
  teleport();
}

function teleport() {
  $id = strval($_POST['id']);
  if (is_numeric($id))
    header("Location:index.php?id=$id");
}

function listDB() {
  $links = "";
  $request = "SELECT id, name FROM users";

  global $conn;
  $users = $conn->query($request);
  foreach ($users as $user) {
    $links .= '<a href="index.php?id='.$user['id'].'">id'.$user['id'].' Имя: '.$user['name'].'</a><br>';
  }
  return $links;
}
?>
