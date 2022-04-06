 <!-- ----- debut de la page Siteacceuil -->

<?php include $root . '/app/view/fragment/fragmentSiteHeader.html'; ?>
 
    <body>
        <div class="container">
            <?php
            include $root . '/app/view//fragment/fragmentSiteMenu.html';
            include $root . '/app/view//fragment/fragmentSiteJumbotron.html';
            ?>
        </div>   

        <?php
        include $root . '/app/view//fragment/fragmentSiteFooter.html';
        ?>

<!-- ----- fin de la page Site_acceuil -->

    </body>
</html>