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
                    <form action="update_consultation.php" method="POST">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                <th>Id </th>
                                <th>Date_de_consultation</th>
                                <th>Heure_de_consultation</th>
                                <th>Id_patient</th>
                                <th>Id_médecin </th>
                                <th>Motif_de_consultation </th>
                                
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    <td><input type="text" name="Id" value="<?php echo $row['Id']; ?>"></td>
                                    <td><input type="date" name="Date_de_consultation" value="<?php echo $row['Date_de_consultation']; ?>"></td>
<td><input type="time" name="Heure_de_consultation" value="<?php echo $row['Heure_de_consultation']; ?>"></td>
                                    <td><input type="text" name="Id_patient" value="<?php echo $row['Id_patient']; ?>"></td>
                                    <td><input type="text" name="Id_médecin" value="<?php echo $row['Id_médecin']; ?>"></td>
                                    <td><input type="text" name="Motif_de_consultation" value="<?php echo $row['Motif_de_consultation']; ?>"></td>
                                    
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
<?php
                } else {
                    echo "Aucun consultation trouvé avec cet identifiant.";
                }
            } else {
                echo "Identifiant de consultation non spécifié.";
            }
?>
          </div>
        </div>
      </div>
    </div>
  </section>
 
