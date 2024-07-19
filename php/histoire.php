<?php include("includes/sessionStart.php"); ?>
<!DOCTYPE HTML>

<html>

<?php require_once("includes/head.php"); ?>
	
<body>

<?php 
include("includes/barreNavigation.php") ; 
include("includes/startPDO.php");
// créer une partie
if(isset($_GET['Hist'])){
  $req = $bdd->prepare("INSERT INTO `progression` (`Vie_debut`,`Vie_progression`,`Histoire_id`,`Paragraphe_id`, `Utilisateur_id`) VALUES (?,?,?,?,?)");
  $req -> execute(array(100,100, $_GET['Hist'],$_GET['Id'],$_SESSION['id']));
  $id_partie = $bdd -> lastInsertId();
  $firstpara = $_GET['Id'];
}
// enregistre la progression
else if(isset($_GET['progress'])){
  $id_partie = $_GET['partie'];
  $firstpara = $_GET['Id'];
  $req = $bdd->prepare('UPDATE `progression` SET `Paragraphe_id`=? WHERE Partie_id=?');
  $req->execute(array($firstpara, $id_partie));
}
else{
  //recupère l'id du paragraphe
  $firstpara=$_GET['Id'];
  $id_partie=$_GET['partie'];
}

  // mettre à jour progression
  $req = $bdd->prepare('SELECT * FROM paragraphe WHERE Paragraphe_id=? ');
  $req->execute(array($firstpara));
  $result = $req -> fetch();

  $req2 = $bdd->prepare('SELECT * FROM progression WHERE Partie_id=? ');
  $req2->execute(array($id_partie));
  $result2 = $req2 -> fetch();

  $progress = $result2['Vie_progression'] + $result['PointDeVie'];
  $req = $bdd->prepare('UPDATE `progression` SET `Vie_progression`=? WHERE Partie_id=?');
  $req->execute(array($progress, $id_partie));

  //récupère id de l'histoire 
$id_hist = $result['Histoire_id'];




if($_GET['Theme']==1)
{
  echo "<body style='background-color: black'>";
?> 


<div  id="horreur">
    <div class="col text-center">
      <i class="fa-solid fa-masks-theater"></i>
        <audio controls source src="audio/audio-horror.mp3" type="audio/mpeg">
        <p>If you can read this, your browser does not support the audio element.</p>
        </audio>
      <i class="fa-solid fa-masks-theater"></i>


 <?php  
 $theme=$_GET['Theme'];

  // afficher la barre de vie 
  $reponse2 = $bdd->prepare("SELECT * FROM paragraphe WHERE Paragraphe_id = ? ");
  $reponse2 -> execute(array($firstpara));
  while($donnees2=$reponse2->fetch()){
                        
    if(($donnees2['Paragraphe_Type']!=2)&&($donnees2['Paragraphe_Type']!=1))
    {
                        
    $r = $bdd->prepare("SELECT * FROM progression WHERE Partie_id = ? ");
    $r -> execute(array($id_partie));
    $res = $r -> fetch();
  ?>
                        
  <p class=text-horreur> Barre de vie  </p>
  <div class="progress" style="width :70%">
     <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $res['Vie_progression'] ?>%" aria-valuenow="<?php echo $res['Vie_progression'] ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $res['Vie_progression'] ?>%</div>
  </div>
 <?php
     }
                        
    else if($donnees2['Paragraphe_Type']==2)
    {
                          
    ?>
    <p style="color:red">VOUS ETES MORTS <p>
    <object type="audio/mpeg" width="0" height="0" data="audio/mortfin.mp3">
    <param name="filename" value="audio/mortfin.mp3" />
    <param name="autostart" value="true" />
    <param name="loop" value="true" />
    </object>
                          
    <img src=img/dead.png alt=png class="img-center" width="200px"/> 
                              
    <p class=text-horreur> Barre de vie  </p>
      <div class="progress" style="width : 70%">
        <div class="progress-bar bg-danger" role="progressbar" style="color: silver" style="width: <?php echo '0'?>%" aria-valuenow="<?php echo '0' ?>" aria-valuemin="0" aria-valuemax="100"><?php echo '0' ?>%</div>
          </div>
      <?php    
                            
        // met à jour nombre défaite
        $requete = $bdd ->prepare("SELECT * FROM histoire WHERE Histoire_id=? ");
        $requete ->execute(array($id_hist));
        $result = $requete-> fetch();
        $NombreDefaite= $result['NombreDefaite'];

        $req = $bdd->prepare('UPDATE `histoire` SET `NombreDefaite`=? WHERE Histoire_id=?');
        $req->execute(array($NombreDefaite+1,$id_hist ));
      }
     else if($donnees2['Paragraphe_Type']==1)
      {
      ?>
            
      <p style="color: green"> VICTOIRE !<p>
      <object type="audio/mpeg" width="0" height="0" data="audio/succesfin.mp3">
      <param name="filename" value="audio/succesfin.mp3" />
      <param name="autostart" value="true" />
      <param name="loop" value="true" />
      </object>
                          
      <img src=img/success.png alt=png class="img-center" width="200px"/> 
                          
      <p class=text-horreur> Barre de vie  </p>
      <div class="progress" style="width:70%">
             
         <div class="progress-bar bg-primary" style="width:100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
            
      </div>
                              
    <?php
     // met à jour nombre victoire
     $requete = $bdd ->prepare("SELECT * FROM histoire WHERE Histoire_id=? ");
     $requete ->execute(array($id_hist));
     $result = $requete-> fetch();
     $NombreVictoire= $result['NombreVictoire'];

     $req = $bdd->prepare('UPDATE `histoire` SET `NombreVictoire`=? WHERE Histoire_id=?');
     $req->execute(array($NombreVictoire+1,$id_hist ));
      }
    ?>
            
                        
    <?php
      }
    ?>
            
                     
  <?php          // afficher les paragraphes 

  $reponse = $bdd->prepare("SELECT * FROM paragraphe WHERE Paragraphe_id = ? ");
  $reponse -> execute(array($firstpara));
  $result = $reponse -> fetch();
   
  echo"<p class=text-horreur> {$result['Paragraphe_titre']} </p>";
  echo "<p class=text-horreur> {$result['Paragraphe_Texte']} </p>";
   
  //afficher les choix
  $reponse2 = $bdd->prepare("SELECT * FROM choix WHERE Paragraphe_id = ? ");
  $reponse2 -> execute(array($firstpara));

  while($donnees2 = $reponse2-> fetch())
  {
  
  echo "<a href ='histoire.php?Id={$donnees2['Envoi_id']}&Theme={$theme}&partie={$id_partie}&progress=true' class='btn btn-danger mb-2' role='button' aria-pressed='true'> {$donnees2['Choix_texte']} </a>";

  }
?>

<img src=gif/horreur.gif alt=gif/> 



<?php      
}


           
       
else if($_GET['Theme']==2)
{ echo "<body style='background-color: #ffe0bd'>";
    ?> 
<div  id="magique">
    <div class="col text-center">
 
  <audio controls source src="audio/bellequi.ogg" type="audio/mpeg">
  <p>If you can read this, your browser does not support the audio element.</p>
  </audio>


  <?php 
                
  $theme=$_GET['Theme'];

  $reponse2 = $bdd->prepare("SELECT * FROM paragraphe WHERE Paragraphe_id = ? ");
  $reponse2 -> execute(array($firstpara));
  while($donnees2=$reponse2->fetch()){
                
  if(($donnees2['Paragraphe_Type']!=2)&&($donnees2['Paragraphe_Type']!=1))
  {
                
  $r = $bdd->prepare("SELECT * FROM progression WHERE Partie_id = ? ");
  $r -> execute(array($id_partie));
  $res = $r -> fetch();
  ?>
                
  <p class=text-horreur> Barre de vie  </p>
  <div class="progress" style="width :70%">
    <div class="progress-bar primary" role="progressbar" style="width: <?php echo $res['Vie_progression'] ?>%" aria-valuenow="<?php echo $res['Vie_progression'] ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $res['Vie_progression'] ?>%</div>
  </div>
  <?php
  }
                
  else if($donnees2['Paragraphe_Type']==2)
  {
                  
                  
  ?>
  <p style="color:red">VOUS ETES MORTS <p>
  <object type="audio/mpeg" width="0" height="0" data="audio/mortfin.mp3">
  <param name="filename" value="audio/mortfin.mp3" />
  <param name="autostart" value="true" />
  <param name="loop" value="true" />
  </object>
  <img src=img/dead.png alt=png class="img-center" width="200px"/> 
                              
  <p class=text-horreur> Barre de vie  </p>
    <div class="progress" style="width : 70%">
        <div class="progress-bar primary" role="progressbar" style="color: silver" style="width: <?php echo '0'?>%" aria-valuenow="<?php echo '0' ?>" aria-valuemin="0" aria-valuemax="100"><?php echo '0' ?>%</div>
    </div>
  <?php  
                    
  // met à jour nombre défaite
  $requete = $bdd ->prepare("SELECT * FROM histoire WHERE Histoire_id=? ");
  $requete ->execute(array($id_hist));
  $result = $requete-> fetch();
  $NombreVictoire= $result['NombreDefaite'];
   
  $req = $bdd->prepare('UPDATE `histoire` SET `NombreDefaite`=? WHERE Histoire_id=?');
  $req->execute(array($NombreDefaite+1,$id_hist ));
                }?>
<?php
  if($donnees2['Paragraphe_Type']==1)
{

 ?>

  <p style="color: green"> VICTOIRE !<p>
  <object type="audio/mpeg" width="0" height="0" data="audio/succesfin.mp3">
  <param name="filename" value="audio/succesfin.mp3" />
  <param name="autostart" value="true" />
  <param name="loop" value="true" />
  </object>

  <img src=img/success.png alt=png class="img-center" width="200px"/> 

  <p class=text-horreur> Barre de vie  </p>
  <div class="progress" style="width:70%">
              
  <div class="progress-bar bg-primary" style="width:100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>

  </div>
                                
<?php
  // met à jour nombre victoire
  $requete = $bdd ->prepare("SELECT * FROM histoire WHERE Histoire_id=? ");
  $requete ->execute(array($id_hist));
  $result = $requete-> fetch();
  $NombreVictoire= $result['NombreVictoire'];

  $req = $bdd->prepare('UPDATE `histoire` SET `NombreVictoire`=? WHERE Histoire_id=?');
  $req->execute(array($NombreVictoire+1,$id_hist ));
}
  ?>
  
     
 <?php
}
 ?>

 <?php
                
  $reponse = $bdd->prepare("SELECT * FROM paragraphe WHERE Paragraphe_id = ? ");
  $reponse -> execute(array($firstpara));
  $result = $reponse -> fetch();
                  
  echo"<p class=text-magique> {$result['Paragraphe_titre']} </p>";
  echo "<p class=text-magique> {$result['Paragraphe_Texte']} </p>";

  
          
  $reponse2 = $bdd->prepare("SELECT * FROM choix WHERE Paragraphe_id = {$firstpara} ");
  $reponse2 -> execute();
    
  while($donnees2 = $reponse2-> fetch())
  {
  echo "<a href ='histoire.php?Id={$donnees2['Envoi_id']}&Theme={$theme}&partie={$id_partie}' class='btn btn-info mb-2' role='button' aria-pressed='true'> {$donnees2['Choix_texte']} </a>";
  echo "<br> " ;
  }
  ?>
    
            
 </div> 
     </div> 
          <div class="text-center"> 
              <img src=gif/magiciens010.gif alt=gif/>
          </div>
    

  <?php    
              
}
   

  ?>    



<?php include("includes/piedDePage.php"); ?>

</body>
</html>