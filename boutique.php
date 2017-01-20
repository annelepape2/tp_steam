<?php session_start();
$base = mysql_connect ('localhost', 'root', 'root');
mysql_select_db ('boutique', $base) ;
?>
<html>
<head>
<title>Nom et tél des membres</title>
</head>
<body>
<?php
 
// lancement de la requête (on impose aucune condition puisque l'on désire obtenir la liste complète des propriétaires
$sql = 'SELECT * FROM fleuriste';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on va scanner tous les tuples un par un
while ($data = mysql_fetch_array($req)) {
	// on affiche les résultats
	echo 'Nom : '.$data['nom'].'<br />';
	
}
mysql_free_result ($req);
mysql_close ();
?>
</body>
</html>