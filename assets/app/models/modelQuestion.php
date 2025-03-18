<?

//! attributs
class ModelQuestion
{
    private ?int $id;
    private ?string $title;
    private ?string $description;
    private ?int $value;
    private ?ModelAnswer $answers;
    private ?PDO $bdd;


    //! constructor
    public function __construct()
    {
        $this->bdd = connect();
    }



    //! getter et setter
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
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

    public function getValue(): ?int
    {
        return $this->value;
    }
    public function setValue(?int $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function getAnswers(): ?ModelAnswer
    {
        return $this->answers;
    }
    public function setAnswers(?ModelAnswer $answers): self
    {
        $this->answers = $answers;
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
