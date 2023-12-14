<?php
class feed
{
    private ?int $id_fb = null;
    private ?string $commentaire = null;
    private ?string $email= null;
   



    public function __construct($id_fb = null, $c, $e,)
    {
        $this->id_fb = $id;
        $this->commentaire= $c;
        $this->email = $e;
        

        
    }


    public function getid_fb()
    {
        return $this->id_fb;
    }


    public function getcommentaire()
    {
        return $this->commentaire;
    }


    public function setcommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }


    public function getemail()
    {
        return $this->email;
    }


    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }
  


}
