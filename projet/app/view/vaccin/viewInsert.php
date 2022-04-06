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
                <label for="id">Entrez le label du vaccin :</label>
                <br>
                <input type="text" name='label' value='Nom du vaccin'>
                <br>
                <label for="id">Entrez le nombre de doses du vaccin :</label>
                <br>
                <input type="number" step='any' name='doses' value='1'>                
            </div>
            <p/>
            <button class="btn btn-primary" type="submit">Envoyer</button>
        </form>
        <p/>
    </div>
    
<?php include $root . '/app/view/fragment/fragmentSiteFooter.html'; ?>

<!-- ----- fin viewInsert -->