<!-- ----- début viewAvis -->

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
            <h3><b>Mon point de vue sur le projet</b></h3>
            <div class="lead">
                En ce qui concerne le projet en lui-même, je l'ai trouvé assez simple. La plupart des fonctionnalités
                demandées ont déjà été traité lors des précédents TP. Cependant, la dernière partie du projet concernant
                la gestion des dossiers était particulièrement intéressante à traiter au vu des différents cas et sous cas à prendre en compte.
                <br>
                <br>
                Sur mon code en lui-même, beaucoup de tableaux affichés ne sont pas dynamiques. Pour un gain de temps, les tableaux concernant
                un affichage de tous les tuples d'une table ont été copié-collé des TP MVC en changeant bien évidemment le nom des colonnes afin de repecter
                le nom des attributs que l'on retourne. Pour s'assurer qu'il n'y ait pas de soucis à l'avenir (changement de requête SQL associée à ses tableaux) il faudrait 
                bien entendu les remplacer par des tableaux dynamiques.
                <br>
                <br>
                Grâce au modèle MVC, le code devrait être assez facile à comprendre pour n'importe qui.
                <br>
                <br>
                Petit point négatif : le ModelRendezVous peut-être assez laborieux à lire vu le nombre de requêtes présentes et de bloc try/catch et if imbriqués.
                Le code de cette partie ayant été faite en quelques heures, je n'ai pas forcément cherché à l'optimiser au maximum (certaines requêtes utilisées
                pour retourner certaines informations peuvent être redondantes, peut-être que des vues déjà implémentés auraient pu être réutilisées, implémenter plusieurs 
                sous-méthodes au lieu da la gigantesque méthode du modèle, etc.)
                <br>
                <br>
                Si le site devait être maintenu et mis à jour, cela serait une des premières choses à modifier. Enfin, j'ai essayé de laisser quelques commentaires 
                afin de simplifier la relecture du code. Pour rendre ce projet avant la fin du 1er jalon, j'ai annoté brièvement ce que les méthodes font mais sans 
                rentrer dans le détail. Il faudrait bien évidemment revoir ces commentaires si le site est maintenu en essayant de suivre une forme de documentation complète
                comme en Java avec Javadoc : spécification de classe, spécification d'attribut, spécification de méthode.
                <br>
                <br>
                <h2><b>Bonne correction !</b></h2>
            </div>
        </div>
    </div>

<?php include $root . '/app/view/fragment/fragmentSiteFooter.html'; ?>

 <!-- ----- fin viewAvis -->