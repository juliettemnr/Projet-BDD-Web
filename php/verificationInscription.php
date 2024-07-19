<?php 
include("includes/sessionStart.php"); 
include("includes/startPDO.php");

if(!empty($_POST["id"]) && !empty($_POST["pas"]) && !empty($_POST["pas2"])){

    $id = $_POST["id"];
    $pas = $_POST["pas"];
    $pas2 = $_POST["pas2"];

    if($pas !=$pas2){
        header("Location: pageInscription.php?ins=false");
    }
    else {

        $reponse = $bdd->prepare("SELECT * FROM utilisateur WHERE Utilisateur_Login='{$id}'");
        $reponse -> execute();

        if($donnees = $reponse-> fetch()){
            header("Location: pageInscription.php?user=true");
        }
        else{
            $hashpas = password_hash($pas, PASSWORD_BCRYPT);
            $insertion = $bdd->prepare("INSERT INTO utilisateur (Utilisateur_Login, Utilisateur_Motdepasse) VALUES('{$id}','{$hashpas}')");
            $insertion ->execute();
            header("Location: pageConnexion.php");

        }


    }

}
else{
    header("Location: pageInscription.php,vide=true");
}
?>