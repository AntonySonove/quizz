<?php
session_start();

include "../utils/utils.php";
include "../models/modelUser.php";
include "../views/viewSignIn.php";
include "../views/viewHeader.php";
include "../views/viewFooter.php";


class ControllerSignIn
{

  private ?ViewSignIn $viewSignIn;
  private ?ModelUser $modelUser;
  private ?ViewHeader $viewHeader;
  private ?ViewFooter $viewFooter;

  public function __construct(?ViewSignIn $viewSignIn, ?ModelUser $modelUser)
  {
    $this->viewSignIn = $viewSignIn;
    $this->modelUser = $modelUser;
  }

  public function getViewSignIn(): ?ViewSignIn
  {
    return $this->viewSignIn;
  }

  public function setViewSignIn(?ViewSignIn $viewSignIn): self
  {
    $this->viewSignIn = $viewSignIn;
    return $this;
  }

  public function getModelUser(): ?ModelUser
  {
    return $this->modelUser;
  }

  public function setModelUser(?ModelUser $modelUser): self
  {
    $this->modelUser = $modelUser;
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

  public function getViewFooter(): ?ViewFooter
  {
    return $this->viewFooter;
  }

  public function setViewFooter(?ViewFooter $viewFooter): self
  {
    $this->viewFooter = $viewFooter;
    return $this;
  }

  public function signIn(): string | null
  {
    $connectionMsg = '';

    //btn submit
    if (isset($_POST['submit-connexion'])) {

      //variables not vides ou nulls
      if (
        isset($_POST['email-login']) && !empty($_POST['email-login'])
        && isset($_POST['password-login']) && !empty($_POST['password-login'])
      ) {
        //validation adresse mail
        if (filter_var($_POST['email-login'], FILTER_VALIDATE_EMAIL)) {
          $email = sanitize($_POST['email-login']);
          $password = sanitize($_POST['password-login']);

          //verification du mail
          $this->getModelUser()->setEmail($email);
          $data = $this->getModelUser()->getByEmail();


          if (!empty($data)) {
            if (password_verify($password, $data[0]['password'])) {
              $_SESSION['id_users'] = $data[0]['id_users'];
              $_SESSION['firstname'] = $data[0]['firstname'];
              $_SESSION['lastname'] = $data[0]['lastname'];
              $_SESSION['email'] = $data[0]['email'];

              $connectionMsg = "Vous êtes connecté(e)!";
              header("Location: ./controllerUserProfile.php");
              exit();
            } else {
              $connectionMsg = "Email et/ou mdp incorrect(s).";
            }
          } else {
            $connectionMsg = "Email et/ou mdp incorrect(s).";
          }
        } else {
          $connectionMsg = "Le mail n'est pas au bon format.";
        }
      } else {
        $connectionMsg = 'Veuillez remplir les champs obligatoires.';
      }
    }

    return $connectionMsg;
  }


  public function script(): void
  {
    $script = "";
    $this->getViewFooter()->setScript($script);
  }

  public function render(): void
  {

    echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

    $this->getViewSignIn()->setMessage($this->signIn());
    echo $this->getViewSignIn()->displayView();

    $this->setViewFooter(new ViewFooter);
    $this->script();
    echo $this->getViewFooter()->displayView();
  }
}

$signIn = new ControllerSignIn(new ViewSignIn, new ModelUser);
$signIn->render();
