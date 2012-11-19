<?php
$PARAM_hote='localhost'; // le chemin vers le serveur
$PARAM_port='3306';
$PARAM_nom_bd='airlines'; // le nom de votre base de donn�es
$PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter

$connexion = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
$_POST['idRevision'] = 3;
$resultat=$connexion->prepare("SELECT idOperation, nomOperation FROM operation WHERE idRevision = :idIdRevision AND statutOperation = :idEnCours");
$resultat->execute(array('idIdRevision' => $_POST['idRevision'], 'idEnCours' => 'enCours'));
$out=$resultat->fetchAll(PDO::FETCH_ASSOC);
print(json_encode($out));
?>