<?php
	
	$columns = 
	[
		'ITEM',
		'FABRIC',
		'DESCRIPTION',
		'QUANTITY',
		'TOTAL PRICE'
	];

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Fashion Collection - Issue Receipt</title>
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
			
			.page-break {
			    page-break-after: always;
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

        <div class="col s12">
        	<table border="0">
				<thead>
				</thead>
				<tbody>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Job Order No:</b></td>
						<td style="width:60%; font-size:18px; color:red; text-align:right;"><b>{!! session('joID') !!}</b></td>
						<td style="margin:15px; color:white">Hahah</td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Receipt No:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ $order_receipt }}</b></td>
					</tr>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Customer Name:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ $custname->fullname }}</b></td>
						<td></td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Customer Id:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{!! session('custID') !!}</b></td>
					</tr>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Date:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ date('m-d-Y') }}</b></td>
						<td></td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Time:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ date('h:i A') }}</b></td>
					</tr>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Issued By:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ $empname->employeename }}</b></td>
						<td></td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Employee Position:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>Cashier</b></td>
					</tr>
				</tbody>
        	</table>
        </div>

      

		<div class="col s12 page-break" style="margin-top:1%;">
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
						@foreach($segments as $segment)
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%">
							{{ $segment->strGarmentCategoryName }}, {{ $segment->strSegmentName }}
						</td>
						<td style="width:40%">
									
						</td>
						<td style="width:80%">
							<!--Item description here-->
							<table border="0" padding="0" style="margin-top:0;">
								<thead style="border-bottom:1px gray solid">
									<tr style="color:gray; padding:2%">
										<th style="color:dimgray; border-right:1px gray solid"><b>Style Category</b></th>
										<th style="color:dimgray; padding-left:15px"><b>Pattern Name</b></th>
									</tr>
								</thead>
								<tbody>
								@for($i = 0; $i < count($segments); $i++)
									@for($j = 0; $j < count($styles[$i]); $j++)
										@if($styles[$i][$j]->strSegmentID == $segment->strSegmentID)
									<tr>									
										<td style="border-right:1px gray solid">{{ $styles[$i][$j]->strSegStyleName }}</td>
										<td>{{ $styles[$i][$j]->strSegPName }}</td>
									</tr>
										@endif
									@endfor
								@endfor
								</tbody>
							</table>
						</td>
						<td style="width:20%">{!! session('segment_quantity')[0] !!}</td>
						<td style="width:30%">{!! session('totalPrice') !!} PHP</td>
						@endforeach
					</tr>
				</tbody>
			</table>

			<!--Style Summary-->
			<table class="col s12" style="width:98%; margin-bottom:0">
				<thead>
					<tr>
						<th style="background-color:teal; color:white;">STYLE SUMMARY</th>
					</tr>
				</thead>
			</table>
			<table class="col s12" style="width:98%; margin-top:0">
				<thead style="color:teal">		
					<tr>
						<th>STYLE CATEGORY</th>
						<th>PATTERN NAME</th>
						<th>STYLE PRICE</th>
					</tr>
				</thead>
				<tbody>
					@for($i = 0; $i < count($segments); $i++)
						@for($j = 0; $j < count($styles[$i]); $j++)
							@if($styles[$i][$j]->strSegmentID == $segment->strSegmentID)
					<tr>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">{{ $styles[$i][$j]->strSegStyleName }}</td>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">{{ $styles[$i][$j]->strSegPName }}</td>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">{{ number_format($styles[$i][$j]->dblPatternPrice, 2) }} PHP</td>
					</tr>
							@endif
						@endfor
					@endfor
				</tbody>
			</table>
			<!--End of Style Summary-->

			<!--Fabric Summary-->
			<table class="col s12" style="width:98%; margin-bottom:0">
				<thead>
					<tr>
						<th style="background-color:teal; color:white;">FABRIC SUMMARY</th>
					</tr>
				</thead>
			</table>
			<table class="col s12" style="width:98%; margin-top:0">
				<thead style="color:teal">
					<tr>
						<th>FABRIC NAME</th>
						<th>FABRIC PRICE</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">Fabric 1</td>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">0.00 PHP</td>
					</tr>
				</tbody>
			</table>
			<!--End of Fabric Summary-->
		</div>

		
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

        <h2 style="color:dimgray;"><center>PAYMENT RECEIPT</center></h2>	

        <div class="col s12" style="margin-top:0">
        	<table border="0" text-align="left">
				<thead>
				</thead>
				<tbody>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Order Payment No:</b></td>
						<td style="width:60%; font-size:18px; color:red; text-align:right;"><b>{{ $paymentid }}</b></td>
						<td style="margin:15px; color:white">Hahah</td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Receipt No:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ $payment_receipt }}</b></td>
					</tr>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Customer Name:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ $custname->fullname }}</b></td>
						<td></td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Customer Id:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{!! session('custID') !!}</b></td>
					</tr>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Date:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ date('m-d-Y') }}</b></td>
						<td></td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Time:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ date('h:i A') }}</b></td>
					</tr>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Issued By:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ $empname->employeename }}</b></td>
						<td></td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Employee Position:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>Cashier</b></td>
					</tr>
				</tbody>
        	</table>
        </div>


		<div class="col s12" style="margin-top:2%">
			<table style="width:98%">
				<thead style="background-color:teal; opacity:0.90; color:white">
					<tr>
						<th>JOB ORDER ID</th>
						<th>TOTAL AMOUNT PRICE</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%"><b>{!! session('joID') !!}</b></td>
						<td style="width:60%">
							<b>Sub total: </b> {!! session('totalPrice') !!} PHP<br>
							<b>Additional Fee: </b> 0.00 PHP<br><br>
							<div class="col s12"><div class="divider" style="height:1px; background-color:gray; margin-left:10%; margin-right:10%"></div></div>
							<b style="color:red; padding-left:3%">Grand Total: </b><b>{!! session('totalPrice') !!} PHP</b>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="col s12" style="margin-top:1%">
			<table>
				<thead style="color:teal;">
					<tr>
						<th style="padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">TERM OF PAYMENT</th>
						<th style="padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">DOWNPAYMENT (50%)</th>
						<th style="padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">AMOUNT PAID</th>
						<th style="padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">OUTSTANDING BALANCE</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">{{ $termsOfPayment }}</td>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">
							@if( $termsOfPayment == 'Half Payment')
								{!! session('outstandingBal') !!}
							@endif
							@if( $termsOfPayment == 'Full Payment')
								<font color="gray">*<b>No Downpayment.</b> Amount has been paid in full.</font>
							@endif
						</td>	
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">{!! session('amountToPay') !!}</td>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">{!! session('outstandingBal') !!}</td>
					</tr>
				</tbody>
			</table>
			<div class="col s12" style="margin-top:10%; margin-left:5%; font-size:20px">
				<b>DUE DATE: </b><b style="color:red; font-size:20px"> {!! session('dueDate') !!}</b><br>
				<font color="gray" size="15px">*Pay balance before or on the said date</font>
			</div>
		</div>

	</body>

</html>