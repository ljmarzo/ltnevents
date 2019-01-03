<?php
	require('require.php');
	$inqID = $_REQUEST['inqID'];
	$q = mysqli_query($con,"select * from tblinquiry where fldID = '$inqID'");
	$qf = mysqli_fetch_array($q);
	$inqID = $qf['fldID'];
    $clientName = $qf['fldName'];
    $eventName = $qf['fldEventName'];
    $eventVenue = $qf['fldTargetVenue'];
    $eventDate = $qf['fldTargetDate'];
    $eventDate = date("M. d, Y h:i A", strtotime($eventDate));
    $inqMsg = $qf['fldMessage'];
    $inqDate = $qf['fldInquiryDate'];
    $inqDate = date("M. d, Y", strtotime($inqDate));
    $addr = $qf['fldAddress'];
    $contact = $qf['fldContact'];
    $email = $qf['fldEmail'];
    $category = $qf['fldCategory'];


    $x = mysqli_query($con,"update tblinquiry set fldRead = 'yes' where fldID = '$inqID'");
?>

<div class="container">
	<table>
		<tbody>
			<tr>
				<td>ID</td>
				<td>&emsp;:&emsp;</td>
				<td><?php echo $inqID ?></td>
			</tr>
			<tr>
				<td>Client</td>
				<td>&emsp;:&emsp;</td>
				<td><?php echo $clientName ?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td>&emsp;:&emsp;</td>
				<td><?php echo $addr ?></td>
			</tr>
			<tr>
				<td>Event</td>
				<td>&emsp;:&emsp;</td>
				<td><?php echo $eventName ?></td>
			</tr>
			<tr>
				<td>Category</td>
				<td>&emsp;:&emsp;</td>
				<td><?php echo $category ?></td>
			</tr>
			<tr>
				<td>Target Date</td>
				<td>&emsp;:&emsp;</td>
				<td><?php echo $eventDate ?></td>
			</tr>
			<tr>
				<td>Venue</td>
				<td>&emsp;:&emsp;</td>
				<td><?php echo $eventVenue ?></td>
			</tr>
			<tr>
				<td>Contact</td>
				<td>&emsp;:&emsp;</td>
				<td><?php echo $contact ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>&emsp;:&emsp;</td>
				<td><?php echo $email ?></td>
			</tr>
			<tr>
				<td>Message</td>
				<td>&emsp;:&emsp;</td>
				<td><?php echo nl2br($inqMsg) ?></td>
			</tr>
			<tr>
				<td>Inquiry Date</td>
				<td>&emsp;:&emsp;</td>
				<td><?php echo $inqDate ?></td>
			</tr>

		</tbody>

	</table>

</div>