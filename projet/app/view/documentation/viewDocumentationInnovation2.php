<!-- ----- début viewDocumentationInnovation2 -->

<?php
require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentSiteMenu.html';
        include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
        ?>
        
        <div class="jumbotron" style="background-color: #EEEEEE">
            <h3><b>Documentation Innovation 2</b></h3>
            <div class="lead">
                Les nombres c'est bien, mais les images c'est encore mieux !!!
                <br> 
                <br> 
                On nous demandait déjà d'afficher le nombre global de doses des centres mais je trouvais
                intéressant de pouvoir visualiser ces informations de manière plus concrète que dans 
                un tableau.
                <br> 
                <br> 
                J'ai trouvé un morceau de code JavaScript (merci StackOverflow !) permettant d'afficher un histogramme et qui
                va être inclus dans la vue de l'Innovation 2.
                <br> 
                <br>
                Une requête SQL vient chercher les labels des centres ainsi que leur nombre total de doses de vaccin.
                <br> 
                <br>
                Une balise &lt;script&gt va permettre d'afficher le graphique. On y crée une variable <b>columnChartValues</b> dans laquelle
                on va venir placer un à un les centres avec leur nombre de doses en suivant la convention d'écriture JavaScript.
                <br> 
                <br>
                On vient ensuite utliser la fonction permettant de créer un histogramme sur cette variable. La couleur de chaque
                barre est choisie de manière aléatoire. Cette variable étant créée dynamiquement, on ne peut pas choisir en avance un nombre de couleur précis.
                Je n'ai pas géré la possiblité que deux barres soient de la même couleur : étant donné qu'avec la notation condensée (#XXXXXX) on peut obtenir
                environ 17 millions de couleurs, je me suis dispensé de m'en occuper, le hasard fera bien les choses.  
            </div>
        </div>
    </div>    

 <!-- ----- fin viewDocumentationInnovation2 -->