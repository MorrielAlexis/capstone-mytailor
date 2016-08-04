<?php
	
	$columns = 
	[
		'ITEM DESCRIPTION',
		'TOTAL PRICE (Php)',
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
				margin-left: 0;
				margin-right:500px;
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
		<div class="col s12">
			<center>
				<h1 style="color:teal; font-size:40px;">
					<img src="img/logo.jpg" class="left circle responsive-img valign profile-image center" style="height:100px; width:120px; margin-top:5px;">
					<b>MyTailor</b> Store
				</h1>
			</center>
		</div>
        <div class="col s12"><div class="divider" style="height:5px; background-color:teal"></div></div>

        <h2 style="color:dimgray;"><center>Job Order Receipt</center></h2>

        <div class="col s12" >
			<div class="col s12" style="font-size:18px"><b>Job Order #:</b> <font color="black"><b>{!! session('job_order_id') !!}</b></div>
       		<div class="col s12" style="font-size:18px">Customer Name: <font color="teal"><b>Arianne Labtic</b></div>
        </div>

        <div class="col s12">
        	<div class="col s12" style="font-size:18px">Date: <font color="teal"><b>{{ date('Y-m-d') }}</b></font></div>

        	<div class="col s12" style="font-size:18px">Time: <font color="teal"><b>{{ date('h:i:sa') }}</b></font></div>

        </div>

		<div class="col s12" style="margin-top:20px; margin-right:250px">
	        <table class="col s12" style="width:90% ">
				<thead style="background-color:teal; opacity:0.90; color:white">
					<tr>
						@foreach($columns as $header)
							<th>{{$header}}</th>
						@endforeach
					</tr>
				</thead>

				<tbody>
					<tr>
						<td style="width:300px; padding-top:10px; padding-bottom:10px">
							<div>
								<b>Segment Name:</b>{!! session('segment_data.strSegmentName') !!} Uniform, Polo
							</div>
							<div style="border-bottom:2px gray solid; padding-bottom:10px; margin-bottom:10px; padding-right:130px">
								<b>Quantity: </b>{!! session('segment_quantity')[0] !!}
							</div>	

							<!--Item description here-->
							<left><font color="gray"><b>Add-ons:</b></font></left>
							<div>
								<font color="red">(fabric)</font> <br/><b>Fabric Name:</b> Arjoe Cotton Striped
							</div>
							<div>
								<font color="red">(design)</font> <br/><b>Style Category:</b> Collar<br/>
										<b>Pattern Name:</b> Button Down
										 <br/><b>Style Category:</b> Pocket<br/>
										<b>Pattern Name:</b> Angular Pocket
							</div>	

						</td>
						<td style="width:100px;">{!! session('totalPrice') !!}</td>
					</tr>

					<tr>
						<td style="width:300px; padding-top:10px; padding-bottom:10px">
							<div>
								<b>Segment Name:</b>{!! session('segment_data.strSegmentName') !!} Uniform, Skirt
							</div>
							<div style="border-bottom:2px gray solid; padding-bottom:10px; margin-bottom:10px; padding-right:130px">
								<b>Quantity: </b>{!! session('segment_quantity')[0] !!}
							</div>	

							<!--Item description here-->
							<left><font color="gray"><b>Add-ons:</b></font></left>
							<div>
								<font color="red">(fabric)</font> <br/><b>Fabric Name:</b> Pink Cotton
							</div>
							<div>
								<font color="red">(design)</font> <br/><b>Style Category:</b> Custom Skirt<br/>
										<b>Pattern Name:</b> Asymmetrical
							</div>	

						</td>
						<td style="width:100px;">{!! session('totalPrice') !!}</td>
					</tr>
				</tbody>
			</table>
		</div>


		<div class="right col s12" style="margin-left:50px; margin-top:40px">
			<div class="col s12"><div class="divider" style="height:2px"></div></div>
			<div class="col s12" style="font-size:20px;">Sub total: <font color="teal"><b>{!! session('totalPrice') !!}</b></font></div>
			<div class="col s12" style="font-size:20px">Additional Fee: <font color="teal"><b>0.00 Php</b></font></div>
			<div class="col s12" style="font-size:20px">Grand total: <font color="teal"><b>{!! session('totalPrice') !!}</b></font></div>
		</div>
		

		<div class="right col s12" style="margin-left:50px; margin-top:40px">
			<div class="col s12"><div class="divider" style="border-bottom:2px gray solid"></div></div>
			<div class="col s12" style="font-size:20px;">Amount Paid: <font color="red"><b>{!! session('totalPrice') !!}</b></font></div>
			<div class="col s12" style="font-size:20px;">Outstanding Balance: <font color="red"><b></b></font></div>
		</div>

	</body>

</html>