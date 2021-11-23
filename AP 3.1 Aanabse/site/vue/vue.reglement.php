<?php
include "./vue/entete.html.php";
?>
<a href="?controleur=menu">
    <img class="imgRetour" src="./images/Retour.png" />
</a>
<h2 class="listeReglement">LISTE DES REGLEMENTS</h2>
<table>
    <thead>
    <tr>
        <th>Num_facture</th>
        <th>Num_congressiste</th>
        <th>Date_facture</th>
        <th>Code_reglement</th>
        <th>Montant_facture</th>
        <th>Détails</th>
    </tr>
    </thead>
    <?php foreach($c->data["liste"] as $uneactivite) {
    		?>
            <form method="post" action="?controleur=ticket">
    		    <input type="hidden" name="numFacture" value="<?php echo $uneactivite->NUM_FACTURE ?>">
                <tr>
    	        <td><?php echo $uneactivite->NUM_FACTURE ?></td>
    	        <td><?php echo $uneactivite->NUM_CONGRESSISTE ?></td>
    	        <td><?php echo $uneactivite->DATE_FACTURE ?></td>
    	        <td><?php echo $uneactivite->CODE_REGLEMENT ?></td>
    	        <td><?php echo $uneactivite->MONTANT_FACTURE ?></td>
    	        <td><input type="image" class="detail" name="todo" value="changementPage" src="./images/details.png" alt="Submit" />
    	        </td>
    	        </tr>
            </form>
    	<?php 
    } ?>
</table>

