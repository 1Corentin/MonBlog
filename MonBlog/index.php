<?php

require_once 'config/init.conf.php';                                            //Inclut et exécute le fichier config/init.conf.php
require_once 'include/fonction.inc.php';                                        //Inclut et exécute le fichier include/fonction.inc.php
require_once 'config/bdd.conf.php';                                             //Inclut et exécute le fichier config/bdd.conf.php
require_once('libs/Smarty.class.php');                                          //Inclut et exécute le fichier libs/Smarty.class.php
require_once 'config/connexion.conf.php';                                       //Inclut et exécute le fichier config/connexion.conf.php

if (!empty($_POST['comment'])) {                                                //Si l'utilisateur clique sur le bouton comment

    $commentaire = $_POST['commentaire'];                                       //Création et affectation de la variable $commentaire
    $id_article = $_POST['id'];                                                 //Création et affectation de la variable $id_article
    $mail = $_POST['mail'];                                                     //Création et affectation de la variable $mail
    $pseudo = $_POST['pseudo'];                                                 //Création et affectation de la variable $pseudo

    $sth = $bdd->prepare("INSERT INTO commentaire"                              //Préparation de la requête qui permet d'insérer un article
            . "(commentaire, id_article, mail, pseudo) "
            . "VALUES (:commentaire, :id_article, :mail, :pseudo)");

    $sth->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);              //Sécurisation de paramètre
    $sth->bindValue(':mail', $mail, PDO::PARAM_STR);                            //Sécurisation de paramètre
    $sth->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);                        //Sécurisation de paramètre
    $sth->bindValue(':id_article', $id_article, PDO::PARAM_INT);                //Sécurisation de paramètre
    $sth->execute();                                                            //Execution de la requête

    $message = '<b>Félicitation</b>, votre commentaire a été ajouté !';         //Création et affectation de la variable $message
    $result = 'success';                                                        //Création et affectation de la variable $result

    declareNotification($message, $result);                                     //Appel de la fonction pour notifier
}

$page_courante = !empty($_GET['p']) ? $_GET['p'] : 1;                           //Création et affectation de la variable $page_courante
$nb_total_article = countArticles($bdd);                                        //Création et affectation de la variable $nb_total_article
$index_depart = returnIndex($page_courante, _nb_articles_par_pages_);           //Création et affectation de la variable $index_depart
$nb_total_page = ceil($nb_total_article / _nb_articles_par_pages_);             //Création et affectation de la variable $nb_total_page 

$sth = $bdd->prepare("SELECT id, "                                              //Préparation de la requête qui permet de retourner les articles
        . "titre, "
        . "texte, "
        . "DATE_FORMAT(date, '%d/%m/%Y') AS date_fr, "
        . "publie "
        . "FROM article "
        . "WHERE publie = :publie "
        . "LIMIT :index_depart, :nb_articles_par_page");

$sth->bindValue(":publie", 1, PDO::PARAM_BOOL);                                 //Sécurisation de paramètre
$sth->bindValue(":index_depart", $index_depart, PDO::PARAM_INT);                //Sécurisation de paramètre
$sth->bindValue(":nb_articles_par_page", _nb_articles_par_pages_, PDO::PARAM_INT);  //Sécurisation de paramètre
$sth->execute();                                                                    //Execution de la requête

$tab_result = $sth->fetchAll(PDO::FETCH_ASSOC);                                 //Création et affectation de la variable $tab_result 

$smarty = new Smarty();                                                         //Création de l'objet Smarty

$smarty->setTemplateDir('templates/');                                          //Définit les répertoires où les modèles sont stockés
$smarty->setCompileDir('templates_c/');                                         //Définit le répertoire où les modèles compilés sont stockés

$smarty->assign('tab_result', $tab_result);                                     //Assigne la valeur $tab_result au template
$smarty->assign('nb_total_page', $nb_total_page);                               //Assigne la valeur $nb_total_page au template
$smarty->assign('page_courante', $page_courante);                               //Assigne la valeur $page_courante au template

include_once 'include/header.inc.php';                                          //Inclut et exécute le fichier include/header.inc.php
$smarty->display('index.tpl');                                                  //Affiche le template article.tpl
unset($_SESSION['notification']);
?>
