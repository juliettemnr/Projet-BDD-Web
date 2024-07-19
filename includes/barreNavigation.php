<nav class="navbar navbar-custom ">
    <a class="navbar-brand" href="index.php">
    <i class="fa-solid fa-book-open-reader"> Magic Book</i>  
    </a>
   
    <a class= "nav navbar-brand" href="mesHistoires.php">Mes Histoires</a>


    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php 
                if(isset($_SESSION["id"])){
                echo "Bienvenue ".$_SESSION["login"]." !" ; 
                } 
                else{ echo "Connection";} 
            ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 
                if(isset($_SESSION["id"])){

                echo "<a class='dropdown-item' href='deconnexionUtilisateur.php'>Se Déconnecter</a>" ; 
                if($_SESSION['statut']=="admin"){
                    echo "<a class='dropdown-item' href='pageAdmin.php'>Paramètres administrateur</a>";
                }
                } 
                else{ echo "<a class='dropdown-item' href='pageConnexion.php'>Se Connecter</a>";
                    echo "<a class='dropdown-item' href='pageInscription.php'>S'inscrire</a>";} 

            ?>

           
            </div>
        </li>
    </ul>
</nav>