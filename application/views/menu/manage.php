<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <div align="right">
            <a href="<?php echo base_url()?>menu/add"><button class="btn btn-warning">+</button></a>
            </div>
              <div class="card">
                <div class="card-header card-header-rose">
                  <h4 class="card-title ">List Menu</h4>
                </div>
                <div class="card-body">
                  <table id="example" class="table">
                  <thead>
                  <tr class=" text-dark" >
                        <th style="font-weight: bold;">Menu name</th>
                        <th class="text-center"  style="font-weight: bold;" width="30%">Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    <?php
                    foreach($result as $r){
            echo "<tr>";
                echo "<td>".$r->name."</td>";
                 if($r->enable!=1 ){?>
                  
                  <td class="text-center"><a type="button" data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>เปิดการใช้งาน</h5>' data-original-title='Rule' onclick="javascript:window.location='<?php
                  echo base_url() . 'menu/enable/' . $r->mg_id;
                  ?>';"><i class='btn-danger btn-sm fa fa-times'></i></a>
                  <?php
                }
                else{?>

                  <td class="text-center"><a type="button" data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>ปิดการใช้งาน</h5>'  data-original-title='Rule' onclick="javascript:window.location='<?php
                  echo base_url() . 'menu/disable/' . $r->mg_id;
                  ?>';"><i class='btn-success btn-sm fa fa-check'></i></a>                      
                  <?php
                }
                ?> <a type ='button' class=' ' data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>เเก้ไขข้อมูล</h5>' data-original-title='Rule' onclick="javascript:window.location='<?php
                echo base_url() . 'menu/edit/' . $r->mg_id;
                ?>';"><i class='btn-primary btn-sm fa fa-wrench'> </i> </a>
                <?php 
                echo "<a type='button' data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>ลบข้อมูล</h5>' href='".base_url()."permission/deletepermission/".$r->sp_id."' onclick='return confirm(\"Confirm Delete Item\")' ><i class='btn-dark btn-sm fa fa-trash'></i></a></td>";  
       
           
           
 
                
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
      <br><br>
      <script>
        $(document).ready(function() {
    $('.select2').select2();
});
      </script>

            <script type="text/javascript">
      
      $(document).ready(function() {

        $("#form").submit(function(){
      
        $.ajax({
           url: "<?php echo base_url(); ?>permission/insert",
           type: 'POST',
           data: $("#form").serialize(),
           success: function() {
            alert('Insert permissiongroup success');
           }
        });
       });
        
        $('#table').DataTable({
          dom: 'Bfrtip',
        buttons: [
            'colvis'
        ]
       
    });



     
    });


</script>
<script>
$(document).ready(function() {
$('#example').DataTable();
} );
</script>
    
