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
            <form id="my-awesome-dropzone" class="table form form-horizontal container" action="<?= base_url()?>issue/upload" method="post" enctype="multipart/form-data" data-toggle="validator">

                  <?php echo $this->session->flashdata("error"); ?>

                  <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Plant</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <input type="radio" name="plant" value="Phase 10" > Phase 10 &nbsp; &nbsp; &nbsp;
                   <input type="radio" name="plant" value="Phase 8" > Phase 8
                    </div>
                    </div>

                    <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" ><b>Project</b></label>      
                        
                      <div class="col-sm-6 col-md-6">
                   <select name="pj_id" class="form-control select2"  >
                    <option value=""> - - - Select Project - - - </option>
                    <?php foreach ($result_p as $r) {
                        ?>
                       <option value="<?php echo $r->pj_id ?>"><?php echo $r->pj_name ?></option>
                  <?php
                   } ?>
                   </select>

                    </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                          <label class=""><b>Date Identified</b> </label>
                          <input type="date" class="form-control" name="date_iden"  >
                        </div>
                      </div>


                  <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Issue Description</b><font color="red" size="1"> *This column is  the information.</font> </label>
                          <textarea name="is_des" class="form-control" cols="30" rows="5" ></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" ><b>Priority</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select name="priority" class="form-control"  >
                    <option value="">- - - Select Priority - - - </option>
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
                   <select name="owner_id" class="form-control select2"  >
                    <option value=""> - - - Select Owner - - - </option>
                    <?php
               
           
                    foreach ($result_own as $r) {
                        ?>
                       <option value="<?php echo $r->owner_id ?>"><?php echo $r->owner_name ?></option>
                  <?php
                   } ?>
                   </select>

                    </div>
                    </div>
                    

                    <div class="col-md-12">
                        <div class="form-group">
                          <label class=""><b>Expected Resolution Date</b> </label>
                          <input type="date" class="form-control" name="date_er"  >
                        </div>
                      </div>


                      <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Escalation Required? </b><small>( “Yes” if the program/project manager feels an issue needs to be escalated and “No” if escalation is not needed to resolve the issue.)</small></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <input type="radio" name="er" value="Yes" > Yes &nbsp; &nbsp; &nbsp;
                   <input type="radio" name="er" value="No" > No
                    </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Impact Summary</b> </label>
                          <textarea name="imp_sum" class="form-control" cols="30" rows="5" ></textarea>
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Action Step</b><font color="red" size="1"> *This column is  the information.</font> </label>
                          <textarea name="act_step" class="form-control" cols="30" rows="5" ></textarea>
                        </div>
                      </div>


                      <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Issue Type</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select name="is_type" class="form-control"  >
                    <option value="">- - - Select Issue Type - - - </option>
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
                   <select name="cur_st" class="form-control"  >
                    <option value="">- - - Select Status - - - </option>
                      <option value="Open">Open</option>
                      <option value="Work In Progress">Work In Progress</option>
                      <option value="Closed">Closed</option>
                   </select>
                    </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Final Resolution&Rationale</b></label>
                          <textarea name="frr" class="form-control" cols="30" rows="5" ></textarea>
                        </div>
                      </div>

                      

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Note</b> </label>
                          <textarea name="note" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                      </div>
                  
       <div class='content'>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class=""><b> Attach file</b></label>
                        </div>
                      </div>
                      <div multiple name="file" action="<?= base_url()?>issue/upload" class="dropzone" id="my-awesome-dropzone"></div>
                      
    </div> 


    <div class="form-group">
                      <button class="btn btn-primary btn-block" type="submit" id='uploadfiles' value='Upload Files'>Sub Pay Sub Ta</button>
                    </div>
              
                  
                </form>
                
            </div>
          </div>
         
        </div>
      </div>


      
      
      
      
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       
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

