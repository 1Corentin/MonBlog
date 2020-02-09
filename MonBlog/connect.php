<?php

require_once 'config/init.conf.php';                                            //Inclut et exécute le fichier config/init.conf.php
require_once 'include/fonction.inc.php';                                        //Inclut et exécute le fichier include/fonction.inc.php
require_once 'config/bdd.conf.php';                                             //Inclut et exécute le fichier config/bdd.conf.php
require_once('libs/Smarty.class.php');                                          //Inclut et exécute le fichier libs/Smarty.class.php
require_once 'config/connexion.conf.php';                                       //Inclut et exécute le fichier config/connexion.conf.php

if (!empty($_POST['submit'])) {                                                 //S'il l'utilisateur clique sur le bouton connexion
    $identifiant = $_POST['identifiant'];                                       //Création et affectation de la variable $identifiant grâce au POST
    $mdp = $_POST['mdp'];                                                       //Création et affectation de la variable $mdp grâce au POST
    $h_mdp = sha1($mdp);                                                        //Création et affectation de la variable $h_mdp grâce au hachage

    $sth = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = :email AND mdp = :mdp'); //Requete SQL qui permet de retourner un utilisateur ou non pour la connexion
    $sth->bindValue(':email', $identifiant, PDO::PARAM_STR);                    //Sécurisation du paramètre
    $sth->bindValue(':mdp', $h_mdp, PDO::PARAM_STR);                            //Sécurisation du paramètre
    $sth->execute();                                                            //Execution de la requête

    if ($sth->rowCount() > 0) {                                                 //Si la connexion a réussi
        $donnees = $sth->fetch(PDO::FETCH_ASSOC);
        $sid = $donnees['email'] . time();                                      //Création et affectation de la variable $sid grâce à la concatenation de l'email et du temps
        $sid_hache = md5($sid);

        setcookie('sid', $sid_hache, time() + 3600);                            //Création du COOKIE

        $sth_update = $bdd->prepare("UPDATE utilisateurs "                      //Préparation de la requete SQL qui permet de modifier le SID en fonction de l'id utilisateur
                . "SET sid = :sid "
                . "WHERE id = :id");

        $sth_update->bindValue(':sid', $sid_hache, PDO::PARAM_STR);             //Sécurisation du paramètre
        $sth_update->bindValue(':id', $donnees['id'], PDO::PARAM_INT);          //Sécurisation du paramètre

        $result_connexion = $sth_update->execute();                             //Execution de la requête

        if ($result_connexion == TRUE) {                                        //Si la requete a fonctionnée 
            $_SESSION['notification']['result'] = 'success';
            $_SESSION['notification']['message'] = '<b>Félicitations !</b>';
        } else {                                                                //Si la requête n'a pas fonctionnée
            $_SESSION['notification']['result'] = 'danger';
            $_SESSION['notification']['message'] = '<b>Attention! Une erreur est survenue!</b>';
        }
        header("Location: index.php");                                          //Redirection vers la page index.php
        exit();
    } else {                                                                    //Si la connexion n'a pas réussi
        $_SESSION['notification']['result'] = 'danger';
        $_SESSION['notification']['message'] = '<b>Attention! Mauvais identifiants!</b>';

        header("Location: index.php");                                          //Redirection vers la page index.php
        exit();
    }
} else {                                                                        //Si l'utilisateur ne clique pas sur le bouton connexion
    $smarty = new Smarty();                                                     //Création de l'objet smarty

    $smarty->setTemplateDir('templates/');                                      //Définit les répertoires où les modèles sont stockés
    $smarty->setCompileDir('templates_c/');                                     //Définit le répertoire où les modèles compilés sont stockés

    include_once 'include/header.inc.php';                                      //Inclut et exécute le fichier include/header.inc.php
    $smarty->display('connect.tpl');                                            //Affichage du template connect.tpl
}



