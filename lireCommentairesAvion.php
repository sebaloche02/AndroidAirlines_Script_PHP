<?php
$PARAM_hote='localhost'; // le chemin vers le serveur
$PARAM_port='3306';
$PARAM_nom_bd='airlines'; // le nom de votre base de donn�es
$PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter

$connexion = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);

//$_POST['idAvion'] = '1';

$idAvion = $_POST['idAvion'];
$resultat=$connexion->prepare("SELECT * FROM commentaire WHERE commentaire.idAvion = :idIdAvion");
$resultat->execute(array('idIdAvion' => $idAvion));

$out=$resultat->fetchAll(PDO::FETCH_ASSOC);
print(json_encode($out));
?>