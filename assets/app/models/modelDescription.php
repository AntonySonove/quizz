<?php
class ModelDescription{
    private ?PDO $bdd;


    public function __construct() {
        $this->bdd = connect();
    }

    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): self { $this->bdd = $bdd; return $this; }


    
}