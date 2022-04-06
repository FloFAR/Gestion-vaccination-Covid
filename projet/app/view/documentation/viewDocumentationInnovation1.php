<!-- ----- début viewDocumentationInnovation1 -->

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
            <h3><b>Documentation Innovation 1</b></h3>
            <div class="lead">
                    Lorsqu'il a fallu que je m'occupe de l'implémentation de la partie concernant le dossier 
                    des patients, je devais systématiquement vérifier moi-même sur phpMyAdmin quel était le nombre total de 
                    dose que devait prendre le patient selon son vaccin et quel était son nombre actuel de dose pour m'assurer
                    du bon fonctionnement de mon code.
                    <br>
                    <br>
                    Je me suis alors dit que cela pouvait être une bonne idée de représenter dans un tableau le nombre d'injection 
                    restantes à faire par chacun des patients ayant déjà reçu une petite piqure 💉.
                    <br>
                    <br>
                    Pour se faire, rien de plus simple : une requête SQL vient chercher les informations (nom, prénom et adresse)
                    des patients figurant dans la table rendezvous ainsi que la somme des injection reçues (dans le cas où un patient 
                    s'est rendu dans plusieurs centres) et de la différence de la dose de leur vaccin par cette même somme d'injection.
                    <br> 
                    <br> 
                    Le tout est ensuite affiché dans un tableau créé de manière dynamique.
            </div>
        </div>
    </div>

<?php include $root . '/app/view/fragment/fragmentSiteFooter.html'; ?>

 <!-- ----- fin viewDocumentationInnovation1 -->