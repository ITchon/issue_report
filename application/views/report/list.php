<style>
    .show-read-more .more-text{
        display: none;
    }
    #btn_delete{

    }
</style>


    
                <div class="card-body">
                  <div class="table-responsive">
                <?php echo $this->session->flashdata("success"); ?>
             
                  <table  class="table table-bordered">
                  <thead>
           
                    <tr class="table-dark text-dark">
   
                        <th>Case No.</th>
                        <th>Project</th>
                        <th>Plant</th>
                        <th>Curent Status</th>
                        <th width="20%">Issue Descriptions</th>
                        <th>Priorty</th>
                        <th>Date Identifiled</th>
                        <th>Date Expect Solution</th>
                        <th>Date Entered</th>

                       
                      </tr>
                    </thead>
                    <tbody>
                      
                    <?php
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
                          $color2 = "text-danger";
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

               echo "<td>"."$r->is_id"."</td>";
               echo "<td>".$r->pj_name."</td>";
               echo "<td>".$r->plant."</td>"; 
               echo "<td class=".$color2.">".$r->cur_st."</td>";
               echo "<td>".$r->is_des."</td>";
               echo "<td class=".$color.">"."<b>".$r->priority."</b>"."</td>";
               echo "<td>".explode(" ",$r->date_identified)[0]."</td>";
               echo "<td>".explode(" ",$r->date_er)[0]."</td>";
               echo "<td>".explode(" ",$r->date_updated)[0]."</td>";

                ?> 

               
              
                <?php  
            echo "</tr>";
        }
    ?>
                
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      

    
<script>
</script>