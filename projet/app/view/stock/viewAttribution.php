<!-- ----- début viewAttribution -->
 
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
        <label>Sélectionnez un centre :</label>    
        <br>
        <select name="centre" size="1" style="width: 40%">
            <?php
                for ($i=0; $i<count($results[0]); $i+=1){
                    echo("<option value=" . $results[0][$i]['id'] . ">" . $results[0][$i]['id'] . " : ". $results[0][$i]['label'] . " : ". $results[0][$i]['adresse'] . "</option>");
                }
            ?>
        </select>
        <br>
        <?php
            for ($i=0; $i<count($results[1]); $i+=1){
                echo("<label for='id'>Doses à ajouter de " . $results[1][$i]['label'] . " :</label>");
                echo('<br>');
                echo("<input type='number' step='any' name='doses[]' value='1'>");
                echo('<br>');
        }
        ?>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
    
  <?php include $root . '/app/view/fragment/fragmentSiteFooter.html'; ?>

<!-- ----- fin viewAttribution -->