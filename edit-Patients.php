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
                    <form action="update_patients.php" method="POST">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
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
                                    <td><input type="text" name="id" value="<?php echo $row['Nom']; ?>"></td>
                                    <td><input type="text" name="nom" value="<?php echo $row['Nom']; ?>"></td>
                                    <td><input type="text" name="prenom" value="<?php echo $row['Prénom']; ?>"></td>
                                    <td><input type="text" name="datenaiss" value="<?php echo $row['Date_de_naissance']; ?>"></td>
                                    <td><input type="text" name="adresse" value="<?php echo $row['Adresse']; ?>"></td>
                                    <td><input type="text" name="telephone" value="<?php echo $row['Numéro_de_téléphone']; ?>"></td>
                                    <td><input type="text" name="email" value="<?php echo $row['Adresse_email']; ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
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
 
