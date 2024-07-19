<?php include("includes/sessionStart.php"); ?>
<!DOCTYPE HTML>

<html>

<?php require_once("includes/head.php"); ?>
	
<body>
<div class=container>
  <style>
        /* The heart of the matter */
          
        .horizontal-scrollable > .row {
            overflow-x: auto;
            white-space: nowrap;

        
        }
          
        .horizontal-scrollable > .row > .col-xs-4 {
            display: inline-block;

        }
        /* Decorations */
          
        .col-xs-4 {
            color: white;
            font-size: 24px;
            padding-bottom: 20px;
            padding-top: 18px;
        }

  </style>

<?php 
include("includes/barreNavigation.php") ; 
include("includes/startPDO.php");
?>
<?php 
if(isset($_SESSION["id"]))
{
 echo "<a class='dropdown-item text-center' href='deconnexionUtilisateur.php'>Se Déconnecter</a>" ; 
} 
else
{ 
  echo "<a class='dropdown-item text-center' href='pageConnexion.php'>Se Connecter</a>";
  echo "<a class='dropdown-item text-center' href='pageInscription.php'>S'inscrire</a>";
} 

?>


<ol class="breadcrumb">
<i class="fa-solid fa-quote-left fa-2x fa-pull-left"></i>
  <li>Liste des histoires disponibles</a></li>
</ol>
<?php 
  $reponse = $bdd->query("SELECT * FROM histoire WHERE cache=1");
  $result = $reponse -> fetchAll();
  echo "<div class='container horizontal-scrollable'>";
  echo"<div class='row text-center'>";
  
foreach($result as $histoire)
{
        ?> 
 <div class="col-xs-4">
    <div class="card" style="width : 300px;">
      <img class="card-img-top " style ="width : 300px; height : 150px;" src="img/<?php echo $histoire['Histoire_Image'] ?>" alt="Image histoire">
      <div class="card-body">
        <h5 class="card-title"><?php echo $histoire['Histoire_Titre'] ?></h5>
        <?php 
        if (isset($_SESSION['id'])){
          ?> <a href="histoire.php?Id=<?php echo $histoire['Histoire_id1erParagraphe'] ;?>&Theme=<?php echo $histoire['Histoire_Theme'];?>&Hist=<?php echo $histoire['Histoire_id'];?>" class="btn btn-primary">Commencer l'histoire</a><?php
        }
        else{
          ?><p class="card-text">Connectez-vous pour commencer</p> <?php
        }
        
        ?>
      </div>
    </div>
</div>
  <?php
}
  echo "</div></div>";


?>


<ol class="breadcrumb">
<i class="fa-solid fa-quote-left fa-2x fa-pull-left"></i>
  <li>Mes Histoires en cours</li>
</ol>
<?php 

if(isset($_SESSION['id']))
{

  $reponse = $bdd->prepare("SELECT * FROM progression WHERE Utilisateur_id= ? ");
  $reponse -> execute(array($_SESSION['id']));
  echo "<div class='container horizontal-scrollable'>";
  echo"<div class='row text-center'>";
  while($donnees = $reponse-> fetch())
  {
    $reponse2 = $bdd->prepare("SELECT * FROM histoire WHERE Histoire_id=? ");
    $reponse2 -> execute(array($donnees['Histoire_id']));
    $donnees2 = $reponse2-> fetch();

  if($donnees2['Cache']==1)
  {
      ?> 
   <div class="col-xs-4">
    <div class="card" style="width : 300px;">
      <img class="card-img-top " style ="width : 300px; height : 150px;" src="img/<?php echo $donnees2['Histoire_Image'] ?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?php echo $donnees2['Histoire_Titre'] ?></h5>
          <a href="histoire.php?Id=<?php echo $donnees['Paragraphe_id'] ;?>&Theme=<?php echo $donnees2['Histoire_Theme'];?>&partie=<?php echo $donnees['Partie_id'];?>" class="btn btn-primary">Reprendre l'histoire</a>
        </div>
      </div>
    </div>
    
      <?php
      
  }
 
  }
  echo "</div></div>";


}
else
{
 

}


if(isset($_SESSION["id"])&&($_SESSION['statut']=="admin"))
{
?>
<ol class="breadcrumb">
<i class="fa-solid fa-quote-left fa-2x fa-pull-left"></i>
  <li>Paramètre Histoire Administrateur </li>
</ol>

<div class="card-deck">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">  Ici, vous pouvez ajouter une histoire </h5>
      <a href="pageCreationHistoire.php" class="btn btn-primary"> Ajouter une histoire</a>
    </div>
  </div>
  
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">  Ici, vous pouvez modifier une histoire </h5>
      <a href="pageModifierHistoire.php" class="btn btn-primary"> Modifier une histoire</a>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">  Ici, vous pouvez voir une histoire </h5>
      <a href="voirHistoire.php" class="btn btn-primary"> Voir une histoire</a>
    </div>
  </div>
 
</div>


<div class="card-deck">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">  Ici, vous pouvez supprimer une histoire </h5>
      <a href="supprimerHistoire.php" class="btn btn-primary"> Supprimer une histoire</a>
    </div>
  </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">  Ici, vous pouvez cacher une histoire </h5>
           <a href="cacherHistoire.php" class="btn btn-primary"> Cacher une histoire</a>
        </div>
     </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">  Ici, vous pouvezvoir les statistiques d'une histoire </h5>
              <a href="statistiqueAdmin.php" class="btn btn-primary"> Statistiques histoire</a>
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
