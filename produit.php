<?php
Session_start();
$mysql = new Mysqli('localhost', 'root', 'root','td_steam');
$result = $mysql ->query('SELECT * FROM produit WHERE id = '.$_GET['id']);
$produit = $result->fetch_assoc(); 

require_once 'panier.php';
$panier = new Panier('produits');
$qte= 1;
if ($produitPanier = $panier->get($_GET['id'])) {
$qte = $produitPanier['qte'];
}
?>
<h3><?php print $produit['nom']?> | <?php print $produit['prix'] ?> euro</h3>
<p><?php print $produit['description']?></p>
<form action="ajouter_panier.php" method="post">
	<p>
		<label>Quantité :</label>
		<input type="text" name="qte" value="<?php print $qte ?>"/>
	</p>
	<p>
		<input type="hidden" name="id" value="<?php print $produit['id'] ?>" />
		<input type="submit"  value="Acheter" />
	</p>
</form>

