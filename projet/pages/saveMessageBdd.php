
<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252"><title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="mes_files/w3.css">
<link rel="stylesheet" href="mes_files/font-awesome.css">
<style>
body {
  background: #555;
}

.content {
  max-width: 500px;
  margin: auto;
  background: white;
  padding: 10px;

}
</style>
</head><body>

<form method="post" action="saveMessageBdd.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
<h2 class="w3-center">Contact Us</h2>
 
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="first" placeholder="NOM" type="text">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="last" placeholder="PRENOM" type="text">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px;heigth:100px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="message" placeholder="Message" type="textarea">
    </div>
</div>



<p class="w3-center">
<input type="submit" name="send" value="send" class="w3-section w3-blue w3-ripple">
</p>
</form>


 </body></html>

<?php
//if(isset($_POST['send'])){
//if(isset($_POST['first'])){
  //if(isset($_POST['last'])){
echo "aaaaaaaaaaaaaaa";
$db=mysql_connect('localhost','root','stud');
echo "aaaaaaaaaaaaaaa";
mysql_select_db('db',$db);
$sql="insert into user values(\"fatou\",\"bintou\",\"merci\")";
$req=mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
//while($data=mysql_fetch_array($req)){
//echo '<b>'.$data['nom'].' '.$data['prenom'].' '.$data['message'];
//}
if(!$req)
 echo "connexion imposssible";
else
 echo "sss";
mysql_close();



//	}
  //}
//}
// le contenu de 'data.txt' est maintenant 123 et non 23 !
?>

