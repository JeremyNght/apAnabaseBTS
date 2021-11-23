<?php
Class Modele_liste
{
    private $conn;

    public function __construct()
    {
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

    public function getOrganismePayeur()
    {
        $req = $this->conn->prepare("select * from organisme_payeur ORDER BY NUM_ORGANISME");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function addOrganismePayeur($nom, $adresse)
    {
        $sql="insert into organisme_payeur values (NULL,?,?)";
        $req = $this->conn->prepare($sql);
        $req->bindValue(1,$nom);
        $req->bindValue(2,$adresse);
        $req->execute();
    }

    public function delOrganismePayeur($num)
    {
        $sql="DELETE FROM organisme_payeur WHERE NUM_ORGANISME = ?";
        $req = $this->conn->prepare($sql);
        $req->bindValue(1,$num);
        $req->execute();
    }

    public function modifOrganismePayeur($num, $nom, $adresse)
    {
        $sql=("update organisme_payeur SET NUM_ORGANISME=?,NOM_ORGANISME=?, ADRESSE_ORGANISME=? where NUM_ORGANISME= ?");
        $req = $this->conn->prepare($sql);
        $req->bindValue(1,$num);
        $req->bindValue(2,$nom);
        $req->bindValue(3,$adresse);
        $req->bindValue(4,$num);
        $req->execute();
    }
}
?>
