<?php
class pack
{
    private ?int $id_pack = null;
    private ?string $types = null;
    private ?string $nom = null;
    private ?int $prix = null;
    private ?string $description = null;
    private ?string $image = null;

    public function __construct($id = null, $t, $n, $p, $d,$i)
    {
        $this->id_pack = $id;
        $this->types = $t;
        $this->nom = $n;
        $this->prix = $p;
        $this->description = $d;
        $this->image = $i;
    }


    public function getIdpack()
    {
        return $this->id_pack;
    }

    public function getTypes()
    {
        return $this->types;
    }


    public function setTypes($types)
    {
        $this->type = $types;

        return $this;
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


    public function getPrix()
    {
        return $this->prix;
    }


    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

}
