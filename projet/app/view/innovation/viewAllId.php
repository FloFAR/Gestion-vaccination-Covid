<!-- ----- début viewAllId -->
 
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
                <label>Sélectionnez un vaccin à suivre :</label>    
                <br>
                <select name="vaccin" size="1" style="width: 40%">
                    <?php
                    for ($i=0; $i<count($results[0]); $i+=1){
                        echo("<option value=" . $results[0][$i]['id'] . ">" . $results[0][$i]['id'] . " : ". $results[0][$i]['label'] . "</option>");
                    }
                    ?>
                </select>
                <br>
                <label>Sélectionnez un centre à suivre :</label>    
                <br>
                <select name="centre" size="1" style="width: 30%">
                    <?php
                    for ($i=0; $i<count($results[1]); $i+=1){
                        echo("<option value=" . $results[1][$i]['id'] . ">" . $results[1][$i]['id'] . " : ". $results[1][$i]['label'] . " : ". $results[1][$i]['adresse'] . "</option>");
                    }
                    ?>
                </select>
                <br>
            </div>
            <p/>
            <button class="btn btn-primary" type="submit">Envoyer</button>
        </form>
        <p/>
    </div>
    
<?php include $root . '/app/view/fragment/fragmentSiteFooter.html'; ?>

<!-- ----- fin viewAllId -->