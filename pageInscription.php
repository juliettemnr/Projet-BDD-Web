<?php include("includes/sessionStart.php"); ?>
<!DOCTYPE html>
<html>
<?php require_once("includes/head.php")?>

	<body>
		<?php include("includes/barreNavigation.php");
		
		?>

		<div  class="text-center">
			</br>
			<h3> Inscription </h3>
		</div>
        <?php 
		if(isset($_GET['ins']))
		{
			echo "<p class='p-3 mb-2 bg-danger text-white text-center'> Les deux mots de passe ne sont pas identiques</p>";
		}	
		else if(isset($_GET['user'])){
			echo "<p class='p-3 mb-2 bg-danger text-white text-center'>L'identifiant existe déjà ...</p>";	
		}
        else if(isset($_GET['vide'])){
			echo "<p class='p-3 mb-2 bg-danger text-white text-center'>Veuillez renseigner tous les champs...</p>";	
		}  
        ?>
		

<div class="card text-center bg-light mb-3 mx-auto" style="max-width: 50rem;">
	<div class="card-body">
	<form action="verificationInscription.php" method="post">
			<p>
			Identifiant : <input type="text" name="id" />
			</br>
			</br>
			Mot de passe : <input type="password" name="pas">
			</br>
			</br>
            Vérification du mot de passe : <input type="password" name="pas2">
			</br>
			</br>
			
			<input type="submit" value="Valider" />
	</div>
</div>
</body>

</html>
