<?php
class ModelUser
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

    public function getfirstname(): ?string
    {
        return $this->firstname;
    }
    public function setfirstname(?string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getlastname(): ?string
    {
        return $this->lastname;
    }
    public function setlastname(?string $lastname): self
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


    public function add(): string
    {
        try {
            //REQUETE PREPAREE
            $req = $this->getBdd()->prepare('INSERT INTO users (firstname, lastname, roles, email, password) VALUES (?,?,?,?,?)');

            //Récupération des données de l'objet
            $firstname = $this->getfirstname();
            $lastname = $this->getlastname();
            $email = $this->getEmail();
            $roles = $this->getRoles();
            $password = $this->getPassword();

            //BINDPARAM
            $req->bindParam(1, $firstname, PDO::PARAM_STR);
            $req->bindParam(2, $lastname, PDO::PARAM_STR);
            $req->bindParam(2, $email, PDO::PARAM_STR);
            $req->bindParam(3, $roles, PDO::PARAM_STR);
            $req->bindParam(3, $password, PDO::PARAM_STR);


            //Execution de la requête
            $req->execute();

            return "$firstname a été enregistré avec succès.";
        } catch (EXCEPTION $error) {
            return $error->getMessage();
        }
    }
}