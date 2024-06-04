<?php require_once("partials/header.php");?>

<section id="hero" class="hero d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-12 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up">Liste des consultations</h1>
      <div data-aos="fade-up" data-aos-delay="600">
      <nav class="navbar navbar-light bg-light justify-content-between">
<a class="navbar-brand"></a>
</nav>
 <?php
          require_once('connexion/connexion.php');

          if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM consultations WHERE Id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          ?>
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                <th>Id </th>
                <th>Date_de_consultation</th>
                <th>Heure_de_consultation</th>
                <th>Id_patient</th>
                <th>Id_médecin </th>
                <th>Motif_de_consultation </th>
                <th>Diagnostic </th>
                <th>TRaitement </th>
                <th>Action</th>
                
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['Date_de_consultation']; ?></td>
                    <td><?php echo $row['Heure_de_consultation']; ?></td>
                    <td><?php echo $row['Id_patient']; ?></td>
                    <td><?php echo $row['Id_médecin']; ?></td>
                    <td><?php echo $row['Motif_de_consultation']; ?></td>
                    <td><?php echo $row['Diagnostic']; ?></td>
                    <td><?php echo $row['Traitement']; ?></td>
                  </tr>
                </tbody>
              </table>
              <a href="consultation.php" class="btn btn-secondary">Retour</a>
          <?php
            } else {
              echo "Aucun patient trouvé avec cet identifiant.";
            }
          } else {
            echo "Identifiant de patient non spécifié.";
          }
          ?>
        </div>
      </div>

    </div>
  </div>

</section>

