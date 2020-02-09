<?php

require_once 'config/init.conf.php';                                            //Inclut et exécute le fichier config/init.conf.php
require_once 'include/fonction.inc.php';                                        //Inclut et exécute le fichier include/fonction.inc.php
require_once 'config/bdd.conf.php';                                             //Inclut et exécute le fichier config/bdd.conf.php
require_once('libs/Smarty.class.php');                                          //Inclut et exécute le fichier libs/Smarty.class.php
require_once 'config/connexion.conf.php';                                       //Inclut et exécute le fichier config/connexion.conf.php

$sth = $bdd->prepare("SELECT article.id, "                                      //Requête SQL qui permet de sélectionner l'article avec son commentaire
        . "titre, "
        . "texte, "
        . "commentaire, "
        . "mail, "
        . "pseudo "
        . "FROM article "
        . "LEFT JOIN commentaire ON article.id = commentaire.id_article "
        . "WHERE article.id = :id");

$sth->bindValue(":id", $_GET['id'], PDO::PARAM_INT);                            //Sécurisation de paramètre 
$sth->execute();                                                                //Execution de la requête SQL
$tab_result = $sth->fetchAll(PDO::FETCH_ASSOC);                                 //Création et affectation de la variable $tab_result gràce à la requête 

$smarty = new Smarty();                                                         //Création de l'objet smarty

$smarty->setTemplateDir('templates/');                                          //Définit les répertoires où les modèles sont stockés
$smarty->setCompileDir('templates_c/');                                         //Définit le répertoire où les modèles compilés sont stockés

$smarty->assign('tab_result', $tab_result);                                     //Assigne la valeur $tab_result au template                                                    

include_once 'include/header.inc.php';                                          //Inclut et exécute le fichier include/header.inc.php
$smarty->display('visualisation.tpl');                                          //Affiche le template visualisation.tpl
?>
    


