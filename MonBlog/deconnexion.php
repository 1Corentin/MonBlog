<?php

setcookie('sid', '', -1);                                                       //"Suppresion du COOKIE"

header("Location:index.php");                                                   //Redirection vers la page index.php
exit();
