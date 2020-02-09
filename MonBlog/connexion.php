<?php

require_once 'config/init.conf.php';                                            //Inclut et exécute le fichier config/init.conf.php
require_once 'include/fonction.inc.php';                                        //Inclut et exécute le fichier include/fonction.inc.php
require_once 'config/bdd.conf.php';                                             //Inclut et exécute le fichier config/bdd.conf.php
require_once('libs/Smarty.class.php');                                          //Inclut et exécute le fichier libs/Smarty.class.php
require_once 'config/connexion.conf.php';                                       //Inclut et exécute le fichier config/connexion.conf.php

if ($connecte == TRUE) {                                                        //Si l'utilisateur est connecté
    $message = '<b>PAS ACCES!</b>, vous êtes connecté !';                       //Création et affectation de la variable $message
    $result = 'danger';                                                         //Création et affectation de la variable $result

    declareNotification($message, $result);                                     //Appel de la fonction pour notifier

    header("Location: index.php");                                              //Redirection sur la page index.php
    exit();
}

if (!empty($_POST['submit'])) {                                                 //Si l'utilisateur clique sur le bouton
    $nom = $_POST['nom'];                                                       //Création et affectation de la variable $nom grâce au POST
    $prenom = $_POST['prenom'];                                                 //Création et affectation de la variable $prenom grâce au POST
    $email = $_POST['email'];                                                   //Création et affectation de la variable $email grâce au POST
    $mdp = $_POST['mdp'];                                                       //Création et affectation de la variable $mdp grâce au POST
    $h_mdp = sha1($mdp);                                                        //Création et affectation de la variable $h_mdp grâce au hachage

    $sth = $bdd->prepare("INSERT INTO utilisateurs"                             //Préparation de la requête SQL qui permet d'insérer un nouvel utilisateur
            . "(nom, prenom, email, mdp) "
            . "VALUES (:nom, :prenom, :email, :mdp)");
    $sth->bindValue(':nom', $nom, PDO::PARAM_STR);                              //Sécurisation de paramètre
    $sth->bindValue(':prenom', $prenom, PDO::PARAM_STR);                        //Sécurisation de paramètre
    $sth->bindValue(':email', $email, PDO::PARAM_STR);                          //Sécurisation de paramètre
    $sth->bindValue(':mdp', $h_mdp, PDO::PARAM_STR);                            //Sécurisation de paramètre
    $sth->execute();                                                            //Execution de la requête                  

    header("Location: index.php");                                              //Redirection sur la page index.php
    exit();
}

$smarty = new Smarty();                                                         //Création de l'objet Smarty

$smarty->setTemplateDir('templates/');                                          //Définit les répertoires où les modèles sont stockés
$smarty->setCompileDir('templates_c/');                                         //Définit le répertoire où les modèles compilés sont stockés

include_once 'include/header.inc.php';                                          //Inclut et exécute le fichier include/header.inc.php
$smarty->display('connexion.tpl');                                              //Affichage de la vue connexion.tpl

