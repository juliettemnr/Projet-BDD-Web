<?php include("includes/sessionStart.php"); ?>
<!DOCTYPE HTML>

<html>

<?php require_once("includes/head.php"); ?>
	
<body>

<?php include("includes/barreNavigation.php") ; 
include("includes/startPDO.php");


if(isset($_GET['para']))
{
?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="pageAdmin.php">Admin</a></li>
            <li class="breadcrumb-item"><a href="pageModifierHistoire.php">Modification Histoire</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier paragraphe</li>
        </ol>
    </nav>

<?php

    $id_para=$_GET['para'];
    $reponse = $bdd->prepare("SELECT * FROM paragraphe WHERE Paragraphe_id = ?  ");
    $reponse -> execute(array($id_para));
    $result = $reponse ->fetch();
?>
<h1>Modifier le paragraphe</h1>

<form action="modifierHistoire2.php?para=<?php echo $id_para;?>" method="post">
    <div class="container">
        <div class = "col">
            <div class="form-group">

                <label>Titre paragraphe</label>
                <textarea class="form-control" name="paraTitre" rows="1"><?php echo $result['Paragraphe_titre']; ?></textarea>

            </br>
                <label>Texte paragraphe</label>
                <textarea class="form-control" name="paraTexte" rows="3"><?php echo $result['Paragraphe_Texte']; ?></textarea>

                </br>

                <label >Point de vie (entre -20 et 20) : </label>
                        <input type="number" name="vie" min="-20" max="20" value="<?php echo $result['PointDeVie'];?>">

</br>
                        <?php
                            if($result['Paragraphe_Type']==2)
                            {
                                ?>
                                    <input type='checkbox' name='dernier' value='on' checked>
                                    Si paragraphe de fin </br>
                                <?php
                            }
                            else{
                                ?>
                                <input type='checkbox' name='dernier' value='on'>
                                Si paragraphe de fin </br>
                                <?php
                            }
                        ?>
                        

                <button type="submit" class="btn btn-primary">Valider</button>

</form>

<?php

}
else if(isset($_GET['choix']))
{


    ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="pageAdmin.php">Admin</a></li>
        <li class="breadcrumb-item"><a href="pageModifierHistoire.php">Modification Histoire</a></li>
        <li class="breadcrumb-item active" aria-current="page">Modifier choix</li>
    </ol>
</nav>

<?php


    $id_choix=$_GET['choix'];
    $reponse = $bdd->prepare("SELECT * FROM choix WHERE Choix_id =?  ");
    $reponse -> execute(array($id_choix));
    $result = $reponse ->fetch();
?>
<h1>Modifier le choix</h1>

<form action="modifierHistoire2.php?choix=<?php echo $id_choix;?>" method="post">
    < <div class="container">
                <div class = "col">
                    <div class="form-group">

                        <label>Titre choix</label>
                        <textarea class="form-control" name="choixTitre" rows="1"><?php echo $result['Choix_texte'];?></textarea>

                        <label>Paragraphe du choix</label>
                        <select  name ="idPara" class="form-control">
                <?php 
                        $requete = $bdd->prepare('SELECT * FROM paragraphe WHERE Histoire_id = ?');
                        $requete -> execute(array($_GET['hist']));
                        $resultat = $requete->fetchAll();
                        foreach($resultat as $choix){
                            if($choix['Paragraphe_id']==$result['Paragraphe_id']){
                        
                                echo "<option value={$choix['Paragraphe_id']} selected >{$choix['Paragraphe_titre']}</option>";
                            }
                            else{
                                echo "<option value={$choix['Paragraphe_id']} >{$choix['Paragraphe_titre']}</option>";
                            }
                        }
                        ?>
                            </select>
                    </br>
                        <label> Paragraphe suivant </label>
                        <select  name ="idEnvoi" class="form-control">
                <?php 
                         $requete2 = $bdd->prepare('SELECT * FROM paragraphe WHERE Histoire_id = ?');
                         $requete2 -> execute(array($_GET['hist']));
                         $resultat2 = $requete2->fetchAll();
                         foreach($resultat2 as $choix2){
                             if($choix2['Paragraphe_id']==$result['Envoi_id']){
                         
                                echo "<option value={$choix2['Paragraphe_id']} selected >{$choix2['Paragraphe_titre']}</option>";
                             }
                             else{
                                 echo "<option value={$choix2['Paragraphe_id']} >{$choix2['Paragraphe_titre']}</option>";
                             }
                         }
                        ?>
                            </select>
                        </br>

        <button type="submit" class="btn btn-primary">Valider</button>

</form>
<?php
}

?>



<?php include("includes/piedDePage.php"); ?>

</body>
</html>