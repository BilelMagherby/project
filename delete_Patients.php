<?php require_once("partials/header.php");?>

          <?php
          require_once('connexion/connexion.php');

          if (isset($_GET['id'])) {
              $id = $_GET['id'];

              $sql = "SELECT * FROM Patients WHERE Id = :id"; 
              $stmt = $pdo->prepare($sql);
              $stmt->bindParam(':id', $id);
              $stmt->execute();

              if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  // Affichez les détails du patient dans un formulaire pour l'édition
          ?>
                  <form action="delete_confirm_Patients.php" method="POST"> 
                    <h2>Voulez-vous vraiment supprimer le patient suivant ?</h2>
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nom</th>
                          <th>Prénom</th>
                          <th>Date de naissance</th>
                          <th>Adresse</th>
                          <th>Numéro de téléphone</th>
                          <th>Adresse email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php echo $row['Nom']; ?></td>
                          <td><?php echo $row['Prénom']; ?></td>
                          <td><?php echo $row['Date_de_naissance']; ?></td>
                          <td><?php echo $row['Adresse']; ?></td>
                          <td><?php echo $row['Numéro_de_téléphone']; ?></td>
                          <td><?php echo $row['Adresse_email']; ?></td>
                        </tr>
                      </tbody>
                    </table> 
                    <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                    <button type="submit" class="btn btn-danger" name="confirm_delete">Confirmer la suppression</button> 
                    <a href="patients.php" class="btn btn-secondary">Annuler</a>
                  </form>
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

