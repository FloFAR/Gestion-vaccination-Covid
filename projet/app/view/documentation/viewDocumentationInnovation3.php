<!-- ----- début viewDocumentationInnovation3 -->

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
            <h3><b>Documentation Innovation 3</b></h3>
            <div class="lead">
                Similairement à ce que j'avais fait pour l'Innovation 2, je voulais représenter maintenant
                la répartition des doses de vaccin dans un hôpital particulier.
                <br> 
                <br>
                J'ai encore trouvé un morceau de code JavaScript (encore merci StackOverflow !) permettant d'afficher un diagramme circulaire et qui
                va être inclus dans la vue de l'Innovation 3.
                <br> 
                <br> 
                Un formulaire vient demander à l'utilisateur quel centre il aimerait connaître la répartition des vaccins ainsi
                qu'un vaccin qu'il souhaite "suivre".
                <br> 
                <br>
                Une requête SQL vient chercher le nombre de doses de chaque vaccin du centre choisis par l'utilisateur.
                <br> 
                <br>
                La création du camembert se fait de la même manière qu'avec l'histogramme à deux exceptions près : 
                <br>
                Le quartier du graphique correspondant au vaccin choisis par l'utilisateur va être légèrement ressortis du graphique. Si le vaccin choisis
                n'est pas disponible dans le centre, alors le graphique ne fais pas ressortir de valeur particulière.
                <br>
                De plus, le titre du graphique change en fonction du centre sélectionné.
            </div>
        </div>
    </div>

 <!-- ----- fin viewDocumentationInnovation3 -->