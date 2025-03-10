<?php

class ModelCategories
{
  private ?int $id;
  private ?string $name;
  private ?PDO $bdd;

  public function __construct()
  {
    $this->bdd = connect();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getName(): ?string
  {
    return $this->name;
  }

  public function setName(?string $name): self
  {
    $this->name = $name;
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

  //todo function add()

  public function getAll(): array | string
  {
    try {
      $req = $this->getBdd()->prepare('SELECT id_category, title FROM category');
      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_ASSOC);

      return $data;
    } catch (EXCEPTION $e) {
      return $e->getMessage();
    }
  }

  //todo function getBy...()

}