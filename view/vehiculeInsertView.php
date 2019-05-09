<?php $title = 'Modifier'; ?>

<?php ob_start(); ?>



<div class='vehiculeList'>
<form method='post' action='?action=insertVehicule'>
Véhicule : <br> 
Couleur : <input type="text" name="couleurVehicule"><br>
Marque : 
<select name="idMarqueVehicule">
<?php
while ($donees = $marques->fetch()) {
	echo "<option value=".$donees['idMarque'].">".$donees['nomMarque']."</option>";
}
?>
</select><br>
Type :
<select name="idTypeVehicule">
	<option value="1">Camion</option>
	<option value="2">Voiture</option>
</select><br>
	Nb roue : <input type="text" name="nombreRoueVT"><br>
	Poid : <input type="text" name="poidVT"><br>

Décapotable : 
<select name="decapotableVT">
	<option value="1">Oui</option>
	<option value="0">Non</option>
</select><br>
<input type='submit' value='Ajouter'>
</form>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>