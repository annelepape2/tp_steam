<?php 

Session_start();
require_once 'panier.php';
$panier = new Panier('produits');
$panier->delete($_GET['id']);
header('location: votre_panier.php')

?>