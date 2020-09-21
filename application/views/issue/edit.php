<style>
label{
  color:#495057;
  font-size:16px; 
   font-weight: bold;
}

</style>



  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-3"></div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-rose">
                  <h2 class="card-title ">Add Issue</h2>
                  <p class="card-category"><h1></h1></p>
                </div>
              
<hr>
            <form id="my-awesome-dropzone class="table form form-horizontal container" action="<?= base_url()?>issue/save_edit" method="post" enctype="multipart/form-data" data-toggle="validator">
  <input type="text" hidden name="is_id" value="<?php echo $result[0]->is_id ?>">
                  <?php echo $this->session->flashdata("error"); ?>

                  <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Plant</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <input type="radio" name="plant" <?php if ($result[0]->plant == 'Phase 10') echo "checked='checked'"; ?> value="Phase 10" > Phase 10 &nbsp; &nbsp; &nbsp;
                   <input type="radio" name="plant" <?php if ($result[0]->plant == 'Phase 8') echo "checked='checked'"; ?> value="Phase 8" > Phase 8
                    </div>
                    </div>

                    <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" ><b>Projects</b></label>      
                        
                      <div class="col-sm-6 col-md-6">

                   <select id="pj" name="pj_id" id="" class="form-control select2" required>
                   <option disabled value="">- - - Select Projects- - - </option>
                  <?php 
              foreach($result_pj as $r){?>
               <option value="<?php  echo $r->pj_id ?>"><?php echo $r->pj_name ?></option>
               <?php
            }
       ?>     
          </select>

                    </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                          <label class=""><b>Date Identified</b> </label>
                          <input type="date" class="form-control" name="date_iden" value="<?php echo $result[0]->date_identified ?>" >
                        </div>
                      </div>


                  <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Issue Description</b><font color="red" size="1"> *This column is  the information.</font> </label>
                          <textarea name="is_des" class="form-control" cols="30" rows="5" ><?php echo $result[0]->is_des ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" ><b>Priority</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select id="pr" name="priority" class="form-control"  >
                   <option disabled value="">- - - Select Priority- - - </option>
                      <option value="Critical">Critical</option>
                      <option value="High">High</option>
                      <option value="Medium">Medium</option>
                      <option value="Low">Low</option>
                       
                   </select>
                    </div>
                    </div>

                    
                    <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Assigned To Owner</b><font color="red" size="1"> *This column is  the information.</font></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select id="ato" name="owner_id" class="form-control select2"  >
                   <option disabled value="">- - - Select Owner- - - </option>

                    <?php foreach ($result_own as $r){
                        ?>
                       <option value="<?php echo $r->owner_id?>"><?php echo $r->owner_name ?></option>

                  <?php
                   } ?>
                   </select>

                    </div>
                    </div>

                    

                    <div class="col-md-12">
                        <div class="form-group">
                          <label class=""><b>Expected Resolution Date</b> </label>
                          <input type="date" class="form-control" name="date_er" value="<?php echo $result[0]->date_er ?>" >
                        </div>
                      </div>


                      <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Escalation Required? </b><small>( “Yes” if the program/project manager feels an issue needs to be escalated and “No” if escalation is not needed to resolve the issue.)</small></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <input type="radio" name="er" <?php if ($result[0]->esc_req == 'Yes') echo "checked='checked'"; ?> value="Yes" > Yes &nbsp; &nbsp; &nbsp;
                   <input type="radio" name="er" <?php if ($result[0]->esc_req == 'No') echo "checked='checked'"; ?> value="No" > No
                    </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Impact Summary</b> </label>
                          <textarea name="imp_sum" class="form-control" cols="30" rows="5"><?php echo $result[0]->imp_sum ?></textarea>
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Action Step</b><font color="red" size="1"> *This column is  the information.</font> </label>
                          <textarea name="act_step" class="form-control" cols="30" rows="5" ><?php echo $result[0]->act_step ?></textarea>
                        </div>
                      </div>


                      <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Issue Type</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select id="ist" name="is_type" class="form-control"  >
                    <option disabled value="">- - - Select Issue Type - - - </option>
                      <option value="Informational">Informational</option>
                      <option value="Procedural">Procedural</option>
                      <option value="System">System</option>
                      <option value="Other">Other</option>
                       
                   </select>
                    </div>
                    </div>
                    

                    <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Current Status</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select id="cur" name="cur_st" class="form-control" >
                    <option disabled value="">- - - Select Status - - - </option>
                      <option value="Open">Open</option>
                      <option value="Work In Progress">Work In Progress</option>
                      <option value="Closed">Closed</option>
                   </select>
                    </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Final Resolution&Rationale</b></label>
                          <textarea name="frr" class="form-control" cols="30" rows="5" ><?php echo $result[0]->final_rs ?></textarea>
                        </div>
                      </div>

                      

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Note</b> </label>
                          <textarea name="note" class="form-control" cols="30" rows="5"><?php echo $result[0]->is_note ?></textarea>
                        </div>
                      </div>
                  
       <div class='content'>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class=""><b> Attach file</b></label>
                        </div>
                      </div>
                      <div multiple name="file" action="<?= base_url()?>issue/save_edit" class="dropzone" id="my-awesome-dropzone">
                      <input type="file" name="file" hidden>
                      </div>
                      <br>

                      <div class="col-md-12">
                        <div class="form-group">
            
                      <table id="dynamic-table" class="table text-center">
                      <thead>
                      <tr>
                      
                      </tr>
                      </thead>
                      
                      
                      <?php 
                      foreach($result_img as $r){ ?>
                      <tbody>
                      <td style='text-align:center;'>
                 <label class='pos-rel'>
                     <input type='checkbox' name='chk_uid[]' value='<?php echo $r->img_id ?>'/>
                     <span class='lbl'></span>
                   </label>
               </td>
                      <td><?php echo $r->file_n ?></td>
                      <td><div class="text-center"><img width="150" height="100" src="<?php echo base_url();?>uploads/<?php echo $r->file_code ?>"></div></td>
                  <?php
                      }
                       ?>
                       <?php if($result_img != null){ ?>
                       <input type="button" class="btn btn-danger" id="toggle" value="delete all" onClick="do_this()" />
                       <?php } ?>
                      </tbody>
                      </table>

                      </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Entered By</b> </label>
                          <input type="text" readonly name="en" class="form-control" value="<?php echo $result[0]->entered_by ?>">
                        </div>
                      </div>


                      
    </div> 


    <div class="form-group">
                      <button class="btn btn-primary btn-block" type="submit" id='uploadfiles' value='Upload Files'>Sub Pay Sub Ta</button>
                    </div>
              
                  
                </form>
                
            </div>
          </div>
         
        </div>
      </div>
      


      
      
      <script>

function do_this(){

var checkboxes = document.getElementsByName('chk_uid[]');
var button = document.getElementById('toggle');

if(button.value == 'delete all'){
    for (var i in checkboxes){
        checkboxes[i].checked = 'FALSE';
    }
    button.value = 'undelete all'
}else{
    for (var i in checkboxes){
        checkboxes[i].checked = '';
    }
    button.value = 'delete all';
}
}

      document.getElementById('pr').value = "<?php echo $result[0]->priority ?>";
      document.getElementById('pj').value = "<?php echo $result[0]->pj_id ?>";
      document.getElementById('ato').value = "<?php echo $result[0]->owner_id  ?>";
      document.getElementById('ist').value = "<?php echo $result[0]->is_type ?>";
      document.getElementById('cur').value = "<?php echo $result[0]->cur_st ?>";
</script>
      
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script>
        $(document).ready(function() {
    $('.select2').select2();
});
      </script>
    <script type='text/javascript'>
  
  Dropzone.autoDiscover = false;
  var myDropzone = new Dropzone(".dropzone", { 
      autoProcessQueue: false,
      parallelUploads: 10 // Number of files process at a time (default 2)
  });
 
  $('#uploadfiles').click(function(){
      myDropzone.processQueue();
  });
  
  </script>


      <!--<script type="text/javascript">
    $("#form").submit(function(){
        $.ajax({
           url: "<?php echo base_url(); ?>user/insert",
           type: 'POST',
           data: $("#form").serialize(),
           success: function() {
            alert('Success');
           }
        });


    });


</script> -->

