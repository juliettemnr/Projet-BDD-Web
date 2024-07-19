<?php include("includes/sessionStart.php"); ?>
<!DOCTYPE HTML>

<html>

<?php require_once("includes/head.php"); ?>
	
<body class="pageprincipale">

<?php include("includes/barreNavigation.php") ; 
include("includes/startPDO.php");

?>

</br>

<div class="container-col6 text-center bg-secondary">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" style="background-color:#00081c";>
      <div class="carousel-item active">
        <img src="img/blackhole.jpg" alt="image d'un trou noir" class='img-responsive'  > 
        <div class='carousel-caption d-none d-md-block'>
          <a class="text-container" href='mesHistoire.php'>
          Laissez-vous embarquer dans un voyage immersif !
         </a>
        
        </div>
    </div>
      
  
 <?php 

 if(isset($_SESSION["id"]))
 {
  $reponse = $bdd->prepare("SELECT * FROM histoire ");
  $reponse -> execute();
                
  while($donnees = $reponse-> fetch())
  {
  echo " 
    <div class='carousel-item'>
       <img src='img/{$donnees['Histoire_Image']}' alt='image de l'histoire' class='rounded img-responsive' >
                                  
       <div class='carousel-caption d-none d-md-block'>
          <a class='text-center1' href='histoire.php?Id={$donnees['Histoire_id1erParagraphe']}&Theme={$donnees['Histoire_Theme']}&Hist={$donnees['Histoire_id']}'>{$donnees['Histoire_Titre']}</a>
      </div>
    </div>
       "; 
  }
}
 else
 {  
   echo " 
        <div class='carousel-item'>
           <img src='img/livre.png' alt='image d'un livre' class='rounded img-responsive' >
             <div class='carousel-caption d-none d-md-block'>
               <div class=text-container>  Connectez-vous pour voir les merveilleuses histoires ! </div>
                </div>
        </div>
          "; 
} 
             

      
          ?>

  </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  </div>

  


<?php 

include("includes/piedDePage.php");
//include("includes/bas.php"); ?>

</body>
</html>