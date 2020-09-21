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
                  <h2 class="card-title ">Edit Menu</h2>
                  <p class="card-category"><h1></h1></p>
                </div>
              
<hr>
            <form class="table form form-horizontal container" action="<?php echo base_url()?>menu/save_edit" method="post" data-toggle="validator">

                <div class="col-md-12">
                        <div class="form-group">
                        <input type="text" name="mg_id" value="<?php echo $result[0]->mg_id?>" hidden>
                          <label class="bmd-label-floating"><b>Name</b> </label>
                          <input type="text" class="form-control" name="name" value="<?php echo $result[0]->name?>" required>
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" ><b> Select Group</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select id="sp" name="sp_id" class="form-control select2"  required>
                    <option value=""> - - - Select Group - - - </option>
                 <?php 
             foreach($result_sp as $s){?>
            
              <option value="<?php  echo $s->sp_id ?>"><?php echo $s->name ?></option>
              <?php
           }
      ?>     
         </select>
         </div>
          </div>

          <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" ><b> Select Order</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select name="order" class="form-control select2">
                    <option value=""> - - - Select Order - - - </option>
                 <?php 
             foreach($result_mg as $m){?>
            
              <option value="<?php  echo $m->order_no ?>">After <?php echo $m->name ?></option>
              <?php
           }
      ?>     
         </select>
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
      <script>
      document.getElementById('sp').value = "<?php echo $result[0]->sp_id ?>";
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

