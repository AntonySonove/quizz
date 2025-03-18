<?php
include "../utils/utils.php";
include "../models/modelDescription.php";

class ControllerDescription{
    private ?ModelDescription $modelDescription;
    private ?ViewDescription $viewDescription;
    private ?ViewHeader $viewHeader;
    private ?ViewFooter $viewFooter;

    public function __construct(ModelDescription $modelDescription, ViewDescription $viewDescription, ViewHeader $viewHeader, ViewFooter $viewFooter) {
        $this->modelDescription = $modelDescription;
        $this->viewDescription = $viewDescription;
        $this->viewHeader = $viewHeader;
        $this->viewFooter = $viewFooter;
    }


    public function getModelDescription(): ?ModelDescription { return $this->modelDescription; }
    public function setModelDescription(?ModelDescription $modelDescription): self { $this->modelDescription = $modelDescription; return $this; }

    public function getViewDescription(): ?ViewDescription { return $this->viewDescription; }
    public function setViewDescription(?ViewDescription $viewDescription): self { $this->viewDescription = $viewDescription; return $this; }

    public function getHeader(): ?ViewHeader { return $this->viewHeader; }
    public function setHeader(?ViewHeader $viewHeader): self { $this->viewHeader = $viewHeader; return $this; }

    public function getFooter(): ?ViewFooter { return $this->viewFooter; }
    public function setFooter(?ViewFooter $viewFooter): self { $this->viewFooter = $viewFooter; return $this; }


    public function render():void{
        {
            echo $this->setHeader(new ViewHeader)->getHeader()->displayView();

            echo $this->setViewDescription(new ViewDescription)->getViewDescription()->displayView();

            echo $this->setFooter(new ViewFooter)->getFooter()->displayView();
        }
    }
}

include "../views/viewHeader.php";
include "../views/viewDescription.php";
include "../views/viewFooter.php";
$description=new ControllerDescription(new ModelDescription(), new ViewDescription(), new ViewHeader(), new ViewFooter());

$description->render();





?>