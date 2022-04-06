<!-- ----- debut du script barChart -->

 <script type="text/javascript">
    
    function renderColumnChart(values) {

        var chart = new CanvasJS.Chart("columnChart",
        {
        backgroundColor: "lemonchiffon",
        colorSet:"colorSet3",
        title:{
            text: "Nombre de doses de vaccins par centre de vaccination",
            fontFamily: "Verdana",
            fontSize:25,
            fontWeight: "normal",
        },
        animationEnabled: true,
        legend: {
            verticalAlign: "bottom",
            horizontalAlign: "center"
        },
        theme: "theme2",
        data: [

        {
            indexLabelFontSize: 15,
            indexLabelFontFamily: "Monospace",       
            indexLabelFontColor: "black", 
            indexLabelLineColor: "black",        
            indexLabelPlacement: "outside",        
            type: "column",  
            showInLegend: false, 
            legendMarkerColor: "black",
            dataPoints: values
        }  
        ]
        });
        chart.render();
    }
</script>                 
            
<!-- ----- fin du script barChart --> 