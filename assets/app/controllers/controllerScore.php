<?php
include "../utils/utils.php";
include "../models/modelScore.php";
class ControllerScore
{
    //! attributs
    private ?ModelScore $modelScore;
    private ?ViewScore $viewScore;
    private ?ViewHeader $viewheader;
    private ?ViewFooter $viewfooter;


    //! constructor
    public function __construct(ModelScore $modelScore, ViewScore $viewScore)
    {
        $this->modelScore = $modelScore;
        $this->viewScore = $viewScore;
    }


    //! getter et setter

    public function getModelScore(): ?ModelScore
    {
        return $this->modelScore;
    }
    public function setModelScore(?ModelScore $modelScore): self
    {
        $this->modelScore = $modelScore;
        return $this;
    }

    public function getViewScore(): ?ViewScore
    {
        return $this->viewScore;
    }
    public function setViewScore(?ViewScore $viewScore): self
    {
        $this->viewScore = $viewScore;
        return $this;
    }

    public function getViewheader(): ?ViewHeader
    {
        return $this->viewheader;
    }

    public function setViewheader(?ViewHeader $viewheader): self
    {
        $this->viewheader = $viewheader;
        return $this;
    }

    public function getViewfooter(): ?ViewFooter
    {
        return $this->viewfooter;
    }

    public function setViewfooter(?ViewFooter $viewfooter): self
    {
        $this->viewfooter = $viewfooter;
        return $this;
    }


    //! method

    public function script(): void
    {
        $script = "";
        $this->getViewFooter()->setScript($script);
    }

    public function render(): void
    { {
            echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

            echo $this->setViewScore(new ViewScore)->getViewScore()->displayView();

            $this->setViewFooter(new ViewFooter);
            $this->script();
            echo $this->getViewFooter()->displayView();
        }
    }
}
include "../views/viewHeader.php";
include "../views/viewScore.php";
include "../views/viewFooter.php";



$score = new ControllerScore(new ModelScore(), new ViewScore(), new ViewHeader(), new ViewFooter());

$score->render();
