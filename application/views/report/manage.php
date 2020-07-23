<style>
  .card{
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
  }
  .chart-container {
  position: relative;
  margin: 20px;
  height: 30vh;

}

</style>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose">
                  <h4 class="card-title "> Issue Graph Report </h4>
                    
                </div>
           <div class="col-md-12">
           <div class="row py-2">
           <div class="col-md-12 py-1">
              <div class="card" >
              <div class="card-header ">
              Yearly Issue Report <b>( Year : <?php echo date("Y", strtotime('today'));?> )</b>
                </div>
                <div class="chart-container" >
                  <canvas id="chBar" ></canvas>
                </div>
              </div>
            </div>
          
          <div class="col-md-6 py-1">
            <div class="card">
                <div class="card-body">
                <div class="card-header ">
                Monthly Issue Graph <b>( Month : <?php echo date("F", strtotime('today'));?> )</b> 
                </div>
                  <canvas id="chMonth" ></canvas>
                </div>
            </div>
          </div>
          <div class="col-md-6 py-1">
            <div class="card">
                <div class="card-body ">
                <div class="card-header ">
                Daily Issue Graph  <b>( Today : <?php echo date("d", strtotime('today'));?> ) </b>
                </div>
                    <canvas class="text-danger" id="chDay" ></canvas>
                </div>
            </div>
        </div>


          
                </div>
              </div>
            </div>  
          </div>
        </div>
        </div>
      </div>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<script type="text/javascript">
/* chart.js chart examples */
/* chart.js chart examples */
Chart.pluginService.register({
  beforeDraw: function(chart) {
    if (chart.config.options.elements.center) {
      // Get ctx from string
      var ctx = chart.chart.ctx;

      // Get options from the center object in options
      var centerConfig = chart.config.options.elements.center;
      var fontStyle = centerConfig.fontStyle || 'Arial';
      var txt = centerConfig.text;
      var color = centerConfig.color || '#000';
      var maxFontSize = centerConfig.maxFontSize || 75;
      var sidePadding = centerConfig.sidePadding || 20;
      var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
      // Start with a base font of 30px
      ctx.font = "30px " + fontStyle;

      // Get the width of the string and also the width of the element minus 10 to give it 5px side padding
      var stringWidth = ctx.measureText(txt).width;
      var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

      // Find out how much the font can grow in width.
      var widthRatio = elementWidth / stringWidth;
      var newFontSize = Math.floor(30 * widthRatio);
      var elementHeight = (chart.innerRadius * 2);

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





      //Draw text in center
  
    }
  }
});
// chart colors
$red = '#dc3545';
$green = '#28a745';
$blue = '#007bff';
$yellow = '#e2b820';

var colors = [$red,$blue,$yellow,$green];


/* 3 donut charts */
var donutOptions = {
  elements: {
    center: {
      text: <?php echo $total_month ?>,
      color: '#dc3545', // Default is #000000
      fontStyle: 'Arial', // Default is Arial
      sidePadding: 14, // Default is 20 (as a percentage)
      minFontSize: 14, // Default is 20 (in px), set to false and text will not wrap.
      lineHeight: 14 // Default is 25 (in px), used for when text wraps
    }
  },
  cutoutPercentage: 85, 
  plugins: {
      datalabels: {
        color: "#ffffff",
        font: {
          size: 14,
        },
      
      }
    },
  legend: {
    position:'bottom',
     padding:5,

            
     },
};
var donutDOptions = {
  elements: {
    center: {
      text: <?php echo $total_day ?>,
      color: '#dc3545', // Default is #000000
      fontStyle: 'Arial', // Default is Arial
      sidePadding: 14, // Default is 20 (as a percentage)
      minFontSize: 14, // Default is 20 (in px), set to false and text will not wrap.
      lineHeight: 14 // Default is 25 (in px), used for when text wraps
    }
  },
  cutoutPercentage: 85, 
  plugins: {
      datalabels: {
        color: "#ffffff",
        font: {
          size: 14,
        },
      
      }
    },
  legend: {
    position:'bottom',
     padding:5,     
     },
  
};

// donut 1
var chMonthData = {
    labels: [ 'Open','Work in progress','Closed'],
    datasets: [
      {
        backgroundColor: colors.slice(1,4),
        borderWidth: 0,
        data: <?php echo $month_data; ?>
      }
    ]
};

var chMonth = document.getElementById("chMonth");
if (chMonth) {
  new Chart(chMonth, {
      type: 'pie',
      data: chMonthData,
      options: donutOptions
  });
}

var chDayData = {
    labels: ['Open','Work in progress' ,'Closed'],
    datasets: [
      {
        backgroundColor: colors.slice(1,4),
        borderWidth: 0,
        data:<?php echo $day_data; ?>
      }
    ]
};
var chDay = document.getElementById("chDay");
if (chDay) {
  new Chart(chDay, {
      type: 'pie',
      data: chDayData,
      options: donutDOptions
  });
}
// chart colors
$red = '#dc3545';
$green = '#28a745';
$blue = '#007bff';
$yellow = '#e2b820';

var colors = [$red,$blue,$yellow,$green];
var chBar = document.getElementById("chBar");

var chartData = {
  labels: ['January','February','March','April','May','June','July','August','September','October','November','December'],
  datasets: [
  {
    label: 'Total',
    data:<?php echo $total ?>,
    backgroundColor: colors[0]
  },
  {
    label: 'Open',
    data: <?php echo $open ?>,
    backgroundColor: colors[1]
  }, 
  {
    label: 'Work in progress',
    data: <?php echo $wip ?>,
    backgroundColor: colors[2]
  },   

  {
    label: 'Closed',
    data:<?php echo $close ?>,
    backgroundColor: colors[3]
  }]
};

if (chBar) {
  new Chart(chBar, {
  type: 'bar',
  
  data: chartData,
  options: {

    plugins: {
      datalabels: {
        anchor: 'end',
        align: 'top',
        formatter: Math.round,
        font: {
          weight: 'bold'
        },
        display: function(context) {
          var index = context.dataIndex;
          var value = context.dataset.data[index];
          return value > 0; // display labels with a value greater than 0
        }
      }
    },
    maintainAspectRatio: false,
        responsive: true, 
    scales: {
      xAxes: [{
        barPercentage: 0.5,
        categoryPercentage: 1
      }],
      yAxes: [{
        
        ticks: {
          userCallback: function(label, index, labels) {
                     // when the floored value is the same as the value we have a whole number
                     if (Math.floor(label) === label) {
                         return label;
                     }

                 },
          beginAtZero: true,
          // userCallback: function(label, index, labels) {
          //            // when the floored value is the same as the value we have a whole number
          //            if (Math.floor(label) === label) {  
          //                return label;
          //            }

          //        },
                  //  max:10 
                  
                  
                  suggestedMax: <?php echo $maxvalue+1 ?>
     
               
        }
      }]
    },
    
    legend: {
      display: true, 
      position:'top'
     },
   }
  
  });
}



</script>