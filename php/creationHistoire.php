<?php include("includes/sessionStart.php"); ?>
<!DOCTYPE HTML>

<html>

<?php require_once("includes/head.php"); ?>
	
<body>

<?php 
include("includes/barreNavigation.php") ; 
include("includes/startPDO.php");

if(!empty($_POST["para1"]) && !empty($_POST["titre"]) && !empty($_POST["style"]) && !empty($_POST["titrepara"])&&isset($_POST["vie"])){
    $para1 = htmlspecialchars($_POST["para1"], ENT_QUOTES, 'UTF-8', false);
    $titre = htmlspecialchars($_POST["titre"], ENT_QUOTES, 'UTF-8', false);
    $titrepara= htmlspecialchars($_POST["titrepara"], ENT_QUOTES, 'UTF-8', false);
    $style = htmlspecialchars($_POST["style"], ENT_QUOTES, 'UTF-8', false);
    $vie =htmlspecialchars($_POST["vie"], ENT_QUOTES, 'UTF-8', false);

        $tmpFile = $_FILES['image']['tmp_name'];

    if (is_uploaded_file($tmpFile)) 
    {
    // upload movie image
        $image = basename($_FILES['image']['name']);
        $uploadedFile = "img/$image";
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile);
    }

    $req = $bdd->prepare('INSERT INTO `paragraphe` (`Paragraphe_Type`,`Paragraphe_Texte`,`Paragraphe_titre`, `Histoire_id`,`PointDeVie`) VALUES (:style, :texte,:titre, :id, :pointVie)');
    $req->execute(array(
    'style' => 0,
    'texte' => $para1,
    'titre' => $titrepara,
    'id'=> 0,
    'pointVie'=>$vie,
    ));


    $id = $bdd->lastInsertId();
    $req2 = $bdd->prepare('INSERT INTO `histoire` (`Histoire_Titre`,`Histoire_Theme`,`Histoire_id1erParagraphe`,`Histoire_Image`,`NombreVictoire`,`NombreDefaite`,`Cache`) VALUES (?,?,?,?,?,?,?)');
    $req2->execute(
        array($titre,$style, $id, $image,0,0,1
        )
    );

    $hist_id = $bdd->lastInsertId();
    $req3 = $bdd->prepare('UPDATE paragraphe SET Histoire_id = ? WHERE Paragraphe_titre=?');
    $req3->execute(
        array($hist_id,$titrepara)
    );
}  
else{
    header("Location: pageCreationHistoire.php?hist=false");
} 

if($hist_id!=0){
    header("Location: creationParagraphe.php?IdHist={$hist_id}");
}

?>



<?php include("includes/piedDePage.php"); ?>

</body>
</html>