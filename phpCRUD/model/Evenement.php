<?php

class Evenement
{
    private ?int $id = null;
    private ?string $nom_event = null;
    private ?string $adresse = null;
    private ?string $temps = null;
    private ?string $type = null;
  //  private ?string $id_event = null;
   // private ?string $typec = null;
    

    public function __construct($id = null, $nom_event, $adresse, $temps, $type)//, $typec )
    {
        $this->id = $id;
        $this->nom_event = $nom_event;
        $this->adresse = $adresse;
        $this->temps = $temps;
        $this->type = $type;
       // $this->id_event = $id_event;
       
      //  $this->typec = $typec;
      
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNomEvent()
    {
        return $this->nom_event;
    }

    public function setNomEvent($nom_event)
    {
        $this->nom_event = $nom_event;
        return $this;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getTemps()
    {
        return $this->temps;
    }

    public function setTemps($temps)
    {
        $this->temps = $temps;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type= $type;
        return $this;
    }

   /*
    public function getIdEvent()
    {
        return $this->id_event;
    }

    public function setIdEvent($id_event)
    {
        $this->id_event = $id_eventc;
        return $this;
    }*/
}
