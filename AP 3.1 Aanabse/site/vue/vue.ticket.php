<?php
include "./vue/entete.html.php";
?>
<a href="?controleur=reglement">
    <img class="imgRetour" src="./images/Retour.png" />
</a>
<h2 class="listeReglement">DETAILS DE LA FACTURE</h2>
<table>
    <thead>
    <tr>
        <th>Num_facture</th>
        <th>Nom organisme</th>
        <th>Nom congressiste</th>
        <th>Montant_facture</th>

    </tr>
    </thead>
    <form method="post">

    <?php 
    foreach($c->data["liste"] as $uneactivite) {
    		?>
        <input type="hidden" name="numFacture" value="<?php echo $uneactivite->NUM_FACTURE ?>">
    		
    	<td><?php echo $uneactivite->NUM_FACTURE ?></td>
    	<td><?php echo $uneactivite->NOM_ORGANISME ?></td>
    	<td><?php echo $uneactivite->NOM_CONGRESSISTE ?></td>
    	<td><?php echo $uneactivite->MONTANT_FACTURE ?></td>
    	</tr>
    	<?php } ?>
</table>
</br><br>

    <center><input class="btn" name="todo" value="Annuler" type="submit"/></center>
</form>