<?php
require_once("../connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["image_id"])) {
    $image_id = $_POST["image_id"];

    // Récupérer les détails de l'image à modifier
    $stmt = $connexion->prepare("SELECT * FROM images WHERE id = :id");
    $stmt->bindParam(':id', $image_id, PDO::PARAM_INT);
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);

    // Afficher le formulaire de modification pré-rempli avec les détails de l'image
    // Vous pouvez utiliser les données de $image pour pré-remplir les champs du formulaire
    ?>
  <form action="modifierimage.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="image_id" value="<?= $image['id'] ?>">
    <label for="immat">Immatriculation :</label>
    <input type="text" name="immat" value="<?= $image['immat'] ?>"><br>
    <label for="couleur">Couleur :</label>
    <input type="text" name="couleur" value="<?= $image['couleur'] ?>"><br>
    <label for="image_data">Choisir une nouvelle image :</label>
    <input type="file" name="image_data" id="image_data"><br>
    <input type="submit" value="Modifier">
</form>

    <?php
} else {
    echo "Erreur : Veuillez sélectionner une image à modifier.";
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
