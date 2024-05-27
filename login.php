<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>connexion</title>
   <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
<div class="form-container">
   <form action="ajout_login.php" method="post">
      <h3>login</h3>
      <input type="email" name="email" required placeholder="entez votre email">
      <input type="password" name="password" required placeholder="entez votre password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p><a href="inscription.php">Créer un compte</a></p>
      <p><a href="forget_password.php">Mot de passe oublié</a></p>

   </form>

</div>

</body>
</html>