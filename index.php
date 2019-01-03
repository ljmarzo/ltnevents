<?php
			require('require.php');
		?>

<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!-- /bootstrap css cdn -->

		<!-- font-awesome cdn -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<!-- /font-awesome cdn -->

		<!-- animate.css cdn -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">

		<!-- hoverbox.css  -->
		<link rel="stylesheet" href="bootstrap/hover-box.css">

		



		<!-- custom.css -->
		<link href="custom.css" rel="stylesheet">
		<!-- /custom.css -->

		<!-- Montserrat font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<!-- /Montserrat font -->

		<link rel="icon" href="images/ltnevents.ico">

		<!-- bootstrap js cdn -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<!-- /bootstrap js cdn -->

		
		<script>
				
		
			 $(document).ready(function(){
                $("#password_show_button").mouseup(function(){
                    $("#pword").attr("type", "password");
                });
                $("#password_show_button").mousedown(function(){
                    $("#pword").attr("type", "text");
                });
            });

			 function hideCube() {
					$('#cov').addClass('animated fadeOut');
					$('#cov').hide();
					$('#contentHome').show().addClass('animated fadeIn');
				}

			 function setCookie(cname,cvalue,exdays) {
				    var d = new Date();
				    d.setTime(d.getTime() + (exdays*24*60*60*1000));
				    var expires = "expires=" + d.toGMTString();
				    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
				}

				function getCookie(cname) {
				    var name = cname + "=";
				    var decodedCookie = decodeURIComponent(document.cookie);
				    var ca = decodedCookie.split(';');
				    for(var i = 0; i < ca.length; i++) {
				        var c = ca[i];
				        while (c.charAt(0) == ' ') {
				            c = c.substring(1);
				        }
				        if (c.indexOf(name) == 0) {
				            return c.substring(name.length, c.length);
				        }
				    }
				    return "";
				}

				function checkCookie() {
				    var user=getCookie("username");
				    if (user != "") {
				        //homepage
				        hideCube();
				    } else {
				    	//splash
				    	setTimeout(hideCube, 6500);
				       user = Math.random().toString(36).substring(7);
				       if (user != "" && user != null) {
				           setCookie("username", user, 30);
				       }
				    }
				}

				function aloha()
				{
					document.getElementById("outer").style.display = "none";
				}

				function shownewsletter()
				{
					document.getElementById("outer").style.display = "table";
				}

				setTimeout(shownewsletter, 20000);

				$(window).scroll(function(){
					var p1 = $("#txtFront").offset().top -400;
					var p2 = $("#picRow1").offset().top -400;
					var p3 = $("#picRow2").offset().top -400;
					var p4 = $("#clientTxt").offset().top -400;
					var p5 = $("#commentsRow").offset().top -300;
					var p6 = $(".iconsCon").offset().top -400;
					var p7 = $(".detailsCon").offset().top -300;
					var p8 = $("#joinAh").offset().top -300;
					
				    if($(window).scrollTop() >= p1){
				      $('#txtFront').addClass('animated fadeIn');
					  $('#txtFront').removeClass('hiddenFirst');
				    } 

				    if($(window).scrollTop() >= p2){
				      $('#picRow1').addClass('animated fadeInRight');
					  $('#picRow1').removeClass('hiddenFirst');
				    } 

				    if($(window).scrollTop() >= p3){
				      $('#picRow2').addClass('animated fadeInLeft');
					  $('#picRow2').removeClass('hiddenFirst');
				    } 

				    if($(window).scrollTop() >= p4){
				      $('#clientTxt').addClass('animated fadeIn');
					  $('#clientTxt').removeClass('hiddenFirst');
				    }

				    if($(window).scrollTop() >= p5){
				      $('#commentsRow').addClass('animated slideInUp');
					  $('#commentsRow').removeClass('hiddenFirst');
				    } 

				    if($(window).scrollTop() >= p6){
				      $('.iconsCon').addClass('animated fadeInLeft');
					  $('.iconsCon').removeClass('hiddenFirst');
				    } 
					
					if($(window).scrollTop() >= p7){
				      $('.detailsCon').addClass('animated slideInUp');
					  $('.detailsCon').removeClass('hiddenFirst');
				    } 

				    if($(window).scrollTop() >= p8){
				      $('#joinAh').addClass('animated pulse infinite');
				    } 
				});


		</script>

		<style type="text/css">
			body{
				margin: 0px;
				padding: 0px;
				font-family: 'Montserrat', sans-serif;

				}

				.hiddenLeaf{
					display: none;
				}

				.hvrbox img {
				  max-width: 100%;
				  
				  -moz-transition: all 0.3s;
				  -webkit-transition: all 0.3s;
				  transition: all 0.3s;
				}
				.hvrbox:hover img {
				  -moz-transform: scale(1.1);
				  -webkit-transform: scale(1.1);
				  transform: scale(1.1);
				}

				.outer {
				background-color:rgba(255,255,255, 0.5);
					z-index:9999999;
				  display: none;
				  position: fixed;
				  height: 100vh;
				  width: 100vw;
				  -moz-transition: all 0.3s;
				  -webkit-transition: all 0.3s;
				  transition: all 0.3s;
				}

				.middle {
				  display: table-cell;
				  vertical-align: middle;
				}

				.inner {
				background-color:rgba(255,255,255, 1);
				  margin-left: auto;
				  margin-right: auto;
				  width: 40vw;
				  border: 1px solid black;
				}

				.hiddenFirst{
					visibility: hidden;
				}

		</style>



		

		<?php
			$zxc = mysqli_query($con,"select * from tblpageviews where fldPage = 'home'");
			$zxcf = mysqli_fetch_array($zxc);
			$views = $zxcf['fldViews'];
			$views = $views +1;
			$zxc = mysqli_query($con,"update tblpageviews set fldViews = '$views' where fldPage = 'home'");
		?>



		<title>LTN Events</title>
	</head>



	<body onload="checkCookie()">
<div id="outer" class="outer animated fadeIn">
  <div id="middle" class="middle">
    <div id="inner" class="inner">
    	
        
        <button type="button" class="close" onclick="aloha()">&times;</button>
    <center><img src="images/ltneventssmall.jpg" width="100%">
     <br>
     <br>
     <br>
		<h4>Join our monthly newsletter</h4>
	</center>
	<br>
	<div class="row">
			<div class="col-sm-12 colmd-12 col-xs-12">
				<center>
					<form method="post" name="newsletterForm">
						<table>
							<td><input type="text" class="form-control" required style="width:100%" name="emailSub" placeholder="Email Address"></td>
							<td>&emsp;</td>
							<td><input type="submit" name="submitSub" class="btn btn-info" value="Submit"></td>
						</table>									
															
					</form>
					<?php
						if(isset($_POST['submitSub']))
						{
							$emailPost = $_POST['emailSub'];
							$p = mysqli_query($con,"insert into tblemailsub values ('','$emailPost','" . date("Y-m-d H:i:s") . "')");
							if($p)
							{
								echo "<script>alert('Thank you for subscribing to our newsletter!');window.location=window.location</script>";
							}
						}
					?>
				</center>
			</div>
		</div>	
	    </div>
	  </div>
	</div>
		<div id="cov">
			<div id="overlay">
				<br><br><br><br><br><br><br><br>
				<center>
				<div class="sk-folding-cube">
					<div class="sk-cube1 sk-cube"></div>
					<div class="sk-cube2 sk-cube"></div>
					<div class="sk-cube4 sk-cube"></div>
					<div class="sk-cube3 sk-cube"></div>
				</div>	
				</center>		
			</div>
		</div>
		<div id="contentHome">
			<div id="landingDiv" style="color:white">
				<center><div style="color:black">
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
				</div></center>
			</div>	



			<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" style="min-height:10vh">
					<img class="navbar-brand" src="images/logo.png" height="70px" alt="logo" >
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
								<a class="nav-link" href="ltn.php?p=portfolio">Portfolio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="ltn.php?p=services">Services</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="ltn.php?p=blog">Blog</a>
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
							          <a class="dropdown-item" href="ltn.php?p=msg">Messages <?php if ($numMsgNew > 0) { ?> <sup><span class="badge badge-info" style="font-size:12px"><?php echo $numMsgNew ?></span></sup> <?php } ?></a>
							          <a class="dropdown-item" href="ltn.php?p=logout">Logout</a>
							        </div>

								<?php
									}
								?>
							</li>
						</ul>
					</div>
			</nav>
			<label id="targetabout"></label>
			<br><br><br>
			
			<div class="container-fluid">
				<center>
					<div class="row col-md-10 col-xs-10 hiddenFirst" id="txtFront" style="font-size:2vw">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
					<br><br>

					<hr style="width:60%">
					<br><br><br>
					<h2>OUR WORK</h2>
					<br><br><br>

					<div class="row hiddenFirst" id="picRow1">
						<?php
							$q = mysqli_query($con,"select * from tblportfolio order by fldDateAdded DESC limit 4");
							while($qf = mysqli_fetch_array($q))
							{
								$portID = $qf['fldPortID'];
								$portTitle = $qf['fldTitle'];
								$client = $qf['fldClient'];

								$x = mysqli_query($con,"select * from tblportfoliopic where fldPortID = '$portID'");
								$ctr = 0;
								while($xf = mysqli_fetch_array($x))
								{
							?>

								<div class="hvrbox col-lg-3 col-md-3 col-sm-6 col-xs-6 imgBack <?php if($ctr!=0) { echo 'hiddenLeaf'; } ?>" style="padding-left: 0px;padding-right: 0px">
									<a class="<?php if($ctr!=0) { echo 'hiddenLeaf'; } ?>" href="ltn.php?p=portfolio">
									<img style="height:40vh;width:100%;padding:0px;" data-toggle="tooltip" data-placement="top" src="images/portfolio/<?php echo $portID . "/" . $xf['fldPic'] ?>" alt="image-1" />

									<div class="hvrbox-layer_top">
										<div class="hvrbox-text"><center><p style="font-size:25px"><?php echo $portTitle ?><br></p><p><?php echo $client ?></p></center></div>
									</div>
									</a>
								</div>
							<?php
									$ctr++;
								}


							}
						?>
					</div>

					<br>
					<div class="row hiddenFirst" id="picRow2">
						<?php
							$q = mysqli_query($con,"select * from tblportfolio order by fldDateAdded DESC limit 4 offset 4");
							while($qf = mysqli_fetch_array($q))
							{
								$portID = $qf['fldPortID'];
								$portTitle = $qf['fldTitle'];
								$client = $qf['fldClient'];

								$x = mysqli_query($con,"select * from tblportfoliopic where fldPortID = '$portID'");
								$ctr = 0;
								while($xf = mysqli_fetch_array($x))
								{
							?>

								<div class="hvrbox col-lg-3 col-md-3 col-sm-6 col-xs-6 imgBack <?php if($ctr!=0) { echo 'hiddenLeaf'; } ?>" style="padding-left: 0px;padding-right: 0px">
									<a class="<?php if($ctr!=0) { echo 'hiddenLeaf'; } ?>" href="ltn.php?p=portfolio">
									<img style="height:40vh;width:100%;padding:0px;" data-toggle="tooltip" data-placement="top" src="images/portfolio/<?php echo $portID . "/" . $xf['fldPic'] ?>" alt="image-1" />

									<div class="hvrbox-layer_top">
										<div class="hvrbox-text"><center><p style="font-size:25px"><?php echo $portTitle ?><br></p><p><?php echo $client ?></p></center></div>
									</div>
									</a>
								</div>
							<?php
									$ctr++;
								}


							}
						?>
					</div>

					<br><br><br>
					<a href="ltn.php?p=portfolio" class="btn btn-primary">See More&emsp;<span class="fa fa-arrow-right"></span></a>
					<br><br>
					<hr style="width:60%">

				</center>

			</div>
					
		<br>
		<br>
		<br>
		<!-- test area!! -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-3 col-xs-3">
					<img src="images/speech.png" width="100%" height="400px">
				</div>

				<div class="col-sm-9 col-md-9 col-xs-9">
					<br>
					<h1 class="hiddenFirst" id="clientTxt"><span style="color:orange">Client's</span> Reviews</h1>


					<div class="container hiddenFirst" style="background-color: #cccccc;height: 300px"  id="commentsRow">
					    <div id="carouselContent" class="carousel slide" data-ride="carousel">
					    	<br>
					    	<br>
					        <div class="carousel-inner" role="listbox">
					           	<?php
					           		$q = mysqli_query($con,"select * from tblcomments where fldDisplay = 'yes' order by fldComID DESC");
					           		$ctr = 0;
					           		while($qf = mysqli_fetch_array($q))
					           		{
					           			$userRev = $qf['fldUser'];
					           			$contentRev = $qf['fldContent'];
					           	?>
					           		<div class="carousel-item <?php if($ctr==0) echo "active" ?> text-center p-4">
						            	<div class="row">
							                <div class="col-sm-2 col-md-2 col-xs-2">
							                	<span class="fa fa-quote-left" style="float:right"></span>
							                </div>
							                <div class="col-sm-8 col-md-8 col-xs-8"><p align="justify" style="color:#222222">
							                	<?php echo nl2br($contentRev) ?>&emsp;<span class="fa fa-quote-right"></span></p>
							                 	<p><font style="color:#12d000; font-size:14px; text-transform: uppercase; font-weight: bold; font-style:italic"><?php echo $userRev ?></font></p>
							                </div>
						                 </div>
						            </div>

					           	<?php
					           		$ctr++;
					           		}

					           	?>       
					        </div>
					        <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
					            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					            <span class="sr-only">Previous</span>
					        </a>
					        <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
					            <span class="carousel-control-next-icon" aria-hidden="true"></span>
					            <span class="sr-only">Next</span>
					        </a>
					    </div>
					</div>
				</div>
			</div>
			
		</div>
		<br><br>
		<hr style="width:60%">
		<br><br><br>
		<!-- test area end-->
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-2 col-md-2 col-xs-2"></div>
				<div class="col-sm-8 col-md-8 col-xs-8">
					<div class="row">
						<div class="col-sm-4 col-md-4 col-xs-4">
							<center>
								<div class="iconsCon hiddenFirst">
								<p style="font-size:80px;"><span class="fa fa-mobile"></span></p>
								<br>
								<strong><label style="color:#878787">CALL US AT</label></strong></div>
								<br>
								<div class="detailsCon hiddenFirst">(043) 740 7112</div>
							</center>
						</div>

						<div class="col-sm-4 col-md-4 col-xs-4">
							<center>
								<div class="iconsCon hiddenFirst">
								<p style="font-size:80px;"><span class="fa fa-map-marker"></span></p>
								<br>
								<strong><label style="color:#878787">ADDRESS</label></strong></div>
								<br>
								<div class="detailsCon hiddenFirst">Unit 19H, 2nd Floor Big Ben Complex, JP Laurel Highway, Mataas na Lupa, Lipa, 4217 Batangas</div>
							</center>

						</div>

						<div class="col-sm-4 col-md-4 col-xs-4">
							<center>
								<div class="iconsCon hiddenFirst">
								<p style="font-size:80px;"><span class="fa fa-envelope"></span></p>
								<br>
								<strong><label style="color:#878787">EMAIL</label></strong></div>
								<br>
								<div class="detailsCon hiddenFirst">ltneventscompany@gmail.com</div>
							</center>
						</div>
					</div>

					<br><br><br>
					<center>
						<h4 id="joinAh">Join our monthly newsletter</h4>
					</center>
						<br>
						<div class="row">
							<div class="col-sm-12 colmd-12 col-xs-12">
								<center>
									<form method="post" name="newsletterForm2">
									<table>
										<td><input type="text" class="form-control" required style="width:100%" name="emailSub2" placeholder="Email Address"></td>
										<td>&emsp;</td>
										<td><input type="submit" name="submitSub2" class="btn btn-info" value="Submit"></td>
									</table>									
																		
								</form>
								<?php
									if(isset($_POST['submitSub2']))
									{
										$emailPost = $_POST['emailSub2'];
										$p = mysqli_query($con,"insert into tblemailsub values ('','$emailPost','" . date("Y-m-d H:i:s") . "')");
										if($p)
										{
											echo "<script>alert('Thank you for subscribing to our newsletter!');window.location=window.location</script>";
										}
									}
								?>
								</center>
							</div>
						</div>	
				</div>
			</div>
		</div>
		<br><br>
		
		







		</div>



<!-- footer -->
<!-- Book Modal -->
<form method="post">
<div class="modal fade" id="bookModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <center><img class="col-2 modal-title text-center" src="images/logo.png"></center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     	 <div class="row">
     	 	<div class="col-sm-6 col-md-6 col-xs-6">
     	 		<table>
     	 			<tr>
     	 				<td>Date:</td><td style="padding:8px"><?php echo date("M d, Y") ?></td>	
     	 			</tr>
     	 			<tr>
     	 				<td>Name:</td><td style="padding:8px"><input type="text" placeholder="Complete Name" required name="inqName" class="form-control"></td>
     	 			</tr>
     	 			<tr>
     	 				<td>Address:</td><td style="padding:8px"><textarea placeholder="Address" name="inqAddr" rows="3" required class="form-control"></textarea></td>
     	 			</tr>
     	 			<tr>
     	 				<td>Category:</td>
     	 				<td style="padding:8px">
     	 					<select required name="inqCategory" class="form-control">
     	 						<option value="" selected disabled>--Select Category--</option>
     	 						<option value="Wedding">Wedding</option>
     	 						<option value="Marketing">Marketing</option>
     	 						<option value="Production">Production</option>
     	 						<option value="">Others</option>
     	 					</select>
     	 				</td>
     	 			</tr>
     	 		</table>
     	 		
     	 	</div>

     	 	<div class="col-sm-6 col-md-6 col-xs-6">
     	 		<table>
     	 			<tr>
     	 				<td></td><td style="padding:8px">&emsp;</td>	
     	 			</tr>
     	 			<tr>
     	 				<td>Contact No.:</td><td style="padding:8px"><input type="text" required placeholder="+639xxxxxxxxx" name="inqNum" class="form-control"></td>
     	 			</tr>
     	 			<tr>
     	 				<td>Email:</td><td style="padding:8px"><input type="text" required placeholder="sample@gmail.com" name="inqEmail" class="form-control"></td>
     	 			</tr>
     	 		</table>
     	 		
     	 	</div>
     	 	
     	 </div>
     	 <hr>
    	<div class="row">
     	 	<div class="col-sm-12 col-md-12 col-xs-12">
     	 			<label style="font-size:18px">Event Details</label>
     	 		<table>
     	 			<tr>
     	 				<td>Event Name:</td><td style="padding:8px;width: 70%"><input type="text" required placeholder="Event Name" name="inqEventName" class="form-control"></td>
     	 			</tr>
     	 			<tr>
     	 				<td>Target Date and Time:</td><td style="padding:8px"><input type="datetime-local" required placeholder="12/30/2000 08:00 AM" name="inqDate" class="form-control"></td>
     	 			</tr>
     	 			<tr>
     	 				<td>Target Venue:</td><td style="padding:8px"><input type="text" placeholder="Target Venue" required name="inqVenue" class="form-control"></td>
     	 			</tr>
     	 			<tr>
     	 				<td>Message:</td><td style="padding:8px"><textarea placeholder="Message" name="inqMsg" required rows="3" class="form-control"></textarea></td>
     	 			</tr>
     	 		</table>
     	 		
     	 	</div>

     	 	
     	</div>

      </div>



      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" name="inqSubmit" value="Submit" class="btn btn-success"></form>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>

      </div>

    </div>
  </div>
</div>

<!-- Review Modal -->
<form method="post">
<div class="modal fade" id="reviewModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <center><img class="col-2 modal-title text-center" src="images/logo.png"></center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?php 
    	if(isset($_SESSION['id'])) 
    	{ 
    		$loggedID = $_SESSION['id'];
    		$q2 = mysqli_query($con,"select * from tblusers where fldID =  '$loggedID'");
    		$qf2 = mysqli_fetch_array($q2);
    		$loggedName = $qf2['fldFirstName'] . " " . $qf2['fldLastName'];
    	}
    	else
    	{
    		$loggedName = "";
    	}
    ?>
      <!-- Modal body -->
      <div class="modal-body">
     	 <div class="row">
     	 	<div class="col-sm-12 col-md-12 col-xs-12">
     	 		<div class="form-group">
		          <label>Name <sup>(Optional)</sup></label>
		          <div class="input-group">    
			        <input type="text" autocomplete="off" value="<?php echo $loggedName; ?>" name="revName" placeholder="Name..." class="form-control">
			      </div>
		        </div>

		        <div class="form-group">
		          <label>Comment and Suggestion</label>
		          <div class="input-group">    
			        <textarea name="revComment" placeholder="Comment and Suggestion..." class="form-control" rows="5"></textarea>
			      </div>
		        </div>
     	 		
     	 	</div>

     	 </div>

      </div>



      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" name="revSubmit" value="Submit" class="btn btn-success"></form>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>

      </div>

<?php
	if(isset($_POST['revSubmit']))
	{
		$name = $_POST['revName'];
		if($name == "")
			$name = "Anonymous";
		$comment = mysqli_real_escape_string($con,$_POST['revComment']);
		$q = mysqli_query($con,"insert into tblcomments values ('','$name', '$comment','" . date("Y-m-d H:i:s") . "','no','no')");
		if($q)
			echo "<script>alert('Thank you for sending your review!');window.location=window.location</script>";
	}

?>


    </div>
  </div>
</div>
		<div class="col-md-12" style="background-color:#242424;height:225px;">
			<br><br>
			<div class="row">
				<div class="col-md-4 col-xs-12">
					<label style="color:gray">CONTACT</label>
					<div class="row">
						<div class="col-md-3">
							<label style="color:#CDD1D0">Phone:</label>
						</div>
						<div class="col-md-6">
							<label style="color:#CDD1D0">(043) 740 7112</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label style="color:#CDD1D0">Email:</label>
						</div>
						<div class="col-md-6">
							<label style="color:#CDD1D0;font-size:">ltneventscompany@gmail.com</label>
						</div>
					</div>
					
					
					
				</div>

				<div class="col-md-4 col-xs-12">
					<label style="color:gray">Address</label>
					<div class="row">
						<div class="col-md-12">
							<label style="color:#CDD1D0;word-wrap: break-word;">Unit 19H, 2nd Floor Big Ben Complex, JP Laurel Highway, Mataas na Lupa, Lipa, 4217 Batangas</label>
						</div>
						
					</div>
					
					
				</div>

				<div class="col-md-2">
					<label style="color:#404040"></label>
					<div class="row">
						<div class="col-md-12" style="font-size:25px">
							<a href="https://www.facebook.com/ltnevents/" target="_blank" class="fa fa2 fa-facebook"></a>
							<a href="http://www.instagram.com/eventsbyltn" target="_blank" class="fa fa2 fa-instagram"></a>
						</div>
						<br>
						<br>
						<br>
						<?php
                if(!isset($_SESSION['id']))
                {
            ?>
            <button data-toggle="modal" data-target="#bookModal" class="btn btn-info">Inquiry? Click me!</button>
            <?php
                }
            ?>
						<button style="margin-top:10px" data-toggle="modal" data-target="#reviewModal" class="btn btn-info">Review? Click me!</button>
						
					</div>
					
					

				</div>
				<div class="col-md-2">
					<img src="images/logo.png" width="100%">
					<br>
					<br>
					<div class="row">
						<p style="color:#CDD1D0;font-size:10px;float:right">&emsp;&emsp;LTN EVENTS © 2018</p>
					</div>
					
				</div>
			</div>
		</div>


<?php
	if(isset($_POST['inqSubmit']))
	{
		$inqName = $_POST['inqName'];
		$inqAddress = mysqli_real_escape_string($con,$_POST['inqAddr']);
		$inqCategory = $_POST['inqCategory'];
		$inqNum = $_POST['inqNum'];
		$inqEmail = $_POST['inqEmail'];
		$inqEventName =  mysqli_real_escape_string($con,$_POST['inqEventName']);
		$inqTargetDate = $_POST['inqDate'];
		$inqVenue = $_POST['inqVenue'];
		$inqMsg = mysqli_real_escape_string($con,$_POST['inqMsg']);

		$q = mysqli_query($con,"insert into tblinquiry values ('','$inqName','$inqAddress','$inqCategory','$inqNum','$inqEmail','$inqEventName','$inqTargetDate','$inqVenue','$inqMsg','" . date("Y-m-d H:i:s") ."','no')");
		if($q)
		{
			echo "<script>alert('Thank you for your inquiry! Rest assured that we will get back to you ASAP.');window.location=window.location</script>";
		}
	}
?>


		<!-- footer end -->



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
       
      	<div class="form-group">
      		<form method="post">
      			
      		
            <div class="input-group input-group-md">
                <div class="input-group-prepend"><i class="input-group-text fa fa-user"></i></div>
                <input type="text" name="uname" class="form-control" placeholder="Username">
            </div>

       		<br>

       		<div class="input-group input-group-md">
                <div class="input-group-prepend"><i id="password_show_button" class="input-group-text fa fa-eye"></i></div>
                <input type="password" id="pword" name="pword" class="form-control" placeholder="Password">
            </div>
            
            <br>
            <input type="submit" value="Sign In" name="modalLogin" class="btn btn-primary"><a href="ltn.php?p=forgot" style="float:right">Forgot password?</a>

            <br>
            <br>
            </form>
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








		
	</body>
</html>



<?php
	if(isset($_POST['modalLogin']))
	{
		$uname = $_POST['uname'];
		$pword = $_POST['pword'];
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
			echo "<script>alert('Welcome $name');window.location='ltn.php?p=user&sec=feed'</script>";
		}
		else
		{
			echo "<script>alert('Incorrect username or password.')</script>";
		}
	}
?>
