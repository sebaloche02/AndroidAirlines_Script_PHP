<?php
$PARAM_hote='localhost'; // le chemin vers le serveur
$PARAM_port='3306';
$PARAM_nom_bd='airlines'; // le nom de votre base de données
$PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter

$connexion = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);

$resultat=$connexion->prepare("SELECT idAvion,immatriculationAvion,idRevision,dateDebut,statutRevision FROM revision WHERE dateDebut IS NOT NULL AND dateFin IS NULL");
$resultat->execute();
$out=$resultat->fetchAll(PDO::FETCH_ASSOC);
print(json_encode($out));
?>