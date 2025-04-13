<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>

<h2>Connexion</h2>
<form action="home.php" method="post">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>

    <input type="submit" value="Se connecter">
</form>

<?php
// Vérification si la méthode de requête est POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    require_once("../connexion.php");

    // Inclusion de la classe User
    require_once("../User.php");

    // Création d'une instance de la classe User
    $user = new User($connexion);

    // Tentative de connexion
    if ($user->login($_POST['email'], $_POST['mot_de_passe'])) {
        // Démarrage de la session
        session_start();
        $_SESSION['email'] = $_POST['email'];

        // Redirection vers la page d'accueil
        header("Location: home.php");
        exit; // Arrêt du script après la redirection
    } else {
        // Affichage d'un message d'erreur si les informations de connexion sont incorrectes
        echo "Email ou mot de passe incorrect.";
    }
}
?>
</body>
</html>