function setModif(nameModif, adModif,idModif){
    console.log(nameModif);console.log(adModif);console.log(idModif);

    document.getElementById("idmodif").value=idModif;
    document.getElementById("namemodif").value=nameModif;
    document.getElementById("admodif").value=adModif;
}

function setIdSuppr(idsuppr){
    document.getElementById("idsuppr").value=idsuppr;
}


function showAdd(){
    document.getElementById('add').style.display="block"
}

function showDel(){
    document.getElementById('del').style.display="block"
}

function showModif(){
    document.getElementById('modif').style.display="block";
}

function closeAdd(){
    document.getElementById('add').style.display='none';
}
function closeDel(){
    document.getElementById('del').style.display='none';
}
function closeModif(){
    document.getElementById('modif').style.display='none';
}
function test(form){
    form.submit();
}