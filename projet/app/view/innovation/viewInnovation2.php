<!-- ----- début viewInnovation2 -->

<?php
require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentSiteMenu.html';
        include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
        include $root . '/public/js/barChart.php';
        ?>
             
         <div class="col-md-6">
                <div id="columnChart">
                    <script type="text/javascript">
                        var columnChartValues=[
                        <?php
                        $couleurs = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f");
                        $listeCouleurs = array();
                        
                        for ($i=0; $i<count($results); $i+=1){
                            $element="";
                            for($j=0; $j<6; $j+=1){
                                $element = $element . $couleurs[rand(0, 15)] ;
                            }
                            $listeCouleurs[$i] = $element;
                        }
                        for ($i=0; $i<count($results); $i+=1){
                            echo("{y:" . $results[$i]["sum(stock.quantite)"] . ", label: \"" . $results[$i]["label"] . "\",color:\"#" . $listeCouleurs[$i] . "\"},");
                        }
                        echo("];");
                        ?>
                        renderColumnChart(columnChartValues);
                    </script>   
                </div>
            </div>
    </div>

 <!-- ----- début viewInnovation2 -->   