<script>
    $(document).ready(function(){
    
      $('#rule').modal({

backdrop: 'static'
})
  });
  </script>
  <div class="modal fade" id="rule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="bg-primary modal-header">
        <h1><?php echo $result[0]->sug_name; ?></h1>
      </div>
      <div class="modal-body">
      <?php  echo form_open('usergroup/save_userg_permission'); ?>

            <div class="form-group">
             <div class="row">
            <?php
             $id = $this->uri->segment('3'); 
            ?>
            <input type="text" name="sug_id"  value="<?php echo $id ?> " hidden>
            <input type="text"  value="<?php echo $id ?> " hidden>
            <?php
                 foreach($result_group as $r){          
          ?>

                <div class="col-6 " style="padding-top: 20px;">
              <input type="checkbox" value="<?php echo $r->spg_id ?>" id="<?php echo $r->spg_id ?>" name="spg_id[]" id="spg_id" <?php
              foreach($result_user as $rs ){
                    if($r ->spg_id == $rs->spg_id){
                    echo 'checked';
                  }
                  }?>  > 
               <label for="<?php echo $r->spg_id ?>" style="cursor: pointer;color:#5b6572"> <?php echo $r->name ?></label>
              
 </div>
            <?php
            
          }
            ?>
          </div>
        </div>
          
            <div class="modal-footer">
            <?php echo anchor(base_url().'usergroup/manage', 'Back',array('class'=>'btn btn-default'));

echo form_submit(array('usergroup_id'=>'submit','value'=>'Add','class'=>'btn btn-primary')); 
 

echo form_close(); 
?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    $(":checkbox").on("change", function() {
  
      var p_id = $(this).attr('id');
        if (this["name"] === "pg" && this.checked) {
                $(':checkbox').each(function () {
                  if(p_id == $(this).attr("class")){
                    this.checked = true;
                  }
          
                });
        }else{
            $(':checkbox').each(function () {
                  if(p_id == $(this).attr("class")){
                    this.checked = false;
                  }
          
                });
        }
    })
</script>
