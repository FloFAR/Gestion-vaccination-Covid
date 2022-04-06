<!-- ----- début viewNombreGlobal -->

<?php

require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentSiteMenu.html';
      include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
        <thead>
            <tr>
                <th scope = "col">Centre</th>
                <th scope = "col">Doses</th>
            </tr>
        </thead>
        <tbody>
            <?php          
            foreach ($results as $element) {
                printf("<tr><td>%s</td><td>%d</td></tr>", $element[0], $element[1]);
            }
            ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentSiteFooter.html'; ?>

<!-- ----- fin viewNombreGlobal -->