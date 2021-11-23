<?php
include ("./modele/modele.ticket.php");
Class Controleur_ticket{
    // --- champs de base du controleur
    public $vue=""; //vue appelée par le controleur

    public $message = "";
    public $erreur = "";

    public $data; // le tableau des données de la vue
    public $factureDetail;

    public $modele; // nom du modele

    public $m; // objet modele

    public $post; // renseigné par index

    // --- Constructeur
    public function __construct(){
        // déclarer la vue
        $this->vue = "ticket";
        $this->modele = new Modele_ticket();
    }

    public function todo_initialiser(){
        $this->todo_changementPage();
    }

    public function todo_changementPage(){
       $this->data["liste"] =  $this->modele->getTicketById($_POST["numFacture"]);
    }
    public function todo_annuler(){
        $this->modele->annulerReglement($_POST["numFacture"]);
        header('Location:?controleur=reglement');
    }


}
?>