<?php 
include("includes/sessionStart.php"); 
include("includes/startPDO.php");

if(!empty($_POST["id"]) && !empty($_POST["pas"])){
    //$id= htmlspecialchars($_POST["id"], ENT_QUOTES, 'UTF-8', false);
    //$pas = htmlspecialchars($_POST["pas"], ENT_QUOTES, 'UTF-8', false);
    $id = $_POST["id"];
    $pas = $_POST["pas"];


    $reponse = $bdd->prepare("SELECT * FROM utilisateur WHERE Utilisateur_Login='{$id}'");
    $reponse -> execute();

    if($donnees = $reponse-> fetch()){
        $hash = $donnees['Utilisateur_Motdepasse'];
        if(password_verify($pas,$hash)){
        $_SESSION["id"] = $donnees['Utilisateur_id'];
        $_SESSION['login']=$id;
        $_SESSION["password"] =$pas;
        $_SESSION['statut']=$donnees["Statut"];
        header("Location: index.php");
        }
        else{
            header("Location: pageConnexion.php?co=false");
        }

    }

    else{
        header("Location: pageConnexion.php?co=false");
    }
    
}
else{
    header("Location: pageConnexion.php?vide=true");
}

?>