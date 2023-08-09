<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="">
  <canvas  width="400" height="400" id="{{$data['var']}}"></canvas>
</div>


<!-- Chart doughnut -->
<script>
    var data = <?php echo json_encode($data); ?>;
    //console.log(data.prospek);
  var dataDoughnut = {
    labels: ["Tercapai", "Belum Tercapai"],
    datasets: [
      {
        label: "Target Komitmen",
        data: [data.prospek, data.total - data.prospek],
        backgroundColor: [
          "rgb(0, 171, 240)",
          "rgb(245, 245, 245)",
        ],
        hoverOffset: 4,
      },
    ],
  };

  var centerText =(function(){
                            var achieved = parseInt(dataDoughnut.datasets[0].data[0]),
                                n_achieved = parseInt(dataDoughnut.datasets[0].data[1]),
                                total = achieved + n_achieved;
                                
                            var percentage = parseFloat((n_achieved/total*100).toFixed(1));console.log(total);
                            if(n_achieved>1000) var string = n_achieved/1000 + ' M';
                            else var string = n_achieved+ ' Juta'

                            return 'Delta Target: ' + percentage + '% (' + string + ')';
                        }
                    )();
            
  var configDoughnut = {
        type: "doughnut",
        data: dataDoughnut,
        options: {
            elements: {
                center: {
                    
                    text: centerText,
                    color: '#FF6384', // Default is #000000
                    fontStyle: 'Arial', // Default is Arial
                    sidePadding: 20, // Default is 20 (as a percentage)
                    minFontSize: 25, // Default is 20 (in px), set to false and text will not wrap.
                    lineHeight: 25 // Default is 25 (in px), used for when text wraps
                }
        },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                
                title: {
                    display: true,
                    text: data.title,
                    padding: 10,
                    font: {
                        size: 20,
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context){
                            var label = context.label,
                                currentValue = context.raw,
                                total = context.chart._metasets[context.datasetIndex].total;

                            var percentage = parseFloat((currentValue/total*100).toFixed(1));
                            if(currentValue>1000) var string = currentValue/1000 + ' M';
                            else var string = currentValue+ ' Juta'

                            return label + ": " +string + ' (' + percentage + '%)';
                        }
                    }
                },
               
            },
            //devicePixelRatio: 
    }    
  };
  var centerDoughnutPlugin = {
    	id: 'doughnut-centertext',
        beforeDraw: function(chart) {
            if (chart.config.options.elements.center) {
                // Get ctx from string
                var ctx = chart.ctx;

                // Get options from the center object in options
                var centerConfig = chart.config.options.elements.center;
                var fontStyle = centerConfig.fontStyle || 'Arial';
                var txt = centerConfig.text;
                var color = centerConfig.color || '#000';
                var maxFontSize = centerConfig.maxFontSize || 75;
                var sidePadding = centerConfig.sidePadding || 20;
                var sidePaddingCalculated = (sidePadding / 100) * (chart._metasets[chart._metasets.length-1].data[0].innerRadius * 2)
                // Start with a base font of 30px
                ctx.font = "30px " + fontStyle;

                // Get the width of the string and also the width of the element minus 10 to give it 5px side padding
                var stringWidth = ctx.measureText(txt).width;
                var elementWidth = (chart._metasets[chart._metasets.length-1].data[0].innerRadius * 2) - sidePaddingCalculated;            

                // Find out how much the font can grow in width.
                var widthRatio = elementWidth / stringWidth;
                var newFontSize = Math.floor(30 * widthRatio);
                var elementHeight = (chart._metasets[chart._metasets.length-1].data[0].innerRadius * 2);

                // Pick a new font size so it will not be larger than the height of label.
                var fontSizeToUse = Math.min(newFontSize, elementHeight, maxFontSize);
                var minFontSize = centerConfig.minFontSize;
                var lineHeight = centerConfig.lineHeight || 25;
                var wrapText = false;

                if (minFontSize === undefined) {
                    minFontSize = 20;
                }

                if (minFontSize && fontSizeToUse < minFontSize) {
                    fontSizeToUse = minFontSize;
                    wrapText = true;
                }

                // Set font settings to draw it correctly.
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
                var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
                ctx.font = fontSizeToUse + "px " + fontStyle;
                ctx.fillStyle = color;

                if (!wrapText) {
                    ctx.fillText(txt, centerX, centerY);
                    return;
                }

                var words = txt.split(' ');
                var line = '';
                var lines = [];

                // Break words up into multiple lines if necessary
                for (var n = 0; n < words.length; n++) {
                    var testLine = line + words[n] + ' ';
                    var metrics = ctx.measureText(testLine);
                    var testWidth = metrics.width;
                    if (testWidth > elementWidth && n > 0) {
                        lines.push(line);
                        line = words[n] + ' ';
                    } else {
                        line = testLine;
                    }
                }

                // Move the center up depending on line height and number of lines
                centerY -= (lines.length / 2) * lineHeight;

                for (var n = 0; n < lines.length; n++) {
                    ctx.fillText(lines[n], centerX, centerY);
                    centerY += lineHeight;
                }
                //Draw text in center
                ctx.fillText(line, centerX, centerY);
            }
        }
    };
  
  Chart.register(centerDoughnutPlugin);

  var chartBar = new Chart(
    document.getElementById(data.var),
    configDoughnut
  );
</script>