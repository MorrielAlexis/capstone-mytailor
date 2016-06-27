<!-- Inser queries here -->

<?php 
			$pdf = App::make('dompdf.wrapper');
			$pdf->loadHTML('
				<html>
				<head align="center">
					<title> Medical Company Name</title>
					<h1>Medical Company Corportian</h1>
					<h5>Insert Address here</h5>
					<br>
					<br>
					<h3>Medical Report</h3>
				</head>
				<body>
					<p align="center">
						Insert Diagnosis here.
					</p>
					<br>
					<br>
					<p  align="center">
						Second Findings
					</p>

					<p align="right">
					Inser doctor here
					</p>
				</body>
				</html>
');
			return $pdf->stream();
		?>