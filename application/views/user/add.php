<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-7">
              <div class="card">
                <div class="card-header card-header-rose">
                  <h2 class="card-title ">Add User</h2>
                  <p class="card-category"><h1></h1></p>
                </div>
              
<hr>
<div class="col-12">
<form class="form" action="<?php echo base_url()?>Login/chklogin" method="post" data-toggle="validator">
            
              <p class="description text-center" style="padding-top:10px"></p>
              <div class="card-body">
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                     Username
                    </span>
                  </div>
                  <input type="text" name="username" class="form-control" placeholder="Username...">
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                     Password
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Password...">
                </div>
              </div>
              <div class="footer text-center" style="padding-bottom:20px">
                <button class="btn btn-rose " type="submit"><a href="#pablo" class="text-white">Get Started</a></button>
              </div>
            </form>
            </div>
          </div>
         
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

