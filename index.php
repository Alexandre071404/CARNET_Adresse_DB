<?php
require_once("PHP/Lib.php");
$action = key_exists('action', $_GET)? trim($_GET['action']): null;
$sauvegarde = key_exists('sauvegarde', $_GET)? trim($_GET['sauvegarde']): null;
switch ($action) {
	

	case "liste": //Affichage de la liste complète des acteurs de la base de donnée
		$corps='<h1 style="color:white; background-color:silver ;">Liste des acteurs</h1>';
		$connection =connecter();
		$requete="SELECT * FROM Acteur";
		
		// On envois la requète
		$query  = $connection->query($requete);

		// On indique que nous utiliserons les résultats en tant qu'objet
		$query->setFetchMode(PDO::FETCH_OBJ);
		
		// Nous traitons les résultats en boucle
		$corps.= "<h4><span class='c1'><b><u>IdP</u></span> <span class='c1'>Nom</span><span class='c1'>Prenom</span><span class='c1'>Action</b></span><span><a href='index.php?action=ordrer'>Trier par ordre alphabétique</a></span></h4>";

		while( $enregistrement = $query->fetch() )
		{
			// Affichage des enregistrements
			$idP=$enregistrement->idP;$nom=$enregistrement->nom;$prenom=$enregistrement->prenom;
			$tab_Personne[$idP]=array($nom,$prenom);
			$corps.= "<span class='c1'><u><b>".$enregistrement->idP."</b></u></span> <span class='c1'>".$enregistrement->nom." </span><span class='c1'>". $enregistrement->prenom."</span>";
			$corps.=  '<span class=\'c1\'><a href="index.php?action=select&idP='. $enregistrement->idP.'"><span class="glyphicon glyphicon-eye-open"></span></a>';
			$corps.=  '<a href="index.php?action=update&idP='. $enregistrement->idP.'"><span class="glyphicon glyphicon-pencil"></span></a>';
			$corps.=  '<a href="index.php?action=delete&idP='. $enregistrement->idP.'"><span class="glyphicon glyphicon-trash"></span></a></span>';
			$corps.="<br>";
  
		}
		$corps.="<br><span><a href='index.php?action=decroissant'>Ordre Décroissant de l'IdP</a></span>";
		$zonePrincipale=$corps ;
		$query = null;
		$connection = null;
		break;
		
		
	
	case "decroissant": //Affichage de la liste complète des acteurs de la base de donnée par ordre décroissant des IdP
		$corps='<h1 style="color:white; background-color:silver ;">Liste des acteurs</h1>';
		$connection =connecter();
		$requete="SELECT * FROM Acteur ORDER BY IdP DESC;";
		
		// On envoit la requête
		$query  = $connection->query($requete);

		// On indique que nous utiliserons les résultats en tant qu'objet
		$query->setFetchMode(PDO::FETCH_OBJ);
		
		// Nous traitons les résultats en boucle
		$corps.= "<h4><span class='c1'><b><u>IdP</u></span> <span class='c1'>Nom</span><span class='c1'>Prenom</span><span class='c1'>Action</b></span><span><a href='index.php?action=ordrer'>Trier par ordre alphabétique</a></span></h4>";

		while( $enregistrement = $query->fetch() )
		{
			// Affichage des enregistrements
			$idP=$enregistrement->idP;$nom=$enregistrement->nom;$prenom=$enregistrement->prenom;
			$tab_Personne[$idP]=array($nom,$prenom);
			$corps.= "<span class='c1'><u><b>".$enregistrement->idP."</b></u></span> <span class='c1'>".$enregistrement->nom." </span><span class='c1'>". $enregistrement->prenom."</span>";
			$corps.=  '<span class=\'c1\'><a href="index.php?action=select&idP='. $enregistrement->idP.'"><span class="glyphicon glyphicon-eye-open"></span></a>';
			$corps.=  '<a href="index.php?action=update&idP='. $enregistrement->idP.'"><span class="glyphicon glyphicon-pencil"></span></a>';
			$corps.=  '<a href="index.php?action=delete&idP='. $enregistrement->idP.'"><span class="glyphicon glyphicon-trash"></span></a></span>';
			$corps.="<br>";
  
		}
		$corps.="<br><span><a href='index.php?action=liste'>Ordre Croissant de l'IdP</a></span>";		
		$zonePrincipale=$corps ;
		$query = null;
		$connection = null;
		break;
		
	case "ordrer": //Affichage de la liste complète des acteurs de la base de donnée par ordre Alphabétique.
		$corps='<h1 style="color:white; background-color:silver ;">Liste des acteurs</h1>';
		$connection =connecter();
		$requete="SELECT * FROM Acteur ORDER BY nom ASC;";
		
		$query  = $connection->query($requete);

		// On indique que nous utiliserons les résultats en tant qu'objet
		$query->setFetchMode(PDO::FETCH_OBJ);
		
		// Nous traitons les résultats en boucle
		$corps.= "<h4><span class='c1'><b><u>IdP</u></span> <span class='c1'>Nom</span><span class='c1'>Prenom</span><span class='c1'>Action</b></span><span><a href='index.php?action=liste'>Trier par identifiant</a></span></h4>";

		while( $enregistrement = $query->fetch() )
		{
			// Affichage des enregistrements
			$idP=$enregistrement->idP;$nom=$enregistrement->nom;$prenom=$enregistrement->prenom;
			$tab_Personne[$idP]=array($nom,$prenom);
			$corps.= "<span class='c1'><u><b>".$enregistrement->idP."</b></u></span> <span class='c1'>".$enregistrement->nom." </span><span class='c1'>". $enregistrement->prenom."</span>";
			$corps.=  '<span class=\'c1\'><a href="index.php?action=select&idP='. $enregistrement->idP.'"><span class="glyphicon glyphicon-eye-open"></span></a>';
			$corps.=  '<a href="index.php?action=update&idP='. $enregistrement->idP.'"><span class="glyphicon glyphicon-pencil"></span></a>';
			$corps.=  '<a href="index.php?action=delete&idP='. $enregistrement->idP.'"><span class="glyphicon glyphicon-trash"></span></a></span>';
			$corps.="<br>";
  
		}
		$corps.="<br><span><a href='index.php?action=ordreinverse'>Ordre anti-alphabétique</a></span>";

		$zonePrincipale=$corps ;
		$query = null;
		$connection = null;
		break;
		
		
		
	case "ordreinverse": //Affichage de la liste complète des acteurs de la base de donnée par ordre anti-Alphabétique.
		$corps='<h1 style="color:white; background-color:silver ;">Liste des acteurs</h1>';
		$connection =connecter();
		$requete="SELECT * FROM Acteur ORDER BY nom DESC;";
		
		// On envois la requète
		$query  = $connection->query($requete);

		// On indique que nous utiliserons les résultats en tant qu'objet
		$query->setFetchMode(PDO::FETCH_OBJ);
		
		// Nous traitons les résultats en boucle
		$corps.= "<h4><span class='c1'><b><u>IdP</u></span> <span class='c1'>Nom</span><span class='c1'>Prenom</span><span class='c1'>Action</b></span><span><a href='index.php?action=liste'>Trier par identifiant</a></span></h4>";

		while( $enregistrement = $query->fetch() )
		{
			// Affichage des enregistrements
			$idP=$enregistrement->idP;$nom=$enregistrement->nom;$prenom=$enregistrement->prenom;
			$tab_Personne[$idP]=array($nom,$prenom);
			$corps.= "<span class='c1'><u><b>".$enregistrement->idP."</b></u></span> <span class='c1'>".$enregistrement->nom." </span><span class='c1'>". $enregistrement->prenom."</span>";
			$corps.=  '<span class=\'c1\'><a href="index.php?action=select&idP='. $enregistrement->idP.'"><span class="glyphicon glyphicon-eye-open"></span></a>';
			$corps.=  '<a href="index.php?action=update&idP='. $enregistrement->idP.'"><span class="glyphicon glyphicon-pencil"></span></a>';
			$corps.=  '<a href="index.php?action=delete&idP='. $enregistrement->idP.'"><span class="glyphicon glyphicon-trash"></span></a></span>';
			$corps.="<br>";
  
		}
		$corps.="<br><span><a href='index.php?action=ordrer'>Ordre alphabétique</a></span>";

		$zonePrincipale=$corps ;
		$query = null;
		$connection = null;
		break;
		
		
		
	case "insert": //Saisie  via le formulaire et insertion dans la base de données
		$cible='insert';
		if (!isset($_POST["nom"]) && !isset($_POST["prenom"]) && !isset($_POST["dateN"]) && !isset($_POST["LieuN"])&& !isset($_POST["Film"])) /* et autres champs*/
		{
			include("Formulaire/formulairePersonne.html");
		}
		else{
			$nom = key_exists('nom', $_POST)? trim($_POST['nom']): null;
            $prenom = key_exists('prenom', $_POST)? trim($_POST['prenom']): null;
            $dateN = key_exists('dateN', $_POST)? trim($_POST['dateN']): null;
            $LieuN = key_exists('LieuN', $_POST)? trim($_POST['LieuN']): null;
            $Film = key_exists('Film', $_POST)? trim($_POST['Film']): null;
            if (!controlerAlphanum($nom))  $erreur["nom"] = "Nom non valide";
            if ($nom=="")     $erreur["nom"] ="il manque un nom";
            if (!controlerAlphanum($prenom)) $erreur["prenom"] = "Prenom non valide";
            if ($prenom=="") $erreur["prenom"] ="il manque un prenom";
            if (!controlerDate($dateN)) $erreur["dateN"] = "Date non valide";
            if ($dateN=="") $erreur["dateN"] ="il manque une date de naissance";
            if (!controlerAlphanum($LieuN)) $erreur["LieuN"] = "Lieu de naissance non valide";
            if ($LieuN=="") $erreur["LieuN"] ="il manque un lieu de naissance";
            if (!controlerAlphanum($Film))  $erreur["Film"] = "Film non valide";
            if ($Film=="") $erreur["Film"] ="il manque un film connu";

            $compteur_erreur=count($erreur);
            foreach ($erreur as $cle=>$valeur){
                if ($valeur==null) $compteur_erreur=$compteur_erreur-1;
            }

			if ($compteur_erreur == 0){
				$connection =connecter();
				$connection->exec("INSERT INTO `Acteur`(`nom`,`prenom`,`DateN`,`Lieux_de_naissance`,`Film_connu`) VALUES('$nom','$prenom','$dateN','$LieuN','$Film')");
				$corps =$prenom." ".$nom." ajouté(e) à la base de donnée <br>";
				$idP = $connection->lastInsertId();	
				$corps .= "Son identifiant dans la base de donnée est le n°".$idP."<br>";
				$acteur = new Acteur($idP,$nom,$prenom,$dateN,$LieuN,$Film);
				$corps .= "Vous pouvez dès à présent consulter la liste des acteurs en <a href='index.php?action=liste'>cliquant sur ce lien</a>.<br>";
				$corps.="Nouvel objet de la classe Acteur créé: ".$acteur;
				
				$zonePrincipale=$corps ;
				$connection = null;
			}
			else {
				include("Formulaire/formulairePersonne.html");
			}
		}
		break;
	case "select":
		if (key_exists('idP',$_GET)){
			$idP=$_GET['idP'];							
			$corps="<h1>Détails</h1>";
			
			$connection =connecter();
			$requete="SELECT * FROM Acteur WHERE idP='$idP'";
			
			// On envois la requète
			$query  = $connection->query($requete);

			// On indique que nous utiliserons les résultats en tant qu'objet
			$query->setFetchMode(PDO::FETCH_OBJ);
			
			// Nous traitons les résultats en boucle
			$corps.= "<h4><span class='c1'><b><u>IdP</u></span> <span class='c1'>Nom</span><span class='c1'>Prenom</span> <span class='c1'>DateN</span><span class='c1'>LieuN</span> <span class='c1'>Film</span></span></h4>";

			while( $enregistrement = $query->fetch() )
			{
				//$tab_Personne[$enregistrement->idP]=array($enregistrement->nom,$enregistrement->prenom);
				// Affichage des enregistrements
				$idP=$enregistrement->idP;$nom=$enregistrement->nom;$prenom=$enregistrement->prenom;$DateN=$enregistrement->DateN;$LieuN=$enregistrement->Lieux_de_naissance;$Film=$enregistrement->Film_connu;
				$tab_Acteur[$idP]=array($nom,$prenom,$DateN,$LieuN,$Film);
				$corps.= "<span class='c1'><u><b>".$enregistrement->idP."</b></u></span> <span class='c1'>".$enregistrement->nom." </span><span class='c1'>". $enregistrement->prenom."</span><span class='c1'>". $enregistrement->DateN."</span><span class='c1'>". $enregistrement->Lieux_de_naissance."</span><span class='c1'>". $enregistrement->Film_connu."</span>";
				$corps.="<br>";
			}
		}
	
		$zonePrincipale=$corps ;
		$query = null;
		$connection = null;
		break;
	
	case "sauvegarde":
		$connection =connecter();
		$type = key_exists('type',$_POST)? $_POST['type']: null;
		$idP = key_exists('idP',$_POST)? $_POST['idP']: null;
		$sql = key_exists('sql',$_POST)? $_POST['sql']: null;

		if ($type =='confirmupdate'){
			$corps="<h1>Mise à jour de l'acteur ".$idP."</h1><h3>Consulter la liste mise à jour en <a href='index.php?action=liste'>cliquant sur ce lien</a></h3>" ;
		}
		else{
			$corps="<h1>Suppression de l'acteur".$idP."</h1><h3>Consulter la liste mise à jour en <a href='index.php?action=liste'>cliquant sur ce lien</a></h3>" ;
		}
		$req=$connection->prepare($sql);
		$req->execute();	
		$zonePrincipale=$corps ;		
		$connection = null;
		break;
		
		
	case "update": 
			$idP=$_GET["idP"];
			$connection =connecter();
			$requete="SELECT * FROM Acteur where idP=$idP";
			$query  = $connection->query($requete);
			$query->setFetchMode(PDO::FETCH_OBJ);
			while( $enregistrement = $query->fetch() )
			{
				$idP=$enregistrement->idP;
				$nom=$enregistrement->nom;
				$prenom=$enregistrement->prenom;
				$dateN=$enregistrement->DateN;
				$LieuN=$enregistrement->Lieux_de_naissance;
				$Film=$enregistrement->Film_connu;
			}

			if (!isset($_POST["nom"]) && !isset($_POST["prenom"]) && !isset($_POST["dateN"]) && !isset($_POST["LieuN"])&& !isset($_POST["Film"]))
			{
			  include("Formulaire/formulairePersonne.html");
			}
			else{
					
				$nom = key_exists('nom', $_POST)? trim($_POST['nom']): null;
				$prenom = key_exists('prenom', $_POST)? trim($_POST['prenom']): null;
				$dateN = key_exists('dateN', $_POST)? trim($_POST['dateN']): null;
				$LieuN = key_exists('LieuN', $_POST)? trim($_POST['LieuN']): null;
				$Film = key_exists('Film', $_POST)? trim($_POST['Film']): null;
				if (!controlerAlphanum($nom))  $erreur["nom"] = "Nom non valide";
				if ($nom=="")     $erreur["nom"] ="il manque un nom";
				if (!controlerAlphanum($prenom)) $erreur["prenom"] = "Prenom non valide";
				if ($prenom=="") $erreur["prenom"] ="il manque un prenom";
				if (!controlerDate($dateN)) $erreur["dateN"] = "Date non valide";
				if ($dateN=="") $erreur["dateN"] ="il manque une date de naissance";
				if (!controlerAlphanum($LieuN)) $erreur["LieuN"] = "Lieu de naissance non valide";
				if ($LieuN=="") $erreur["LieuN"] ="il manque un lieu de naissance";
				if (!controlerAlphanum($Film))  $erreur["Film"] = "Adresse non valide";
				if ($Film=="") $erreur["Film"] ="il manque un film connu";
				$compteur_erreur=count($erreur);
				foreach ($erreur as $cle=>$valeur){
						if ($valeur==null) $compteur_erreur=$compteur_erreur-1;
					}

			  if ($compteur_erreur == 0) {
				$sql="UPDATE Acteur SET nom='$nom', prenom='$prenom',DateN='$dateN',Lieux_de_naissance='$LieuN',Film_connu='$Film' where idP='$idP' ";
				$tab='<form action="index.php?action=sauvegarde" method="post">
					<input type="hidden" name="type" value="confirmupdate"/>
					<input type="hidden" name="idP" value="'.$idP.'"/>
					<input type="hidden" name="sql" value="'.$sql.'"/>
					Etes vous sûr de vouloir mettre à jour cet(te) acteur(trice) ?
					<p>
					<input type="submit" value="Enregistrer" class="btn btn-danger">
					<a href="index.php?action=update&idP='.$idP.'" class="btn btn-secondary">Annuler</a>
					</p>
					</form>';
				$corps = $tab;  
				$zonePrincipale=$corps;
			  }
			  else {
				include("Formulaire/formulairePersonne.html");
			  }
			}
			$connection = null;
			break;

	case "delete":
		$idP=$_GET['idP'];
		$connection =connecter();
		$sql="DELETE FROM Acteur where idP like '$idP'";
		$tab='
		<form action="index.php?action=sauvegarde" method="post">
		<input type="hidden" name="type" value="confirmdelete"/>
		<input type="hidden" name="idP" value="'.$idP.'"/>
		<input type="hidden" name="sql" value="'.$sql.'"/>
		Etes vous sûr de vouloir supprimer cet(te) Acteur(trice) ?
		<p>
			<input type="submit" value="Supprimer" class="btn btn-danger">
			<a href="index.php?action=liste" class="btn btn-secondary">Annuler</a>
		</p>
	</form>';        
		$corps = $tab;
		$zonePrincipale=$corps ;
		$connection = null; 
		break;

 case "propos":
	   $zonePrincipale='<h2 style="color:white;">Site réalisé par :</h2><h3>Alexandre TRANSON 22103262</h3><h4>Groupe 4B</h4>'  ;
	break;
 default:
   $zonePrincipale="<h3>Bienvenue sur la Page d'accueil de mon site listant des acteurs </h3>" ;
   break;
   
}
include("PHP/squelette.php");

?>
