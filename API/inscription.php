<?php
header("Access-Control-Allow-Origin: *");
header("Content-type:application/json;charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//CONTROLE DE LA METHODE HTTP
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  //envoie du message
  http_response_code(405);
  echo json_encode(["message" => "Methode non autorisée. POST requis.", "Code" => 405]);
  //arret du script
  return;
}

//! c'est vraiment ça pour un form? ==================================================================================
$json = file_get_contents("php://input");
//! ==================================================================================================================
$data = json_decode($json);

if (empty($data->firstname) || empty($data->lastname) || empty($data->email) || empty($data->password) || empty($data->roles)) {
  //renvoie msg d'erreur
  http_response_code(400);
  $reponse = ["Message" => "Veuillez fournir toutes les données manquants.", "Code" => 400];
  echo json_encode($reponse);
  return;
}

//2) vérifier le format du mail
if (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
  //renvoie du message d'erreur
  http_response_code(400);
  $reponse = ["Message" => "Email pas au bon format.", "Code" => 400];
  echo json_encode($reponse);
  return;
}

//3) Nettoyage des données
$firstname = htmlentities(strip_tags(stripslashes(trim($data->firstname))));
$lastname = htmlentities(strip_tags(stripslashes(trim($data->lastname))));
$email = htmlentities(strip_tags(stripslashes(trim($data->email))));
$password = htmlentities(strip_tags(stripslashes(trim($data->password))));
$roles = htmlentities(strip_tags(stripslashes(trim($data->roles))));

$password = password_hash($password, PASSWORD_BCRYPT);

//5) Vérifier si lemail existe deja
//!==== nome da API? Página utils.php??? =============================================================================
$bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//! ==================================================================================================================

try {
  $req = $bdd->prepare('SELECT id_user, firstname, lastname, email, `password`, roles FROM user WHERE email = ?');
  $req->bindParam(1, $email, PDO::PARAM_STR);
  $req->execute();

  $data = $req->fetchAll(PDO::FETCH_ASSOC);

  if (!empty($data)) {
    http_response_code(409);
    echo json_encode(["Message" => "Email déjà utilisé.", "Code" => 409]);
    return;
  }
} catch (EXCEPTION $error) {
  http_response_code(500);
  echo json_encode(["Message" => "Problème internet SQL.", "Code" => 500]);
  return;
}

try {
  //6) enregistrer l'utilisateur
  $req = $bdd->prepare('INSERT INTO users (firstname, lastname, email, `password`, roles) VALUES (?, ?, ?, ?, ?)');
  $req->bindParam(1, $firstname, PDO::PARAM_STR);
  $req->bindParam(1, $lastname, PDO::PARAM_STR);
  $req->bindParam(2, $email, PDO::PARAM_STR);
  $req->bindParam(3, $password, PDO::PARAM_STR);
  $req->bindParam(1, $roles, PDO::PARAM_STR); //!ARRAY. ok?
  $req->execute();

  $inscription = [$firstname, $lastname, $email, $password, $roles];

  http_response_code(200);
  $tab = ['message' => 'succès ! ', 'code' => 200, 'users' => $inscription];
  $json = json_encode($tab);
  echo $json;
  return;
} catch (EXCEPTION $error) {
  //envoyer une réponse d'erreur 500
  http_response_code(500);
  echo json_encode(["Message" => $error->getMessage(), "Code" => 500]);
  return;
}


//todo DOC API