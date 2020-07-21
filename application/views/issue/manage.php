<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              <div class="card">
                <div class="card-header card-header-rose">
                  <h4 class="card-title ">User Table  <a href="<?php echo base_url()?>issue/add"><button class="btn btn-success ">ADD</button></a></h4>
                  
                  <p class="card-category"><h1></h1></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                <?php echo $this->session->flashdata("success"); ?>
                  <table id="example" class="table ">
                  <thead>
                    <tr>
                      <th>Case No.</th>
                      <th>Project</th>
                        <th>Plant</th>
                        <th>Curent Status</th>
                        <th>Issue Descriptions</th>
                        <th>Priorty</th>
                        <th>Date Identifiled</th>
                        <th>Date Expect Solution</th>
                        <th>Date Entered</th>
                        <th class="text-center" width="20%">Manage</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      
                    <?php
                    foreach($result as $r){
                 echo "<tr>";
                echo "<td>"."$r->is_id"."</td>";
                echo "<td>".$r->pj_name."</td>";
                echo "<td>".$r->plant."</td>"; 
                echo "<td>".$r->cur_st."</td>";
                echo "<td>".$r->is_des."</td>";
                echo "<td>".$r->priority."</td>";
                echo "<td>".$r->date_identified."</td>";
                echo "<td>".$r->date_er."</td>";
                echo "<td>".$r->date_updated."</td>";
                ?> 

                <td>
                <a class='btn-primary' data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>เเก้ไขสิทธิ์</h5>' onclick="javascript:window.location='<?php
                echo base_url() . 'user/rule/' . $r->is_id;
                ?>';"><i class='btn-info btn-sm fa fa-gear'> </i></a>


                <a type ='button' data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>เเก้ไขข้อมูล</h5>' class=' ' data-original-title='Rule' onclick="javascript:window.location='<?php
                echo base_url() . 'user/edit_u/' . $r->is_id;
                ?>';"><i class='btn-info btn-sm fa fa-wrench'></i></a>
                <?php 
                echo "<a type='button' data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>ลบข้อมูล</h5>' href='".base_url()."user/deleteuser/".$r->is_id."' onclick='return confirm(\"Confirm Delete Item\")' ><i class='btn-danger btn-sm fa fa-trash'></i></a></td>";  
           
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