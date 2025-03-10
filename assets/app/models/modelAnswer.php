<?php
class ModelAnswer{

    //! attributs
    private ?int $id;
    private ?string $text;
    private ?bool $valid;
    private?PDO $bdd;

    //! constructor
    public function __construct(){
        $this->bdd=connect();
    }

    //! getter et setter
    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): self { $this->id = $id; return $this; }

    public function getText(): ?string { return $this->text; }
    public function setText(?string $text): self { $this->text = $text; return $this; }

    public function getValid(): ?bool { return $this->valid; }
    public function setValid(?bool $valid): self { $this->valid = $valid; return $this; }

    public function getBdd(){ return $this->bdd; }
    public function setBdd($bdd): self { $this->bdd = $bdd; return $this; }
}
?>