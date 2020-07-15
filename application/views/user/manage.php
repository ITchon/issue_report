<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <div align="right">
            <a href="<?php echo base_url()?>user/add"><button class="btn btn-warning">+</button></a>
            </div>
              <div class="card">
                <div class="card-header card-header-rose">
                  <h4 class="card-title ">User Table</h4>
                  
                  <p class="card-category"><h1></h1></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                <?php echo $this->session->flashdata("success"); ?>
                  <table id="example" class="table">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Name</th>
                        <th>Gender</th>
                        <th>Group</th>
                        <th>Email</th>
                        <th class="text-center" width="20%">Manage</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      
                    <?php
                    foreach($result as $r){
                 echo "<tr>";
                echo "<td>".$r->username."</td>";
                echo "<td>".$r->firstname." ".$r->lastname."</td>";
                echo "<td>".$r->gender."</td>"; 
                echo "<td>".$r->name."</td>";
                echo "<td>".$r->email."</td>";
                if($r->enable!=1 ){?>
                  <!-- <td><a href='".base_url()."index.php/user/permission/".$r->user_id."' class='btn btn-danger'>Disable</a>"; -->
                  <td class="text-center"><a type="button" data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>เปิดการใช้งาน</h5>' data-original-title='Rule' onclick="javascript:window.location='<?php
                  echo base_url() . 'user/enable/' . $r->su_id;
                  ?>';"><i class='btn-danger btn-sm fa fa-times'></i></a>
                  <?php
                }
                else{?>
                  <!-- echo "<td><a href='".base_url()."index.php/user/permission/".$r->user_id."' class='btn btn-success'>Enable</a>"; -->
                  <td class="text-center"><a type="button" data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>ปิดการใช้งาน</h5>'  data-original-title='Rule' onclick="javascript:window.location='<?php
                  echo base_url() . 'user/disable/' . $r->su_id;
                  ?>';"><i class='btn-success btn-sm fa fa-check'></i></a>                      
                  <?php
                }
                ?> 


                <a class='btn-primary' data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>เเก้ไขสิทธิ์</h5>' onclick="javascript:window.location='<?php
                echo base_url() . 'user/rule/' . $r->su_id;
                ?>';"><i class='btn-info btn-sm fa fa-gear'> </i></a>


                <a type ='button' data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>เเก้ไขข้อมูล</h5>' class=' ' data-original-title='Rule' onclick="javascript:window.location='<?php
                echo base_url() . 'user/edit_u/' . $r->su_id;
                ?>';"><i class='btn-info btn-sm fa fa-wrench'></i></a>
                <?php 
                echo "<a type='button' data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>ลบข้อมูล</h5>' href='".base_url()."user/deleteuser/".$r->su_id."' onclick='return confirm(\"Confirm Delete Item\")' ><i class='btn-default btn-sm fa fa-trash'></i></a></td>";  
           
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
    
