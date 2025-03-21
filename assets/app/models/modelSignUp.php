<?php


class ModelSignUp
{
  //ATTRIBUTS
  private ?int $id;
  private ?string $firstname;
  private ?string $lastname;
  private ?string $email;
  private ?string $roles;
  private ?string $password;
  private ?PDO $bdd;

  //CONSTRUCTEUR
  public function __construct()
  {

    $this->bdd = connect();
  }

  //GETTER ET SETTER
  public function getId(): ?int
  {
    return $this->id;
  }
  public function setId(?int $id): self
  {
    $this->id = $id;
    return $this;
  }

  public function getFirstname(): ?string
  {
    return $this->firstname;
  }
  public function setFirstname(?string $firstname): self
  {
    $this->firstname = $firstname;
    return $this;
  }

  public function getLastname(): ?string
  {
    return $this->lastname;
  }
  public function setLastname(?string $lastname): self
  {
    $this->lastname = $lastname;
    return $this;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }
  public function setEmail(?string $email): self
  {
    $this->email = $email;
    return $this;
  }
  public function getRoles(): ?string
  {
    return $this->roles;
  }
  public function setRoles(?string $roles): self
  {
    $this->roles = $roles;
    return $this;
  }

  public function getPassword(): ?string
  {
    return $this->password;
  }
  public function setPassword(?string $password): self
  {
    $this->password = $password;
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

  //METHOD
  public function getByEmail(): array | string
  {
    try {
      //PREPARER LA REQUETE
      $req = $this->getBdd()->prepare('SELECT id_users, firstname, lastname, email, `password` FROM users WHERE email = ? LIMIT 1');

      //Récupération de l'email de l'objet Model
      $email = $this->getEmail();

      //BINDING DE PARAM
      $req->bindParam(1, $email, PDO::PARAM_STR);

      //EXECUTER LA REQUETE
      $req->execute();

      //RECUPERATION DE LA REPONSE
      $data = $req->fetchAll(PDO::FETCH_ASSOC);

      //RETOURNER LE TABLEAU D'UTILISATEURS
      return $data;
    } catch (EXCEPTION $error) {
      return $error->getMessage();
    }
  }
  public function add(): string
  {
    try {
      //REQUETE PREPAREE
      $req = $this->getBdd()->prepare('INSERT INTO users (firstname, lastname, email, `password`) VALUES (?,?,?,?)');

      //Récupération des données de l'objet
      $firstname = $this->getFirstname();
      $lastname = $this->getLastname();
      // $role = $this->getRoles();
      $email = $this->getEmail();
      $password = $this->getPassword();

      //BINDPARAM
      $req->bindParam(1, $firstname, PDO::PARAM_STR);
      $req->bindValue(2, $lastname, PDO::PARAM_STR);
      // $req->bindParam(3, $role, PDO::PARAM_STR);
      $req->bindParam(3, $email, PDO::PARAM_STR);
      $req->bindParam(4, $password, PDO::PARAM_STR);

      //Execution de la requête
      $req->execute();

      return "$firstname $lastname a été enregistré avec succès.";
    } catch (EXCEPTION $error) {
      return $error->getMessage();
    }
  }
}
