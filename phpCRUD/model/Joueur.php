<?php
class type
{
    private ?int $id_type = null;
    private ?string $titre = null;
    private ?string $descriptions = null;
   

    public function __construct($id = null, $n, $p)
    {
        $this->id_type = $id;
        $this->titre = $n;
        $this->descriptions = $p;
        
    }


    public function getid_type()
    {
        return $this->id_type;
    }


    public function gettitre()
    {
        return $this->titre;
    }


    public function settitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }


    public function getdescriptions()
    {
        return $this->descriptions;
    }


    public function setdescriptions($descriptions)
    {
        $this->descriptions = $descriptions;

        return $this;
    }


}
