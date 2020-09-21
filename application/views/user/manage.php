

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              <div class="card">
                <div class="card-header card-header-rose">
             
                  <h4 class="card-title ">List Users   <?php  if($this->session->flashdata("add")!== null ) {?>
                    <a href="<?php echo base_url()?>user/add"><button class="btn btn-primary ">ADD</button></a></h4>
                      <?php } ?>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                <?php echo $this->session->flashdata("success"); ?>
                <?php echo form_open('#', array('id' => 'frm_usermanagement', 'name'=>'frm_usermanagement', 'class'=>'form-horizontal'));?>
                  <table id="dynamic-table" class="table ">
                  <thead>
                    <tr>
								    	<td colspan="7">
                        <?php  if($this->session->flashdata("enable")!== null ) {?>
									    	<div id="btn_enable" class="btn  btn-success"><span class="fa fa-check"></span></div>
									    	<div id="btn_disable" class="btn  btn-danger"><span class="fa fa-times"></span></div>
                      <?php } ?>
                        <?php  if($this->session->flashdata("delete")!== null ) {?>
									    	<div id="btn_delete" class="btn btn-dark"><span class="fa fa-trash-o"></span></div>
                      <?php } ?>
								    	</td>
								    </tr>	
                    <tr class=" text-dark">
                    <th class="text-center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
                      <th  style="font-weight: bold;">Username</th>
                      <th  style="font-weight: bold;">Name</th>
                        <th  style="font-weight: bold;">Gender</th>
                        <th  style="font-weight: bold;">Group</th>
                        <th  style="font-weight: bold;">Email</th>
                        <th  style="font-weight: bold;" class="text-center" width="20%">Manage</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      
                    <?php
                    foreach($result as $r){
                 echo "<tr>";
                 echo "<td style='text-align:center;'>
                 <label class='pos-rel'>
                     <input type='checkbox' class='ace' name='chk_uid[]' value='$r->su_id'/>
                     <span class='lbl'></span>
                   </label>
               </td>";
                echo "<td>".$r->username."</td>";
                echo "<td>".$r->firstname." ".$r->lastname."</td>";
                echo "<td>".$r->gender."</td>"; 
                echo "<td>".$r->name."</td>";
                echo "<td>".$r->email."</td>";
                if($r->enable!=1 ){
                  $color = "btn-danger";
                  $icon = "times";
                }
                else{
                  $color = "btn-success";
                  $icon = "check";
                }
                ?> <td class="text-center">
              <?php  if($this->session->flashdata("enable")!== null ) {?>
                  <a type="button" data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>เปิดการใช้งาน</h5>' data-original-title='Rule' onclick="javascript:window.location='<?php
                  echo base_url() . 'user/enable/' . $r->su_id.'/'.$r->enable;
                  ?>';"><i class='<?php echo $color ?> btn-sm fa fa-<?php echo $icon ?>'></i></a>
            <?php } ?>
 <?php  if($this->session->flashdata("rule")!== null ) {?>
                <a class='btn-primary' data-toggle='tooltip'  onclick="javascript:window.location='<?php
                echo base_url() . 'user/rule/' . $r->su_id;
                ?>';"><i class='btn-primary btn-sm fa fa-key'> </i></a>
            <?php } ?>
 <?php  if($this->session->flashdata("edit")!== null ) {?>
                <a type ='button' data-toggle='tooltip'  class=' ' onclick="javascript:window.location='<?php
                echo base_url() . 'user/edit/' . $r->su_id;
                ?>';"><i class='btn-primary btn-sm fa fa-wrench'></i></a>
                            <?php } ?>
 <?php  if($this->session->flashdata("delete")!== null ) {?>
                  <a type ='button' data-toggle='tooltip'  class=' ' onclick="if (confirm('Are you sure you want to delete '))javascript:window.location='<?php
                echo base_url() . 'user/delete/' . $r->su_id.'/'.'1';
                ?>';"><i class='btn-dark btn-sm fa fa-trash'></i></a>
                <?php  
            echo "</tr>";
          }
        }
    ?>
                  	<?php echo form_close();?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

            <script type="text/javascript">

    $(document).ready(function () {
  //Pagination numbers
  $('#paginationSimpleNumbers').DataTable({
    "pagingType": "simple_numbers"
  });

 
} );
</script>
    
