

<?php
require_once("../connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"]) && $_FILES["image"]["error"] == 0 && isset($_POST["couleur"]) && isset($_POST["immat"])) {
    $image = file_get_contents($_FILES["image"]["tmp_name"]);
    $image_type = $_FILES["image"]["type"];
    $couleur = $_POST["couleur"];
    $immat = $_POST["immat"];

    $stmt = $connexion->prepare("INSERT INTO images (image_data, image_type, couleur, immat) VALUES (:image_data, :image_type, :couleur, :immat)");
    $stmt->bindParam(':image_data', $image, PDO::PARAM_LOB);
    $stmt->bindParam(':image_type', $image_type, PDO::PARAM_STR);
    $stmt->bindParam(':couleur', $couleur, PDO::PARAM_STR);
    $stmt->bindParam(':immat', $immat, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "L'image a été ajoutée avec succès.";
        header("location:afficherimage.php");
    } else {
        echo "Une erreur s'est produite lors de l'ajout de l'image.";
    }
} else {
    echo "Erreur : Veuillez choisir une image valide.";
    echo "inserrer l'image dans les donner ";
}
?>
