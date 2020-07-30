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
                  <h4 class="card-title "> List Issue <a href="<?php echo base_url()?>issue/add"><button class="btn btn-success ">ADD</button></a></h4>

                </div>
                <div class="card-body">
                <input type="checkbox" name="approve[]" value="1" />
<input type="checkbox" name="approve[]" value="2" />
<input type="checkbox" name="approve[]" value="3" />

<input type="button" id="toggle" value="select" onClick="do_this()" />

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
                    <tr class="text-dark">
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
                        <th class="text-center" width="15%">Manage</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      
                    <?php
                    $i = 1 ;
                    foreach($result as $r){
      
                      $color = null;
                      switch ($r->priority) {
                        case "Critical":
                          $color = "text-danger";
                          break;
                        case "High":
                          $color = "text-warning";
                          break;
                        case "Medium":
                          $color = "text-primary";
                          break;
                        default:
                          $color = "text-default";
                      }

                      switch ($r->cur_st) {
                        case "Open":
                          $color2 = "text-primary";
                          break;
                        case "Work In Progress":
                          $color2 = "text-warning";
                          break;
                        case "Closed":
                          $color2 = "text-success";
                          break;
                        default:
                          $color2 = "text-default";
                      }
               
                 echo "<tr>";
                 echo "<td style='text-align:center;'>
                 <label class='pos-rel'>
                     <input type='checkbox' class='ace' name='chk_uid[]' value='$r->is_id'/>
                     <span class='lbl'></span>
                   </label>
               </td>";
               echo "<td>".$i."</td>";
               echo "<td>".$r->pj_name."</td>";
               echo "<td>".$r->plant."</td>"; 
               echo "<td class=".$color2.">".$r->cur_st."</td>";
               echo "<td class='show-read-more' data-toggle='tooltip' data-html='true' data-placement='bottom' aria-describedby='passHelp' title='<h5>".$r->is_des."</h5>'  data-original-title='Rule'><span > ".$r->is_des."</span></td>";
               echo "<td class=".$color.">"."<b>".$r->priority."</b>"."</td>";
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
                echo base_url() . 'issue/edit/' . $r->is_id;
                ?>';"><i class='btn-info btn-sm fa fa-wrench'></i></a>

                  <a type ='button' data-toggle='tooltip'  class=' ' onclick="if (confirm('Are you sure you want to delete '))javascript:window.location='<?php
                echo base_url() . 'issue/delete/' . $r->is_id;
                ?>';"><i class='btn-dark btn-sm fa fa-trash'></i></a>
                <?php  
            echo "</tr>";
            $i++;    
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
        function do_this(){

var checkboxes = document.getElementsByName('approve[]');
var button = document.getElementById('toggle');

if(button.value == 'select'){
    for (var i in checkboxes){
        checkboxes[i].checked = 'FALSE';
    }
    button.value = 'deselect'
}else{
    for (var i in checkboxes){
        checkboxes[i].checked = '';
    }
    button.value = 'select';
}
}
      $(document).ready(function() {
        var myTable = 
				$('#table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
          "order": [[ 1, "desc" ]],
					bAutoWidth: false,
					// "aoColumns": [
					//   { "bSortable": false },
					//   null, null,null, null, null,
					//   { "bSortable": false }
					// ],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );
          		
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			

    $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
        });
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
                          html += '<div >'+'<img src="<?php echo base_url();?>uploads/'+res.data[i].file_code+' " class="zoom img-responsive responsive" style="height:250px;max-width: 100%;" />'+'</div>';
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
			$(this).append(' <a class="read-more">.....</a>');
			$(this).append('<span class="more-text">'+removedStr+'</span>');
		}
	});
 
    });
    

</script>


    
