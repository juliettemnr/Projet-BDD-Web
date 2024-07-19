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
    <li class="breadcrumb-item active" aria-current="page"> Statistiques Histoire</li>
  </ol>
</nav>

    
  <div class=text-center> 
    <h1 >Statistique des histoires</h1>
    </br>
  </div>

<div class="container">

<?php 

if(!isset($_GET['Id'])){
  $reponse = $bdd->query("SELECT * FROM histoire ");
  while($donnees = $reponse-> fetch()){
      ?> <a href = 'statistiqueAdmin.php?Id=<?php echo $donnees['Histoire_id']; ?>' class='btn btn-primary' role='button' aria-pressed='true'> <?php echo $donnees['Histoire_Titre'] ;?> </a> 
  <?php
  }
}
else{
  $id_hist = $_GET['Id'];

  $reponse = $bdd->prepare("SELECT Partie_id FROM progression WHERE Histoire_id = ?  ");
  $reponse -> execute(array($id_hist));
  $result = $reponse ->fetchAll();

  $reponse2 = $bdd->prepare("SELECT * FROM histoire WHERE Histoire_id = ?  ");
  $reponse2 -> execute(array($id_hist));
  $result2 = $reponse2 ->fetch();



?>

<div class="card">
    <div class="card-title">
        Nombre de fois où l'histoire a été jouée : <?php echo count($result); ?>
    </div>
      <div class="card-title">
        Pourcentage de fois où l'histoire a été gagnée : 
        <?php
         $pourcentage = ($result2['NombreVictoire']/count($result))*100; 
         ?>
        <div class="progress">
          <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $pourcentage;?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $pourcentage;?>%</div>
          </div>
        </div>
      <div class="card-title">
    Pourcentage de fois où l'histoire a été perdue :
    <?php
         $pourcentage = ($result2['NombreDefaite']/count($result))*100; 
         ?>
        <div class="progress">
          <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $pourcentage;?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $pourcentage;?>%</div>
          </div>
        </div>
    </div>




</div>
<?php

}
  ?>
<?php include("includes/piedDePage.php"); ?>

</div>
</body>
</html>