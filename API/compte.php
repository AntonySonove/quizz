<?php

//! getCompteParMail

header("Access-Control-Allow-Origin: *");
header("Content-type:application/json;charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


if ($_SERVER['REQUEST_METHOD'] != 'GET') {
  http_response_code(405);
  echo json_encode(["message" => "Methode non autorisée. GET requis.", "Code" => 405]);
  return;
}

if (empty($_GET['email'])) {
  http_response_code(400);
  $reponse = ["Message" => "Veuillez fournir toutes les données manquants.", "Code" => 400];
  echo json_encode($reponse);
  return;
}

if (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
  //renvoie du message d'erreur
  http_response_code(400);
  $reponse = ["Message" => "Email pas au bon format.", "Code" => 400];
  echo json_encode($reponse);
  return;
}

$email = htmlentities(strip_tags(stripslashes(trim($_GET['email']))));

$bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$usersList = [];
try {
  $req = $bdd->prepare('SELECT id_user, firstname, lastname, email, `password`, roles FROM user WHERE email = ? LIMIT 1');
  $req->bindParam(1, $email, PDO::PARAM_STR);
  $req->execute();
  $data = $req->fetchAll(PDO::FETCH_ASSOC);

  if (empty($data)) {
    http_response_code(404);
    echo json_encode(["Message" => "Email n'existe pas.", "Code" => 404]);
    return;
  }

  $usersList[] = [
    'id' => $data[0]['id_user'],
    'firstname' => $data[0]['firstname'],
    'lastname' => $data[0]['lastname'],
    'email' => $data[0]['email'],
    'password' => $data[0]['password'],
    'roles' => $data[0]['roles']
  ];

  http_response_code(200);
  $tab = ['message' => 'succès ! ', 'code' => 200, 'result' => $usersList];
  $json = json_encode($tab);

  echo $json;

  return;
} catch (EXCEPTION $error) {
  http_response_code(500);
  echo json_encode(["Message" => $error->getMessage(), "Code" => 500]);
  return;
}
