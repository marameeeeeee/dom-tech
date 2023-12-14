<?php
class evenementtype
{
    private  ?int $id_event = null;
    private   ?string $nom = null;
    private  ?string $type_event = null;
    private  ?string $description = null;
    private  ?string $image_path = null;
   

    public function __construct($id = null, $n, $p, $a,$imagePath = null)
    {
        $this->id_event = $id;
        $this->nom = $n;
        $this->type_event= $p;
        $this->description = $a;
        $this->image_path = $imagePath;
        
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


    public function getType_event()
    {
        return $this->type_event;
    }


    public function setType_event($type_event)
    {
        $this->type_event = $type_event;

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
    public function getImagePath()
    {
        return $this->image_path;
    }

    public function setImagePath($imagePath)
    {
        $this->image_path = $imagePath;
        return $this;
    }


    
}
