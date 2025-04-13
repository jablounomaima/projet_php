
<?php

require("connexion.php");




// Récupérer les données des images depuis la base de données
$result = $connexion->query("SELECT * FROM images");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
</head>
<body>
    
    <h2>jabloun pour location du voiture</h2>

    <table>
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
                        <img src="data:image/jpeg;base64,<?= base64_encode($row['image_data']) ?>" alt="Image <?= $row['id'] ?>" class="image-classe">
                    </div>
                </td>
                <td>
                    <form action="ut/login.php" method="post">
                        <input type="hidden" name="nom" value="<?= $row['immat'] ?>">
                        <input type="hidden" name="quantite" value="1">
                        <input type="submit" name="ut/login.php" value="Loyer">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
        

    <!-- Liens vers d'autres pages de votre site -->
    <p><a href="ut/login.php">connexion</a></p>
    
<style>
    p {
    text-align: center;
    margin-top: 20px;
}

a {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    color: #fff;
    background-color: #007bff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

a:hover {
    background-color: #0056b3;
}


</style>
</body>
</html>