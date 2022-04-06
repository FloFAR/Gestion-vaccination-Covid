<!-- ----- debut du script pieChart -->

<script type="text/javascript">
    
    function renderPieChart (values) {

        var chart = new CanvasJS.Chart("pieChart",
        {
        backgroundColor: "lemonchiffon",
        colorSet:"colorSet2",

        title:{
            text: "Répartition des doses de vaccin dans le centre <?php echo($titre) ;?>",
            fontFamily:"Verdana",
            fontSize:25,
            fontWeight: "normal",
        },
            animationEnabled: true,
        data: [
        {        
            indexLabelFontSize: 15,
            indexLabelFontFamily: "Monospace",       
            indexLabelFontColor: "black", 
            indexLabelLineColor: "black",        
            indexLabelPlacement: "outside",
            type: "pie",       
            showInLegend: false,
            toolTipContent: "<strong>#percent%</strong>",
            dataPoints:values
        }
        ]
        });
        chart.render();
    }
</script>

<!-- ----- fin du script pieChart --> 