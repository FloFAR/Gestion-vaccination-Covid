<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentSiteMenu.html';
        include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
        ?> 

        <form role="form" method='get' action='router.php'>
            <div class="form-group">
                <input type="hidden" name='action' value='<?php echo($target);?>'>                               
                <label for="id">Entrez le prénom du patient :</label>
                <br>
                <input type="text" name='prenom' value='Florentin'>
                <br>
                <label for="id">Entrez le nom du patient :</label>
                <br>
                <input type="text" name='nom' value='Farcy'>
                <br>
                <label for="id">Entrez l'adresse du patient :</label>
                <br>
                <input type="text" name='adresse' value='7 Rue William Cotton'>                
            </div>
            <p/>
            <button class="btn btn-primary" type="submit">Envoyer</button>
        </form>
        <p/>
    </div>
    
<?php include $root . '/app/view/fragment/fragmentSiteFooter.html'; ?>

<!-- ----- fin viewInsert -->