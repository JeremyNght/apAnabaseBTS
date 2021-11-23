<?php
Class Modele_reglement{
    private $conn;

    public function __construct(){
        $login = "root";
        $mdp = "";
        $bd = "bdanabase";
        $serveur = "localhost";

        try {
            $this->conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Erreur de connexion PDO ";
            die();
        }
    }
    public function getFacture(){
        $req = $this ->conn ->prepare("SELECT * FROM facture WHERE CODE_REGLEMENT = 1");
        $req ->execute();
        return $req ->fetchAll(PDO::FETCH_OBJ);
    }

}
?>
