<?php
require_once("../connexion.php");

// Récupérer les données des images depuis la base de données
$result = $connexion->query("SELECT * FROM images");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les images</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .image-classe {
            max-width: 200px;
            max-height: 200px;
            display: block;
            margin: 0 auto;
        }
        .btn {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
        /* Style des liens */
/* Style des liens boutons */
.button-link {
    display: inline-block;
    padding: 8px 16px;
    margin: 5px;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    color: white;
    background-color: #007bff;
    border: 1px solid #007bff;
    cursor: pointer;
    transition: background-color 0.3s, border-color 0.3s, color 0.3s;
}

.button-link:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

/* Style des liens boutons pour les séparer par un pipe (|) */
.button-link + .button-link:before {
    content: " | ";
    color: #777;
    margin: 0 5px;
}
 
    </style>
</head>
<body>
    <div class="container">
    <a href="liste_de_commande.php" class="btn">Liste de commande</a>
    <a href="ajouterimage.php" class="btn">Ajouter une voiture</a>


<a href="../ut/login.php" class="button-link">Connexion</a>

        <table>
            <tr>
                <th>Immatriculation</th>
                <th>Couleur</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($result as $row): ?>
                <tr>
                    <td><?= $row['immat'] ?></td>
                    <td><?= $row['couleur'] ?></td>
                    <td>
                        <div>
                            <img src="data:image/jpeg;base64,<?= base64_encode($row['image_data']) ?>" alt="Image <?= $row['id'] ?>" class="image-classe">
                        </div>
                    </td>
                    <td>
                        <form action="supprimer.php" method="post">
                            <input type="hidden" name="image_id" value="<?= $row['id'] ?>">
                            <input type="submit" class="btn" value="Supprimer">
                        </form>
                        <form action="modifier.php" method="post">
                            <input type="hidden" name="image_id" value="<?= $row['id'] ?>">
                            <input type="submit" class="btn" value="Modifier">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <a href="ajouterimage.php" class="btn">Ajouter une image</a>
    </div>
</body>
</html>