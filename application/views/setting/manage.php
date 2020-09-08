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
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-rose">
                  <h3 class="card-title">Edit Profile</h3>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Username</b></label>
                          <input type="text" class="form-control" value="<?php echo $result->username ?>" readonly>
                        </div>
                      </div>


                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Firstname</b></label>
                          <input type="text" class="form-control" value="<?php echo $result->firstname ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Lastname</b></label>
                          <input type="text" class="form-control" value="<?php echo $result->lastname ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Email</b></label>
                          <input type="text" class="form-control" value="<?php echo $result->email ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Gender</b></label>
                          <select id="select" name="gender" class="form-control select2" required >
                      <option value="male">male</option>
                      <option value="female">female</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>

                </div>
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="card">
              <div class="card-header card-header-rose">
                  <h3 class="card-title">Change Password</h3>
                </div>
                <div class="card-body">
                <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Current Password</b></label>
                          <input type="text" class="form-control" value="">
                          </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>New Password</b></label>
                          <input type="text" class="form-control" value="">
                          </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Confirm New Password</b></label>
                          <input type="text" class="form-control" value="">
                          <br>
                          <button type="submit" class="btn btn-primary col-md-12">Save Change</button>
                          </div>
                      </div>
                    </div>
                    </div>
                </div>
                </div>
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

