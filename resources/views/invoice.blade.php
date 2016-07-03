<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Pending Payments</title>

		{!! Html::style('css/style.css') !!}
	</head>

	<body>

		<main>
			<div id="details" class="clearfix">
				<div id="invoice">
					<right><h3> Pending Rrport : {{ $issue }}</h3></right>
					<div class="date">Date (As of printing): {{ $date }}</div>
				</div>
			</div>

			<div id="customer-info">
				
				<div class="col s12" style="padding:10px; padding-left:20px">
					<p style="color:teal; font-size:20px"><b>Customer Name: </b>
						@if(isset($customers))
						@foreach($customers as $customer)
							{{ $customer->fullname }}
						@endforeach
						@endif
					</p>
					<p style="color:teal; font-size:20px">
						<b>Customer Type:</b>
						<p id="cust_type"></p>
					</p>
				</div>

			</div>

			<table class="table centered pending-payments" border="1">
			<thead style="color:gray">
				<th data-field="order-no">Order No.</th>
				<th data-field="transaction-date">Transaction Date</th>
				<th data-field="total-amount-pay">Total Amount To Pay</th>
				<th data-field="outstanding-bal">Outstanding Balance</th>
				<th data-field="due-date">Due Date</th>
			</thead>
			<tbody>
				@if(isset($payments))
				@foreach($payments as $payment)
				@if($payment->boolIsActive == 1)
				<tr>																
					<td><a href="#summary-of-order" class="modal-trigger tooltipped" data-position="bottom" data-delay"50" data-tooltip="Click to view summary of orders"><u>ORN 0001</u></a></td>
					<td>{{ $payment->dtTransacDate }}</td>
					<td>Php {{ number_format($payment->dblAmtPayable, 2) }}</td>
					<td>Php {{ number_format($payment->dblOustandingBal, 2) }}</td>
					<td>{{ $payment->dtDueDate}}</td>
				</tr>
				@endif
				@endforeach
				@endif
			</tbody>
		</table>
		
	</body>
</html>