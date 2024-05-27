<?php
require_once('connexion/connexion.php');

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si toutes les données nécessaires sont présentes
    if (isset($_POST['Id']) && isset($_POST['Date_de_consultation']) && isset($_POST['Heure_de_consultation']) && isset($_POST['Id_patient']) && isset($_POST['Id_médecin']) && isset($_POST['Motif_de_consultation'] && isset($_POST['Traitement']))) {
        // Récupère les données du formulaire
        $Id = $_POST['Id'];
        $Date_de_consultation = $_POST['Date_de_consultation'];
        $Heure_de_consultation = $_POST['Heure_de_consultation'];
        $Id_patient = $_POST['Id_patient'];
        $Id_médecin = $_POST['Id_médecin'];
        $Motif_de_consultation = $_POST['Motif_de_consultation'];
        $Traitement = $_POST['Traitement'];


        // Prépare la requête SQL de mise à jour
        $sql = "UPDATE consultations SET Date_de_consultation = :Date_de_consultation, Heure_de_consultation = :Heure_de_consultation, Id_patient = :Id_patient, Id_médecin = :Id_médecin, Motif_de_consultation = :Motif_de_consultation , Traitement = :Traitement WHERE Id = :Id";
       
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':Id', $id);
    $stmt->bindParam(':Date_de_consultation', $Date_de_consultation);
    $stmt->bindParam(':Heure_de_consultation', $Heure_de_consultation);
    $stmt->bindParam(':Id_patient', $Id_patient);
    $stmt->bindParam(':Id_médecin', $Id_médecin);
    $stmt->bindParam(':Motif_de_consultation', $Motif_de_consultation);
    $stmt->bindParam(':Traitement', $Traitement);

        // Exécute la requête
        if ($stmt->execute()) {
            // Redirige vers une page de succès
            header("Location:etudiants.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de l'étudiant.";
        }
    } else {
        echo "Toutes les données nécessaires n'ont pas été fournies.";
    }
} else {
    echo "Accès invalide à cette page.";
}
