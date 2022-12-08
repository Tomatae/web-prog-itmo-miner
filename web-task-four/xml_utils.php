<?php

const XML_PATH = 'users.xml';

function isTaken($id) {
    $xml = simplexml_load_file(XML_PATH) or die("Wrong xml path");
    $ids = array();

    foreach ($xml->user as $user){
        array_push($ids, strval($user['id']));
    }

    return (in_array(strval($id), $ids));
}

function getById($id) {
    $xml = simplexml_load_file(XML_PATH) or die("Wrong xml path");

    foreach ($xml->user as $user){
        if (strval($user['id']) == strval($id))
            return $user;
    }
}

function parseInfo() {
  $xml = simplexml_load_file(XML_PATH) or die("Wrong xml path");
  $info = "<table><tr><th>id</th><th>name</th><th>city</th><th>birth</th></tr>";

  foreach ($xml->user as $user){
    $info .= '<tr><td>'.$user['id'].'</td><td>'.$user->name.'</td><td>'.$user->city.'</td><td>'.$user->birth.'</td></tr>';
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

  $xml = simplexml_load_file(XML_PATH) or die("Wrong xml path");

  $newchild = $xml->addChild("user");

  $newchild->addAttribute("id", $id);
  $newchild->addChild("name", $name);
  $newchild->addChild("city", $city);
  $newchild->addChild("birth", $birth);
  $xml->asXML(XML_PATH);
  teleport();
}

function deleteUser() {
  $id = strval($_POST['id']);

  if (!is_numeric($id))
    exit ('Некорректный id');

  if (!isTaken($_POST['id']))
    exit ('Данный id не существует');

  $dom = new DomDocument;
  $testXML = file_get_contents(XML_PATH);
  $dom->loadXML($testXML);

  $xpath = new DOMXpath($dom);
  $nodelist = $xpath->query("/users/user[@id={$id}]");
  $oldnode = $nodelist->item(0);
  $oldnode->parentNode->removeChild($oldnode);
  $dom->save(XML_PATH);
}

function updateUser() {
  deleteUser();
  newUser();
  teleport();
}

function teleport() {
  $id = strval($_POST['id']);
  if (is_numeric($id))
    header("Location:index.php?id=$id");
}

function listXML() {
  $xml = simplexml_load_file(XML_PATH) or die("Wrong xml path");
  $links = "";

  foreach ($xml->user as $user) {
    $links .= '<a href="index.php?id='.$user['id'].'">id'.$user['id'].' Имя: '.$user->name.'</a><br>';
  }
  return $links;
}
?>
