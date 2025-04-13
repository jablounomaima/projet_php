<?php
require_once("../connexion.php");

// Récupération des données depuis les tables users et commands
$sql = "SELECT u.email, c.command_details FROM users u INNER JOIN commands c ON u.id = c.user_id";
$stmt = $connexion->prepare($sql);
$stmt->execute();
$commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des commandes</title>
</head>
<body>

<h2>Liste des commandes</h2>

<table border="1">
    <tr>
        <th>Email</th>
        <th>Détails de la commande</th>
    </tr>
    <?php foreach ($commandes as $commande): ?>
        <tr>
            <td><?= $commande['email'] ?></td>
            <td><?= $commande['command_details'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

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
