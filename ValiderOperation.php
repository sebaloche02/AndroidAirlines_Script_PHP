<?php
$PARAM_hote='localhost'; // le chemin vers le serveur
$PARAM_port='3306';
$PARAM_nom_bd='airlines'; // le nom de votre base de données
$PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter

$connexion = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);

//$_POST['idUser'] = '2';
//$_POST['dateFin'] = '2012-12-21';
//$_POST['idOperation'] = '7';

$idUser = $_POST['idUser'];
$dateFin = $_POST['dateFin'];
$idOperation = $_POST['idOperation'];

$resultat=$connexion->prepare("UPDATE operation SET dateFin = :idDateFin, idUser = :idIdUser, statutOperation = :idTerminee WHERE idOperation = :idIdOperation");
$resultat->execute(Array('idDateFin' => $dateFin, 'idIdUser' => $idUser, 'idIdOperation' => $idOperation, 'idTerminee' => 'terminee'));

?>