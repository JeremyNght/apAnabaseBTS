<?php
Class Modele_ticket{
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

    public function getTicketById($id){
        $req = $this ->conn ->prepare("SELECT f.NUM_FACTURE,f.MONTANT_FACTURE,c.NOM_CONGRESSISTE,op.NOM_ORGANISME FROM facture f JOIN congressiste c on f.NUM_CONGRESSISTE=c.NUM_CONGRESSISTE JOIN organisme_payeur op on c.NUM_ORGANISME=op.NUM_ORGANISME where f.NUM_FACTURE=".$id);
        $req ->execute();
        return $req ->fetchAll(PDO::FETCH_OBJ);
    }
    public function annulerReglement($num){
        $req = $this -> conn -> prepare("UPDATE FACTURE set CODE_REGLEMENT = 0 WHERE NUM_FACTURE = ?");
        $req->bindValue(1, $num);
        $req->execute();

    }

}
?>