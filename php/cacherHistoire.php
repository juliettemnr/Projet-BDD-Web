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
    <li class="breadcrumb-item active" aria-current="page"> Cacher Histoire</li>
  </ol>
</nav>

    
<div class="container">

  <div class=text-center> 
    <h2>Pour changer l'affichage : veuiller cliquer sur l'histoire </h2>
    </br>
  </div>

<?php 

if(isset($_GET['Id'])){
  $id_hist = $_GET['Id'];
  $req = $bdd->prepare('UPDATE `histoire` SET `Cache`=? WHERE Histoire_id=?');
  $req->execute(array(0, $id_hist ));

?>
<?php
}
else if(isset($_GET['ID'])){
    $id_hist = $_GET['ID'];
    $req = $bdd->prepare('UPDATE `histoire` SET `Cache`=? WHERE Histoire_id=?');
    $req->execute(array(1, $id_hist ));
  
  ?>
  <?php
  }
        ?>
      <div class=text-center> 
           <h5>Histoires affichées</h5>
           </br>
      </div>
      <?php
      $reponse = $bdd->query("SELECT * FROM histoire WHERE Cache=1");
while($donnees = $reponse-> fetch())
{
       ?>
      <a href = 'cacherHistoire.php?Id=<?php echo $donnees['Histoire_id']; ?>' class='btn btn-primary' role='button' aria-pressed='true'> <?php echo $donnees['Histoire_Titre'] ;?> </a> 
      
      <?php
}
    
      ?>
      <div class=text-center> 
        <h5>Histoires cachées</h5>
        </br>
      </div>
      <?php
    
    $reponse = $bdd->query("SELECT * FROM histoire WHERE Cache=0");
while($donnees = $reponse-> fetch())
{
      ?>
     <a href = 'cacherHistoire.php?ID=<?php echo $donnees['Histoire_id']; ?>' class='btn btn-primary' role='button' aria-pressed='true'> <?php echo $donnees['Histoire_Titre'] ;?> </a> 
    <?php
    
}
    ?>

<?php include("includes/piedDePage.php"); ?>

</div>
</body>
</html>