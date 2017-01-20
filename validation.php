<?php
Session_start();
$mysql = new Mysqli('localhost', 'root', 'root','panier');
$req = $bdd->prepare('INSERT INTO joueurs(nom, prix, id ) VALUES(:nom, :prix)');
$req->execute(array(
	'nom' => $nom,
	'prix' => $prix
	
	));

echo 'Le jeu a bien été ajouté !';
?>