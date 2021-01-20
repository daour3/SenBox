<div class="row">
    <form name="fo" method="post" action="" class="col-4 mt-4" style="width:100%">
        <label for="">Changer le hostname du box.</label>
        <input type="text" name="hostname" placeholder="Ex: Daour" class="form-control" /><br />
        <input type="submit" name="valider" value="valider" class="btn btn-success" />
    </form>
    <div class="col-8">
        L'utilisateur peut changer le hostname.
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias, aut cumque expedita, harum
            maiores optio quo quod saepe sed tempora vero? Ab adipisci, beatae distinctio eveniet obcaecati velit
            voluptatem?
        </div>
        <div>Commodi deserunt distinctio dolores doloribus eligendi est in, iste, mollitia nam, nesciunt quae
            repudiandae sapiente tenetur unde vero voluptate voluptatem. Accusamus magnam necessitatibus nemo nulla odio
            ratione sint tempore! Repudiandae.
        </div>
        <div>Adipisci autem beatae corporis, cupiditate deleniti dignissimos dolor error et exercitationem fuga, fugiat
            id laudantium libero minima modi nam nostrum officia officiis quae quaerat saepe sed tenetur unde voluptate,
            voluptatem!
        </div>
    </div>

</div>


<?php
if(isset($_POST['valider'])){
echo "bonjour";
$output = shell_exec('./../scripts/changerHostname.sh '.$_POST['hostname']);
echo "<pre>$output</pre>";
}
?>
