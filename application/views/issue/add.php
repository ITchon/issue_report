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
                  <h2 class="card-title ">Add Project</h2>
                  <p class="card-category"><h1></h1></p>
                </div>
              
<hr>
            <form id="my-awesome-dropzone class="table form form-horizontal container" action="<?= base_url()?>issue/upload" method="post" enctype="multipart/form-data" data-toggle="validator">

                  <?php echo $this->session->flashdata("error"); ?>

                  <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Plant</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <input type="radio" name="plant" value="Phase 10"> Phase 10 &nbsp; &nbsp; &nbsp;
                   <input type="radio" name="plant" value="Phase 8"> Phase 8
                    </div>
                    </div>

                    <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" ><b>Project</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select name="pj_id" class="form-control select2"  required>
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
                          <input type="date" class="form-control" name="date_iden" required>
                        </div>
                      </div>


                  <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Issue Description</b><font color="red" size="1"> *This column is required the information.</font> </label>
                          <textarea name="is_des" class="form-control" cols="30" rows="5" require></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" ><b>Priority</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select name="priority" class="form-control" required>
                    <option value="">- - - Select Priority - - - </option>
                      <option value="Critical">Critical</option>
                      <option value="High">High</option>
                      <option value="Medium">Medium</option>
                      <option value="Low">Low</option>
                       
                   </select>
                    </div>
                    </div>

                    
                    <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Assigned To Owner</b><font color="red" size="1"> *This column is required the information.</font></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select name="owener_id" class="form-control select2"  required>
                    <option value=""> - - - Select Owner - - - </option>
                    <?php foreach ($result_own as $r) {
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
                          <input type="date" class="form-control" name="date_er" required>
                        </div>
                      </div>


                      <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Escalation Required </b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <input type="radio" name="er" value="Yes"> Yes &nbsp; &nbsp; &nbsp;
                   <input type="radio" name="er" value="No"> No
                    </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Impact Summary</b> </label>
                          <textarea name="imp_sum" class="form-control" cols="30" rows="5" require></textarea>
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Action Step</b><font color="red" size="1"> *This column is required the information.</font> </label>
                          <textarea name="act_step" class="form-control" cols="30" rows="5" require></textarea>
                        </div>
                      </div>


                      <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Issue Type</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select name="is_type" class="form-control" required>
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
                   <select name="cur_st" class="form-control" required>
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
                          <textarea name="act_step" class="form-control" cols="30" rows="5" require></textarea>
                        </div>
                      </div>

                      

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Note</b> </label>
                          <textarea name="note" class="form-control" cols="30" rows="5" require></textarea>
                        </div>
                      </div>
                  
       <div class='content'>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class=""><b> Attach file</b></label>
                        </div>
                      </div>
                      <div action="<?= base_url()?>issue/upload" class="dropzone" id="my-awesome-dropzone"></div>

<button id="submit-files">Upload</button>
    </div> 


            
              <div class="form-group">
                    <button type="submit" id="submit-files" class="btn btn-primary btn-block">Save Changes</button>
                  </div>
                  
                </form>
                
            </div>
          </div>
         
        </div>
      </div>


      
      
      
      
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script>
        $(document).ready(function() {
    $('.select2').select2();
});
      </script>
          <script>
    // Init dropzone instance
    Dropzone.autoDiscover = false
    const myDropzone = new Dropzone('#my-awesome-dropzone', {
      autoProcessQueue: false
    })

    // Submit
    const $button = document.getElementById('submit-files')
    $button.addEventListener('click', function () {
      // Retrieve selected files
      autoProcessQueue: true
      const acceptedFiles = myDropzone.getAcceptedFiles()
      for (let i = 0; i < acceptedFiles.length; i++) {
        setTimeout(function () {
          myDropzone.processFile(acceptedFiles[i])
        }, i * 2000)
      }
    })
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

