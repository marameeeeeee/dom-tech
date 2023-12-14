<?php

require '../config.php';

class PackC
{

    public function ListPack()
    {
        $sql = "SELECT * FROM pack";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function DeletePack($ide)
    {
        $sql = "DELETE FROM pack WHERE id_pack = :id_pack";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_pack', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function AddPack($pack)
{ 
    $targetDirectory = "../uploads/"; // Directory where images will be stored
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    // Check if the file is an allowed image type
    if (in_array($imageFileType, $allowedExtensions)) {
        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file ". basename($_FILES["image"]["name"]). " has been uploaded.";
            $image= $targetFile; // Save the image path to store in the database
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    // Database insertion logic
    $sql = "INSERT INTO pack (types, nom, prix, description, image) 
            VALUES (:types, :nom, :prix, :description, :image)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'types' => $pack->getTypes(),
            'nom' => $pack->getNom(),
            'prix' => $pack->getPrix(),
            'description' => $pack->getDescription(),
            'image' => $pack->getImage() // Use the image path in the database query
        ]);
        echo "Pack added successfully.";
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}



    function showPack($id_pack)
    {
        $sql ="SELECT * from pack where id_pack = $id_pack";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $pack = $query->fetch();
            return $pack;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function UpdatePack($pack, $id)
{
    $targetDirectory = "uploads/"; // Directory where images will be stored
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    // Check if a new image file is uploaded
    if (!empty($_FILES["image"]["name"])) {
        if (in_array($imageFileType, $allowedExtensions)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                echo "The file ". basename($_FILES["image"]["name"]). " has been uploaded.";
                $image = $targetFile; // Save the new image path
            } else {
                echo "Sorry, there was an error uploading your file.";
                return; // Exit the function if there's an error in file upload
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            return; // Exit the function if the file type is not allowed
        }
    } else {
        // If no new image uploaded, retain the existing image path
        $image = $_POST['existing_image'];
    }

    // Database update logic
    $sql = 'UPDATE pack SET 
                types = :types, 
                nom = :nom, 
                prix = :prix, 
                description = :description, 
                image = :image
            WHERE id_pack = :id_pack';

    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'id_pack' => $id,
            'types' => $pack->getTypes(),
            'nom' => $pack->getNom(),
            'prix' => $pack->getPrix(),
            'description' => $pack->getDescription(),
            'image' => $image // Use the new or existing image path
        ]);
        echo $query->rowCount() . " records updated successfully.";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}



}
