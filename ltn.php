<?php
			//connection
			require('require.php');
		?>
<!-- bootstrap css cdn -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!-- /bootstrap css cdn -->

		<!-- font-awesome cdn -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<!-- /font-awesome cdn -->

		<!-- animate.css cdn -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
		<!-- /animate.css cdn -->


		<link rel="icon" href="images/ltnevents.ico">

		<!-- custom.css -->
		<link href="custom.css" rel="stylesheet">
		<!-- /custom.css -->

		<!-- Montserrat font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<!-- /Montserrat font -->

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<!-- /bootstrap js cdn -->

		<style type="text/css">
			body{
				margin: 0px;
				padding: 0px;
				font-family: 'Montserrat', sans-serif;
				background-image: url(images/background.jpeg);
			}

			#content{

			}
		</style>

		

		<title>LTN Events</title>



		<script>
			 $(document).ready(function(){
                $("#password_show_button").mouseup(function(){
                    $("#loginpword").attr("type", "password");
                });
                $("#password_show_button").mousedown(function(){
                    $("#loginpword").attr("type", "text");
                });
            });

		</script>


		<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" style="min-height:5vh">
					<img class="navbar-brand" src="images/logo.png" height="50px" alt="logo">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
						<a class="navbar-brand" href="#"></a>
						<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
							
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?p=portfolio">Portfolio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?p=services">Services</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?p=blog">Blog</a>
							</li>
							<li class="nav-item">
								<?php
									if(!isset($_SESSION['id']))
									{
								?>
										<a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Login</a>
								<?php
									}
									else
									{
								?>
									<?php
										$loggedid = $_SESSION['id'];
										$msgNew = mysqli_query($con,"select * from tblmessages where fldRecipient = '$loggedid' and fldRead = 'no'");
										$numMsgNew = mysqli_num_rows($msgNew);
									?>
										 <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							          	 Account <?php if ($numMsgNew > 0) { ?> <sup><span class="badge badge-info" style="font-size:12px"><?php echo $numMsgNew ?></span></sup> <?php } ?>
							        </a>
							        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="ltn.php?p=user">My Feed</a>
							          <a class="dropdown-item" href="ltn.php?p=user&sec=msg">Messages <?php if ($numMsgNew > 0) { ?> <sup><span class="badge badge-info" style="font-size:12px"><?php echo $numMsgNew ?></span></sup> <?php } ?></a>
							          <a class="dropdown-item" href="ltn.php?p=user&sec=settings">Settings</a>
							          <a class="dropdown-item" href="?p=logout">Logout</a>
							        </div>

								<?php
									}
								?>
							</li>
						</ul>
					</div>
			</nav>

			<div id="content">
				<?php
					if(!isset($_REQUEST['p']))
						include("user.php");
					else
					{ 
						$page = $_GET['p'];
						include($page . ".php");
					}
				?>
			</div>















































<!-- Login Modal -->

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Login</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       	<form method="post">
       		
       	
      	<div class="form-group">
            <div class="input-group input-group-md">
                <div class="input-group-prepend"><i class="input-group-text fa fa-user"></i></div>
                <input type="text" class="form-control" name="loginuname" id="loginuname" placeholder="Username">
            </div>

       		<br>

       		<div class="input-group input-group-md">
                <div class="input-group-prepend"><i id="password_show_button" class="input-group-text fa fa-eye"></i></div>
                <input type="password" id="loginpword" name="loginpword" class="form-control" placeholder="Password">
            </div>
            
            <br>
            <input type="submit" value="Sign In" name="signin" name="modalLogin" class="btn btn-primary"><a href="ltn.php?p=forgot" style="float:right">Forgot password?</a>
		</form>
            <br>
            <br>

            <center>
            	Don't have an account? Sign up <a href="ltn.php?p=register">here!</a>
            </center>

        </div>





      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Login Modal END -->



<?php
	if(isset($_POST['signin']))
	{
		$uname = $_POST['loginuname'];
		$pword = $_POST['loginpword'];
		$pword = md5($pword);
		$q = mysqli_query($con,"select * from tblusers where (fldUsername = '$uname' or fldEmail = '$uname') and fldPassword = '$pword'");
		$qf = mysqli_fetch_array($q);
		$num = mysqli_num_rows($q);
		if($num != 0)
		{
			$name = $qf['fldFirstName'] . " " . $qf['fldLastName'];
			
			$_SESSION['id'] = $qf['fldID'];
			$id = $_SESSION['id'];
			$z = mysqli_query($con,"update tblusers set fldOnline = '1' where fldID = '$id'");
			echo "<script>alert('Welcome $name');window.location='ltn.php?p=user'</script>";
		}
		else
		{
			echo "<script>alert('Incorrect username or password.')</script>";
		}
	}
?>






