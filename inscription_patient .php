<?php
require_once('connexion/connexion.php');
require_once('connexion/config.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Id = $_POST['Id'];
  $Nom = $_POST['Nom'];
  $Prénom = $_POST['Prénom'];
  $Date_de_naissance = $_POST['Date_de_naissance'];
  $Adresse = $_POST['Adresse'];
  $Adresse_email = $_POST['Adresse_email'];
  $Numéro_de_téléphone = $_POST['Numéro_de_téléphone'];

  $stmt = $pdo->prepare("SELECT * FROM patients WHERE Adresse_email = :Adresse_email");
  $stmt->execute([':Adresse_email' => $Adresse_email]);
  $user = $stmt->fetch();

  if ($user) {
      echo 'cet email est deja utilisé';
  } else {
      $stmt = $pdo->prepare('INSERT INTO patients (Id, Nom, Prénom, Date_de_naissance, Adresse, Adresse_email, Numéro_de_téléphone) VALUES (:Id, :Nom, :Prénom, :Date_de_naissance, :Adresse, :Adresse_email, :Numéro_de_téléphone)');
      $stmt->execute([
          ':Id' => $Id,
          ':Nom' => $Nom,
          ':Prénom' => $Prénom,
          ':Date_de_naissance' => $Date_de_naissance,
          ':Adresse' => $Adresse,
          ':Adresse_email' => $Adresse_email,
          ':Numéro_de_téléphone' => $Numéro_de_téléphone
      ]);
      header('Location: login.php');
      exit();
  }
}
    

?>

<title>Inscription Patient</title>
<link rel="stylesheet" href="assets/css/register.css">

<body>
    <div class="form-container">
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <h3>Inscription</h3>
          <input type="text" name="Id" required placeholder="Entrez votre Id">
          <input type="text" name="Nom" required placeholder="Entrez votre Nom">
          <input type="text" name="Prénom" required placeholder="Entrez votre Prénom">
          <input type="date" name="Date_de_naissance" required placeholder="Entrez votre Date_de_naissance">
          <input type="text" name="Adresse" required placeholder="Entrez votre Adresse">
          <input type="text" name="Numéro_de_téléphone" required placeholder="Entrez votre Numéro_de_téléphone">
          <input type="email" name="Adresse_email" required placeholder="Entrez votre Adresse_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
          
          <input type="submit" name="submit" value="S'inscrire" class="form-btn">
          <p><a href="login.php">Déjà un compte? Connectez-vous</a></p>
       </form>
    </div>
</body>
</html>