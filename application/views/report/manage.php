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
                Daily Issue Graph  <b>( Day : <?php echo date("d", strtotime('today'));?> ) </b>
                </div>
                    <canvas id="chDay" ></canvas>
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

<script type="text/javascript">
/* chart.js chart examples */
/* chart.js chart examples */

// chart colors
$red = '#dc3545';
$green = '#28a745';
$blue = '#007bff';
$yellow = '#ffc800';

var colors = [$red,$blue,$yellow,$green];


/* 3 donut charts */
var donutOptions = {
  cutoutPercentage: 85, 
  legend: {position:'bottom', padding:5}
};

// donut 1
var chMonthData = {
    labels: ['Total', 'Open','Work in progress','Closed'],
    datasets: [
      {
        backgroundColor: colors.slice(0,4),
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
    labels: ['Total', 'Open','Work in progress' ,'Closed'],
    datasets: [
      {
        backgroundColor: colors.slice(0,4),
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
      options: donutOptions
  });
}
// chart colors
$red = '#dc3545';
$green = '#28a745';
$blue = '#007bff';
$yellow = '#ffc800';

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
    maintainAspectRatio: false,
        responsive: true, 
    scales: {
      xAxes: [{
        barPercentage: 0.5,
        categoryPercentage: 1
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    },
    legend: {
      display: true, 
      
    }
  }
  
  });
}


</script>