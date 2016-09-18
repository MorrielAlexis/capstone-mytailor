<?php
	
	$columns = 
	[
		'ITEM',
		'FABRIC',
		'DESCRIPTION',
		'BASE PRICE'
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
						<td style="width:60%; font-size:18px; color:teal; text-align:right;"><b>{!! session('joID') !!}</b></td>
						<td style="margin:15px; color:white">Hahah</td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Receipt No:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ $order_receipt }}</b></td>
					</tr>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Customer Name:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ $custname->fullname }}</b></td>
						<td></td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Customer Id:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ $custId }}</b></td>
					</tr>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Date:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ date('F d, Y') }}</b></td>
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
	        <table class="col s12" style="width:98%;">
				<thead>
					<tr>
						@foreach($columns as $header)
							<th  style="background-color:teal; opacity:0.90; color:white">{{$header}}</th>
						@endforeach
					</tr>
				</thead>

				<tbody>
					@for($i = 0; $i < count($values); $i++)
					<tr>
						
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%">
							{{ $values[$i]['strGarmentCategoryName'] }}, {{ $values[$i]['strSegmentName'] }}
						</td>

						<td style="width:40%">
							{{ $values[$i]['strFabricName'] }}
						</td>
						<td style="width:80%">
							<!--Item description here-->
							<table border="0" padding="0" style="margin-top:0;">
								<thead style="border-bottom:1px gray solid">
									<tr style="color:gray; padding:2%">
										<th style="color:gray"><b>Style Category</b></th>
										<th style="color:dimgray; padding-left:15px"><b>Pattern Name</b></th>
									</tr>
								</thead>
								<tbody>
								@for($j = 0; $j < count($styles[$i]); $j++)
									@if($styles[$i][$j]->strSegmentID == $values[$i]['strSegmentID'])
									<tr>									
										<td><b>{{ $styles[$i][$j]->strSegStyleName }}</b></td>
										<td>{{ $styles[$i][$j]->strSegPName }}</td>
									</tr>
									@endif
								@endfor
								</tbody>
							</table>
						</td>
<!-- 						<td style="width:30%">{!! session('totalPrice') !!} PHP</td> -->
						<td style="width:40%">{{ number_format($values[$i]['dblSegmentPrice'] , 2) }} PHP</td>
					</tr>

					@endfor
					<tr>
						<td style="width:50%; border-right:1px teal solid; background-color:teal; height:5%"></td>
						<td style="width:50%; border-right:1px teal solid; background-color:teal; height:5%"></td>
						<td class="right" style="width:50%; background-color:teal; border-right:1px teal solid; color:white; font-size:1em; height:5%;"><b>TOTAL ITEM QTY</b></td>
						<td style="width:50%; height:5%; color:teal"><b>{!! count($segments) !!}</b></td>
					</tr>
					<tr>
						<td style="width:50%; border-right:1px teal solid; background-color:teal; opacity:0.90; height:5%"></td>
						<td style="width:50%; border-right:1px teal solid; background-color:teal; opacity:0.90; height:5%"></td>
						<td class="right" style="width:50%; background-color:teal; border-right:1px teal solid; opacity:0.90; color:white; font-size:1em; height:5%;"><b>GRAND TOTAL</b></td>
						<td style="width:50%; height:5%; color:teal"><b>{!! session('totalPrice') !!} PHP</b></td>
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
					@for($i = 0; $i < count($values); $i++)
					@for($j = 0; $j < count($styles[$i]); $j++)
						@if($styles[$i][$j]->strSegmentID == $values[$i]['strSegmentID'])
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
					@for($i = 0; $i < count($values); $i++)
					<tr>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">{{ $values[$i]['strFabricName'] }}	</td>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%;">{{ number_format($values[$i]['dblFabricPrice'], 2) }} PHP</td>
					</tr>
					@endfor
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
						<td style="width:60%; font-size:18px; color:teal; text-align:right;"><b>{{ $paymentid }}</b></td>
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
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ date('F d, Y') }}</b></td>
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
						<th>TERM OF PAYMENT</th>
						@if( $termsOfPayment == 'Half Payment')
							<th>DOWNPAYMENT (50%)</th>
						@endif
						<th>TOTAL AMOUNT PRICE</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%"><b>{!! session('joID') !!}</b></td>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%">{{ $termsOfPayment }}</td>
						@if( $termsOfPayment == 'Half Payment')
							<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%">{!! session('outstandingBal') !!} PHP</td>
						@endif
						<td style="width:60%">
							<b>Sub total: </b> {!! session('totalPrice') !!} PHP<br>
							<b>Additional Fee: </b> 0.00 PHP<br><br>
							<div class="col s12"><div class="divider" style="height:1px; background-color:gray; margin-left:10%; margin-right:10%"></div></div>
							<b style="color:teal; padding-left:3%">Grand Total: </b><b>{!! session('totalPrice') !!} PHP</b>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="col s12" style="margin-top:1%">
			<table width="98%">
				<tbody>
					<tr>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; background-color:teal; color:white; border: 2px white solid">AMOUNT PAID</td>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%; font-size:1.2em"><b>{!! session('amountToPay') !!} PHP</b></td>
					</tr>
					<tr>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; background-color:teal; color:white; border: 2px white solid">AMOUNT TENDERED</td>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%; font-size:1em">{{ number_format($amtTendered, 2) }} PHP</td>
					</tr>
					<tr>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; background-color:teal; color:white; border: 2px white solid">CHANGE</td>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%; font-size:1em">{{ number_format($amtChange, 2) }} PHP</td>
					</tr>
					
					<tr>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; background-color:teal; color:white; border: 2px white solid">OUTSTANDING BALANCE<p></p></td>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%; font-size:1.2em">
							<b>{!! session('outstandingBal') !!} PHP</b>
						</td>
					</tr>
					@if( $termsOfPayment == 'Half Payment')
					<tr>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; background-color:teal; opacity:0.80; color:white; border: 2px white solid">DUE DATE FOR PAYMENT</td>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%; font-size:1.2em; color:teal"><b>{!! session('dueDate') !!}</b> <br><font color="gray" size="15px">*Pay balance before or on the said date</font></td>
					</tr>
					@endif
				</tbody>
			</table>


			
		</div>

	</body>

</html>