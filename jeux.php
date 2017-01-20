<?php
Session_start();
$mysql = new Mysqli('localhost', 'root', 'root','td_steam');
$result = $mysql ->query('SELECT * FROM produit');

?>
<ul><?php while ($data =$result->fetch_assoc()){ ?>
	<li><a href="produit.php?id=<?php print $data['id']?>"><?php print $data['nom'] ?> </a></li>
	
<?php } ?>
</ul>