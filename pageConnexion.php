<?php include("includes/sessionStart.php"); ?>
<!DOCTYPE html>
<html>
<?php require_once("includes/head.php")?>

	<body >
		<?php include("includes/barreNavigation.php");
		
		?>

		<div  class="text-center">
</br>
			<h3> Connexion </h3>
		</div>

		
		<?php if(isset($_GET['co'])){
			echo "<p class='p-3 mb-2 bg-danger text-white text-center'> Mot de passe et/ou identifiant faux ... </p>";
		}	
		else if(isset($_GET['vide'])){
			echo "<p class='p-3 mb-2 bg-danger text-white text-center'> Veuillez rentrer tous les champs ... </p>";	
		} ?>


	<div class="card text-center bg-light mb-3 mx-auto" style="max-width: 50rem;">
		<div class="card-body">
			<form action="verificationConnexion.php" method="post">
				<p>
				Identifiant : <input type="text" name="id" />
				</br>
				</br>
				Mot de passe : <input type="password" name="pas">
				</br>
				</br>

				<input type="submit" value="Valider" />
		</div>
	</div>
</body>

</html>
