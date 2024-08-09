<?php

//fonctions utiles
function connecter(){
    try {
		$dns = ''; $utilisateur = '';//Champs qui doivent être remplis avec les bonnes infos
        
        // Options de connection
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                        );
        require_once("Protection/mdp_bd.php");//Afin d'ajouter une proctection et d'éviter que le mot de passe de la base de donnée soit visible trop facilement
        $connection = new PDO($dns,$utilisateur,$motDePasse,$options );
        return($connection);
    
    
    } catch(Exception $e){
        echo "Connection à MySQL impossible : ", $e->getMessage();
        die();
    }
}

function controlerDate($valeur) { 
	if (preg_match("/^(\d{1,4})[\/|\-|\.](\d{1,2})[\/|\-|\.](\d{1,2})$/", $valeur, $regs)) { 
		$annee = $regs[1];
		$mois = ($regs[2] < 10) ? "0".$regs[2] : $regs[2]; 
		$jour = ($regs[3] < 10) ? "0".$regs[3] : $regs[3]; 
		if (checkdate($mois, $jour, $annee)) { 
			return $annee . "-" . $mois . "-" . $jour; 
			} 
		else { 
			return false; } 
		}
		else { 
			return false;
			 }
		}
  

function controlerAlphanum($valeur) {
    if (preg_match("/^[\w|\d|\s|'|\"|\\|,|\.|\-|&|#|;]+$/", $valeur)) return true;
    else return false;
}   


class Acteur{
    private $idP;
    private $nom;
    private $prenom;
    private $dateN;
    private $LieuN;
    private $Film;

    //Constructeur
    public function __construct($idP,$nom,$prenom,$dateN="0000-00-00",$LieuN,$Film){
        $this->idP=$idP;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->dateN=$dateN;
        $this->LieuN=$LieuN;
        $this->Film=$Film;
        
    }

    public function __toString()
    {
        $ligneT= "(<u><b>".$this->idP."</b></u>, ".$this->nom.", ". $this->prenom.", ". $this->dateN.", ".$this->LieuN.", ".$this->Film." )<br>";
        return $ligneT;
    }
}
$idP=null;$nom = null;$prenom = null;$dateN = null;$lieuN =  null;$LieuN = null;$Film = null;			
$erreur=array("nom"=>null,"prenom"=>null,"dateN"=>null,"LieuN"=>null,"Film"=>null);
$tab_Acteur=array();
?>
