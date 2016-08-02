<?php
	
	$columns = 
	[
		'Item',
		'Quantity',
		'Total Price',
	];

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Fashion Collection - Payment Receipt</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style type="text/css">

			table{
				border-collapse: collapse;
				margin-left: auto;
				margin-right: auto;
				margin-top:5%;
			}

			table, th, td{
				border: 1px solid teal;
				text-align: center;
				padding-left: 50px;
				padding-right: 50px;
			}

		</style>
	</head>
	
	<body>
		<div class="col s12"><center><h1 style="color:teal; font-size:40px;"><img src="img/logo.jpg" class="left circle responsive-img valign profile-image center" style="height:100px; width:120px; margin-top:5px;"><b>MyTailor</b> Store</h1></center></div>
        <div class="col s12"><div class="container"><div class="divider" style="height:3px; background-color:teal"></div></div></div>
        <div class="col s12"><div class="divider" style="height:3px; background-color:teal"></div></div>

        <h1><center>Payment Receipt</center></h1>

        <div class="col s8">
			<div class="col s12">Customer Name: </div>
        </div>

        <div class="col s4">
        	<div class="col s12">Date: <font color="teal"><b>{{ date('Y-m-d') }}</b></font></div>

        	<div class="col s12">Time: <font color="teal"><b>{{ date('h:i:sa') }}</b></font></div>

        </div>

		<div class="col s12" style="margin-top:20px">
	        <table>
				<thead>
					<tr>
						@foreach($columns as $header)
							<th>{{$header}}</th>
						@endforeach
					</tr>
				</thead>

				<tbody>
					
					<tr>
						<td>{!! session('custID') !!}</td>
						<td>{!! session('segment_quantity') !!}</td>
						<td>{!! session('totalPrice') !!}</td>
					</tr>

				</tbody>
			</table>
		</div>

	</body>

</html>