<?php
session_start();

include "../utils/utils.php";
include "../models/modelQuizz.php";
include "../views/viewHome.php";
include "../views/viewHeader.php";
include "../views/viewFooter.php";


class ControllerHome
{
    private ?ViewHome $viewHome;
    private ?ModelQuizz $modelQuizz;
    private ?ViewHeader $viewHeader;
    private ?ViewFooter $viewFooter;

    public function __construct(?ViewHome $newViewHome, ?ModelQuizz $newModelQuizz)
    {
        $this->viewHome = $newViewHome;
        $this->modelQuizz = $newModelQuizz;
    }

    public function getViewHome(): ?ViewHome
    {
        return $this->viewHome;
    }

    public function setViewHome(?ViewHome $viewHome): self
    {
        $this->viewHome = $viewHome;
        return $this;
    }

    public function getModelQuizz(): ?ModelQuizz
    {
        return $this->modelQuizz;
    }

    public function setModelQuizz(?ModelQuizz $modelQuizz): self
    {
        $this->modelQuizz = $modelQuizz;
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
    public function readQuizz(): string
    {
        $quizzList = '';
        $data = $this->getModelQuizz()->getAll();

        foreach ($data as $user) {
            $quizzList = $quizzList . "<li>{$user['nickname']} : {$user['email']}</li>";
        }
        return $quizzList;
    }

    public function render(): void
    {
        echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

        // echo $this->getViewHome()->setUsersList($this->readUsers())->setMessage($this->signIn())->setConnectionMsg($this->signUp())->displayView();

        echo $this->setViewFooter(new ViewFooter)->getViewFooter()->displayView();
    }
}

$home = new ControllerHome(new ViewHome(), new ModelQuizz());
$home->render();
