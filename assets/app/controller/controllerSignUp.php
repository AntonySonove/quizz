<?php
//Activer la Session
session_start();

//Import des ressources


class ControllerSignUp {
    private ?SignUp $SignUp;

    //CONSTRUCTEUR
    public function __construct(?SignUp $SignUp){
        
        $this->SignUp = $SignUp;
    }
    
    //GETTER ET SETTER
    public function getSignUp(): ?SignUp { return $this->SignUp; }
    public function setSignUp(?SignUp $SignUp): self { $this->SignUp = $SignUp; return $this; }

    //METHOD
    public function render():void{
        //Vérifier si je suis connecté ou non
        if(!isset($_SESSION['id'])){
            //si je ne suis pas connecté, je redirige vers l'accueil
            header('location:index.php');
            exit;
        }

        //Si je suis connecté, j'affiche les différentes views
        
        // echo $this->getHome()->displayView();
        
    }
}

$signUp = new controllerSignUp(new SignUp());
$signUp->render();