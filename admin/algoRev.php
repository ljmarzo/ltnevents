<?php
	$goodArr = array(16);
	$gSize = count($goodArr);
	$gMean = 0;
	$gSum = 0;
	for($i = 0; $i < $gSize; $i++)
	{
		$gSum = $gSum + $goodArr[$i];
	}
	$good = $gSum / $gSize;



	$badArr = array(10);
	$bSize = count($badArr);
	$bMean = 0;
	$bSum = 0;
	for($i = 0; $i < $gSize; $i++)
	{
		$bSum = $bSum + $badArr[$i];
	}
	$bad = $bSum / $bSize;


	
	$q = mysqli_query($con,"select * from tblcomments");
	while($qf = mysqli_fetch_array($q))
	{
		$pts = 0;
		$text = $qf['fldContent'];
		$condi = "";
		//word count worth 5 pts

		echo "Current Good rating : " . $good;
		echo "<br>";
		echo "Current Bad rating : " . $bad;
		echo "<br>";
		echo "Text : ";
		echo $text . "<br>";

		$strcount = str_word_count($text);
		if($strcount >= 30)
		{
			$pts = $pts + 8;
			echo "-Word count exceeded 30 [+8] [$pts]<br>";
		}

		//contains good words
		$file = fopen('ref.txt', 'r');
		while($line = fgets($file))
		{
			if (strpos(strtolower($text), strtolower(trim($line))) !== false) {
			    $pts = $pts + 5;
			    echo "-\"" . $line . "\" [+5] [$pts] <br>";
			}
		}


		//contains bad words
		$ctrBad = 0;
		$file = fopen('ref2.txt', 'r');
		while($line = fgets($file))
		{
			if (strpos(strtolower($text), strtolower(trim($line))) !== false) {
			    $pts = $pts -3;
			    $ctrBad = $ctrBad + 1;
			    echo "-\"" . $line . "\" [+5] [$pts] <br>";
			}
		}

		//bonus 10 pts if no bad word
		if($ctrBad == 0)
		{
			$pts = $pts + 10;
			echo "-No negative word found [+10] [$pts]<br>";
		}

		$goodTemp = $good;
		$badTemp = $bad;
		//if current pts > current good MEAN
		//calculate new MEAN by adding new pts to the array of good reviews pts
		if($pts >= $good)
		{
			
			array_push($goodArr, $pts);
			$gSize = count($goodArr);
			$gSum = 0;
			for($i = 0; $i < $gSize; $i++)
			{
				$gSum = $gSum + $goodArr[$i];
			}
			
			$good = $gSum / $gSize;
			$condi = "good";

		}

		//if current pts > current bad MEAN
		//calculate new MEAN by adding new pts to the array of bad reviews pts
		else if($pts <= $bad)
		{
			$badTemp = $bad;
			array_push($badArr, $pts);
			$bSize = count($badArr);
			$bSum = 0;
			for($i = 0; $i < $bSize; $i++)
			{
				$bSum = $bSum + $badArr[$i];
			}
			$bad = $bSum / $bSize;
			$condi = "bad";
		}


		//if current pts is in between
		//determine which cluster has a closer value
		else
		{
			$gDiff = abs($good - $pts);
			$bDiff = abs($bad - $pts);
			if($gDiff <= $bDiff)
			{
				array_push($goodArr, $pts);
				$gSize = count($goodArr);
				$gSum = 0;
				for($i = 0; $i < $gSize; $i++)
				{
					$gSum = $gSum + $goodArr[$i];
				}
				$good = $gSum / $gSize;
				$condi = "good";
			}
			else
			{
				array_push($badArr, $pts);
				$bSize = count($badArr);
				$bSum = 0;
				for($i = 0; $i < $bSize; $i++)
				{
					$bSum = $bSum + $badArr[$i];
				}
				$bad = $bSum / $bSize;
				$condi = "bad";
			}
		}

		
		echo "total rating : " . $pts . "<br>";
		echo "condi : " . $condi . "<br>";
		if($condi == 'good')
			echo "New good rating : ($goodTemp + $pts) / $gSize = [$good]<br>";
		if($condi == 'bad')
			echo "New bad rating : ($badTemp + $pts) / $bSize = [$bad]<br>";
		echo "<br><br><br><br>";
		
	}
?>












