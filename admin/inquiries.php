

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inquiries
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
     
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
           <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Client</th>
                  <th>Event Name</th>
                  <th>Venue</th>
                  <th>Target Date and Time</th>
                  <th>Message</th>
                  <th>Inquiry Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                     $q = mysqli_query($con,"select * from tblinquiry order by fldID DESC");
                     while($qf = mysqli_fetch_array($q))
                     {
                      $inqID = $qf['fldID'];
                      $clientName = $qf['fldName'];
                      $eventName = $qf['fldEventName'];
                      $eventVenue = $qf['fldTargetVenue'];
                      $eventDate = $qf['fldTargetDate'];
                      $eventDate = date("M. d, Y h:i A", strtotime($eventDate));
                      $inqMsg = $qf['fldMessage'];
                      $inqDate = $qf['fldInquiryDate'];
                      $inqDate = date("M. d, Y", strtotime($inqDate));
                      $read = $qf['fldRead'];
                   
                  ?>
                  	<tr style="<?php if($read=='no') { echo "background-color:orange"; } ?>">
                      <td><?php echo ucwords($clientName) ?></td>
                      <td><?php echo ucwords($eventName) ?></td>
                      <td><?php echo $eventVenue ?></td>
                      <td><?php echo $eventDate ?></td>
                      <td><?php echo nl2br($inqMsg) ?></td>
                      <td><?php echo $inqDate ?></td>
                      <td>
                      	<a href="#" id="ggdocs" data-target="#my_modal" data-toggle="modal" class="identifyingClass" data-id="<?php echo $inqID ?>">
                      	<span class="fa fa-eye btn btn-info" data-toggle="tooltip" data-title="View Details" data-placement="top"></span></a>
                      	<a href="?p=deleteInq&inqID=<?php echo $inqID ?>"><span onclick="return confirm('Are you sure you want to delete this inquiry?')" href="?p=reeee" class="fa fa-trash btn btn-danger" data-toggle="tooltip" data-title="Delete" data-placement="top"></span></a>
                      </td>
                     </tr>
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


<script type="text/javascript">
    $(function () {
        $(".identifyingClass").click(function () {
            var my_id_value = $(this).data('id');
			$(".modal-body #qweqwe").val(my_id_value);
			$(".modal-body #qweqwe").trigger('change');
			
        })
    });
	
	function loadpics(x)
	{
		$('#loadtarget').load('loadInq.php?inqID='+x).show();
	}
	
</script>
</body>


