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
        <label>Sélectionnez un patient :</label>    
        <br>
        <select name="id" size="1" style="width: 40%">
            <?php
                for ($i=0; $i<count($results); $i+=1){
                    echo("<option value=" . $results[$i]['id'] . ">" . $results[$i]['id'] . " : ". $results[$i]['nom'] . " ". $results[$i]['prenom'] . "</option>");
                }
            ?>
        </select>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Envoyer</button>
    </form>
    <p/>
  </div>
    
  <?php include $root . '/app/view/fragment/fragmentSiteFooter.html'; ?>

<!-- ----- fin viewAllId -->