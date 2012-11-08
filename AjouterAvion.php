<?php
$PARAM_hote='localhost'; // le chemin vers le serveur
$PARAM_port='3306';
$PARAM_nom_bd='airlines'; // le nom de votre base de données
$PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter

$connexion = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);

//$_POST['numImmatriculation'] = 'fhgyt';
//$_POST['dateMisEnService'] = '2011/4/23';
//$_POST['idModele'] = '1';
//$_POST['idAeroport'] = '2';

$numImmatriculation = $_POST['numImmatriculation'];
$dateMisEnService = $_POST['dateMisEnService'];
$idModele = $_POST['idModele'];
$idAeroport = $_POST['idAeroport'];


$resultat=$connexion->prepare("INSERT INTO avion VALUES (NULL, :idImmatri, :idDate, :idNbHeure, :idNbHeureGR, :idNbHeurePR, :idStatut, :idModele, :idLocalisation, :idAeroport)");
$resultat->execute(Array('idImmatri' => $numImmatriculation, 'idDate' => $dateMisEnService, 'idNbHeure' => 0, 'idNbHeureGR' => 0, 'idNbHeurePR' => 0, 'idStatut' => 'disponible', 'idModele' => $idModele, 'idLocalisation' => $idAeroport, 'idAeroport' => $idAeroport));

?>