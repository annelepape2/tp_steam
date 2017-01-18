<?php session_start();
include("conf/bd.php");

if (isset($_POST["pseudo"]) &&
    isset($_POST["password"])) {

    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $password = htmlspecialchars($_POST["password"]);


    $request = $db->prepare("SELECT id FROM joueurs WHERE pseudo LIKE :pseudo AND password= :password");
    $request->execute(
        array(
            "pseudo" => $pseudo,
            "password" => $password
        )
    );
    //fetchAll renvoie un tableau avec tous les membres correspondant à la requête
    $members = $request->fetchAll();
    //si il y en plus de 0 c'est qu'un membre avec ces identifiants existe. On le connecte
    if (sizeof($members) > 0) {
        //on récupère l'id du membre (le [0] est le premier du tableau
        // (et le seul puisqu'on n'autorise pas les doublons)
        $id_member = $members[0]["id"];
        //on crée la variable de session qui nous permettra de savoir qu'il est connecté
        $_SESSION["id_member"] = $id_member;
        echo "bienvenue";
        $link ='';

    }                                       //mauvais identifiants

    else {
        $link= "<a href:'signup.php'>signup</a>";
        echo "Error : pseudo/password is incorrect";
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
    </head>


<body>

<header class="intro-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>TD - Steam</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<form class="form-horizontal" method="post" action="login.php">
    <div class="modal-header">
        <h4>Connexion</h4>

    </div>
    <div class="modal-body">
        <div class="col-lg-3">Pseudo :</div>
        <div class="form-group col-lg-9"><input class="form-control" type="text" name="pseudo" placeholder="Pseudo"></div>
        <div class="col-lg-3">Mot de passe :</div>
        <div class="form-group col-lg-9"><input class="form-control" type="password" name="password" placeholder="Password"></div>
        <input type="submit" value="Log in" class="btn  btn-primary ">
        <a href="logout.php">Déconnexion</a>
    </div>
</form>

</body>
</html>


