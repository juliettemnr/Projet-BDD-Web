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
    <li class="breadcrumb-item active" aria-current="page"> Afficher Histoire</li>
  </ol>
</nav>

  <div class=text-center> 
    <h1 >Visualiser votre histoire</h1>
    </br>
  </div>
<div class="container">

<?php 

if(!isset($_GET['Id'])){
  $reponse = $bdd->query("SELECT * FROM histoire ");
  while($donnees = $reponse-> fetch()){
      ?> <a href = 'voirHistoire.php?Id=<?php echo $donnees['Histoire_id']; ?>' class='btn btn-primary' role='button' aria-pressed='true'> <?php echo $donnees['Histoire_Titre'] ;?> </a> 
  <?php
  }
}
else{
  $id_hist = $_GET['Id'];

  $reponse = $bdd->prepare("SELECT * FROM paragraphe WHERE Histoire_id = ?  ");
  $reponse -> execute(array($id_hist));
  $result = $reponse ->fetchAll();
?>

  
<?php

  foreach($result as $para){
    $reponse2 = $bdd->prepare("SELECT * FROM choix WHERE Paragraphe_id = ?  ");
    $reponse2 -> execute(array($para['Paragraphe_id']));
    $result2 = $reponse2 ->fetchAll();
    
    ?>
    
          <h3 class=text-success><?php echo $para['Paragraphe_titre'] ;?> </h3> 
          <p><?php echo $para['Paragraphe_Texte'] ;?> </p> 
      
  <?php
    foreach($result2 as $para2){
      ?> 
        <div class = col>
          <p class=font-weight-bold ><?php echo $para2['Choix_texte'] ;?> </p> 
        </div>
  <?php
    }
    ?>
     </br>
<?php
  }
}
  ?>
<?php include("includes/piedDePage.php"); ?>

</div>
</body>
</html>