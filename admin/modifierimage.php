<?php
require_once("../connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["image_id"])) {
    $image_id = $_POST["image_id"];
    $immat = $_POST["immat"];
    $couleur = $_POST["couleur"];

    // Vérifier si un fichier a été téléchargé
    if(isset($_FILES["image_data"]) && $_FILES["image_data"]["error"] == 0) {
        // Récupérer le chemin du fichier temporaire
        $tmp_name = $_FILES["image_data"]["tmp_name"];
        // Lire le contenu du fichier
        $image_data = file_get_contents($tmp_name);
    } else {
        // Si aucun fichier n'a été téléchargé, conserver l'image existante
        $stmt = $connexion->prepare("SELECT image_data FROM images WHERE id = :id");
        $stmt->bindParam(':id', $image_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $image_data = $row['image_data'];
    }

    $stmt = $connexion->prepare("UPDATE images SET immat = :immat, couleur = :couleur, image_data = :image_data WHERE id = :id");
    $stmt->bindParam(':immat', $immat, PDO::PARAM_STR);
    $stmt->bindParam(':couleur', $couleur, PDO::PARAM_STR);
    $stmt->bindParam(':id', $image_id, PDO::PARAM_INT);
    $stmt->bindParam(':image_data', $image_data, PDO::PARAM_LOB);

    if ($stmt->execute()) {
        echo "Les détails de l'image ont été modifiés avec succès.";
        // Rediriger vers la page d'affichage des images après la modification
        header("location:afficherimage.php");
    } else {
        echo "Une erreur s'est produite lors de la modification des détails de l'image.";
    }
} else {
    echo "Erreur : Veuillez remplir tous les champs pour modifier l'image.";
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
