
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reviews
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
     
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
           <div class="box-body">
              <table id=" " class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Review</th>
                  <th>Display</th>
                  <th>Review Date</th>
                  <th>Action</th>
                </tr>
                </thead>
               
                <tbody>
                  <?php
                     $q = mysqli_query($con,"select * from tblcomments order by fldComID DESC");
                     while($qf = mysqli_fetch_array($q))
                     {
                      $revID = $qf['fldComID'];
                      $revName = $qf['fldUser'];
                      $revContent = $qf['fldContent'];
                      $revDate = $qf['fldDateAdded'];
                      $revDate = date("M. d, Y h:i A", strtotime($revDate));
                      $read = $qf['fldRead'];
                      $display = $qf['fldDisplay'];
                   
                  ?>
                   <form method="post">
                  	<tr style="<?php if($read=='no') { echo "background-color:orange"; } ?>">
                      <td><?php echo ucwords($revName) ?></td>
                      <td><?php echo nl2br($revContent) ?></td>
                      <td><center><input type="checkbox" value="asd" name="cbRev" <?php if($display=='yes') echo "checked"  ?> ></input></center></td>
                      <td><?php echo $revDate ?></td>
                      <td>
                        <input type="hidden" value="<?php echo $revID ?>" name="hideid">
                        <button onclick="return confirm('Are you sure you want to update this record?')" type="submit" class="fa fa-refresh btn btn-info" name="updRev"></button>
                        
                        <a href="?p=deleteRev&revID=<?php echo $revID ?>"><span onclick="return confirm('Are you sure you want to delete this review?')" href="?p=reeee" class="fa fa-trash btn btn-danger" data-toggle="tooltip" data-title="Delete" data-placement="top"></span></a>
                      </td>
                     </tr>
                      </form>
                  <?php
                     }
                  ?>                
                </tfoot>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

 <?php
 if(isset($_POST['updRev']))
 {
    $revID = $_POST['hideid'];
    if(isset($_POST['cbRev']))
    {
      $display = 'yes';
    }
    else
    {
      $display = 'no';
    }
    $q = mysqli_query($con,"update tblcomments set fldDisplay = '$display' where fldComID = '$revID'");
    if($q)
      echo "<script>alert('Review display status updated!');window.location=window.location</script>";
  
 }

 ?>


<!-- Book Modal -->
<div class="modal fade" id="my_modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <center><h3 class="col-2 modal-title text-center">Inquiry Details</h3></center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<input type="hidden" id="qweqwe" onchange="loadpics(this.value)"></input>
		<div id="loadtarget">
		
		</div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">      
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>


<?php
  $z = mysqli_query($con,"update tblcomments set fldRead = 'yes'");
?>
