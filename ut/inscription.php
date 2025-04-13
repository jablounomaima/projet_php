<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>

<h2>Inscription</h2>
<form action="inscription.php" method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>

    <input type="submit" value="S'inscrire">

</form>


<?php
require_once("../connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Préparation de la requête SQL avec des paramètres pour l'insertion sécurisée
    $stmt = $connexion->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (:nom, :email, :mot_de_passe)");
    
    // Liaison des valeurs des paramètres
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);
    
    // Exécution de la requête préparée
    if ($stmt->execute()) {
        echo "L'utilisateur a été ajouté avec succès.";
       header("location:login.php");
    } else {
        echo "Une erreur s'est produite lors de l'ajout de l'utilisateur.";
    }
} 
?>

</body>
</html>

<?php

/*

require_once("../connexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données soumises par le formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    // Vérifier si la clé "mot_de_passe" existe dans $_POST avant de l'utiliser
    if(isset($_POST['mot_de_passe'])) {
        $mot_de_passe = $_POST['mot_de_passe'];

        // Valider les données (exemple simple)
        if (empty($nom) || empty($email) || empty($mot_de_passe)) {
            echo "Tous les champs sont requis.";
        } 

            // Requête d'insertion des données dans la table des utilisateurs
            $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES ('$nom', '$email', '$mot_de_passe')";

            if ($mysqli->query($sql) === TRUE) {
                echo "Inscription réussie !";
            } else {
                echo "Erreur lors de l'inscription: " . $mysqli->error;
            }

            // Fermer la connexion à la base de données
            $mysqli->close();
        }
    } else {
        echo "Le champ mot_de_passe n'a pas été envoyé.";
    }
*/
?>
<br><br>
<a href="conx.php">connexion</a>

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
