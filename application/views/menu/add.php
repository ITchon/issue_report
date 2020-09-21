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
                  <h2 class="card-title ">Add Menu</h2>
                  <p class="card-category"><h1></h1></p>
                </div>
              
<hr>
<form class="table form form-horizontal container" action="<?php echo base_url()?>menu/insert" method="post" data-toggle="validator">
                 
<div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Name</b> </label>
                          <input type="text" class="form-control" name="name" required>
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Icon</b> </label>
                          <input type="text" class="form-control" name="icon">
                        </div>
                      </div>

                         <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" ><b> Select Order</b></label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select name="spg_id" id="spg_id" class="form-control select2">
              <option value="">- - - SELECT - - - </option>

                 <?php 
             foreach($result_spg as $r){?>
            
              <option value="<?php  echo $r->spg_id ?>"> <?php echo $r->name ?></option>
              <?php
           }
      ?>     
         </select>
         </div>
          </div>

                      <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" ><b> Select Group</b></label>      
          
                      <div class="col-sm-7 col-md-7">
                      <select name="sp_id" id="child" class="form-control select2" required>
          
                   </optgroup>
                   </select>
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

 <script>
        $(document).ready(function() {
   
  var spg_id = $('#spg_id').val();
     console.log(spg_id);
     $.ajax({
    url:"<?php echo base_url(); ?>ajax/fetch_menu",
    method:"POST",
    data:{spg_id:spg_id},
    success:function(data)
    {
      // console.log(data);
     $('#child').html(data);

    }
   });
});
      </script>
      <script>
    $('#spg_id').change(function(){
   
  var spg_id = $('#spg_id').val();
     console.log(spg_id);
     $.ajax({
    url:"<?php echo base_url(); ?>ajax/fetch_menu",
    method:"POST",
    data:{spg_id:spg_id},
    success:function(data)
    {
      // console.log(data);
     $('#child').html(data);

    }
   });
});

</script>