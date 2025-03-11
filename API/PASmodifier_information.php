<?php

header("Access-Control-Allow-Origin: *");
header("Content-type:application/json;charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$json = file_get_contents("php://input");
$newData = json_decode($json);

if ($_SERVER['REQUEST_METHOD'] != 'PUT') {
  http_response_code(405);
  echo json_encode(["message" => "Methode non autorisée. PUT requis.", "Code" => 405]);
  return;
}

if (empty($_GET['id'])) {
  http_response_code(400);
  $reponse = ["Message" => "Veuillez fournir toutes les données manquants.", "Code" => 400];
  echo json_encode($reponse);
  return;
}

if (!filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
  http_response_code(400);
  $reponse = ["Message" => "Id pas au bon format.", "Code" => 400];
  echo json_encode($reponse);
  return;
}

$id = htmlentities(strip_tags(stripslashes(trim($_GET['id']))));

$bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$usersList = [];
try {
  $req = $bdd->prepare('SELECT id, nickname, email, psswrd FROM users WHERE id = ? LIMIT 1');
  $req->bindParam(1, $id, PDO::PARAM_STR);
  $req->execute();
  $data = $req->fetchAll(PDO::FETCH_ASSOC);

  if (empty($data)) {
    http_response_code(404);
    echo json_encode(["Message" => "Id n'existe pas.", "Code" => 404]);
    return;
  }

  //forEach pour chaque key => value (autant qui j'ai mis)
  foreach ($newData as $key => $value) {
    if (empty($key) || empty($value)) {
      http_response_code(400);
      $reponse = ["Message" => "Veuillez fournir toutes les données manquants.", "Code" => 400];
      echo json_encode($reponse);
      return;
    }

    if ($key == 'email') {
      if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        $reponse = ["Message" => "Email pas au bon format.", "Code" => 400];
        echo json_encode($reponse);
        return;
      }
    }

    $key = htmlentities(strip_tags(stripslashes(trim($key))));
    $value = htmlentities(strip_tags(stripslashes(trim($value))));

    if ($key == 'psswrd') { //! NA DOC TÁ ESCRITO psswrd ok? NÃO PODE ERRAR
      $value = password_hash($value, PASSWORD_BCRYPT);
    }

    //edit de la base de données
    $req = $bdd->prepare("UPDATE users SET $key = ? WHERE id = ?");
    $req->bindParam(1, $value, PDO::PARAM_STR);
    $req->bindParam(2, $id, PDO::PARAM_STR);
    $req->execute();

    //recupération de la base modifiée
    $req = $bdd->prepare('SELECT id, nickname, email, psswrd FROM users WHERE id = ? LIMIT 1');
    $req->bindParam(1, $id, PDO::PARAM_STR);
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
  }

  http_response_code(200);
  $tab = ['message' => 'succès ! ', 'code' => 200, 'result' => $data];
  $json = json_encode($tab);

  echo $json;

  return;
} catch (EXCEPTION $error) {
  http_response_code(500);
  echo json_encode(["Message" => $error->getMessage(), "Code" => 500]);
  return;
}
