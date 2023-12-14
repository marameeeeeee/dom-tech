<?php
class rendez_vous
{
    private ?int $id_rv = null;
    private ?string $date = null;
    private ?string $lieu = null;
    private ?string $etat = null;

   



    public function __construct($id_rv = null, $d, $l,$e)
    {
        $this->id_rv = $id;
        $this->date= $d;
        $this->lieu = $l;
        $this->etat = $e;

        

        
    }


    public function getid_rv()
    {
        return $this->id_rv;
    }


    public function getdate()
    {
        return $this->date;
    }


    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }


    public function getlieu()
    {
        return $this->lieu;
    }


    public function setlieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }
    public function getetat()
    {
        return $this->etat;
    }


    public function setetat($lieu)
    {
        $this->etat = $etat;

        return $this;
    }
  


}
