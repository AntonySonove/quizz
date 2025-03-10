<?php
include "../utils/utils.php";
include "../models/modelScore.php";
class ControllerScore{
    //! attributs
    private ?ModelScore $modelScore;
    private ?ViewScore $viewScore;
    private ?ViewHeader $header;
    private ?ViewFooter $footer;


    //! constructor
    public function __construct(ModelScore $modelScore, ViewScore $viewScore, ViewHeader $viewHeader, ViewFooter $viewFooter) {
        $this->modelScore = $modelScore;
        $this->viewScore = $viewScore;
        $this->viewHeader = $viewHeader;
        $this->viewFooter = $viewFooter;
    }


    //! getter et setter

    public function getModelScore(): ?ModelScore { return $this->modelScore; }
    public function setModelScore(?ModelScore $modelScore): self { $this->modelScore = $modelScore; return $this; }

    public function getViewScore(): ?ViewScore { return $this->viewScore; }
    public function setViewScore(?ViewScore $viewScore): self { $this->viewScore = $viewScore; return $this; }

    public function getHeader(): ?ViewHeader { return $this->header; }
    public function setHeader(?ViewHeader $header): self { $this->header = $header; return $this; }

    public function getFooter(): ?ViewFooter { return $this->footer; }
    public function setFooter(?ViewFooter $footer): self { $this->footer = $footer; return $this; }

    //! method
    // public function render(){
    //     echo $this->getHeader()->displayView();
    //     echo $this->getViewScore()->displayView();
    //     echo $this->getFooter()->displayView();
    // }

    public function render():void{
        {
            echo $this->setHeader(new ViewHeader)->getHeader()->displayView();

            echo $this->setViewScore(new ViewScore)->getViewScore()->displayView();

            echo $this->setFooter(new ViewFooter)->getFooter()->displayView();
        }
    }

}
include "../views/viewHeader.php";
include "../views/viewScore.php";
include "../views/viewFooter.php";



$score=new ControllerScore(new ModelScore(), new ViewScore(), new ViewHeader(), new ViewFooter());

$score->render();
?>