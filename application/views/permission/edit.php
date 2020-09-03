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
                  <h2 class="card-title ">Edit Permission</h2>
                  <p class="card-category"><h1></h1></p>
                </div>
              
<hr>
            <form class="table form form-horizontal container" action="<?php echo base_url()?>permission/save_edit" method="post" data-toggle="validator">

                <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Permission Name</b> </label>
                          <input type="text" class="form-control" name="sp_name" value="<?php echo $result[0]->sp_name?>" required>
                          <input type="hidden" class="form-control" name="sp_id" value="<?php echo $result[0]->sp_id?>">
                        </div>
                      </div>


                <div class="form-group">
                    <label for="dcn" class="col-sm-3 col-md-6 control-label">Permission Group </label>
                    
                    <div class="col-sm-6 col-md-10">
                    <input type="text" name="spg_id" value="<?php echo $result[0]->spg_name?>" hidden>
                    <select name="spg_id" id="" class="form-control select2" required>
             <option value="<?php echo $result[0]->spg_id ?>" hidden> <?php echo $result[0]->spg_name ?> </option>
                  <?php 
              foreach($result_g as $r){?>
               <option value="<?php  echo $r->spg_id ?>"><?php echo $r->name ?></option>
               <?php
            }
       ?>     
          </select>
                    <span class="form-control-feedback" aria-hidden="true">
                    <span class="icon"></span>
                    </span>
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

