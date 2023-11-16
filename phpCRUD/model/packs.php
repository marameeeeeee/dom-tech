<?php
class pack
{
    private ?int $idpack = null;
    private ?string $nom = null;
    private ?int $price = null;
    private ?string $types = null;
    private ?string $duration = null;

    public function __construct($id = null, $n, $p, $t, $d)
    {
        $this->idpack = $id;
        $this->nom = $n;
        $this->price = $p;
        $this->types = $t;
        $this->duration = $d;
    }


    public function getIdpack()
    {
        return $this->idpack;
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


    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }


    public function getTypes()
    {
        return $this->types;
    }


    public function setTypes($types)
    {
        $this->type = $type;

        return $this;
    }


    public function getDuration()
    {
        return $this->duration;
    }


    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }
}
