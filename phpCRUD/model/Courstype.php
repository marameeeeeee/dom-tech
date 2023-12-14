<?php

class Courstype
{
    private ?int $id = null;
    private ?string $nom_de_cours = null;
    private ?string $type = null;
    private ?string $imagePath = null;

    public function __construct($id = null, $nom = null, $type = null, $imagePath = null)
    {
        $this->id = $id;
        $this->nom_de_cours = $nom;
        $this->type = $type;
        $this->imagePath= $imagePath;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom_de_cours()
    {
        return $this->nom_de_cours;
    }

    public function setNom_de_cours($nom_de_cours)
    {
        $this->nom_de_cours = $nom_de_cours;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
        return $this;
    }

   
}
?>
