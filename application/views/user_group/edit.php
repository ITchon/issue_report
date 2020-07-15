<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose">
                  <h4 class="card-title ">Simple Table</h4>
                  <p class="card-category"><h1></h1></p>
                </div>
              <div class="demo-form-wrapper card" style="padding-top:8px">
              <h2 class=" text-center text-primary">
             EDIT GROUP
            </h2><hr>
            <form class="table form form-horizontal container" action="<?php echo base_url()?>usergroup/save_edit" method="post" data-toggle="validator">
            
                <div class="form-group has-feedback">
                    <label for="part" class="col-sm-5 col-md-4 control-label">GROUP NAME</label>
                    <div class="text-center">
                      <input type="text" name="sug_id" value="<?php echo $result[0]->sug_id?>" hidden>
                    <input id="sug_name" class="form-control text-center " type="text" name="sug_name" value="<?php echo $result[0]->sug_name ?>">

                    <span class="form-control-feedback" aria-hidden="true">
                    <span class="icon"></span>
                    </span>
                    </div>
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

