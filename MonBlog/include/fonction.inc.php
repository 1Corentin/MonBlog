<?php

function printr2($ma_variable) {
    echo '<pre>';
    print_r($ma_variable);
    echo '</pre>';

    return TRUE;
}

function declareNotification($message, $result) {                               //Fonction qui permet d'afficher la notification
    $_SESSION['notification']['message'] = $message;
    $_SESSION['notification']['result'] = $result;

    return TRUE;
}

function countArticles($bdd) {                                                 //Fonction qui retourne le nombre d'article
    $sth = $bdd->prepare("SELECT COUNT(*) as total "                            //Preparation de la requête SQL qui retourne le nombre d'article
            . "FROM article "
            . "WHERE publie = :publie");
    $sth->bindValue(':publie', 1, PDO::PARAM_BOOL);                             //Sécurisation de paramètre
    $sth->execute();                                                            //Execution de la reqête
    $result = $sth->fetch(PDO::FETCH_ASSOC);                                    //Création et affectation du tableau $result

    return $result['total'];                                                    //Retourne la variable $result['total']
}

function returnIndex($page_courante, $nb_articles_par_pages) {                   //Fonction qui permet de retourner l'index de départ
    $index_depart = (($page_courante - 1) * $nb_articles_par_pages);
    return $index_depart;
}
