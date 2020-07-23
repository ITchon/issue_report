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
                    
                    <?php 
                    $month = array("01","02","03","04","05","06","07","08","09","10","11","12");
                    $total = array();
                    print_r($month);

                    foreach($resulty as $r){
                      $rm =  $r->month;
                      $rt = $r->total;
                      echo $rm." : ";
                      echo $rt."<br> ";
                    }
                    
                    foreach($month as $m){
                   //  if (in_array($m, $rm))
                   //  {
                   //    array_push($total, $rt);
                   //  }
                   //else
                   //  {
                   //    array_push($total, '0');
                   //  }
                   //}

                   //if ($m == $rm)
                   //   {
                   //     array_push($total, $rt);
                   //   }
                   // else
                   //   {
                   //     array_push($total, '0');
                   //   }
                    }
                  
          
                      
                    echo "<br>";
                    print_r($total);
                    $totol = implode(",", $total); 
                    
                    
                    ?>
                </div>
           <div class="col-md-12">
           <div class="row py-2">
           <div class="col-md-12 py-1">
              <div class="card" >
              <div class="card-header ">
              Monthly Issue Bar Chart Report ( Year : <?php echo date("Y", strtotime('today'));?> )
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
                Issue Donut Graph ( Month : <?php echo date("F", strtotime('today'));?> )
                </div>
                  <canvas id="chDonut1" ></canvas>
                </div>
            </div>
          </div>
          <div class="col-md-6 py-1">
            <div class="card">
                <div class="card-body ">
                <div class="card-header ">
                Issue Donut Graph ( Day : <?php echo date("d", strtotime('today'));?> ) 
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
    labels: ['Total', 'Open', 'Closed','Work in progress'],
    datasets: [
      {
        backgroundColor: colors.slice(0,3),
        borderWidth: 0,
        data: [<?php echo $resultm[0]->total ?>,
        <?php echo $resultm_open[0]->total ?>,
        <?php echo $resultm_close[0]->total ?>,
        <?php echo $resultm_work[0]->total ?>
      ]
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
    labels: ['Total', 'Open', 'Closed','Work in progress'],
    datasets: [
      {
        backgroundColor: colors.slice(0,3),
        borderWidth: 0,
        data: [<?php echo $resultd[0]->total ?>,
        <?php echo $resultd_open[0]->total ?>,
        <?php echo $resultd_close[0]->total ?>,
        <?php echo $resultd_work[0]->total ?>
      ]
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
  labels: ['January','February','March','April','May','June','July','August','September','October','November','December'],
  datasets: [
  {
    data: [<?php echo $totol;?>],
    backgroundColor: colors[1]
  },
  {
    data: [<?php echo $totol;?>],
    backgroundColor: colors[2]
  },
  {
    data: [<?php echo $totol;?>],
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
          beginAtZero: true
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