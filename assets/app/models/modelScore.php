<?php
class ModelScore{
    //! attributs
    private ?int $id;
    private ?string $createAt;
    private ?bool $successfull;
    private ?ModelQuizz $quizz;
    private ?ModelUser $user;
    private ?ModelAnswer $answer;
    private ?PDO $bdd;


    //! constructor
    public function __construct(){
        $this->bdd=connect();
    }


    //! getter et setter
    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): self { $this->id = $id; return $this; }

    public function getCreateAt(): ?string { return $this->createAt; }
    public function setCreateAt(?string $createAt): self { $this->createAt = $createAt; return $this; }

    public function getSuccessfull(): ?bool { return $this->successfull; }
    public function setSuccessfull(?bool $successfull): self { $this->successfull = $successfull; return $this; }

    public function getQuizz(): ?ModelQuizz { return $this->quizz; }
    public function setQuizz(?ModelQuizz $quizz): self { $this->quizz = $quizz; return $this; }

    public function getUser(): ?ModelUser { return $this->user; }
    public function setUser(?ModelUser $user): self { $this->user = $user; return $this; }

    public function getAnswer(): ?ModelAnswer { return $this->answer; }
    public function setAnswer(?ModelAnswer $answer): self { $this->answer = $answer; return $this; }

    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): self { $this->bdd = $bdd; return $this; }
}
?>