<?php
session_start();
require_once("../connexion.php");


// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
   
    header("Location: connexion.php");
    exit;
}

// Initialise le panier s'il n'existe pas encore
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();// Crée un tableau vide pour le panier
}

// Traiter l'ajout d'un article au panier s'il y a une requête POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter_panier'])) {
    // Récupérer et nettoyer les informations de l'article à ajouter
    $nom = $_POST['nom'];
    $quantite = $_POST['quantite']; 
    // Valider les données avant l'ajout au panier
    if ($nom !== "" && $quantite > 0) {
        // Ajouter l'article au panier
        $article = array(
            'nom' => $nom,
            'quantite' => $quantite
        );
        $_SESSION['panier'][] = $article;

        // Rediriger vers la page d'accueil pour afficher le contenu mis à jour du panier
        header("Location: home2.php");
        exit;
    }
}
?>
<?php

require("../connexion.php");


// Récupérer les données des images depuis la base de données
$result = $connexion->query("SELECT * FROM images");
?>


<!DOCTYPE html>
<html>
<head>
    <title>Page d'accueil</title>
</head>
<body>

<h2>Bienvenue, <?php echo htmlspecialchars($_SESSION['email']); ?> !</h2>

<a href="panier.php">Voir le panier</a>
<a href="deconnexion.php">Déconnexion</a>


<table border="1">
    <tr>
        <th>immat</th>
        <th>couleur</th>
       
        <th>image</th>
        <th></th>
    </tr>
    <?php foreach ($result as $row): ?>
        <tr>
            <td><?= $row['immat'] ?></td>
            <td><?= $row['couleur'] ?></td>
          
            <td>
                <div>
                    <img  src="data:image/jpeg;base64,<?= base64_encode($row['image_data']) ?>" alt="Image <?= $row['id'] ?>"   class="image-classe">
                </div>
            </td>
            <td><td>
            <form action="" method="post">
                    <input type="hidden" name="nom" value="<?= $row['immat'] ?>">
                    <input type="hidden" name="quantite" value="1">
                    <input type="submit" name="ajouter_panier" value="Loyer">
                </form>
   
</td>
</td></td>

        </tr>
    <?php endforeach; ?>
</table>



<style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        h2 {
            font-size: 36px;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
            background-color: #f8f9fa;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        h2:hover {
            transform: scale(1.1);
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
        form {
            display: inline-block;
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











<!-- Liens vers d'autres pages de votre site -->


</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une image</title>
   
</head>
