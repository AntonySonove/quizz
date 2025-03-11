<?php
session_start();

include "./assets/app/utils/utils.php";
include "./assets/app/models/modelQuizz.php";
include "./assets/app/models/modelCategories.php";
include "./assets/app/views/viewHome.php";
include "./assets/app/views/viewHeader.php";
include "./assets/app/views/viewFooter.php";


class ControllerHome
{
    private ?ViewHome $viewHome;
    private ?ModelQuizz $modelQuizz;
    private ?ModelCategories $modelCategories;
    private ?ViewHeader $viewHeader;
    private ?ViewFooter $viewFooter;

    public function __construct(?ViewHome $newViewHome, ?ModelQuizz $newModelQuizz, ?ModelCategories $newModelCategories)
    {
        $this->viewHome = $newViewHome;
        $this->modelQuizz = $newModelQuizz;
        $this->modelCategories = $newModelCategories;
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

    public function getModelCategories(): ?ModelCategories
    {
        return $this->modelCategories;
    }

    public function setModelCategories(?ModelCategories $modelCategories): self
    {
        $this->modelCategories = $modelCategories;
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

        foreach ($data as $quizz) {
            $quizzList = $quizzList . "
            <article class='quiz-card " . $quizz['category'] . "'>
                <img class='quiz-card__img' src='../../img/img_quiz/" . $quizz['img'] . ".jpg' alt='Image du quiz'>
                <h4 class='quiz-card__title'>" . $quizz['title'] . "</h4>
            </article>
            ";
        }
        return $quizzList;
    }

    public function readCategory(): string
    {
        $categoryList = '';
        $data = $this->getModelCategories()->getAll();

        foreach ($data as $category) {
            $categoryList = $categoryList . "
              <option value='" . $category['title'] . "'>" . $category['title'] . "</option>
              ";
        }
        return $categoryList;
    }

    public function render(): void
    {
        echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

        echo $this->getViewHome()->setQuizzList($this->readQuizz())->setCategoryList($this->readCategory())->displayView();

        echo $this->setViewFooter(new ViewFooter)->getViewFooter()->displayView();
    }
}
