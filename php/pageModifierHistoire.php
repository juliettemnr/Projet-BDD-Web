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
    <li class="breadcrumb-item active" aria-current="page"> Modification Histoire</li>
  </ol>
</nav>


<div class=text-center> 
<h1 >Modifier votre histoire</h1>
</br>
</div>

<div class="container">

<?php 

if(!isset($_GET['IdHist']))
{
  $reponse = $bdd->query("SELECT * FROM histoire ");
  while($donnees = $reponse-> fetch())
  {
  ?> 
      
     
  <a href = 'pageModifierHistoire.php?IdHist=<?php echo $donnees['Histoire_id']; ?>' class='btn btn-primary' role='button' aria-pressed='true' > <?php echo $donnees['Histoire_Titre'] ;?> </a> 
 
  <?php
  }
}
else{
  $id_hist = $_GET['IdHist'];

  ?>
  <a href = 'creationParagraphe.php?IdHist=<?php echo $id_hist ;?>' class='btn btn-primary' role='button' aria-pressed='true' > Ajouter paragraphe </a> 
  <a href = 'creationChoix.php?IdHist=<?php echo $id_hist ;?>' class='btn btn-primary' role='button' aria-pressed='true' > Ajouter choix </a> 
</br>
</br>
 <?php

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
      <a style="color:green; font-size:30px"  href='modifierHistoire.php?para=<?php echo $para['Paragraphe_id'] ;?>' ><b><?php echo $para['Paragraphe_titre'] ;?></b> </a> 
      <p><?php echo $para['Paragraphe_Texte'] ;?> </p> 
  <?php
    foreach($result2 as $para2){
      ?> <div class = col >
          <a style="color:#00081c;font-size:22px"  href='modifierHistoire.php?choix=<?php echo $para2['Choix_id'] ;?>&hist=<?php echo $id_hist ;?>'><b><?php echo $para2['Choix_texte'] ;?></b> </a> 
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