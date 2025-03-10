<?php
header("Access-Control-Allow-Origin: *");
header("Content-type:application/json;charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include './assets/utils/utils.php';
class ModelUser{
    //ATTRIBUTS
    private ?int $id;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $email;
    private ?string $roles;
    private ?string $password;
    private ?PDO $bdd;

    //CONSTRUCTEUR
    public function __construct(){
        
        $this->bdd = connect();
    }

    //GETTER ET SETTER
    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): self { $this->id = $id; return $this; }

    public function getfirstname(): ?string { return $this->firstname; }
    public function setfirstname(?string $firstname): self { $this->firstname = $firstname; return $this; }

    public function getlastname(): ?string { return $this->lastname; }
    public function setlastname(?string $lastname): self { $this->lastname = $lastname; return $this; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(?string $email): self { $this->email = $email; return $this; }
    public function getRoles(): ?string { return $this->roles; }
    public function setRoles(?string $roles): self { $this->roles = $roles; return $this; }

    public function getPassword(): ?string { return $this->password; }
    public function setPassword(?string $password): self { $this->password = $password; return $this; }

    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): self { $this->bdd = $bdd; return $this; }

    //METHOD
    public function add():void{
        //CONTROLE DE LA METHODE HTTP
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            //envoie du message
            http_response_code(405);
            echo json_encode(["message" => "Methode non autorisée. POST requis.", "Code" => 405]);
            //arret du script
            return;
        }
        
        $json = file_get_contents("php://input");
        
        
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
          $firstname = sanitize($data->firstname);
          $lastname = sanitize($data->lastname);
          $email = sanitize($data->email);
          $password = sanitize($data->password);
          $roles = sanitize($data->roles);
          
          $password = password_hash($password, PASSWORD_BCRYPT);
          
        try {

            // Vérifier si lemail existe deja
            $req = $this->bdd->prepare('SELECT id_user, firstname, lastname, email, `password`, roles FROM user WHERE email = ?');
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
        try{
            //REQUETE PREPAREE
            $req = $this->getBdd()->prepare('INSERT INTO users (firstname, lastname, roles, email, `password`) VALUES (?,?,?,?,?)');
            
            //Récupération des données de l'objet
            $firstname = $this->getfirstname();
            $lastname = $this->getlastname();
            $email = $this->getEmail();
            $roles = $this->getRoles();
            $password = $this->getPassword();

            //BINDPARAM
            $req->bindParam(1,$firstname,PDO::PARAM_STR);
            $req->bindParam(2,$lastname,PDO::PARAM_STR);
            $req->bindParam(2,$email,PDO::PARAM_STR);
            $req->bindParam(3,$roles,PDO::PARAM_STR);
            $req->bindParam(3,$password,PDO::PARAM_STR);

            //Execution de la requête
            $req->execute();

            //6.4) Envoie le message de confirmation
            //Encoder le code réponse HTTP
            http_response_code(200);

            //Tableau associatif de ma réponse
            $tab = ['message' => 'lenregistrement a était éffectuer avec succées', 'code' => 200];

            //Chiffrer la réponse en json
            $json = json_encode($tab);

            //Affichage du json (ce qui retourne la réponse au client)
            echo $json;

            //Arrêt du script
            return;

        } catch (EXCEPTION $error) {
            //envoyer une réponse d'erreur 500
            http_response_code(500);
            echo json_encode(["Message" => $error->getMessage(), "Code" => 500]);
            return;
          }
    }

}