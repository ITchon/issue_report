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
                  <h2 class="card-title ">Edit Project</h2>
                  <p class="card-category"><h1></h1></p>
                </div>
              
<hr>
            <form class="table form form-horizontal container" action="<?php echo base_url()?>projects/save_edit" method="post" data-toggle="validator">

                <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Project Name</b> </label>
                          <input type="text" class="form-control" hidden name="pj_id" value="<?php echo $result[0]->pj_id?>" required>
                          <input type="text" class="form-control" name="pj_name" value="<?php echo $result[0]->pj_name?>" required>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Project Description</b> </label>
                          <input type="text" class="form-control" name="pj_des" value="<?php echo $result[0]->pj_des?>" required>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                        
                          <label class="bmd-label-floating"><b>Status</b> </label> <br>
                          <?php
                        if($result[0]->enable != 0){ ?>
                             <input type="radio" checked name="enable" value="1" > enable 
                             &nbsp; &nbsp;
                             <input type="radio" name="enable" value="0" > disable
                        <?php } else { ?>
                             <input type="radio" name="enable" value="1" > enable
                             &nbsp; &nbsp;
                             <input type="radio" checked name="enable" value="0" > disable
                        <?php } ?>
                         
                        </div>
                      </div>


                <div class="form-group">
                    <button type="submit" id="btn" class="btn btn-primary btn-block">Save Changes</button>
                  </div>


            </div>

                </form>
              </div>
            </div>
          </div>
         
        </div>
      </div>
      <script>
        $(document).ready(function() {
    $('.select2').select2();
});
      </script>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script type="text/javascript">
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

