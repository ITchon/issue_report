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
                  <h2 class="card-title ">Edit User</h2>
                  <p class="card-category"><h1></h1></p>
                </div>
              
<hr>
            <form class="table form form-horizontal container" action="<?php echo base_url()?>user/save_edit" method="post" data-toggle="validator">
            
                <input type="text" name="su_id" value="<?php echo $result[0]->su_id ?>" hidden>


                <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Username</b> </label>
                          <input type="text" class="form-control" name="username" value="<?php echo $result[0]->username?>" required>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Password</b> </label>
                          <input type="text" class="form-control" name="password" value="<?php echo $result[0]->password?>" required>
                        </div>
                      </div>

                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Firstname</b> </label>
                          <input type="text" class="form-control" name="fname" value="<?php echo $result[0]->firstname?>" required>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Lastname</b> </label>
                          <input type="text" class="form-control" name="lname" value="<?php echo $result[0]->lastname?>" required>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Email</b> </label>
                          <input type="text" class="form-control" name="email" value="<?php echo $result[0]->email?>" required>
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="email-2"  class="col-sm-3 col-md-4 control-label">Select Gender</label>      
                      <div class="col-sm-6 col-md-6">
                   <select id="select" name="gender" class="form-control select2" required >
                      <option value="male">male</option>
                      <option value="female">female</option>
                   </select>
                    </div>
                    </div>
              

                <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" >Select Group</label>      
          
                      <div class="col-sm-6 col-md-6">
                   <select name="sug_id" class="form-control select2"  required>
                   <option value="<?php echo $result[0]->sug_id ?>"><?php echo $result[0]->name ?></option>
                    <?php foreach ($excLoadG as $r) {
                        ?>
                       <option value="<?php echo $r->sug_id ?>"><?php echo $r->name ?></option>
                  <?php
                   } ?>
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

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
<script>
        <?php if($result[0]->gender == null){
        } ?>
      document.getElementById('select').value = "<?php echo $result[0]->gender ?>";
</script>

