
    <?php 
		$host = "localhost";
		$dbName = "td_steam"; // Le nom de la base créee
		$user = "root";
		$password = "";

	//essai connexion

		try{
			$db = new PDO ('mysql:host='.$host.';dbname='.$dbName.';charset-utf8', $user, $password);
		}

	// si non, on affiche l'erreur

		catch (Exception $e){
			die('Erreur : '.$e->getMessage());
		}


  ?>