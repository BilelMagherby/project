<?php  
require_once('connexion/connexion.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $sql = "DELETE FROM Patients WHERE Id = :id"; 
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        // Exécutez la requête
        if ($stmt->execute()) { 
            header("Location: patients.php");
            exit(); 
        } else { 
            echo "Erreur lors de la suppression du patient."; 
        }
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
    }
} else { 
    echo "L'identifiant du patient n'est pas spécifié.";
}
?>
