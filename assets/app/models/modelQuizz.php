<?php
class ModelQuizz
{
  private ?int $id;
  private ?string $title;
  private ?string $description;
  private ?ModelQuestion $modelQuestion;
  private ?ModelCategories $modelCategories;
  private ?PDO $bdd;

  //CONSTRUCT 
  public function __construct()
  {
    $this->bdd = connect();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getTitle(): ?string
  {
    return $this->title;
  }

  public function setTitle(?string $title): self
  {
    $this->title = $title;
    return $this;
  }

  public function getDescription(): ?string
  {
    return $this->description;
  }

  public function setDescription(?string $description): self
  {
    $this->description = $description;
    return $this;
  }

  public function getModelQuestion(): ?ModelQuestion
  {
    return $this->modelQuestion;
  }

  public function setModelQuestion(?ModelQuestion $modelQuestion): self
  {
    $this->modelQuestion = $modelQuestion;
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

  public function getBdd(): ?PDO
  {
    return $this->bdd;
  }

  public function setBdd(?PDO $bdd): self
  {
    $this->bdd = $bdd;
    return $this;
  }

  //todo add()


  public function getAll(): array | string
  {
    try {
      $req = $this->getBdd()->prepare('SELECT q.id_quizz, q.title, q.`description`, q.img, c.title AS category FROM quizz q JOIN to_qualify tq ON q.id_quizz = tq.id_quizz JOIN category c ON tq.id_category = c.id_category;');

      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_ASSOC);

      return $data;
    } catch (EXCEPTION $e) {
      return $e->getMessage();
    }
  }


  // public function getByCategory(): array | string

}
