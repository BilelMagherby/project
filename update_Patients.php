<?php
require_once('connexion/connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Id = $_POST['Id'];
    $Date_de_consultation = $_POST['Date_de_consultation'];
    $Heure_de_consultation = $_POST['Heure_de_consultation'];
    $Id_patient = $_POST['Id_patient '];
    $Id_médecin = $_POST['Id_médecin'];
    $Motif_de_consultation = $_POST['Motif_de_consultation'];
    $Diagnostic = $_POST['Diagnostic'];
    $Traitement = $_POST['Traitement'];

    $sql = "UPDATE Patients SET 
            Id = :id, 
            Date_de_consultation = :Date_de_consultation, 
            Heure_de_consultation = :Heure_de_consultation, 
            Id_patient = :Id_patient, 
            Id_médecin = :Id_médecin, 
            Motif_de_consultation = :Motif_de_consultation,
            Diagnostic = :Diagnostic,
            Traitement = :Traitement,

            WHERE Id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':Id', $id);
    $stmt->bindParam(':Date_de_consultation', $Date_de_consultation);
    $stmt->bindParam(':Heure_de_consultation', $Heure_de_consultation);
    $stmt->bindParam(':Id_patient', $Id_patient);
    $stmt->bindParam(':Id_médecin', $Id_médecin);
    $stmt->bindParam(':Motif_de_consultation', $Motif_de_consultation);
    $stmt->bindParam(':Traitement', $Traitement);

    try {
        $stmt->execute();
        echo "Mise à jour réussie !";
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour : " . $e->getMessage();
    }
}
?>