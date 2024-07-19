<?php include("includes/sessionStart.php"); ?>
<!DOCTYPE HTML>

<html>

<?php require_once("includes/head.php"); ?>
	
<body>

<?php include("includes/barreNavigation.php") ; 
include("includes/startPDO.php");

?>
<div class=text-center> 
    </br>
    <h1 > Bienvenue dans les paramètres administrateurs  </h1>
    </br>
    <h3> Que voulez-vous faire ?  </h3>

</div>

    </br>

<div class="container">
  <div class="card-group">
    <div class="card">
        <a href = 'pageCreationHistoire.php' class='btn btn-primary' role='button' aria-pressed='true'>Créer une histoire</a>
    </div>

    <div class="card">
        <a href = 'pageModifierHistoire.php' class='btn btn-primary ' role='button' aria-pressed='true'>Modifier une histoire</a>
    </div>

    <div class="card">
        <a href = 'voirHistoire.php' class='btn btn-primary' role='button' aria-pressed='true'>Voir une histoire</a>
    </div>

    <div class="card">
        <a href = 'supprimerHistoire.php' class='btn btn-primary' role='button' aria-pressed='true'>Supprimer une histoire</a>
    </div>

    <div class="card">
        <a href = 'statistiqueAdmin.php' class='btn btn-primary' role='button' aria-pressed='true'>Statistique des histoires</a>
    </div>

    <div class="card">
        <a href = 'cacherHistoire.php' class='btn btn-primary' role='button' aria-pressed='true'>Cacher une histoire</a>
    </div>
</div>
</div>

<?php include("includes/piedDePage.php"); ?>

</body>
</html>