<?php
session_start();
require_once("../connexion.php");

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: connexion.php");
    exit;
}

// Initialise le panier s'il n'existe pas encore
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

// Traiter la suppression d'un article du panier s'il y a une requête GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['supprimer'])) {
   // Récupère l'index de l'article à supprimer depuis la requête GET
    $index = $_GET['supprimer'];
    if ($index >= 0 && $index < count($_SESSION['panier'])) {
        // Utilise la fonction array_splice pour supprimer l'article du panier
        array_splice($_SESSION['panier'], $index, 1);
    }
}

// Traitement de l'insertion des données dans la base de données
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['valider'])) {

    // Insertion de l'utilisateur dans la table 'users' s'il n'existe pas encore
    $email = $_SESSION['email'];
    $role = 'Client'; // À adapter selon le rôle de l'utilisateur
    $insert_user_sql = "INSERT INTO users (email, role) VALUES ('$email', '$role')";
    $connexion->query($insert_user_sql);

    // Récupération de l'ID de l'utilisateur nouvellement inséré ou existant
    $user_id = $connexion->lastInsertId();

    // Insertion des détails de la commande dans la table 'commands'
    foreach ($_SESSION['panier'] as $article) {
        $command_details = $article['nom'] . ' - Quantité : ' . $article['quantite'];
        $insert_command_sql = "INSERT INTO commands (user_id, command_details) VALUES ('$user_id', '$command_details')";
        $connexion->query($insert_command_sql);
    }

    // Fermer la connexion à la base de données
    $connexion = null;

    // Vider le panier après validation de la commande
    $_SESSION['panier'] = array();

    // Rediriger vers une page de confirmation ou autre
    header("Location: confirmation.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panier</title>
</head>
<body>

<h2>Votre panier</h2>

<table border="1">
    <tr>
        <th>Voiture</th>
        <th>Quantité</th>
        <th>Action</th>
    </tr>
    <?php foreach ($_SESSION['panier'] as $index => $article): ?>
        <tr>
            <td><?= $article['nom'] ?></td>
            <td><?= $article['quantite'] ?></td>
            <td><a href="panier.php?supprimer=<?= $index ?>">Supprimer</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<form method="post">
    <button type="submit" name="valider">Valider</button>
</form>
<p><a href="home2.php">Retour à la page d'accueil</a></p>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une image</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="file"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
