<!-- ----- début viewInnovation3 -->

<?php
require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentSiteMenu.html';
        include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
        $titre = $results[1]["label"];
        include $root . '/public/js/pieChart.php';
        ?>
             
         <div class="col-md-6">
                <div id="pieChart">
                    <script type="text/javascript">
                        var pieChartValues=[ 
                        <?php
    
                        $couleurs = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f");
                        $listeCouleurs = array();
                        
                        for ($i=0; $i<count($results[0]); $i+=1){
                            $element="";
                            for($j=0; $j<6; $j+=1){
                                $element = $element . $couleurs[rand(0, 15)] ;
                            }
                            $listeCouleurs[$i] = $element;
                        }
                        for ($i=0; $i<count($results[0]); $i+=1){
                            if ($i+1 == $vaccin) {
                                echo("{y: " . $results[0][$i]["quantite"] . ",exploded: true, indexLabel: \"" . $results[0][$i]["label"] . "\",color:\"#" . $listeCouleurs[$i] . "\"},");

                            }
                            else {
                                echo("{y: " . $results[0][$i]["quantite"] . ", indexLabel: \"" . $results[0][$i]["label"] . "\",color:\"#" . $listeCouleurs[$i] . "\"},");
                            }
                            
                        }
                        echo("];");
                        ?>
                        renderPieChart(pieChartValues);
                    </script>   
                </div>
            </div>
    </div>
    
<?php include $root . '/app/view/fragment/fragmentSiteFooter.html';?>

 <!-- ----- début viewInnovation3 -->   