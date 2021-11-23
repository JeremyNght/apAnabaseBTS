<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "controleur.menu.php";
    $lesActions["hello"] = "controleur.hello.php";
    $lesActions["liste"] = "controleur.liste.php";
    $lesActions["reglement"] = "controleur.reglement.php";
    $lesActions["ticket"] = "controleur.ticket.php";

    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>