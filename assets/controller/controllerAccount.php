<?php
//Activer la Session
session_start();

//Import des ressources


class ControllerAccount {
    private ?ViewAccount $viewAccount;

    //CONSTRUCTEUR
    public function __construct(?ViewAccount $viewAccount){
        $this->setHeader(new ViewHeader());
        $this->setFooter(new ViewFooter());
        $this->viewAccount = $viewAccount;
    }
    
    //GETTER ET SETTER
    public function getViewAccount(): ?ViewAccount { return $this->viewAccount; }
    public function setViewAccount(?ViewAccount $viewAccount): self { $this->viewAccount = $viewAccount; return $this; }

    //METHOD
    public function render():void{
        //Vérifier si je suis connecté ou non
        if(!isset($_SESSION['id'])){
            //si je ne suis pas connecté, je redirige vers l'accueil
            header('location:index.php');
            exit;
        }

        //Si je suis connecté, j'affiche les différentes views
        echo $this->getHeader()->displayView();
        echo $this->getViewAccount()->displayView();
        echo $this->getFooter()->displayView();
    }
}

$account = new ControllerAccount(new ViewAccount());
$account->render();