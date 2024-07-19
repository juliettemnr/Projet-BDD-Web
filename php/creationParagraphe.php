<?php include("includes/sessionStart.php"); ?>
<!DOCTYPE HTML>

<html>

<?php require_once("includes/head.php"); ?>
	
<body>

<?php include("includes/barreNavigation.php") ; 
include("includes/startPDO.php");


$hist_id = $_GET['IdHist'];


if(!empty($_POST["paraTitre"]) && !empty($_POST["paraTexte"]) && isset($_POST['vie'])){

    $paraTitre = htmlspecialchars($_POST["paraTitre"], ENT_QUOTES, 'UTF-8', false);
    $paraTexte =htmlspecialchars($_POST["paraTexte"], ENT_QUOTES, 'UTF-8', false);
    $vie = $_POST['vie'];

    if (empty($_POST['dernier'])){
        $dernier = 0;
    }
    else{
        $dernier=2;
    }

    $req = $bdd->prepare('INSERT INTO `paragraphe` (`Paragraphe_Type`,`Paragraphe_Texte`,`Paragraphe_titre`, `Histoire_id`,`PointDeVie`) VALUES (:style, :texte,:titre, :id, :pointVie)');

    $req->execute(array(
    'style' => $dernier,
    'texte' => $paraTexte,
    'titre' => $paraTitre,
    'id'=> $hist_id,
    'pointVie' => $vie
    )); 
    
    echo "<p class='alert alert-success text-center' role='alert'> Paragraphe ajouté !</p>";
} 
else if(isset($_GET['load'])){
    echo "<p class='alert alert-primary text-center' role='alert'> Rentre tous les éléments !</p>";
} 

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="pageAdmin.php">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Création Paragraphe</li>
    <li class="breadcrumb-item"><a href="creationChoix.php?IdHist=<?php echo $hist_id;?>">Création Choix</a></li>
  </ol>
</nav>
    

        <form action="creationParagraphe.php?IdHist=<?php echo $hist_id;?>" method="post">
            <div class="container">
            <h1>Ajouter un paragraphe</h1>
                <div class = "col">
                    <div class="form-group">

                        <label>Titre paragraphe</label>
                        <textarea class="form-control" name="paraTitre" rows="1" placeholder = "Titre du paragraphe "></textarea>

                        </br>
                        <label>Texte paragraphe</label>
                        <textarea class="form-control" name="paraTexte" rows="3" placeholder = "Texte du paragraphe"></textarea>

                        </br>

                        <label >Point de vie (entre -20 et 20)</label>
                        <input type="number" name="vie" min="-20" max="20">

                        </br>
                        <input type='checkbox' name='dernier' value='on'>
                        Si paragraphe de fin 
                        </br>



                        <button type="submit" class="btn btn-primary">Valider</button>

    </form>
                        </br>

    <div class="row justify-content-end"> 
        <a href = 'creationChoix.php?IdHist=<?php echo $hist_id ;?>' class='btn btn-primary btn-lg active justify-content-end' role='button' aria-pressed='true'>Définir les choix</a>
    </div>


<?php include("includes/piedDePage.php"); ?>

</body>
</html>
