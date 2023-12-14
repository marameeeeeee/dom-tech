<?php
class Abonnement
{
    private ?int $id_ab = null;
    private ?int $id_user = null;
    private ?int $types = null;
    private ?string $date_deb = null;
    private ?string $date_fin = null;
    private ?string $status = null;
    private ?string $payed = null;

    public function __construct($id = null, $n, $t, $db,$df,$s,$p)
    {
        $this->id_ab = $id;
        $this->id_user = $n;
        $this->types = $t;
        $this->date_deb = $db;
        $this->date_fin = $df;
        $this->status = $s;
        $this->payed = $p;
    }


    public function getId_ab()
    {
        return $this->id_ab;
    }


    public function getId_user()
    {
        return $this->id_user;
    }


    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }


    public function getTypes()
    {
        return $this->types;
    }


    public function setTypes($types)
    {
        $this->types = $types;

        return $this;
    }


    public function getDatedeb()
    {
        return $this->date_deb;
    }


    public function setDatedeb($date_deb)
    {
        $this->date_deb = $date_deb;

        return $this;
    }
    public function getDatefin()
    {
        return $this->date_fin;
    }


    public function setDatefin($date_fin)
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }


    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getPayed()
    {
        return $this->payed;
    }

    public function setPayed($payed)
    {
        $this->payed = $payed;

        return $this;
    }

}
