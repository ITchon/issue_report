<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose">
                  <h2 class="card-title ">Add Permisson</h2>
                  <p class="card-category"><h1></h1></p>
                </div>
              
<hr>
              
            <form class="table form form-horizontal container" action="<?php echo base_url()?>permission/insert" method="post" data-toggle="validator">
                 
                  <div class="form-group">
                    <br>
                    <label for="name-1" class="col-sm-3 col-md-4 control-label">Permission Name</label>
                    <div class="col-sm-6 col-md-4">
                    <input  class="form-control" type="text" name="gname" required>
                  </div>
                  </div>

                  <div class="form-group">
                    <label for="name-1" class="col-sm-3 col-md-4 control-label">Controller</label>
                    <div class="col-sm-6 col-md-4">
                    <input  class="form-control" type="text" name="controller" required>
                  </div>
                  </div>

                  
                    <label for="name-1" class="col-sm-3 col-md-4 control-label">Controller</label>
                    <div class="col-sm-6 col-md-3">
                  <select name="spg_id" id="" class="form-control select2" required>
             <option value="" hidden >Select Group</option>
                  <?php 
              foreach($excLoadG as $r){?>
             
               <option value="<?php  echo $r->spg_id ?>"><?php echo $r->name ?></option>
               <?php
            }
       ?>     
          </select><br><br>
          </div>

                  
              </div>
              <div class="form-group">
                    <button type="submit" id="btn" class="btn btn-primary form-control ">Save Changes</button>
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

