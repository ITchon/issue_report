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
            <form class="table form form-horizontal container" action="<?php echo base_url()?>projects/insert" method="post" data-toggle="validator">

                  <?php echo $this->session->flashdata("error"); ?>


                  <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Project Name</b> </label>
                          <input type="text" class="form-control" name="pj_name" required>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Project Description</b> </label>
                          <input type="text" class="form-control" name="pj_des" required>
                        </div>
                      </div>


                  <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" ><b>Status</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <input type="radio" name="status" value="1"> enable &nbsp; &nbsp; &nbsp;
                   <input type="radio" name="status" value="0"> disable
                    </div>
                    </div>

            
              <div class="form-group">
                    <button type="submit" id="btn" class="btn btn-primary btn-block">Save Changes</button>
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

