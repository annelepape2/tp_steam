<?php 
Session_start();
$mysql = new Mysqli('localhost', 'root', 'root','panier');
$result = $mysql ->query('SELECT * FROM produit WHERE id = '.$_POST['id']);
$produit = $result ->fetch_assoc(); 

require_once 'panier.php';
$panier = new Panier('produits');
$valeurs  = array(
    'nom' => $produit['nom'],
    'prix' => $produit['prix'],
    'qte' => $produit['qte'],
    'id' => $produit['id'] 

    );
$panier ->set( $_Post['id'], $valeurs);
header('location: votre_panier.php');
?>