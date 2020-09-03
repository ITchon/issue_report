<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              <div class="card">
                <div class="card-header card-header-rose">
                  <h4 class="card-title "> List Projects <a href="<?php echo base_url()?>projects/add"><button class="btn btn-success ">ADD</button></a></h4>
                  
                  <p class="card-category"><h1></h1></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                <?php echo $this->session->flashdata("success"); ?>
                  <table id="example" class="table ">
                  <thead>
                    <tr>
                      <th>Project Name</th>
                      <th>Project Description</th>
                        <th>Status</th>
                        <th>Date Created</th>
                        <th class="text-center" width="20%">Manage</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      
                    <?php
                    foreach($result as $r){
                 echo "<tr>";
                echo "<td>".$r->pj_name."</td>";
                echo "<td>".$r->pj_des."</td>";
                if($r->enable==1 ){  
                  $icon = "btn-success btn-sm fa fa-check";
                  $text = "ENABLE";
                  $color = "#43a047";
                }
                else{ 
                  $icon = "btn-danger btn-sm fa fa-times";
                  $text = "DISABLE";
                  $color = "#D50000";
                }
                ?>
                    <td class="text-center"><b><font color="<?php echo $color ?>"><?php echo $text ?></font></b></td>
                  <?php
                echo "<td class=''>".$r->date_created."</td>";
                ?>
                  <td class="text-center"><a type="button" data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>เปิดการใช้งาน</h5>' data-original-title='Rule' onclick="javascript:window.location='<?php
                  echo base_url() . 'projects/enable/' . $r->pj_id;
                  ?>';"><i class="<?php echo $icon ?>"></i></a>
                  
                <a type ='button' data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>เเก้ไขข้อมูล</h5>' class=' ' data-original-title='Rule' onclick="javascript:window.location='<?php
                echo base_url() . 'projects/edit/' . $r->pj_id;
                ?>';"><i class='btn-primary btn-sm fa fa-wrench'></i></a>
                <?php 
                echo "<a type='button' data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>ลบข้อมูล</h5>' href='".base_url()."projects/delete/".$r->pj_id."' onclick='return confirm(\"Confirm Delete Item\")' ><i class='btn-danger btn-sm fa fa-trash'></i></a></td>";  
           
            echo "</tr>";
        }
    ?>
                  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

            <script type="text/javascript">
      
      $(document).ready(function() {
        
        $('#table').DataTable({
          dom: 'Bfrtip',
        buttons: [
            'colvis'
        ]
       
    });  
    });
    
    $(document).ready(function () {
  //Pagination numbers
  $('#paginationSimpleNumbers').DataTable({
    "pagingType": "simple_numbers"
  });
});

</script>

<script>
$(document).ready(function() {
$('#example').DataTable();
} );
</script>
    
