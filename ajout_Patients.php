<?php require_once("partials/header.php"); ?>
<?php
                    require_once('connexion/connexion.php');

                    $nom = $prenom = $datenaiss = $adresse = $telephone = $email = "";

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $datenaiss = $_POST['datenaiss'];
                        $adresse = $_POST['adresse'];
                        $telephone = $_POST['telephone'];
                        $email = $_POST['email'];

                        $sql = "INSERT INTO Patients (Nom, Prénom, Date_de_naissance, Adresse, Numéro_de_téléphone, Adresse_email) 
                        VALUES (:nom, :prenom, :datenaiss, :adresse, :telephone, :email)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':nom', $nom);
                        $stmt->bindParam(':prenom', $prenom);
                        $stmt->bindParam(':datenaiss', $datenaiss);
                        $stmt->bindParam(':adresse', $adresse);
                        $stmt->bindParam(':telephone', $telephone);
                        $stmt->bindParam(':email', $email);

                        // Exécuter la requête
                        if ($stmt->execute()) {
                            // Rediriger vers une page de confirmation ou vers la liste des patients
                            // header("Location: patients.php");
                            // exit();
                        } else {
                            echo "Erreur lors de l'ajout du patient.";
                        }
                    }
                    ?>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                                    <td><input type="text" id="nom" name="nom" required></td>
                                    <td><input type="text" id="prenom" name="prenom" required></td>
                                    <td><input type="date" id="datenaiss" name="datenaiss" required></td>
                                    <td><input type="text" id="adresse" name="adresse"></td>
                                    <td><input type="text" id="telephone" name="telephone"></td>
                                    <td><input type="email" id="email" name="email"></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <a href="patients.php" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


