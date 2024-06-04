<?php require_once("partials/header.php");?>

<section id="hero" class="hero d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-12 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up">Ajouter Des consultations</h1>
      <div data-aos="fade-up" data-aos-delay="600">
      <nav class="navbar navbar-light bg-light justify-content-between">
<a class="navbar-brand"></a>
</nav>
<?php
require_once('connexion/connexion.php');

$Id = $Date_de_consultation = $Heure_de_consultation = $Id_patient  = $Id_médecin  = $Motif_de_consultation = $Diagnostic = $Traitement	= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Id = $_POST['Id'];
    $Date_de_consultation = $_POST['Date_de_consultation'];
    $Heure_de_consultation = $_POST['Heure_de_consultation'];
    $Id_patient = $_POST['Id_patient'];
    $Id_médecin = $_POST['Id_médecin'];
    $Motif_de_consultation = $_POST['Motif_de_consultation'];
    $Diagnostic = $_POST['Diagnostic'];
    $Traietement = $_POST['Traitement'];

    $sql = "INSERT INTO consultations (Id, Date_de_consultation, Heure_de_consultation, Id_patient, Idèmédecin, Motif_de_consultation, Diagnostic, Traitement) 
    VALUES (:Id, :Nom, :Prénom, :Spécialité, :Tarif_de_consultation)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':Id', $Id);
    $stmt->bindParam(':Date_de_consultation', $Date_de_consultation);
    $stmt->bindParam(':Heure_de_consultation', $Heure_de_consultation);
    $stmt->bindParam(':Id_patient', $Id_patient);
    $stmt->bindParam(':Id_médecin',$Id_médecin );
    $stmt->bindParam(':Motif_de_consultation',$Motif_de_consultation );
    $stmt->bindParam(':DIagnostic',$Diagnostic );
    $stmt->bindParam(':Traitement',$Traitement );

    // Exécuter la requête
    if ($stmt->execute()) {
        // Rediriger vers une page de confirmation ou vers la liste des médecins
        // header("Location: médecins.php");
        // exit();
    } else {
        echo "Erreur lors de l'ajout consultation.";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <table class="table table-striped table-bordered">
        <thead>
                <th>Id </th>
                <th>Date_de_consultation</th>
                <th>Heure_de_consultation</th>
                <th>Id_patient</th>
                <th>Id_médecin </th>
                <th>Motif_de_consultation </th>
                <th>Diagnostic </th>
                <th>Traitement</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" id="Id" name="Id" required></td>
                <td><input type="date" id="Date_de_consultation" name="Nom" required></td>
                <td><input type="time" id="Heure_de_consultation" name="Prénom" required></td>
                <td><input type="text" id="Id_patient" name="Spécialité"></td>
                <td><input type="text" id="Motif_de_consultation" name="Tarif_de_consultation"></td>
                <td><input type="text" id="Diagnostic" name="Diagnostic"></td>
                <td><input type="text" id="Traitement" name="Traitement"></td>

            </tr>
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Ajouter</button>
    <a href="consultation.php" class="btn btn-secondary">Annuler</a>
</form>
      </div> 
    </div>
    </div>
    </div>
  </div>

</section><!-- End Hero -->
