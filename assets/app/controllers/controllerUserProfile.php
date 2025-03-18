<?php
//Activer la Session
session_start();

//Import des ressources
include "../utils/utils.php";
include "../models/modelUser.php";
include "../views/viewHeader.php";
include "../views/viewUserProfile.php";
include "../views/viewFooter.php";
class ControllerUserProfile
{
    // private ?ModelUser $modelUser;
    private ?ViewUserProfile $viewUserProfile;
    private ?ViewHeader $viewHeader;
    private ?ViewFooter $viewFooter;

    public function __construct(?ViewUserProfile $viewUserProfile)
    {
        $this->viewUserProfile = $viewUserProfile;
    }

    public function getViewUserProfile(): ?ViewUserProfile
    {
        return $this->viewUserProfile;
    }
    public function setViewUserprofile(?ViewUserProfile $viewUserProfile): self
    {
        $this->viewUserProfile = $viewUserProfile;
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

    //Method
    public function render()
    {
        //je vérifie qu'il y a une session et que le login dans session n'est pas vide
        if (isset($_SESSION['id_users']) && !empty($_SESSION['id_users'])) {
        }
        echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();


        echo $this->getViewUserProfile()->displayView();

        echo $this->setViewFooter(new ViewFooter)->getViewFooter()->displayView();
    }
}


$userProfile = new ControllerUserProfile(new viewUserProfile());
$userProfile->render();
