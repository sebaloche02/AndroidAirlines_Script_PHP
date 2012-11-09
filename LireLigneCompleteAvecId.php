<?php
$PARAM_hote='localhost'; // le chemin vers le serveur
$PARAM_port='3306';
$PARAM_nom_bd='airlines'; // le nom de votre base de données
$PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter

$connexion = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
$nomTable = $_POST['nomTable'];
$id = $_POST['id'];

//$id = '1';
//$nomTable = 'modele';


if($nomTable == 'avion'){
//INNER JOIN aeroport on avion.localisation=aeroport.idAeroport
$resultat=$connexion->prepare("SELECT avion.idAvion,avion.numImmatriculation,avion.dateMisEnService,avion.nombreHeureTotale,
avion.nbHeureVolDepuisGrandeRevision,avion.nbHeureVolDepuisPetiteRevision,avion.statut,modele.nomModele, avion.idModele,
aliasAeroLocalisation.nomAeroport AS aeroL,aliasAeroAttache.nomAeroport AS aeroA,
revision.idRevision, revision.datePrevue, revision.statutRevision 
FROM avion INNER JOIN modele on avion.idModele=modele.idModele 
INNER JOIN aeroport AS aliasAeroAttache on avion.idAeroportDattache=aliasAeroAttache.idAeroport 
INNER JOIN aeroport AS aliasAeroLocalisation on avion.localisation=aliasAeroLocalisation.idAeroport 
INNER JOIN revision on avion.idAvion=revision.idAvion
WHERE avion.idAvion=$id");
$resultat->execute();
$out=$resultat->fetchAll(PDO::FETCH_ASSOC);
$out_json = json_encode($out);

if($out_json =='[]'){
$resultat=$connexion->prepare("SELECT avion.idAvion,avion.numImmatriculation,avion.dateMisEnService,avion.nombreHeureTotale,
avion.nbHeureVolDepuisGrandeRevision,avion.nbHeureVolDepuisPetiteRevision,avion.statut,modele.nomModele, avion.idModele,
aliasAeroLocalisation.nomAeroport AS aeroL,aliasAeroAttache.nomAeroport AS aeroA
FROM avion INNER JOIN modele on avion.idModele=modele.idModele 
INNER JOIN aeroport AS aliasAeroAttache on avion.idAeroportDattache=aliasAeroAttache.idAeroport 
INNER JOIN aeroport AS aliasAeroLocalisation on avion.localisation=aliasAeroLocalisation.idAeroport 
WHERE avion.idAvion=$id");
$resultat->execute();
$out=$resultat->fetchAll(PDO::FETCH_ASSOC);
$out_json = json_encode($out);
}
}

if($nomTable == 'modele'){
$resultat=$connexion->prepare("SELECT * FROM modele WHERE idModele= :idIdModele");
$resultat->execute(array('idIdModele' => $id));
$out=$resultat->fetchAll(PDO::FETCH_ASSOC);
$out_json = json_encode($out);
}

print($out_json);

$resultat=NULL;
?>