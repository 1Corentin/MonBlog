<?php

require_once 'config/init.conf.php';                                            //Inclut et exécute le fichier config/init.conf.php
require_once 'include/fonction.inc.php';                                        //Inclut et exécute le fichier include/fonction.inc.php
require_once 'config/bdd.conf.php';                                             //Inclut et exécute le fichier config/bdd.conf.php
require_once('libs/Smarty.class.php');                                          //Inclut et exécute le fichier libs/Smarty.class.php
require_once 'config/connexion.conf.php';                                       //Inclut et exécute le fichier config/connexion.conf.php

$page_courante = !empty($_GET['p']) ? $_GET['p'] : 1;                           //Création et affectation de la variable $page_courante             
$nb_total_article = countArticles($bdd);                                        //Création et affectation de la variable $nb_total_article
$index_depart = returnIndex($page_courante, _nb_articles_par_pages_);           //Création et affectation de la variable $index_depart
$nb_total_page = ceil($nb_total_article / _nb_articles_par_pages_);             //Création et affectation de la variable $$nb_total_page

$sth = $bdd->prepare("SELECT id, "                                              //Préparation de la requête SQL qui permet de retourner les articles avec le mot dans la recherche
        . "titre, "
        . "texte, "
        . "DATE_FORMAT(date, '%d/%m/%Y') AS date_fr, "
        . "publie "
        . "FROM article "
        . "WHERE publie = :publie "
        . "AND (titre LIKE :recherche OR texte LIKE :recherche) "
        . "LIMIT :index_depart, :nb_articles_par_page");

$sth->bindValue(":publie", 1, PDO::PARAM_BOOL);
$sth->bindValue(":index_depart", $index_depart, PDO::PARAM_INT);                  //Sécurisation de paramètre
$sth->bindValue(":nb_articles_par_page", _nb_articles_par_pages_, PDO::PARAM_INT); //Sécurisation de paramètre
$sth->bindValue(":recherche", '%' . $_GET['recherche'] . '%', PDO::PARAM_STR);    //Sécurisation de paramètre  
$sth->execute();

$tab_result = $sth->fetchAll(PDO::FETCH_ASSOC);                                 //Création et affectation du tableau $tab_result

$smarty = new Smarty();                                                         //Création de l'objet Smarty

$smarty->setTemplateDir('templates/');                                          //Définit les répertoires où les modèles sont stockés
$smarty->setCompileDir('templates_c/');                                         //Définit le répertoire où les modèles compilés sont stockés
$smarty->assign('tab_result', $tab_result);                                     //Assigne la valeur $tab_result au template
$smarty->assign('nb_total_page', $nb_total_page);                               //Assigne la valeur $nb_total_page au template
$smarty->assign('page_courante', $page_courante);                               //Assigne la valeur $page_courante au template

include_once 'include/header.inc.php';                                          //Inclut et exécute le fichier include/header.inc.php
$smarty->display('recherche.tpl');                                              //Affiche le template recherche.tpl
