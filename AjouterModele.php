<?php
$PARAM_hote='localhost'; // le chemin vers le serveur
$PARAM_port='3306';
$PARAM_nom_bd='airlines'; // le nom de votre base de données
$PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter

$connexion = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);

//$_POST['nomModele'] = 'AAA';
//$_POST['longueurPiste'] = '1200';
//$_POST['nbPlace'] = '320';
//$_POST['periodeGrandeRevision'] = '1000';
//$_POST['periodePetiteRevision'] = '500';
//$_POST['rayonDaction'] = '7000';


$nomModele = $_POST['nomModele'];
$longueurPiste = $_POST['longueurPiste'];
$nbPlace = $_POST['nbPlace'];
$periodeGrandeRevision = $_POST['periodeGrandeRevision'];
$periodePetiteRevision = $_POST['periodePetiteRevision'];
$rayonDaction = $_POST['rayonDaction'];


$resultat=$connexion->prepare("INSERT INTO modele VALUES (NULL, :idNomModele, :idLongueurPiste, :idRayonDaction, :idNbPlace, :idPetiteRev, :idGrandeRev)");
$resultat->execute(Array('idNomModele' => $nomModele, 'idLongueurPiste' => $longueurPiste, 'idRayonDaction' => $rayonDaction, 'idNbPlace' => $nbPlace, 'idPetiteRev' => $periodePetiteRevision, 'idGrandeRev' => $periodeGrandeRevision));

?>