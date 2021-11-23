<?php
include "./vue/entete.html.php";
?>

<a href="?controleur=menu">
<img class="imgRetour" src="./images/Retour.png" />
</a>

<h2 class="listeoganisme">LISTE DES ORGANISMES </h2>

<form name="formOrganisme" method="post" class="">
<table>
    <thead>
    <tr>
        <th>Numéro Organisme</th>
        <th>Nom Organisme</th>
        <th>Adresse Organisme</th>
        <th>Actions</th>

    </tr>
    </thead>
    <?php foreach ($c->data["liste"] as $listes) { ?>
    <tr>
        <td><?php echo $listes->NUM_ORGANISME; ?></td>
        <td><?php echo $listes->NOM_ORGANISME; ?></td>
        <td><?php echo $listes->ADRESSE_ORGANISME; ?></td>
        <td><img  onclick="setModif('<?= $listes->NOM_ORGANISME ?>','<?= $listes->ADRESSE_ORGANISME ?>',<?php echo $listes->NUM_ORGANISME ?>),showModif()" class="modif" src="./images/modif.png" />&nbsp;&nbsp;&nbsp;&nbsp;
            <img class="del" onclick="setIdSuppr(<?php echo $listes->NUM_ORGANISME ?>), showDel()" src="./images/del.png" /></td>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="showAdd()" class="add" src="./images/add.png" /></td>
        </td>
    </tr>

</table>


<!-- Modal Ajout -->
<div id="add">
    <div class="modal_content_add">
        <center><h1 class="h_modal">Ajout</h1></center>
        <form action="./?controleur=liste" method="POST">
            <input class="oMdal" type="text" id="nom" name="nom" value="<?php $c->post["NOM_ORGANISME"] ?>" placeholder="Nom de l'organisation"><br>
            <input class="oMdal" type="text" id="adresse" name="adresse" value="<?php $c->post["ADRESSE_ORGANISME"] ?>" placeholder="Adresse de l'organisation"><br><br>
            <center><input class="oBtn"type="submit" name="todo" onclick="hiddenModal()" value="Enregistrer"></center>
        </form>
        <p onclick="closeAdd()" class="modal_close">x</p>
    </div>
</div>


<!-- Modal Modif -->
<div id="modif">
    <div class="modal_content">
        <center><h1 class="h_modal">Modification</h1></center>
        <form action="./?controleur=liste" method="POST">
            <input type="hidden" id="idmodif" value="" name="idmodif">
            <input class="oMdal" type="text" id="namemodif" name="namemodif" value="" placeholder=""><br>
            <input class="oMdal" type="text" id="admodif" name="admodif" value="" placeholder=""><br><br>
            <center><input class="oBtn" type="submit" name="todo" value="Modifier"></center>
        </form>
        <p onclick="closeModif()" class="modal_close">x</p>
    </div>
</div>

<!-- Modal Del -->
<div id="del">
    <div class="modal_content">
        <center><h1 class="h_modal">Êtes-vous sûr de vouloir supprimer cette ligne ?</h1></center><br>
        <form method="post">
            <input type="hidden" id="idsuppr" value="" name="idsuppr">
            <center><input class="oBtnDel" type="submit" name="todo" value="Supprimer"></center>
        </form>
        <p onclick="closeDel()" class="modal_close">x</p>
    </div>
</div>
</form>