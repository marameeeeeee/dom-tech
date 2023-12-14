<?php

require '../config.php';

class UserC
{

    public function listUsers()
    {
        $sql = "SELECT * FROM tb_user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteUser($id)
    {
        $sql = "DELETE FROM tb_user WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addUser($user)
    {
        $nom = $user->getNom();
        $prenom = $user->getPrenom();
        $email = $user->getEmail();
        $tel = $user->getTel();
        $types = $user->getTypes();


        
        // Valider l'entrée - autoriser uniquement des lettres
        if (!preg_match("/^[a-zA-Z]+$/", $nom)) {
            echo "Erreur : Le titre doit contenir uniquement des lettres.";
            return;
        }
        if (!preg_match("/^[a-zA-Z]+$/", $prenom)) {
            echo "Erreur : Le titre doit contenir uniquement des lettres.";
         echo "prenom incorrecte !!";
            return;
        }
       
        if (ctype_digit(substr($email, 0, 1))) {
            echo "Erreur : La description ne doit pas commencer par un chiffre.";
            return;
        }
    
       
        $sql = "INSERT INTO tb_user
        VALUES (NULL, :nom, :prenom, :email, :tel, :types)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'email' => $user->getEmail(),
                'tel' => $user->getTel(),
                'types' => $user->getTypes(),
            ]);

        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showUser($id)
{
    $sql = "SELECT * FROM tb_user WHERE id = $id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // Create a User object and pass the fetched data to its constructor
        return new User(
            $user['id'],
            $user['nom'],
            $user['prenom'],
            $user['email'],
            $user['tel'],
            $user['types']
        );
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}


    function updateUser($user, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE tb_user SET 
                    nom = :nom, 
                    prenom = :prenom,
                    email = :email,
                    tel = :tel,
                    types = :types
                WHERE id = :id'
            );

            $query->execute([
                'id' => $id,
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'email' => $user->getEmail(),
                'tel' => $user->getTel(),
                'types' => $user->getTypes(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}



