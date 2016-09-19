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
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ $custname }}</b></td>
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

        @foreach($customer_orders as $j => $order)
			@foreach($payments as $i => $payment)
			@if($payment->strTransactionFK != $customer_info->strJobOrderID AND $payment->strJO_CustomerFK == $customer_info->strCompanyID)
		<div class="col s12" style="margin-top:2%" @if($payment->strJO_CustomerFK == $customer_info->strCompanyID) hidden @endif>
			<table style="width:98%">
			
				<thead style="background-color:teal; opacity:0.90; color:white">
					<tr>
						<th>JOB ORDER ID</th>
						<th>TERM OF PAYMENT</th>
						<th>TOTAL AMOUNT PRICE</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%"><b>{{ $payment->strJobOrderID }}</b></td>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%">{{ $payment->strTermsOfPayment }}</td>
						<td style="width:60%">
							{{ $payment->dblOrderTotalPrice }} PHP
						</td>
					</tr>
				</tbody>
				

			</table>
		</div>

		
		<div class="col s12" style="margin-top:1%" @if($payment->strJO_CustomerFK == $customer_info->strCompanyID) hidden @endif>
			<table width="98%">
				<tbody>
					<tr>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; background-color:teal; color:white; border: 2px white solid">AMOUNT PAID</td>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%; font-size:1.2em"><b>{{ $payment->dblAmountToPay }} PHP</b></td>
					</tr>
					<tr>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; background-color:teal; color:white; border: 2px white solid">AMOUNT TENDERED</td>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%; font-size:1em">{{ number_format($amtTendered, 2) }} PHP</td>
					</tr>
					<tr>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; background-color:teal; color:white; border: 2px white solid">CHANGE</td>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%; font-size:1em">{{ number_format($amtChange, 2) }} PHP</td>
					</tr>
					
					<!-- <tr>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; background-color:teal; color:white; border: 2px white solid">OUTSTANDING BALANCE<p></p></td>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%; font-size:1.2em">
							<b>{!! session('outstandingBal') !!} PHP</b>
						</td>
					</tr> -->

				</tbody>
			</table>

						@endif
				@endforeach
				@endforeach
			
		</div>

	</body>

	</body>