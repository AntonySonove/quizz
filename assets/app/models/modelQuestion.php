<?php
class ModelQuestion
{

  // attributs
  private ?int $id;
  private ?string $question;
  private ?string $description;
  private ?int $value;
  private ?string $answer;
  private ?PDO $bdd;

  // constructor
  public function __construct()
  {
    $this->bdd = connect();
  }

  // getter et setter

  public function getId(): ?int
  {
    return $this->id;
  }

  public function setId(?int $id): self
  {
    $this->id = $id;
    return $this;
  }

  public function getQuestion(): ?string
  {
    return $this->question;
  }

  public function setQuestion(?string $question): self
  {
    $this->question = $question;
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

  public function getValue(): ?int
  {
    return $this->value;
  }

  public function setValue(?int $value): self
  {
    $this->value = $value;
    return $this;
  }

  public function getAnswer(): ?string
  {
    return $this->answer;
  }

  public function setAnswer(?string $answer): self
  {
    $this->answer = $answer;
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
}