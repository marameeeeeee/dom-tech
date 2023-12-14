<?php
class ins
{
    private ?int $id_in = null;
    private ?string $nom= null;
    private ?string $tp = null;
    private ?string $piece_jointe = null;
    private ?int $like = null; // Nouvelle propriété
    private ?int $dislike = null; // Nouvelle propriété
    
   

    public function __construct($id = null, $n, $p, $piece_jointe = null, $like = null, $dislike = null)
    {
        $this->id_in = $id;
        $this->nom = $n;
        $this->tp = $p;
        $this->piece_jointe = $piece_jointe;
        $this->like = $like;
        $this->dislike = $dislike;
    }


    public function getid_in()
    {
        return $this->id_in;
    }


    public function getnom()
    {
        return $this->nom;
    }


    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function gettp()
    {
        return $this->tp;
    }


    public function settp($tp)
    {
        $this->tp = $tp;

        return $this;
    }

    public function getPieceJointe()
    {
        return $this->piece_jointe;
    }

    public function setPieceJointe($piece_jointe)
    {
        $this->piece_jointe = $piece_jointe;
        return $this;
    }
    public function getLike()
    {
        return $this->like;
    }

    public function setLike($like)
    {
        $this->like = $like;
        return $this;
    }

    public function getDislike()
    {
        return $this->dislike;
    }

    public function setDislike($dislike)
    {
        $this->dislike = $dislike;
        return $this;
    }
    
}
?>
