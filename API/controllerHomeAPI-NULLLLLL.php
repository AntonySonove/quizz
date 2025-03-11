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
    public function readQuizz(): void
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-type:application/json;charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        if ($_SERVER['REQUEST_METHOD'] != 'GET') {
            http_response_code(405);
            echo json_encode(["message" => "Methode non autorisée. GET requis.", "Code" => 405]);
            return;
        }

        $quizzList = [];

        try {
            $data = $this->getModelQuizz()->getAll();

            foreach ($data as $quizz) {
                $quizzList = $quizzList . "
            <article class='quiz-card'>
                <img class='quiz-card__img' src='assets/img/img_quiz/" . $quizz['img'] . ".jpg alt='Image du quiz'>
                <h4 class='quiz-card__title'>" . $quizz['title'] . "</h4>
            </article>
            ";
            }

            http_response_code(200);
            $tab = ['message' => 'succès ! ', 'code' => 200, 'result' => $quizzList];
            $json = json_encode($tab);

            echo $json;

            return;
        } catch (EXCEPTION $error) {
            http_response_code(500);
            echo json_encode(["Message" => $error->getMessage(), "Code" => 500]);
            return;
        }
    }

    public function render(): void
    {
        echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

        echo $this->getViewHome()->setQuizzList($this->readQuizz())->displayView();

        echo $this->setViewFooter(new ViewFooter)->getViewFooter()->displayView();
    }
}

$home = new ControllerHome(new ViewHome(), new ModelQuizz());
$home->render();