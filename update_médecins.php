<?php
require_once('connexion/connexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Id']) && isset($_POST['Nom']) && isset($_POST['Prénom'])) {
        $nom = $_POST['Nom'];
        $prenom = $_POST['Prénom'];
        $datenaiss = $_POST['Spécialité'];
        $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : null;
        $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : null;
        

        $sql = "INSERT INTO Patients (Id, Nom, Prénom, Spécialité, Tarif_de_consultation,) 
                VALUES (:Id, :Nom, :Prénom, :Spécialité, :Tarif_de_consultation, )";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':Id', $Id);
        $stmt->bindParam(':Nom', $Nom);
        $stmt->bindParam(':Prénom', $Prénom);
        $stmt->bindParam(':Spécialité', $Spécialité);
        $stmt->bindParam(':Tarif_de_consultation', $Tarif_de_consultation);
        
        if ($stmt->execute()) {
            header("Location:médecins.php");
            exit();
        } else {
            echo "Erreur lors de l'insertion du médecins.";
        }
    } else {
        echo "Toutes les données nécessaires n'ont pas été fournies.";
    }
} else {
    echo "Accès invalide à cette page.";
}
?>
