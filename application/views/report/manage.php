<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              <div class="card">
                <div class="card-header card-header-rose">
                  <h4 class="card-title ">User Table  <a href="<?php echo base_url()?>user/add"><button class="btn btn-success ">ADD</button></a></h4>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <canvas id="chBar"  width="800px" height="150px"></canvas>
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