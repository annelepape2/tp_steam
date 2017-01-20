<?php 

Session_start();
require_once 'panier.php';
$panier = new Panier('produits');
$listeProduits =$panier->getPanier();
 
if(!$listeProduits){ 
?>
  <p>Votre panier est vide</p>
<?php
}else {

  ?>
<table>
    <tr>
        <td>Nom</td>
        <td>Prix</td>
        <td>Quantité</td>
        <td></td>
    </tr>
    <?php foreach ($listeProduits as $produit){?>
       <tr>
        <td><?php print $produit['nom']?></td>
        <td><?php print $produit['prix']?></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
        <td><?php print $produit['qte']?></td>
        <td><a href="produit.php?id=<?php print $data['id']?>">Modifier></a> |
          <a href="supprimer_panier.php?id=<?php print $data['id']?>">Supprimer></a></td>
          <a href="validation.php?id=<?php print $data['id']?>">valider></a></td>


       </tr>
   <?php }?>
</table>


<?php 
}
?>