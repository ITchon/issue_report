<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <div align="right">
  
            </div>
              <div class="card">
                <div class="card-header card-header-rose">
                  <h4 class="card-title ">List Usergroups <a href="<?php echo base_url()?>usergroup/add"><button class="btn btn-success">ADD</button></a></h4>

                </div>
                <div class="card-body">
                  <table id="example" class="table">
                  <thead>
                      <tr class="text-dark" >
    
                        <th width="20%"  style="font-weight: bold;">Group name</th>
                        <th class="text-center"  style="font-weight: bold;" width="20%">Manage</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($result_all as $r){
            echo "<tr>";
                echo "<td>".$r->name."</td>";
                if($r->enable!=1 ){?>
                  <!-- <td><a href='".base_url()."index.php/user/permission/".$r->user_id."' class='btn btn-danger'>Disable</a>"; -->
                  <td class="text-center"><a type="button" data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>เปิดการใช้งาน</h5>' data-original-title='Rule' onclick="javascript:window.location='<?php
                  echo base_url() . 'usergroup/enable/' . $r->sug_id;
                  ?>';"><i class='btn-danger btn-sm fa fa-times'></i></a>
                  <?php
                }
                else{?>
                  <!-- echo "<td><a href='".base_url()."index.php/user/permission/".$r->user_id."' class='btn btn-success'>Enable</a>"; -->
                  <td class="text-center"><a type="button" data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>ปิดการใช้งาน</h5>'  data-original-title='Rule' onclick="javascript:window.location='<?php
                  echo base_url() . 'usergroup/disable/' . $r->sug_id;
                  ?>';"><i class='btn-success btn-sm fa fa-check'></i></a>                      
                  <?php
                }
                ?> <a class='' data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>เเก้ไขสิทธิ์</h5>' onclick="javascript:window.location='<?php
                echo base_url() . 'usergroup/rule/' . $r->sug_id;
                ?>';"><i class='btn-primary btn-sm fa fa-gears'> </i> </a>

                <a type ='button' class=' ' data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>เเก้ไขข้อมูล</h5>' data-original-title='Rule' onclick="javascript:window.location='<?php
                echo base_url() . 'usergroup/edit/' . $r->sug_id;
                ?>';"><i class='btn-primary btn-sm fa fa-wrench'></i></a>

                <?php 
                echo "<a type='button' data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>ลบข้อมูล</h5>' href='".base_url()."usergroup/deletegroup/".$r->sug_id."' onclick='return confirm(\"Confirm Delete Item\")' ><i class='btn-dark btn-sm fa fa-trash'></i></a></td>";
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
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script type="text/javascript">
//      $(document).ready(function() {
//
//        $('#table').DataTable({
//          dom: 'Bfrtip',
//        buttons: [
//            'colvis'
//        ]
//       
//    });
//
//        
//    $("#btn").on("click",function(){
//      
//        $.ajax({
//           url: "<?php echo base_url(); ?>usergroup/insert",
//           type: 'POST',
//           data: $("#form").serialize(),
//           success: function() {
//            
//           }
//        });
//       });
//     
//    });
//
//
//</script>

<script>
$(document).ready(function() {
$('#example').DataTable();
} );
</script>

