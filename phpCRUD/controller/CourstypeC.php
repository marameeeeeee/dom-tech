<?php

require_once '../config.php';

class CourstypeC
{
    public function listCourstypes()
    {
        $sql = "SELECT * FROM cours";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteCourstype($id)
    {
        echo "Deleting courstype with ID: " . $id;

        $sql = "DELETE FROM cours WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function searchByNomDeCours($nom_de_cours)
    {
        $sql = "SELECT * FROM cours WHERE nom_de_cours LIKE :nom_de_cours";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':nom_de_cours', '%' . $nom_de_cours . '%', PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function addCourstype($courstype)
    {
        $sql = "INSERT INTO cours (id, nom_de_cours, type, image_path)  
        VALUES (NULL, :nom_de_cours, :type, :image_path)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_de_cours' => $courstype->getNom_de_cours(),
                'type' => $courstype->getType(),
                'image_path' => $courstype->getImagePath(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function showcourstype($id)
    {
        $sql = "SELECT * FROM cours WHERE id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $courstype = $query->fetch();
            return $courstype;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updateCourstype($courstype, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE cours SET 
                    nom_de_cours = :nom_de_cours, 
                    type = :type
                  
                WHERE id = :id'
            );

            $query->execute([                'id' => $id,
                'nom_de_cours' => $courstype->getNom_de_cours(),
                'type' => $courstype->getType(),
        ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function getComments($courseId)
    {
        $sql = "SELECT * FROM comments WHERE course_id = :course_id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':course_id', $courseId, PDO::PARAM_INT);
            $query->execute();
            $comments = $query->fetchAll(PDO::FETCH_ASSOC);
            return $comments;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function getUserRating($courseId, $userId)
    {
        $sql = "SELECT * FROM ratings WHERE course_id = :course_id AND user_id = :user_id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':course_id', $courseId, PDO::PARAM_INT);
            $query->bindValue(':user_id', $userId, PDO::PARAM_INT);
            $query->execute();
            $rating = $query->fetch(PDO::FETCH_ASSOC);
            return $rating;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function addComment($courseId, $commentContent)
    {
        $sql = "INSERT INTO comments (course_id, content) VALUES (:course_id, :content)";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':course_id', $courseId, PDO::PARAM_INT);
            $query->bindValue(':content', $commentContent, PDO::PARAM_STR);
            $query->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function deleteComment($commentId)
    {
        // Ensure that $commentId is an integer
        $commentId = intval($commentId);

        // SQL query to delete the comment
        $query = "DELETE FROM comments WHERE id = :comment_id";

        // Use prepared statement to prevent SQL injection
        $db = config::getConnexion();
        $statement = $db->prepare($query);
        $statement->bindParam(':comment_id', $commentId, PDO::PARAM_INT);

        try {
            // Execute the query
            $statement->execute();
        } catch (PDOException $e) {
            // Handle any potential errors
            echo "Error deleting comment: " . $e->getMessage();
        }
    }
    public function addRating($courseId, $ratingValue)
    {
        $sql = "INSERT INTO ratings (course_id, user_id, rating) VALUES (:course_id, :user_id, :rating)";
        $db = config::getConnexion();

        try {
            // You need to replace $userId with the actual user ID
            $userId = 1; // Replace this with how you get the user ID

            $query = $db->prepare($sql);
            $query->bindValue(':course_id', $courseId, PDO::PARAM_INT);
            $query->bindValue(':user_id', $userId, PDO::PARAM_INT);
            $query->bindValue(':rating', $ratingValue, PDO::PARAM_INT);
            $query->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
