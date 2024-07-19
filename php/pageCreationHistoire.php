<?php include("includes/sessionStart.php"); ?>
<!DOCTYPE HTML>

<html>

<?php require_once("includes/head.php"); ?>
	
<body>

<?php include("includes/barreNavigation.php") ; 
include("includes/startPDO.php");

if(isset($_GET['hist'])){
    echo "<p class='alert alert-danger text-center' role='alert'> Il manque un élément ...</p>";
}	


?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="pageAdmin.php">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Création Histoire</li>
  </ol>
</nav>


<form action="creationHistoire.php" method="post"  enctype="multipart/form-data">
    <div class="container">
        <div class = "col">
    <div class="form-group">

        <label>Titre de votre histoire </label>
        <textarea class="form-control" name="titre" rows="1" placeholder = "Titre"></textarea>

</br>

        <label> Style de l'histoire </label> 
        <select  name ="style" class="form-control">
        <option value=1 >Horreur</option>
        <option value=2>Fantastique </option>
      </select>

</br>

        <label>Image de l'histoire</label>
        <div class="col-sm-4">
            <input type="file" name="image" />
        </div>

        </br>
            
        <label>Titre de votre premier paragraphe </label>
        <textarea class="form-control" name="titrepara" rows="1" placeholder = "Titre"></textarea>

</br>
        <label>Votre premier paragraphe </label>
        <textarea class="form-control" name="para1" rows="3" placeholder = "votre premier paragraphe"></textarea>
    </div>

</br>

        <label >Point de vie (entre -20 et 20)</label>

        <input type="number" name="vie" min="-20" max="20">

    <button type="submit" class="btn btn-primary">Valider</button>

</form>

</div>
</div>
<?php include("includes/piedDePage.php"); ?>

</body>
</html>