<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'adresse e-mail entrée par l'utilisateur
    $email = $_POST["email"];

    // Vérifier si l'adresse e-mail existe dans la base de données
    // (code de connexion à la base de données omis pour simplifier)
    $sql = "SELECT * FROM login WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Générer un jeton de réinitialisation de mot de passe aléatoire
        $reset_token = bin2hex(random_bytes(32));

        // Mettre à jour la base de données avec le jeton de réinitialisation
        $sql = "UPDATE users SET reset_token = ?, reset_token_expiration = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $reset_token, $email);
        $stmt->execute();

        // Envoyer un e-mail de réinitialisation de mot de passe à l'utilisateur
        $reset_link = "https://example.com/reset-password.php?token=" . $reset_token;
        $subject = "Réinitialisation de votre mot de passe";
        $message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : " . $reset_link;
        mail($email, $subject, $message);

        echo "Un e-mail de réinitialisation de mot de passe a été envoyé à votre adresse.";
    } else {
        echo "Adresse e-mail non trouvée.";
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Adresse e-mail : <input type="email" name="email" required>
    <input type="submit" name="submit" value="Réinitialiser le mot de passe">
</form>