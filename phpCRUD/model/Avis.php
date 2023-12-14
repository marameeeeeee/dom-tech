<?php

class Avis
{
    private ?int $id = null;
    private ?string $commentaires = null;
    private ?float $note = null;

    public function __construct($commentaires, $note)
    {
        $this->commentaires = $commentaires;
        $this->note = $note;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCommentaires()
    {
        return $this->commentaires;
    }

    public function setCommentaires($commentaires)
    {
        $this->commentaires = $commentaires;
        return $this;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }
}

?>