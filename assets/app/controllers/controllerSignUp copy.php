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
        $signUpMsg = '';

        //1)Vérifier qu'on reçoit le formulaire
        if (isset($_POST['submit'])) {
            //2) Vérifier les champs vides
            if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password'])) {
                $signUpMsg = 'Remplissez tous les champs.';
            }

            //3) Vérifier le format des données
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $signUpMsg = "L'Email n'est pas au bon format";
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
                $signUpMsg = "Cet email est déjà utilisé par un utilisateur.";
            }

            //7) Enregistrer l'utilisateur en BDD
            //7.1) Donner le pseudo et le mot de passe au Model
            $this->getModelSignUp()->setLastname($lastname)->setPassword($password)->setFirstname($firstname)->setEmail($email);

            //7.2) Demander au model d'utiliser add()
            $data = $this->getModelSignUp()->add();

            //8) Retourne un message de confirmation
            return $data;
        }
        return $signUpMsg;
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
            echo $this->setViewSignUp(new ViewSignUp)->getViewSignUp()->setMessage($this->signUp())->displayView();

            echo $this->setViewFooter(new ViewFooter)->getViewFooter()->displayView();
        }
    }
}

$signUp = new controllerSignUp(new ModelSignUp());
$signUp->render();
