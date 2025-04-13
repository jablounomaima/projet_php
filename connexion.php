<?php
$servername = "localhost";
$username = "root";
$password = "";
$base = "bdvoi";
try {
    $connexion = new PDO("mysql:host=$servername;port=3307;dbname=$base",$username,$password);
}
catch(PDOException $e)
{ echo "Connection failed: " . $e->getMessage(); }
?>