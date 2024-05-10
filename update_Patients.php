<?php
require_once('connexion/connexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['datenaiss'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $datenaiss = $_POST['datenaiss'];
        $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : null;
        $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;

        $sql = "INSERT INTO Patients (Nom, Prénom, Date_de_naissance, Adresse, Numéro_de_téléphone, Adresse_email) 
                VALUES (:nom, :prenom, :datenaiss, :adresse, :telephone, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':datenaiss', $datenaiss);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':email', $email);
        if ($stmt->execute()) {
            header("Location:patients.php");
            exit();
        } else {
            echo "Erreur lors de l'insertion du patient.";
        }
    } else {
        echo "Toutes les données nécessaires n'ont pas été fournies.";
    }
} else {
    echo "Accès invalide à cette page.";
}
?>
