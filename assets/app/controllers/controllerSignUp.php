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
    public function __construct(?ModelSignUp $modelSignUp, ?ViewSignUp $viewSignUp)
    {
        $this->modelSignUp = $modelSignUp;
        $this->viewSignUp = $viewSignUp;
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

        //btn submit
        if (isset($_POST['submit'])) {
            //variables not vides ou nulls
            if (
                isset($_POST['firstname']) && !empty($_POST['firstname'])
                && isset($_POST['lastname']) && !empty($_POST['lastname'])
                && isset($_POST['email']) && !empty($_POST['email'])
                && isset($_POST['password']) && !empty($_POST['password'])
            ) {

                //validation adresse mail
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $firstname = sanitize($_POST['firstname']);
                    $lastname = sanitize($_POST['lastname']);
                    $email = sanitize($_POST['email']);
                    $password = sanitize($_POST['password']);

                    $password = password_hash($password, PASSWORD_BCRYPT);

                    //verification du mail
                    try {
                        $data = $this->getModelSignUp()->setEmail($email)->getByEmail();
                        if (empty($data)) {
                            $this->getModelSignUp()->setLastname($lastname)->setPassword($password)->setFirstname($firstname)->setEmail($email);

                            $data = $this->getModelSignUp()->add();

                            print_r($data);
                            $signUpMsg = $data;
                            // $this->getViewSignUp()->setMessage($data);
                        } else {
                            $signUpMsg = "Cet adresse mail existe déjà sur un autre compte.";
                        }
                    } catch (EXCEPTION $e) {
                        $signUpMsg = $e->getMessage();
                    }
                } else {
                    $signUpMsg = "Le mail n'est pas au bon format";
                }
            } else {
                $signUpMsg = "Veuillez remplir les champs obligatoires.";
            }
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

    public function script(): void
    {
        $script = "<script src='../../js/creercompte.js'></script>";
        $this->getViewFooter()->setScript($script);
    }



    public function render(): void
    { {
            echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

            echo $this->getViewSignUp()->setMessage($this->signUp())->displayView();

            $this->setViewFooter(new ViewFooter);
            $this->script();
            echo $this->getViewFooter()->displayView();
        }
    }
}

$signUp = new controllerSignUp(new ModelSignUp(), new ViewSignUp);
$signUp->render();
