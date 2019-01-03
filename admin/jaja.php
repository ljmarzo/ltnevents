<?php
	
	//get top 3 values
	$q = mysql_query("select distinct(fldNum) from tblTest order by fldNum limit 3");
	while($qf = mysql_fetch_array($q))
	{
		$ef[] = $qf['fldNum'];
	}

	//combine to a,b,c format (yields 1,2,3)
	$var = implode(',',$ef);
?>

<table class="table">
		<td>Number</td>			
		<td>Text</td>

	<tbody>
	<?php
		//query all values with top 3
		$q = mysql_query("select * from tblTest where fldNum in ($var) order by fldNum");
		while($qf = mysql_fetch_array($q))
		{
		?>
			<tr>
				<td><?php echo $qf['fldNum'] ?></td>
				<td><?php echo $qf['fldText'] ?></td>
			</tr>

		<?php
		}
	?>
	</tbody>
</table>