<?php
class User
{
    private ?int $idUser = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $email = null;
    private ?string $tel = null;
    private ?string $types = null;

    public function __construct($id = null, $n, $p, $a, $d, $t)
    {
        $this->idUser = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $a;
        $this->tel = $d;
        $this->types = $t;
    }


    public function getIdUser()
    {
        return $this->idUser;
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


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getTel()
    {
        return $this->tel;
    }


    public function setTel($tel)
    {
        $this->tel = $tel;

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
}
