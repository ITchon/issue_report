<style>
    .show-read-more .more-text{
        display: none;
    }
    #btn_delete{

    }
</style>

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              <div class="card">
                <div class="card-header card-header-rose">
                  <h4 class="card-title ">User Table  <a href="<?php echo base_url()?>user/add"><button class="btn btn-success ">ADD</button></a></h4>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                <?php echo $this->session->flashdata("success"); ?>
                <?php echo form_open('#', array('id' => 'frm_usermanagement', 'name'=>'frm_usermanagement', 'class'=>'form-horizontal'));?>
                  <table id="dynamic-table" class="table ">
                  <thead>
                    <tr>
								    	<td colspan="12">
        
									    	<div id="btn_delete" class="btn btn-dark"><span class="fa fa-trash-o"></span></div>
								    	</td>
								    </tr>	
                    <tr class="table-dark text-dark">
                        <th class="text-center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
                        <th>Case No.</th>
                        <th>Project</th>
                        <th>Plant</th>
                        <th>Curent Status</th>
                        <th>Issue Descriptions</th>
                        <th>Priorty</th>
                        <th>Date Identifiled</th>
                        <th>Date Expect Solution</th>
                        <th>Date Entered</th>
                        <th class="text-center" width="20%">Manage</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      
                    <?php
                    foreach($result as $r){
                 echo "<tr>";
                 echo "<td style='text-align:center;'>
                 <label class='pos-rel'>
                     <input type='checkbox' class='ace' name='chk_uid[]' value='$r->is_id'/>
                     <span class='lbl'></span>
                   </label>
               </td>";
               echo "<td>"."$r->is_id"."</td>";
               echo "<td>".$r->pj_name."</td>";
               echo "<td>".$r->plant."</td>"; 
               echo "<td>".$r->cur_st."</td>";
               echo "<td class='show-read-more'> ".$r->is_des."</td>";
               echo "<td>".$r->priority."</td>";
               echo "<td>".$r->date_identified."</td>";
               echo "<td>".$r->date_er."</td>";
               echo "<td>".$r->date_updated."</td>";

                ?> 

                <td class="text-center">
                <a href="javascript:void(0)"  data-id="<?php echo $r->is_id;?>" class="  view_img"><i class='btn-success btn-sm fa fa-search'> </i></a>
                <a class='btn-primary ' data-toggle='tooltip'  onclick="javascript:window.location='<?php
                echo base_url() . 'user/rule/' . $r->is_id;
                ?>';"><i class='btn-info btn-sm fa fa-gear'> </i></a>


                <a type ='button' data-toggle='tooltip'  class=' ' onclick="javascript:window.location='<?php
                echo base_url() . 'user/edit_u/' . $r->is_id;
                ?>';"><i class='btn-info btn-sm fa fa-wrench'></i></a>

                  <a type ='button' data-toggle='tooltip'  class=' ' onclick="if (confirm('Are you sure you want to delete '))javascript:window.location='<?php
                echo base_url() . 'user/deleteuser/' . $r->is_id;
                ?>';"><i class='btn-dark btn-sm fa fa-trash'></i></a>
                <?php  
            echo "</tr>";
        }
    ?>
                  	<?php echo form_close();?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
      
      $(document).ready(function() {

$('body').on('click', '.view_img', function () {
 
 var id = $(this).data("id");

 console.log(id);
 $.ajax({
    type: "Post",
    url:'<?php echo base_url() ?>/ajax/edit_issue',
    data: {
       id: id
    },
    dataType: "json",
    success: function (res) {
      var html = '';
       var i;
        console.log(res);
        if(res.success != false){

          for(i=0; i<res.data.length; i++){
                          html += '<div >'+'<img src="<?php echo base_url();?>upload/'+res.data[i].file_code+' " class="zoom img-responsive responsive" style="height:250px;max-width: 100%;" />'+'</div>';
                      }
          $('[name="img_code"]').val(res.data[0].file_code);
          $('#show_data').html(html);
          $('#modal_form').modal('show'); 
        }else{
          html = '<div class="text-center">'+'<h4>No data</h4>'+'</div>';
       $('#show_data').html(html);
       $('#modal_form').modal('show'); 
        }
       
    },
    error: function (res) {
       console.log('Error:', res);

    }
 });
});


        var maxLength = 30;
	$(".show-read-more").each(function(){
		var myStr = $(this).text();
		if($.trim(myStr).length > maxLength){
			var newStr = myStr.substring(0, maxLength);
			var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
			$(this).empty().html(newStr);
			$(this).append(' <a href="javascript:void(0);"class="read-more">read more...</a>');
			$(this).append('<span class="more-text">'+removedStr+'</span>');
		}
	});
	$(".read-more").click(function(){
		$(this).siblings(".more-text").contents().unwrap();
		$(this).remove();
  });
  

        $('#table').DataTable({
          dom: 'Bfrtip',
        buttons: [
            'colvis'
        ]
       
      });  
    });
    
  $(document).ready(function () {
  //Pagination numbers
  $('#paginationSimpleNumbers').DataTable({
    "pagingType": "simple_numbers"
  });
});

</script>

<script>
$(document).ready(function() {
$('#example').DataTable();
} );
</script>
    
