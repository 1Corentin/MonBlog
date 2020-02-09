<?php

try {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    $bdd->exec("set names ut8");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

