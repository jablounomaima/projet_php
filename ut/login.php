<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>

<h2>Connexion</h2>
<form action="login.php" method="post">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>

    <input type="submit" value="Se connecter">
</form>
<br><a href="inscription.php">inscription</a>

</body>
</html>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Validation des données (vous pouvez ajouter des vérifications supplémentaires si nécessaire)

    // Connexion à la base de données
    require_once("../connexion.php");

    // Préparation de la requête SQL pour vérifier les informations de connexion
    $stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE email = :email AND mot_de_passe = :mot_de_passe");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);
    $stmt->execute();

    // Vérification des informations de connexion
    if ($stmt->rowCount() > 0) {
        // Les informations de connexion sont valides, ouverture d'une session pour l'utilisateur
        $_SESSION['email'] = $email;


            // Vérification des identifiants admin
      if ($email === 'admin@admin.com' && $mot_de_passe === 'admin') {
        // Les identifiants admin sont corrects, ouverture d'une session pour l'utilisateur
        $_SESSION['email'] = $email;

        // Redirection vers la page d'accueil des administrateurs (home.php)
        header("Location: ../admin/afficherimage.php");
        exit; // Arrêt du script après la redirection
    }

        // Redirection vers une autre page (par exemple, home.php)
        header("Location: home2.php");
        exit; // Arrêt du script après la redirection
    } else {
        // Les informations de connexion sont invalides, affichage d'un message d'erreur
        echo "Email ou mot de passe incorrect.";
    }
  





}
?>
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
