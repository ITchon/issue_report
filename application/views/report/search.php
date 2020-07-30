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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose">
                  <h2 class="card-title ">Add User</h2>
                  <p class="card-category"><h1></h1></p>
                </div>
              
<hr>
            <form class="table form form-horizontal container" action="<?php echo base_url()?>report/list" method="post" data-toggle="validator">

                  <?php echo $this->session->flashdata("error"); ?>


                <div class="form-group">
                      <label for="email-2" class="col-sm-3 col-md-4 control-label" ><b> Select Group</b></label>      
          
                      <div class="col-sm-6 col-md-12">
                   <select name="pj_id" class="form-control select2"  required>
                    <option value=""> - - - Select Group - - - </option>
                    <?php foreach ($result_p as $p) {
                        ?>
                       <option value="<?php echo $p->pj_id ?>"><?php echo $p->pj_name ?></option>
                  <?php
                   } ?>
                   </select>

                    </div>
                    </div>

            
              <div class="form-group">
                    <button type="submit" id="btn" class="btn btn-success btn-block">Save Changes</button>
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

