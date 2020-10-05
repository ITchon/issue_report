<style>
label{
  color:#495057;
  font-size:16px; 
   font-weight: bold;
}
		.dropzone {
			background: #fff;
			border: 2px dashed #ddd;
			border-radius: 5px;
		}

		.dz-message {
			color: #999;
		}

		.dz-message:hover {
			color: #464646;
		}

		.dz-message h3 {
			font-size: 200%;
			margin-bottom: 15px;
		}

</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/dropzone/dropzone.min.css">
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
            <!-- <form id="frm my-awesome-dropzone" class="table form form-horizontal container" action="<?= base_url()?>issue/insert" method="post" enctype="multipart/form-data" data-toggle="validator"> -->
            <form id="frm" method="post">

                  <?php echo $this->session->flashdata("error"); ?>

                  <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Plant</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <input type="radio" id="plant" name="plant" value="Phase 10" required > Phase 10 &nbsp; &nbsp; &nbsp;
                   <input type="radio" id="plant" name="plant" value="Phase 8" > Phase 8
                    </div>
                    </div>

                    <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" ><b>Project</b></label>      
                        
                      <div class="col-sm-6 col-md-6">
                   <select id="pj_id" name="pj_id" class="form-control select2"  >
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
                          <input type="date" class="form-control" id="date_iden" name="date_iden"  >
                        </div>
                      </div>


                  <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Issue Description</b><font color="red" size="1"> *This column is  the information.</font> </label>
                          <textarea id="is_des" name="is_des" class="form-control" cols="30" rows="5" ></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" ><b>Priority</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select id="priority" name="priority" class="form-control"  >
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
                   <select id="owner_id" name="owner_id" class="form-control select2"  >
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
                          <input type="date" class="form-control" id="date_er" name="date_er"  >
                        </div>
                      </div>


                      <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Escalation Required? </b><small>( “Yes” if the program/project manager feels an issue needs to be escalated and “No” if escalation is not needed to resolve the issue.)</small></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <input type="radio" id="er" name="er" value="Yes" required > Yes &nbsp; &nbsp; &nbsp;
                   <input type="radio"id="er" name="er" value="No" > No
                    </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Impact Summary</b> </label>
                          <textarea id="imp_sum" name="imp_sum" class="form-control" cols="30" rows="5" ></textarea>
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Action Step</b><font color="red" size="1"> *This column is  the information.</font> </label>
                          <textarea id="act_step" name="act_step" class="form-control" cols="30" rows="5" ></textarea>
                        </div>
                      </div>


                      <div class="form-group">
                      <label for="email-2" class="col-sm-6 col-md-12 control-label" ><b>Issue Type</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select id="is_type" name="is_type" class="form-control"  >
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
                   <select id="cur_st" name="cur_st" class="form-control"  >
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
                          <textarea id="frr" name="frr" class="form-control" cols="30" rows="5" ></textarea>
                        </div>
                      </div>

                      

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Note</b> </label>
                          <textarea id="note" name="note" id="note" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                      </div>
                  
       <div class='content'>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class=""><b> Attach file</b></label>
                        </div>
                      </div>
                      <div id="file" class="dropzone" name="file" action="<?= base_url()?>">
                      
			<div class="dz-message">
      <div class="fallback">
    </div>
				<h3>Drop files here</h3> or <strong>click</strong> to upload
			</div>
		</div>
                      
    </div> 


    <div class="form-group">

                    </div>
              
                  
                <button class="btn btn-primary btn-block" id='uploadfiles' type="submit" value='Upload Files'>Sub Pay Sub Ta</button>
                </form>
            </div>
          </div>
         
        </div>
      </div>
      <div id="dynamic_field"></div>

      
      
      
      
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>vendor/dropzone/dropzone.min.js"></script>
    <script type='text/javascript'>
  
  // Dropzone.autoDiscover = false;
  // var myDropzone = new Dropzone(".dropzone", { 
  //     autoProcessQueue: false,
  //     parallelUploads: 10 // Number of files process at a time (default 2)
  // });
 
  // $('#uploadfiles').click(function(){
  //     myDropzone.processQueue();
  // });
  </script>

	<script>
		Dropzone.autoDiscover = false;

		var myDropzone = new Dropzone(".dropzone", {
      autoProcessQueue: false,
			url: "<?php echo site_url("issue/upload") ?>",
			addRemoveLinks: true,
			parallelUploads: 10,
      success: function( file, response ){
        //  obj = JSON.parse(response);
        //  alert(obj.filename); // <---- here is your filename
    },
			removedfile: function(file) {
				var name = file.name;
        //del in database
				$.ajax({
					type: "post",
					url: "<?php echo site_url("issue/remove") ?>",
					data: { file: name },
					dataType: 'html'
				});
				// remove the thumbnail
				var previewElement;
				return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
			},

			init: function() {
				var me = this;
				$.get("<?php echo site_url("issue/list_files") ?>", function(data) {
					// if any files already in server show all here
					if (data.length > 0) {
						$.each(data, function(key, value) {
							var mockFile = value;
         
							me.emit("addedfile", mockFile);
							me.emit("thumbnail", mockFile, "<?php echo base_url(); ?>uploads/" + value.name);
							me.emit("complete", mockFile);
						});
					}
				});
			},

    });
    
    $('#uploadfiles').click(function(){
      $.ajax({
        url: "<?php echo site_url("issue/getfilecode") ?>",
				type: "POST",
        dataType : "html",
					data: { 
            
          },
          success: function(data) {
            // console.log(data);
            console.log(data);
            insert_issue(data);
             },
				 });

  });
  
	</script>
    <script type="text/javascript">
    function insert_issue(data) {
      myDropzone.processQueue();
      // var plant = $('#plant').val();
      var plant = document.querySelector('input[name="plant"]:checked').value;
      var pj_id = $('#pj_id').val();
      var date_iden = $('#date_iden').val();
      var is_des = $('#is_des').val();
      var priority = $('#priority').val();
      var owner_id = $('#owner_id').val();
      var date_er = $('#date_er').val();
      // var er = $('#er').val();
      var er = document.querySelector('input[name="er"]:checked').value;
      var imp_sum = $('#imp_sum').val();
      var act_step = $('#act_step').val();
      var is_type = $('#is_type').val();
      var cur_st = $('#cur_st').val();
      var frr = $('#frr').val();
      var note = $('#note').val();
      var index;
      var array=[];
    for (index = 0; index < myDropzone.files.length; ++index) {
        array.push(myDropzone.files[index].name);
    };
        $.ajax({
        url: "<?php echo site_url("issue/insert_issue") ?>",
        type : 'POST',
        dataType : "html",
        data : {
          'filecode':data,
          'file':array,
          'plant':plant,
          'pj_id':pj_id,
          'date_iden':date_iden,
          'is_des':is_des,
          'priority':priority,
          'owner_id':owner_id,
          'date_er':date_er,
          'er':er,
          'imp_sum':imp_sum,
          'act_step':act_step,
          'is_type':is_type,
          'cur_st':cur_st,
          'frr':frr,
          'note':note
        },
        success : function(data) {   
            alert('success');
        }
    });
  };
</script>

  <script type="text/javascript">
    function save_img(data) {
        $.ajax({
        url: "<?php echo site_url("issue/save_img") ?>",
        type : 'POST',
        data : {
          'file':data
        },
        success : function(response) {   
        }
    });
  };
</script>

   