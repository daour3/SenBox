<form name="fo" method="post" action="" class=" mt-4 col-4 w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
    <label>Saisir la plage d'adressage des clients DHCP</label>
    <div class="m-1 row">
    	<input type="number" min="1" max="254" name="min" placeholder="min: 2" class="col-6 form-control " />
    	<input type="number" min="1" max="254" name="max" placeholder="max: 254" class="col-6 form-control " />
    </div>
    <input type="submit" name="valider" value="valider" class="col-2 btn btn-success" />
</form>

<?php
	# récupérer l'adresse IP du serveur
	$addr = shell_exec("./../scripts/serveraddr.sh");
	$addrs = explode('.', $addr);

	if(isset($_POST['valider'])){

		$addrmin = $addrs[0].'.'.$addrs[1].'.'.$addrs[2].'.'.$_POST['min'];
		$addrmax = $addrs[0].'.'.$addrs[1].'.'.$addrs[2].'.'.$_POST['max'];
	    $output = shell_exec('sudo ./../scripts/rangedhcpmodify.sh '.$addrmin.' '.$addrmax);
	    if($output)
	    	echo "<div class=\"btn btn-success\">Modification prise en compte!</div>";
	}
?>