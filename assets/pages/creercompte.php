
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


?>













<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Irish+Grover&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>QuizAttack</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="../img/icone/favicoquiz.ico">
    <script src="../js/creercompte.js" defer ></script>
</head>

<body>
    <header>
        <nav class="nav-container">
            <a href="../../index.html"><img class="logo" src="../img/logo.png" alt="Logo QuizAttack"></a>
            <ul class="nav-list">
                <li><a class="nav-list__item" href="statistique.html">Statistiques</a></li>
                <li class="nav-list__item"><a href="seconnecter.html">Se connecter</a></li>
                <li class="nav-list__item"><a href="#">Créer compte</a></li>
            </ul>
        </nav>
    </header>
    <div class="cadre-login">
        
        <h1 class="cadre-login__titre"> Inscription </h1>

        <div class = "cadre-login__soustitre">
            <label for="firstname" class="cadre-login__soustitre__texte"> Nom : </label>
            <input type="text" id="firstname" class="cadre-login__soustitre__input" style="width: 450px; height: 40px" name="firstname"/>
        </div>

        <div class = "cadre-login__soustitre">
            <label for="lastname" class="cadre-login__soustitre__texte"> Prénom : </label>
            <input type="text" id="lastname" class="cadre-login__soustitre__input" style="width: 450px; height: 40px" name="lastname"/>
        </div>

        <div class = "cadre-login__soustitre">
            <label for="email" class="cadre-login__soustitre__texte"> E-mail : </label>
            <input type="text" id="mail" class="cadre-login__soustitre__input" style="width: 450px; height: 40px" name="email"/>
        </div>

        <div class = "cadre-login__soustitre">
            
            <label for="role" class="cadre-login__soustitre__texte"> Formateur : </label>
            <input type="checkbox" id="checkForm" class="cadre-login__soustitre__input" style="width: 450px; height: 40px" name="checkForm" value="Formateur"/>
            <label for="role" class="cadre-login__soustitre__texte"> Stagiaire : </label>
            <input type="checkbox" id="checkStag" class="cadre-login__soustitre__input" style="width: 450px; height: 40px" name="checkStag"/>
        </div>

        <div class ="cadre-login__soustitre">
            <label for="password" class="cadre-login__soustitre__texte"> Mot de passe :</label>
            <input type="text" id="password" class="cadre-login__soustitre__input" style="width: 450px; height: 40px" name="password"/>
            <p class ="cadre-login__soustitre__conditions">12 caractères minimum, au moins 1 majuscule, 1 minuscule et 1 caractère spécial (!@#$%&()_)</p>
            </form>
        </div>

        <div class = "cadre-login__soustitre">
            <label for="confpassword" class="cadre-login__soustitre__texte"> Confirmer le mot de passe : </label>
            <input type="text" id="confirmpass" class="cadre-login__soustitre__input" style="width: 450px; height: 40px" name="confpassword"/>
            <p id='messagepassword' class="cadre-login__soustitre__message" style="width: 400px; align-self: center; margin: 0;">*Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.</p>
        </div>

        <div class="cadre-login__soustitre__submit">
                <input type="submit" value="Continuer" a href="./confirmation.html" style="width: 450px; height: 60px" class="cadre-login__soustitre__submit__texte">
        </div>
        <div class = "cadre-login__oublie">
            <a href="./passwordoublie.html" class = "cadre-login__oublie__texte"> Retour </a>
        </div>
    </div>
    <p>ok</p>
</body>

</html>