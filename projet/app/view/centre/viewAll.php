<!-- ----- début viewAll -->

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
                <th scope = "col">Id</th>
                <th scope = "col">Label</th>
                <th scope = "col">Adresse</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($results as $element) {
                printf("<tr><td>%d</td><td>%s</td><td>%s</td></tr>", $element->getId(), 
                $element->getLabel(), $element->getAdresse());
            }
            ?>
            </tbody>
        </table>
    </div>
    
<?php include $root . '/app/view/fragment/fragmentSiteFooter.html'; ?>

 <!-- ----- fin viewAll -->