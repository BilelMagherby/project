<?php require_once("partials/header.php"); ?>
 <?php
          require_once('connexion/connexion.php');

          if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM Patients WHERE Id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          ?>
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
              <a href="patients.php" class="btn btn-secondary">Retour</a>
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

