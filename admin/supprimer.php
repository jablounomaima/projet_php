<?php
require_once("../connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["image_id"])) {
    $image_id = $_POST["image_id"];

    $stmt = $connexion->prepare("DELETE FROM images WHERE id = :id");
    $stmt->bindParam(':id', $image_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "L'image a été supprimée avec succès.";
        // Rediriger vers la page d'affichage des images après la suppression
        header("location:afficherimage.php");
    } else {
        echo "Une erreur s'est produite lors de la suppression de l'image.";
    }
} else {
    echo "Erreur : Veuillez sélectionner une image à supprimer.";
}
?>