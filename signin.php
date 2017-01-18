<?php 
session_start();
include ("header.php"); ?>

 <header class="intro-header">

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>TP - STEAM</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>


<!-- Blog Search Well -->
<div class="well">
            <form class="form-horizontal" method="post" action="signin.php">
                <div class="modal-content">

                    <div class="modal-header"><h4>Inscription</h4></div>
                    <div class="modal-body">
                        <div class="input-group">

                            <div class="col-lg-3">Pseudo :</div>
                            <div class="form-group col-lg-9"><input class="form-control" type="text" name="pseudo" placeholder="Pseudo"></div>

                            <div class="col-lg-3">Password :</div>
                            <div class="form-group col-lg-9"><input class="form-control" type="text" name="password" placeholder="Password"></div>

                            <div class="col-lg-3">Email :</div>
                            <div class="form-group col-lg-9"><input class="form-control" type="email" name="email" placeholder="Email"></div>



                            <div class="col-lg-3">Age :</div>

                            <div class="col-lg-3"> <input type="radio" name="age" value="20"/> 15-25 ans</div>
                            <div class="col-lg-3"><input type="radio" name="age" value="20"/> 25-35 ans</div>
                            <div class="col-lg-3"><input type="radio" name="age" value="20"/> 35 + ans</div>
                            <div class="col-lg-12" style="margin-top:15px;">
                                <div class="col-lg-3">Sexe :</div>

                                <select name="sexe">
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                </select>
                            </div>
                            <input type="submit" value="Log in" class="btn  btn-primary pull-right">
            </form>
</div>


<?php  include("conf/bd.php");

  if (isset($_POST["pseudo"]) &&
    isset($_POST["password"]) &&
    isset($_POST["email"]) &&
    isset($_POST["sexe"]) &&
    isset($_POST["age"])) {


$pseudo = htmlspecialchars($_POST["pseudo"]);
$password = htmlspecialchars($_POST["password"]);
$email = htmlspecialchars($_POST["email"]);
$sexe = htmlspecialchars($_POST["sexe"]);
$age = htmlspecialchars($_POST["age"]);

echo "la";
$request = $db->prepare("SELECT id FROM joueurs WHERE pseudo LIKE :pseudo OR email LIKE :email");

    $request->execute(
        array(
            "pseudo" => $pseudo,
            "email" => $email
        )
    );

    $members = $request->fetchAll();

        if (sizeof($joueurs) == 0) {
             $request = $db->prepare("INSERT INTO joueurs (pseudo, password, email,inscription_date, is_admin, sexe, age) VALUES (:pseudo, :password, :email, NOW(), 0, :sexe, :age)");
        $request->execute(
            array(
                "pseudo" => $pseudo,
                "password" => $password,
                "email" => $email,
                "sexe" => $sexe,
                "age" => $age
            )
        );

        echo "Vous etes inscrit ;)";

    }
        

        else {
            echo "Error : this member already exists";
        }
}
   
?>
<div class="col-md-4">


        <!-- Footer -->
       

  



  

