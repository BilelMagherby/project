<?php require_once("partials/header.php"); ?>
<section id="hero" class="hero d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-12 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up">Liste des Patients</h1>
      <div data-aos="fade-up" data-aos-delay="600">
      <nav class="navbar navbar-light bg-light justify-content-between">
<a class="navbar-brand"></a>
</nav>
<?php
            require_once('connexion/connexion.php');

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $sql = "SELECT * FROM honoraire_médecin WHERE Id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
                    <form action="update_patients.php" method="POST">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                <th>Id </th>
                                <th>Id_médecin</th>
                                <th>Année</th>
                                <th>Mois</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="Id" value="<?php echo $row['Id']; ?>"></td>
                                    <td><input type="text" name="Id_médecin" value="<?php echo $row['Id_médecin']; ?>"></td>
                                    <td><input type="text" name="Année" value="<?php echo $row['Année']; ?>"></td>
                                    <td><input type="text" name="Mois" value="<?php echo $row['Mois']; ?>"></td>
                                    
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
<?php
                } else {
                    echo "Aucun honoraire_médecin trouvé avec cet identifiant.";
                }
            } else {
                echo "Identifiant de honoraire_médecin non spécifié.";
            }
?>
          </div>
        </div>
      </div>
    </div>
  </section>
 
