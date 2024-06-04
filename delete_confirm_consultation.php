<?php  
require_once('connexion/connexion.php');

if (isset($_POST['Id'])) {
    $id = $_POST['Id'];

    try {
        $sql = "DELETE FROM consultations WHERE Id = :Id"; 
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':Id', $Id);
        
        // Exécutez la requête
        if ($stmt->execute()) { 
            header("Location: consultation.php");
            exit(); 
        } else { 
            echo "Erreur lors de la suppression du consultation."; 
        }
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
    }
} else { 
    echo "L'identifiant du consultation n'est pas spécifié.";
}
?>
