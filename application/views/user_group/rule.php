<style>
* {
  box-sizing: border-box;
}

.zoom {

  transition: transform .2s;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(2); 
}

</style>
<script>
    $(document).ready(function(){
    
      $('#rule').modal({

backdrop: 'static'
})
  });
  </script>
<div class="modal fade" id="rule" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
               
            <h3><?php echo $result[0]->sug_name; ?></h3>
            </div>
            <div class="modal-body form ">
            
            <?php  echo form_open('usergroup/save_userg_permission'); ?>

          <div class="form-group">
             <div class="row">
            <?php
             $id = $this->uri->segment('3'); 
            ?>
            <input type="text" name="sug_id"  value="<?php echo $id ?> " hidden>
            <input type="text"  value="<?php echo $id ?> " hidden>
            <?php
                   $i = 0;
                 foreach($result_group as $r){     

                  if($i !=  $r->spg_id){
                      echo "<div class='col-xs-12'>
                      <hr>
                      <label style='cursor:pointer' for='".$r->spg_id."'  class='text-primary'>".$r->g_name."</label>
                      <input value ='.$r->spg_id.' type='checkbox' name='pg' id=".$r->spg_id."> 
                      </div>";
                    }
                   ?>
                <div class="col-xs-6" style="padding-top: 20px;">
         
                   <input type="checkbox"  value="<?php echo $r->sp_id ?>" name="sp_id[]" id="<?php echo $r->controller ?>" class="<?php echo $r->spg_id ?>" <?php
              foreach($result_user as $rs ){
                    if($r ->sp_id == $rs->sp_id){
                    echo 'checked';
                   }
                } ?> > <label for="<?php echo $r->controller ?>" style="cursor: pointer;color:#5b6572"> <?php echo $r->p_name ?></label>
              </div>
             <?php
                  $i = $r->spg_id;  
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