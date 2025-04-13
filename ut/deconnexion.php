<?php
require_once("../connexion.php");
session_start();

// Détruire toutes les données de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion
header("Location: login.php");
exit;
?>