<?php include("includes/sessionStart.php"); ?>
<!DOCTYPE HTML>

<html>

<?php require_once("includes/head.php"); ?>
	
<body>

<?php include("includes/barreNavigation.php") ; 
include("includes/startPDO.php");

?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="pageAdmin.php">Admin</a></li>
        <li class="breadcrumb-item"><a href="pageModifierHistoire.php">Modification Histoire</a></li>
        <li class="breadcrumb-item active" aria-current="page">Modifier choix</li>
    </ol>
</nav>

<?php
if(isset($_POST["paraTitre"]) && !empty($_POST["paraTexte"]) && isset($_POST['vie'])){
    $paraTitre =  htmlspecialchars($_POST["paraTitre"], ENT_QUOTES, 'UTF-8', false);
    $paraTexte = htmlspecialchars($_POST["paraTexte"], ENT_QUOTES, 'UTF-8', false); 
    $vie = $_POST['vie'];
    $id=$_GET['para'];

    if (empty($_POST['dernier'])){
        $dernier = 0;
    }
    else{
        $dernier=2;
    }
    $req = $bdd->prepare('UPDATE `paragraphe` SET `Paragraphe_titre`=? WHERE Paragraphe_id=?');
    $req->execute(array($paraTitre,$id ));
    
    $req2 = $bdd->prepare('UPDATE `paragraphe` SET `Paragraphe_Texte`=? WHERE Paragraphe_id=?');
    $req2->execute(array($paraTexte,$id )); 
    
    $req3 = $bdd -> prepare('UPDATE `paragraphe` SET `PointDeVie`=? WHERE Paragraphe_id=?');
    $req3->execute(array($vie,$id ));
     
    $req4 = $bdd -> prepare('UPDATE `paragraphe` SET `Paragraphe_Type`=? WHERE Paragraphe_id=?');
    $req4->execute(array($dernier,$id ));


    
    echo "<p class='alert alert-success text-center' role='alert'> Paragraphe modifié !</p>";
} 
else if(isset($_POST["choixTitre"]) && !empty($_POST["idPara"]) && !empty($_POST["idEnvoi"])){
    $choixTitre = $_POST["choixTitre"];
    $idPara = $_POST["idPara"];
    $idEnvoi=$_POST['idEnvoi'];
    $id = $_GET['choix'];

    $req = $bdd->prepare('UPDATE `choix` SET `Choix_texte`=? WHERE `Choix_id`=?');
    $req->execute(array($choixTitre,$id ));
    
    $req2 = $bdd->prepare('UPDATE `choix` SET `Paragraphe_id`=? WHERE `Choix_id`=?');
    $req2->execute(array($idPara,$id )); 

    $req3 = $bdd->prepare('UPDATE `choix` SET `Envoi_id`=? WHERE `Choix_id`=?');
    $req3->execute(array($idEnvoi,$id )); 


    echo "<p class='alert alert-success text-center' role='alert'> Choix modifié !</p>";

} 
else{
    echo "<p class='alert alert-primary text-center' role='alert'> La modification a échouée ...</p>";
}

?>


<?php include("includes/piedDePage.php"); ?>

</body>
</html>
