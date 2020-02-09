<?php

require_once 'config/init.conf.php';                                            //Inclut et exécute le fichier config/init.conf.php
require_once 'include/fonction.inc.php';                                        //Inclut et exécute le fichier include/fonction.inc.php
require_once 'config/bdd.conf.php';                                             //Inclut et exécute le fichier config/bdd.conf.php
require_once('libs/Smarty.class.php');                                          //Inclut et exécute le fichier libs/Smarty.class.php
require_once 'config/connexion.conf.php';                                       //Inclut et exécute le fichier config/connexion.conf.php

if ($connecte == FALSE) {                                                       //Si l'utilisateur n'est pas connecté
    $message = '<b>PAS ACCES!</b>, vous nêtes pas connecté !';                  //Création et affectation de la variable $message
    $result = 'danger';                                                         //Création et affectation de la variable $result

    declareNotification($message, $result);                                     //Appel de la fonction pour notifier

    header("Location: index.php");                                              //Redirection sur la page index.php
    exit();
}

if (!empty($_POST['article'])) {                                                //Si l'utilisateur clique sur le bouton soumettre mon article 
    if ($_POST['action'] == 'modif') {                                          //Si il s'agit d'une modification
        $titre = $_POST['titre'];                                               //Création et affectation de la variable $titre grâce au POST
        $texte = $_POST['text'];                                                //Création et affectation de la variable $texte grâce au POST
        $publie = $_POST['publie'];                                             //Création et affectation de la variable $publie grâce au POST

        $sth = $bdd->prepare("UPDATE article "                                  //Preparation de la requête SQL qui permet de modifier l'article 
                . "SET titre = :titre, texte = :texte, publie= :publie "
                . "WHERE id= :id");
        $sth->bindValue(':titre', $titre, PDO::PARAM_STR);                      //Sécurisation de donnée
        $sth->bindValue(':texte', $texte, PDO::PARAM_STR);                      //Sécurisation de donnée
        $sth->bindValue(':publie', $publie, PDO::PARAM_BOOL);                   //Sécurisation de donnée
        $sth->bindValue(':id', $_POST['id'], PDO::PARAM_INT);                   //Sécurisation de donnée
        $sth->execute();                                                        //Execution de la requete                       

        $message = '<b>Félicitation</b>, votre article est modifié !';          //Création et affectation de la variable $message
        $result = 'success';                                                    //Création et affectation de la variable $result

        declareNotification($message, $result);                                 //Appel de la fonction pour notifier

        header("Location: index.php");                                          //Redirection vers la page index.php
        exit();
    } else {                                                                    //Si il ne s'agit pas d'une modification 
        $titre = $_POST['titre'];                                               //Création et affectation de la variable $titre grâce au POST
        $texte = $_POST['text'];                                                //Création et affectation de la variable $texte grâce au POST
        $publie = isset($_POST['publie']) ? 1 : 0;                              //Création et affectation de la variable $publie grâce au POST
        $date = date('Y-m-d');                                                  //Création et affectation de la variable $date
        echo $date;

        $sth = $bdd->prepare("INSERT INTO article"                              //Préparation de la requete SQL qui permet d'inserer un article 
                . "(titre, texte, publie, date) "
                . "VALUES (:titre, :texte, :publie, :date)");
        $sth->bindValue(':titre', $titre, PDO::PARAM_STR);                      //Sécurisation de donnée
        $sth->bindValue(':texte', $texte, PDO::PARAM_STR);                      //Sécurisation de donnée
        $sth->bindValue(':publie', $publie, PDO::PARAM_BOOL);                   //Sécurisation de donnée
        $sth->bindValue(':date', $date, PDO::PARAM_STR);                        //Sécurisation de donnée
        $sth->execute();                                                        //Execution de la requete

        $id_article = $bdd->lastInsertId();

        if ($_FILES['img']['error'] == 0) {
            move_uploaded_file($_FILES['img']['tmp_name'], 'img/' . $id_article . '.jpg');
        }

        $message = '<b>Félicitation</b>, votre article est ajouté !';           //Création et affectation de la variable $message
        $result = 'success';                                                    //Création et affectation de la variable $result

        declareNotification($message, $result);                                 //Appel de la fonction pour notifier

        header("Location: index.php");                                          //Redirection vers la page index.php
        exit();
    }
} else {                                                                        //Si l'utilisateur ne clique pas sur le bouton soumettre mon article
    $tab_result['titre'] = '';                                                  //Création et affectation de la variable $tab_result['titre'] vide
    $tab_result['texte'] = '';                                                  //Création et affectation de la variable $tab_result['texte'] vide
    $tab_result['publie'] = '';                                                 //Création et affectation de la variable $tab_result['publie'] vide
    $action['action'] = $_GET['action'];                                        //Création et affectation de la variable $action['action'] grâce au GET
    $action['id'] = $_GET['id'];                                                //Création et affectation de la variable $action['id'] grâce au GET

    if (isset($_GET['id'])) {
        $sth = $bdd->prepare("SELECT id, "                                      //Préparation de la requête qui permet de retourner les info. de la fiche en fonction de l'id de l'URL 
                . "titre, "
                . "texte, "
                . "publie "
                . "FROM article "
                . "WHERE id = :id");

        $sth->bindValue(":id", $_GET['id'], PDO::PARAM_INT);                    //Sécurisation de paramètre
        $sth->execute();                                                        //Execution de la requête
        $tab_result = $sth->fetch(PDO::FETCH_ASSOC);                            //Création et affectation du tableau $tab_result

        if ($tab_result['publie'] == 1) {
            $tab_result['publie'] == 'checked';
        } else {
            $tab_result['publie'] == '';
        }
    }

    $smarty = new Smarty();                                                     //Création de l'objet Smarty

    $smarty->setTemplateDir('templates/');                                      //Définit les répertoires où les modèles sont stockés
    $smarty->setCompileDir('templates_c/');                                     //Définit le répertoire où les modèles compilés sont stockés
    $smarty->assign('tab_result', $tab_result);                                 //Assigne la valeur au template
    $smarty->assign('action', $action);                                         //Assigne la valeur au template

    include_once 'include/header.inc.php';                                      //Inclut et exécute le fichier include/header.inc.php
    $smarty->display('article.tpl');                                            //Affiche le template article.tpl
}
