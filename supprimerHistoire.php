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
    <li class="breadcrumb-item active" aria-current="page">Supprimer Histoire</li>
  </ol>
</nav>


<div class=text-center> 
<h1 >Supprimer votre histoire</h1>
</br>
</div>

<?php 

if(!isset($_GET['Id'])){
  $reponse = $bdd->query("SELECT * FROM histoire ");
  while($donnees = $reponse-> fetch()){
      ?> <a href = 'supprimerHistoire.php?Id=<?php echo $donnees['Histoire_id']; ?>' class='btn btn-primary' role='button' aria-pressed='true' > <?php echo $donnees['Histoire_Titre'] ;?> </a> 
  <?php
  }
}
else{
    $id_hist = $_GET['Id']; 

    $response = $bdd->prepare('DELETE FROM `progression` WHERE `Histoire_id`=?');
    $response->execute(array($id_hist));

    $response2 = $bdd->prepare('DELETE FROM `histoire` WHERE `Histoire_id`=?');
    $response2->execute(array($id_hist));

    echo "<p class='alert alert-success text-center' role='alert'> Histoire supprimé !</p>";
   
}
  ?> 
  
</div>

<?php include("includes/piedDePage.php"); ?>

</body>
</html>