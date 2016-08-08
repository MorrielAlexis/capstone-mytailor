<?php
	
	$columns = 
	[
		'ITEM',
		'FABRIC',
		'DESCRIPTION',
		'QUANTITY',
		'TOTAL PRICE (Php)'
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
				margin-left: 20px;
				margin-right:20px;
				margin-top:5%;
			}

			table, th, td{
				border: 1px solid teal;
				text-align: center;
			}


		</style>
	</head>
	
	<body>
		<div class="col s12">
			<left>
				<h1 style="color:teal; font-size:20px;">
					<img src="img/logo.jpg" class="left circle responsive-img valign profile-image center" style="height:5%; width:5%; margin-top:5px;">
					<b>MyTailor</b> Store
					<p style="color:gray; font-size:-0.5px;"></p>
					<p style="color:gray">123-A Heaven St., Sta. Mesa, Manila</p>
					<p style="color:gray">Contact: 0908-223-5065</p>
					<p style="color:gray">Visit: www.myTailor.com</p>
				</h1>
			</left>
			<right>
				
			</right>
		</div>
        <div class="col s12"><div class="divider" style="height:3px; background-color:teal"></div></div>

        <h2 style="color:dimgray;"><center>JOB ORDER RECEIPT</center></h2>

        <div class="col s12" >
			<div class="col s12" style="font-size:18px"><b>Job Order #:</b> <font color="red"><b>{!! session('joID') !!}</b> <font style="margin-left:38%; color:black">Receipt No.: <font color="teal"><b>OR0001</b></font></font></div>
       		
       		<div class="left col s12" style="font-size:18px">Customer Name: <font color="teal"><b>Conrado Bataller Jr.</b> <font style="margin-left:19%; color:black;">Customer Id: <font color="teal"><b>{!! session('custID') !!}</font></div>
        	
        </div>

        <div class="col s12">
        	<div class="col s12" style="font-size:18px">Date: <font color="teal"><b>{{ date('m-d-Y') }}</b> <font style="margin-left:42%; color:black">Time: <font color="teal"><b>{{ date('h:i:s A') }}</b></font></font></font></div>
        </div>

        <div class="col s12">
			<div class="col s12" style="font-size:18px">Issued By: <font color="teal"><b>Sharmaine De Asis</b></div>
        </div>

		<div class="col s12" style="margin-top:1%;">
	        <table class="col s12" style="width:98% ">
				<thead style="background-color:teal; opacity:0.90; color:white">
					<tr>
						@foreach($columns as $header)
							<th>{{$header}}</th>
						@endforeach
					</tr>
				</thead>

				<tbody>
					<tr>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%">
							{!! session('segment_data')[0] !!}
						</td>
						<td style="width:40%">
							{!! session('segment_fabric')[0] !!}	
						</td>
						<td style="width:60%">
							<!--Item description here-->
								
							<div>
								<b>Style Category:</b> Collar<br/>
								<b>Pattern Name:</b> Button Down
								 <br/><b>Style Category:</b> Pocket<br/>
								<b>Pattern Name:</b> Something
							</div>	
						</td>
						<td style="width:30%">{!! session('segment_quantity')[0] !!}	</td>
						<td style="width:50%">{!! session('totalPrice') !!}</td>
					</tr>
				</tbody>
			</table>
		</div>
			
		<div class="col s12" style="margin-left:44%; margin-top:2%">
			<table>
				<thead>
				</thead>
				<tbody>
					<tr>
						<td style="background-color:teal; color:white"><font size="+0.1">  <br/><b>  Sub total:  </b></font></td>
						<td><font color="black"> <br/><b>{!! session('totalPrice') !!} PHP</b></font></td>
					</tr>
					<tr>
						<td style="background-color:teal; color:white"><font size="+0.1">  <br><b>  Additional Fee:  </b> </font></td>
						<td style="width:210px"><font color="black"> <br><b>0.00 PHP</b></font></td>
					</tr>
					<tr>
						<td style="background-color:teal; color:white"><font size="+0.1">  <br><b>  Grand Total:  </b> </font></td>
						<td><font color="red"> <br><b>{!! session('totalPrice') !!} PHP</b></font></td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="col s12" style="margin-left:38%; margin-top:1%">
			<table>
				<thead>
				</thead>
				<tbody>
					<tr>
						<td style="background-color:teal; color:white"><font size="+0.1">  <br><b>  Amount Paid:  </b> </font></td>
						<td><font color="black"><br><b>{!! session('amountToPay') !!}.00 PHP</b></font></td>
					</tr>
					<tr>
						<td style="background-color:teal; color:white"><font size="+0.1">  <br><b>  Outstanding Balance:  </b> </font></td>
						<td style="width:210px"><font color="red"><br><b>{!! session('outstandingBal') !!}</b></font></td>
					</tr>
					<tr>
						<td style="background-color:teal; color:white"><font size="+0.1">  <br><b>  Due date:  </b> </font></td>
						<td><font color="red"><br><b>{!! session('dueDate') !!}</b></font></td>
					</tr>
				</tbody>
			</table>
		</div>

	</body>

</html>