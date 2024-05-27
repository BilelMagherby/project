<?php
require_once('connexion/connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Id = $_POST['Id'];
    $Date_de_rendez_vous = $_POST['Date_de_rendez_vous'];
    $Heure_de_rendez_vous = $_POST['Heure_de_rendez_vous'];
    $Id_patient  = $_POST['Id_patient '];
    $Id_médecin  = $_POST['Id_médecin'];


    $sql = "UPDATE rendez_vous SET 
            Id = :id, 
            Date_de_rendez_vous = :Date_de_rendez_vous, 
            Heure_de_rendez_vous = :Heure_de_rendez_vous, 
            Id_patient  = :Id_patient , 
            Id_médecin  = :Id_médecin , 
            WHERE Id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':Id', $id);
    $stmt->bindParam(':Date_de_rendez_vous', $Date_de_consultation);
    $stmt->bindParam(':Heure_de_rendez_vous', $Heure_de_consultation);
    $stmt->bindParam(':Id_patient', $Id_patient);
    $stmt->bindParam(':Id_médecin', $Id_médecin);

    try {
        $stmt->execute();
        echo "Mise à jour réussie !";
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour : " . $e->getMessage();
    }
}
?>