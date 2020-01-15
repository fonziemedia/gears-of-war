<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Fortune Calculator</title>
		<meta name="description" content="" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<div class="container">
	<?php

		if (isset($_GET['name'])) {

			$name = strtolower($_GET["name"]);			
			$file = "data/data.csv";

			$maxval 	= "1000000";

			if (($handle = fopen($file, "r")) !== FALSE) {
				$row=0;
			
				$csv_row = array();
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						if ($data[0] === $name) {
							$csv_row = $data;
						}else {
							$csv_row[] = "0";
						}
					}
			
				fclose($handle);		

					// Total
					echo "<p  class='title'>LE CENAS FORTUNE CALCULATOR</p>"; 
					$username = $csv_row[0];
					$total = $csv_row[1];
					
					
					$percent = $total/$maxval;
					$percent_friendly = number_format( $percent * 100, 2 ) . '%';

					if ($total >= $maxval) {						
						echo "<p  class='title'>Congratulations $username, You are a millionaire!"; 
					}
					else {
						echo "<p  class='title'>Hi $username, you have $total dolla!"; 
					}
						echo '<div class="bar"> <div class="left info-text">0</div> <div class="right info-text">'.$maxval.'</div> <div class="bar-bg"><span class="level" style="width:'.$percent_friendly.'"></span></div> ';
					if($total  > 0    ) {	
						echo '<span class="need">You have <b>'. $total.'</b> total dolla</span> </div>' ;
					} else {

						echo '<span class="need">Oooops, you poor :(</span> </div>' ;
					}
				
			
			}

		}
	?>
	</div>
	
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
</body>
</html>