<?php
include ("./modele/modele.liste.php");
Class Controleur_liste{
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
        $this->vue = "liste";
        $this->modele = new Modele_liste();
    }

    public function todo_initialiser(){
        $this->post["NOM_ORGANISME"] = "";
        $this->post["ADRESSE_ORGANISME"]="";
        $this->data["liste"] = $this->modele->getOrganismePayeur();
    }

    public function todo_enregistrer(){
        if ( $this->post["nom"] == ""  && $this->post["adresse"] == ""){
            $this->erreur = "Vous devez saisir un truc";
        }else{
            //Enregistrer le nom dans la base de données ....
            $this->modele->addOrganismePayeur( $this->post["nom"],$this->post["adresse"] );

            $this->message = $this->post["nom"]." a été enregistré";

            $this->post["nom"] = "";
            $this->post["adresse"] = "";
        }

        $this->data["liste"] = $this->modele->getOrganismePayeur();

    }

    public function todo_Supprimer(){
        $this->modele->delOrganismePayeur($this->post["idsuppr"]);
        $this->todo_initialiser();
    }

    public function todo_Modifier(){
        $this->modele->modifOrganismePayeur($this->post["idmodif"], $this->post["namemodif"], $this->post["admodif"]);
        $this->todo_initialiser();
    }

}
?>