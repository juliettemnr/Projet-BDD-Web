<?php include("includes/sessionStart.php"); ?>
<!DOCTYPE HTML>

<html>

<?php require_once("includes/head.php"); ?>
	
<body>

<?php 
include("includes/barreNavigation.php") ;    
include("includes/startPDO.php");    
$hist_id = $_GET['IdHist'];

if(!empty($_POST["choixTitre"]) && !empty($_POST["idEnvoi"]) && !empty($_POST["idPara"]))
{
$choixTitre =  htmlspecialchars($_POST["choixTitre"], ENT_QUOTES, 'UTF-8', false);
$idEnvoi = $_POST["idEnvoi"];
$idPara = $_POST["idPara"];

$req = $bdd->prepare('INSERT INTO `choix` (`Paragraphe_id`,`Envoi_id`,`Choix_texte`) VALUES (?, ?, ?)');
$req->execute(array($idPara, $idEnvoi, $choixTitre));

echo "<p class='alert alert-success text-center' role='alert'> Paragraphe ajouté !</p>";
            
}  
else if(isset($_GET['load']))
{
echo "<p class='alert alert-primary text-center' role='alert'> Rentre tous les éléments !</p>";
}
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="pageAdmin.php">Admin</a></li>
        <li class="breadcrumb-item"><a href="creationParagraphe.php?IdHist=<?php echo $hist_id;?>">Création Paragraphe</a></li>
        <li class="breadcrumb-item active"aria-current="page">Création Choix</li>
    </ol>
</nav>
        <h1>Définissons les choix, les liens entre paragraphe</h1>

    <form action="creationChoix.php?IdHist=<?php echo $hist_id; ?>&load=ok" method="post">
        <div class="container">
            <div class = "col">
                <div class="form-group">
                    <label>Titre choix</label>
                        <textarea class="form-control" name="choixTitre" rows="1" placeholder = "Titre du choix "></textarea>
                    <label>Paragraphe du choix</label>
                            <select  name ="idPara" class="form-control">
                        <?php 
                        $requete = $bdd->prepare('SELECT * FROM paragraphe WHERE Histoire_id = ?');
                        $requete -> execute(array($hist_id));
                        while($donnees = $requete-> fetch())
                        {
                        echo "<option value={$donnees['Paragraphe_id']} >{$donnees['Paragraphe_titre']}</option>";
                        }
                        ?>
                            </select>
                        </br>
                    <label> Paragraphe suivant </label>
                            <select  name ="idEnvoi" class="form-control">
                        <?php 
                        $requete = $bdd->prepare('SELECT * FROM paragraphe WHERE Histoire_id = ?');
                        $requete -> execute(array($hist_id));
                        while($donnees = $requete-> fetch())
                        {
                        echo "<option value={$donnees['Paragraphe_id']} >{$donnees['Paragraphe_titre']}</option>";
                        }
                        ?>
                            </select>
                        </br>

                        <button type="submit" class="btn btn-primary">Valider</button>
        

    </form>

    <div class="row justify-content-end"> 
        <a href = 'creationParagraphe.php?IdHist=<?php echo $hist_id ;?>' class='btn btn-primary btn-lg active justify-content-end' role='button' aria-pressed='true'>Définir les paragraphes à nouveau</a>
    </div>



<?php include("includes/piedDePage.php"); ?>

</body>
</html>