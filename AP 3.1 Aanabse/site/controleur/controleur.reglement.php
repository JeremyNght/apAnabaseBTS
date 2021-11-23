<?php
include ("./modele/modele.reglement.php");
Class Controleur_reglement{
    // --- champs de base du controleur
    public $vue=""; //vue appelée par le controleur

    public $message = "";
    public $erreur = "";

    public $data; // le tableau des données de la vue

    public $modele; // nom du modele

    public $m; // objet modele

    public $post; // renseigné par index

    // --- Constructeur
    public function __construct(){
        // déclarer la vue
        $this->vue = "reglement";
        $this->modele = new Modele_reglement();
    }

    public function todo_initialiser(){
        $this->data["liste"]=$this ->modele -> getFacture();
    }

}
?>