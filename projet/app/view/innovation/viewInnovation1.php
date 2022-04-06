<!-- ----- début viewInnovation1 -->
 
<?php 
require ($root . '/app/view/fragment/fragmentSiteHeader.html');
?>

   <body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentSiteMenu.html';
        include $root . '/app/view/fragment/fragmentSiteJumbotron.html';
        
        echo('<table class = "table table-striped table-bordered">');
        echo('<thead>');
        echo('<tr>');
        for ($i=0; $i<count($results[0]); $i+=1){
            echo('<th>'.$results[0][$i].'</th>');
        }
        echo('</tr>');
        echo('</thead>');
        echo('<tbody>');
        for ($i=0; $i<count($results[1]); $i+=1){
            echo('<tr>');
            for ($j=0; $j<count($results[0]); $j+=1){
                echo('<td>'.$results[1][$i][$results[0][$j]].'</td>');
            }
            echo('</tr>');
        }
        echo('</tbody>');
        echo('</table>');
    echo("</div>");
    
include $root . '/app/view/fragment/fragmentSiteFooter.html'; 

?>

<!-- ----- fin viewInnovation1 -->