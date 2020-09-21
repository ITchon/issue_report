<style>
label{
  color:#495057;
  font-size:16px; 
   font-weight: bold;
}
</style>
<link href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css" rel="stylesheet">

<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>

         
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 card">
            <br>
            <form class="table form form-horizontal container" action="<?php echo base_url()?>report/list" method="post" data-toggle="validator">

<?php echo $this->session->flashdata("error"); ?>

<div class="col-12  ">

<label for="email-2" id="my-multi-select" class="control-label " ><b>  Select Projects  </b></label>      
<select name="src_pj[]" multiple="multiple" class="multiple-select text-left">
<?php foreach($result_p as $rp){ ?>
<option value="'<?php echo $rp->pj_id ?>'"><?php echo $rp->pj_name ?></option>
<?php } ?>
</select>

<label for="email-2" id="my-multi-select" class="control-label" ><b>  Select Projects  </b></label> 
<select name="src_st[]" multiple="multiple" class="multiple-select text-left">
<option value="'Closed'">Closed</option>
<option value="'Work In Progress'">Work In Progress</option>
<option value="'Open'">Open</option>
</select>

  <button type="submit" id="btn" class="btn btn-success" name="chk" value="chk">Search</button>
</div>

</form> 
          
            <br><br>


<script>
  $(function() {
    $('.multiple-select').multipleSelect()
    var $select = $('select')
  $select.multipleSelect('checkAll')
  })
  
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

