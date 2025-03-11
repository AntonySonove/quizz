<?php
//Activer la Session
session_start();

//Import des ressources
include "../utils/utils.php";
include "../models/modelSignUp.php";
include "../views/viewHeader.php";
include "../views/viewSignUp.php";
include "../views/viewFooter.php";


class ControllerSignUp
{
    private ?ModelSignUp $modelSignUp;
    private ?ViewSignUp $viewSignUp;
    private ?ViewHeader $viewHeader;
    private ?ViewFooter $viewFooter;

    //CONSTRUCTEUR
    public function __construct(?ModelSignUp $modelSignUp)
    {

        $this->modelSignUp = $modelSignUp;
    }

    //GETTER ET SETTER
    public function getModelSignUp(): ?ModelSignUp
    {
        return $this->modelSignUp;
    }
    public function setModelSignUp(?ModelSignUp $modelSignUp): self
    {
        $this->modelSignUp = $modelSignUp;
        return $this;
    }

    public function getViewSignUp(): ?ViewSignup
    {
        return $this->viewSignUp;
    }
    public function setViewSignUp(?ViewSignup $viewSignUp): self
    {
        $this->viewSignUp = $viewSignUp;
        return $this;
    }
    public function getViewFooter(): ?ViewFooter
    {
        return $this->viewFooter;
    }

    public function setViewFooter(?ViewFooter $viewFooter): self
    {
        $this->viewFooter = $viewFooter;
        return $this;
    }

    public function getViewHeader(): ?ViewHeader
    {
        return $this->viewHeader;
    }

    public function setViewHeader(?ViewHeader $viewHeader): self
    {
        $this->viewHeader = $viewHeader;
        return $this;
    }


    //METHOD
    //S'enregistrer
    public function signUp(): string
    {
        //1)Vérifier qu'on reçoit le formulaire
        if (isset($_POST['submit'])) {
            //2) Vérifier les champs vides
            if (empty($_POST['firstname']) && empty($_POST['lastname']) && empty($_POST['email']) && empty($_POST['password'])) {
                return 'Remplissez tous les champs.';
            }

            //3) Vérifier le format des données
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                return "L'Email n'est pas au bon format";
            }

            //4) Nettoyer les données
            $firstname = sanitize($_POST['firstname']);
            $lastname = sanitize($_POST['lastname']);
            $email = sanitize($_POST['email']);
            $password = sanitize($_POST['password']);

            //5) Hasher le mot de passe
            $password = password_hash($password, PASSWORD_BCRYPT);

            //6) Vérifier que l'utilisateur n'existe pas déjà en BDD
            //6.1) Donner l'email au Model
            $this->getModelSignUp()->setEmail($email);

            //6.2) Demander au model d'utiliser getByEmail()
            $data = $this->getModelSignUp()->getByEmail();

            //6.3) Vérifier si les données sont vide ou pas
            if (!empty($data)) {
                return "Cet email est déjà utilisé par un utilisateur.";
            }

            //7) Enregistrer l'utilisateur en BDD
            //7.1) Donner le pseudo et le mot de passe au Model
            $this->getModelSignUp()->setLastname($lastname)->setPassword($password)->setFirstname($firstname)->setEmail($email);

            //7.2) Demander au model d'utiliser add()
            $data = $this->getModelSignUp()->add();

            //8) Retourne un message de confirmation
            return $data;
        }
        return '';
    }

    //Se Connecter
    public function signUp555(): string
    {
        //1) Vérification qu'on reçoit le formulaire de connexion
        if (isset($_POST['submitConnexion'])) {
            //2) Vérification des champs vides
            if (empty($_POST['emailConnexion']) || empty($_POST['passwordConnexion'])) {
                return 'Veuillez remplir tous les champs.';
            }

            //3) Vérification du format de l'email
            if (!filter_var($_POST['emailConnexion'], FILTER_VALIDATE_EMAIL)) {
                return 'Email pas au bon format.';
            }

            //4) Nettoyage des données
            $email = sanitize($_POST['emailConnexion']);
            $password = sanitize($_POST['passwordConnexion']);

            //5) Récupération des données de l'utilisateur en BDD
            //5.1) Je donne au modelUser l'email à aller chercher en BDD
            $this->getModelSignUp()->setEmail($email);

            //5.2) On demande au ModelUSer d'aller chercher les données
            $data = $this->getModelSignUp()->getByEmail();

            //5.3)Je vérifie que j'ai un utilisateur enregistré
            if (empty($data)) {
                return 'Login et/ou Mot de Passe incorrect.';
            }

            //6) Comparer les mot de passe
            if (!password_verify($password, $data[0]['psswrd'])) {
                return 'Login et/ou Mot de Passe incorrect.';
            }

            //7) Stocker les données en $_SESSION
            $_SESSION['id'] = $data[0]['id'];
            $_SESSION['nickname'] = $data[0]['nickname'];
            $_SESSION['email'] = $data[0]['email'];

            //8) Retourner le message de confirmation
            return $_SESSION['nickname'] . " est connecté au site.";
        }
        return '';
    }

    public function readUsers(): string
    {
        //1) Demander au Model d'utiliser getAll()
        $data = $this->getModelSignUp();

        $usersList = '';
        //2) Boucler sur le tableau d'utilisateur
        foreach ($data as $user) {
            //3) Mettre en forme les données
            $usersList = $usersList . "<li>{$user['nickname']} - {$user['email']}</li>";
        }

        //4) Retourne le formatage de mes données
        return $usersList;
    }
    public function render(): void
    { {
            echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

            $this->signUp();
            echo $this->setViewSignUp(new ViewSignUp)->getViewSignUp()->displayView();

            echo $this->setViewFooter(new ViewFooter)->getViewFooter()->displayView();
        }
    }
}
