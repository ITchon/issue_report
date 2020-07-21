<style>
  .card{
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
  }
</style>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              <div class="card">
                <div class="card-header card-header-rose">
                  <h4 class="card-title ">User Table  <a href="<?php echo base_url()?>user/add"><button class="btn btn-success ">ADD</button></a></h4>

                </div>
           <div class="col-md-12">
           <div class="row py-2">
           <form method="post" enctype="multipart/form-data" action="<?php echo   base_url('report/multiple_upload'); ?>">
    <input type="file" name="filename[]"  multiple="true">
    <button type="submit">Upload</button>
</form>
           <div class="col-md-12 py-1">
              <div class="card" >
              <div class="card-header ">
              Monthly Issue Bar Chart Report ( Year : 2020 )
                </div>
                <div class="card-body ">
                  <canvas id="chBar" width="800px" height="150px" style="min-height:auto;min-width:auto"></canvas>
                </div>
              </div>
            </div>
          
          <div class="col-md-6 py-1">
            <div class="card">
                <div class="card-body">
                <div class="card-header ">
                Issue Donut Graph ( Month : Jul )
                </div>
                  <canvas id="chDonut1" ></canvas>
                </div>
            </div>
          </div>
          <div class="col-md-6 py-1">
            <div class="card">
                <div class="card-body ">
                <div class="card-header ">
                Issue Donut Graph ( Day : 21 )
                </div>
                    <canvas id="chDonut2"></canvas>
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
var colors = ['#dc3545','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];

/* 3 donut charts */
var donutOptions = {
  cutoutPercentage: 85, 
  legend: {position:'bottom', padding:5, labels: {pointStyle:'circle', usePointStyle:true}}
};

// donut 1
var chDonutData1 = {
    labels: ['Bootstrap', 'Popper', 'Other'],
    datasets: [
      {
        backgroundColor: colors.slice(0,3),
        borderWidth: 0,
        data: [74, 11, 40]
      }
    ]
};

var chDonut1 = document.getElementById("chDonut1");
if (chDonut1) {
  new Chart(chDonut1, {
      type: 'pie',
      data: chDonutData1,
      options: donutOptions
  });
}

var chDonutData2 = {
    labels: ['Wips', 'Pops', 'Dags'],
    datasets: [
      {
        backgroundColor: colors.slice(0,3),
        borderWidth: 0,
        data: [40, 45, 30]
      }
    ]
};
var chDonut2 = document.getElementById("chDonut2");
if (chDonut2) {
  new Chart(chDonut2, {
      type: 'pie',
      data: chDonutData2,
      options: donutOptions
  });
}

// chart colors
var colors = ['#007bff','#28a745','#444444','#c3e6cb','#dc3545','#6c757d'];

var chBar = document.getElementById("chBar");
var chartData = {
  labels: ["S", "M", "T", "W", "T", "F", "S"],
  datasets: [
  {
    data: [209, 245, 383, 403, 589, 692, 580],
    backgroundColor: colors[1]
  },
  {
    data: [489, 135, 483, 290, 189, 603, 600],
    backgroundColor: colors[2]
  },
  {
    data: [639, 465, 493, 478, 589, 632, 674],
    backgroundColor: colors[4]
  }]
};

if (chBar) {
  new Chart(chBar, {
  type: 'bar',
  data: chartData,
  options: {
    scales: {
      xAxes: [{
        barPercentage: 0.4,
        categoryPercentage: 0.5
      }],
      yAxes: [{
        ticks: {
          beginAtZero: false
        }
      }]
    },
    legend: {
      display: false
    }
  }
  
  });
}


</script>