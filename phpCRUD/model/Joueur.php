<?php
class Joueur
{
    private ?int $id_event = null;
    private ?string $nom = null;
    private ?string $type = null;
    private ?string $description = null;
   

    public function __construct($id = null, $n, $p, $a)
    {
        $this->id_event = $id;
        $this->nom = $n;
        $this->type= $p;
        $this->description = $a;
        
    }


    public function getid_event()
    {
        return $this->id_event;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function gettype()
    {
        return $this->type;
    }


    public function settype($type)
    {
        $this->type = $type;

        return $this;
    }


    public function getdescription()
    {
        return $this->description;
    }


    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }


    
}
