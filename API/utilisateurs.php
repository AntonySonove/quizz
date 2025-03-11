<?php
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


$usersList = [];

$bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

try {
  $req = $bdd->prepare('SELECT id_user, firstname, lastname, email, `password`, roles FROM user');
  $req->execute();
  $data = $req->fetchAll(PDO::FETCH_ASSOC);

  foreach ($data as $user) {
    $usersList[] = [
      'id_user' => $user[0]['id_user'],
      'firstname' => $user[0]['firstname'],
      'lastname' => $user[0]['lastname'],
      'email' => $user[0]['email'],
      'password' => $user[0]['password'],
      'roles' => $user[0]['roles']
    ];
  }

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
