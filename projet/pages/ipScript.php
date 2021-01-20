<form name="fo" method="post" action="" class=" mt-4 col-4 w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
    <label>Saisir l'adresse ip de votre choix.</label>
    <input type="text" name="adressip" placeholder="Ex: 192.168.1.1" class="form-control " /><br />
    <input type="submit" name="valider" value="valider" class="btn btn-success" />
</form>

<?php
if(isset($_POST['valider'])){
    echo "bonjour";
    $output = shell_exec('./../scripts/changerIp.sh '.$_POST['adressip']);
    echo $output;
}
?>