
<table class="table table-sm table-dark mt-3">
  <thead>
    <tr>
      <th scope="col">Adresse IP</th>
      <th scope="col">Adresse MAC</th>
      <th scope="col">Nom de Machine</th>
      <th scope="col">Actions</th>
      <th scope="col">Restriction plage</th>
    </tr>
  </thead>
  <tbody>
	   <?php
      $arp =  shell_exec("sudo arp -n | grep eth1");
      $users = explode("\n", $arp);
      for($i=0; $i<count($users)-1; $i++)
      {
        $infosUsers = explode(" ", $users[$i]);
        echo "      
              <tr>
                <td class='center'>".$infosUsers[0]."</td>
                <td class='center'>".$infosUsers[17]."</td>
                <td class='center'>client ".$i."</td>
                <td class='center'>
		    <a class=\"text-warning row h-1\" href='?url=users&ip=".$infosUsers[0]."&mac=".$infosUsers[17]."&name=client".$i."'> Fixe IP</a>
                    <a class=\"row h-2\" href='?url=users&ip1=".$infosUsers[0]."&mac1=".$infosUsers[17]."&name1=client".$i."'> Defixer IP</a>
                    <a class=\"row h-3 text-danger\" href='?url=users&ip2=".$infosUsers[0]."'>Bloquer</a>
                    <a class=\"row h-4 text-success\" href='?url=users&ip3=".$infosUsers[0]."'>debloquer</a>

                </td>
		<td class='center'>
			<form action='#' method='POST'>
			<div class ='row h-1'>
    			<input type='text' name='debut' placeholder='23:00' class='col-2 m-1 form-control' />
    			<input type='text' name='fin' placeholder='7:00' class='col-2 m-1 form-control' />
			<input type='text' name='addr' value='".$infosUsers[0]."' hidden='hidden'/>

			</div>
			<div class='row h-1'>
				<div class='form-check'>
         <input class='form-check-input' type='checkbox' name='Lundi' id='Lundi' value='Mon'>
         <label class='form-check-label' for='Lundi'>
           Lundi
         </label>
     </div></br>

     <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='Mardi' id='Mardi' value='Tue'>
        <label class='form-check-label' for='Mardi'>
          Mardi
        </label>
    </div></br>

    <div class='form-check'>
       <input class='form-check-input' type='checkbox' name='Mercredi' id='Mercredi' value='Wed'>
       <label class='form-check-label' for='Mercredi'>
         Mercredi
       </label>
    </div></br>

    <div class='form-check'>
       <input class='form-check-input' type='checkbox' name='Jeudi' id='Jeudi' value='Thu'>
       <label class='form-check-label' for='Jeudi'>
         Jeudi
       </label>
    </div></br>

     <div class='form-check'>
       <input class='form-check-input' type='checkbox' name='Vendredi' id='Vendredi' value='Fri'>
       <label class='form-check-label' for='Vendredi'>
         Vendredi
       </label>
     </div></br>

    <div class='form-check'>
       <input class='form-check-input' type='checkbox' name='Samedi' id='Samedi' value='Sat'>
       <label class='form-check-label' for='Samedi'>
         Samedi
       </label>
    </div></br>

    <div class='form-check'>
       <input class='form-check-input' type='checkbox' name='Dimanche' id='Dimanche' value='Sun'>
       <label class='form-check-label' for='Dimanche'>
         Dimanche
       </label>
    </div>
    			
			</div>
			<input type='submit' name='restreindre' value='restreindre' class='col-3 m-1 row h-2 btn btn-success' />
    			<input type='submit' name='finRestriction' value='finRestriction' class='col-3 m-1 row h-2 btn btn-success' />

			</form>


			    			  <input type='text'  class='col col-md-3 row h-2 m-1 form-control' />
			    			  <input type='submit' name='siteBlock' value='siteBlock' class='col-3 m-1 row h-2 btn btn-success' />


      

		</td>	
              </tr>
        ";
      }
     ?>
  </tbody>
</table>

<?php
if(isset($_GET['ip']) && isset($_GET['mac']))
	//echo "".$_GET['name']." ".$_GET['ip']." ".$_GET['mac'];
  shell_exec("./../scripts/fixerIp.sh ".$_GET['name']." ".$_GET['mac']." ".$_GET['ip']);
if(isset($_GET['ip1']) && isset($_GET['mac1']))
  //echo "".$_GET['name1']." ".$_GET['ip1']." ".$_GET['mac1'];
  shell_exec("./../scripts/deletefixedipdhcp.sh ".$_GET['name1']." ".$_GET['mac1']." ".$_GET['ip1']);
if(isset($_GET['ip2']))//interdire connexion
  shell_exec("sudo iptables -A INPUT -s ".$_GET['ip2']." -j DROP");
if(isset($_GET['ip3']))//autoriser accés
  shell_exec("sudo iptables -D INPUT -s ".$_GET['ip3']." -j DROP");
if(isset($_POST['restreindre'])){
	$tab=new arrayObject();
	$sem='';
	if(isset($_POST['Lundi']))
		$tab->append(array($_POST['Lundi']));
    if(isset($_POST['Mardi']))
		$tab->append(array($_POST['Mardi']));
    if(isset($_POST['Mercredi']))
		$tab->append(array($_POST['Mercredi']));
    if(isset($_POST['Jeudi']))
		$tab->append(array($_POST['Jeudi']));
   if(isset($_POST['Vendredi']))
		$tab->append(array($_POST['Vendredi']));
   if(isset($_POST['Samedi']))
	    $tab->append(array($_POST['Samedi']));
   if(isset($_POST['Dimanche']))
		$tab->append(array($_POST['Dimanche']));
   $sem;
   count($tab);
   $i=0;
   foreach($tab as $s)
   {
    if($i==0){
   	if($s[0]!=null)
   	   $sem=$s[0];
          }
    else {
 		if($s[0]!=null)
   	    $sem=$sem.",".$s[0];
          }
          $i++;
    } 
    echo $sem;    
   
   	shell_exec("sudo iptables -A INPUT -s ".$_POST['addr']." --match time --weekdays ".$sem." --timestart $(date -u -d @$(date '+%s' -d ".$_POST['debut'].") +%H:%M) --timestop $(date -u -d @$(date '+%s' -d ".$_POST['fin'].") +%H:%M) -j DROP"); 
}

if(isset($_POST['finRestriction'])){
	$tab=new arrayObject();
	$sem='';
	if(isset($_POST['Lundi']))
		$tab->append(array($_POST['Lundi']));
    if(isset($_POST['Mardi']))
		$tab->append(array($_POST['Mardi']));
    if(isset($_POST['Mercredi']))
		$tab->append(array($_POST['Mercredi']));
    if(isset($_POST['Jeudi']))
		$tab->append(array($_POST['Jeudi']));
   if(isset($_POST['Vendredi']))
		$tab->append(array($_POST['Vendredi']));
   if(isset($_POST['Samedi']))
	    $tab->append(array($_POST['Samedi']));
   if(isset($_POST['Dimanche']))
		$tab->append(array($_POST['Dimanche']));
   count($tab);
   $i=0;
   foreach($tab as $s)
   {
    if($i==0){
   	if($s[0]!=null)
   	   $sem=$s[0];
          }
    else {
 		if($s[0]!=null)
   	    $sem=$sem.",".$s[0];
          }
          $i++;
    } 
	shell_exec("sudo iptables -D INPUT -s ".$_POST['addr']." --match time --weekdays ".$sem." --timestart $(date -u -d @$(date '+%s' -d ".$_POST['debut'].") +%H:%M) --timestop $(date -u -d @$(date '+%s' -d ".$_POST['fin'].") +%H:%M) -j DROP"); 
}
?>