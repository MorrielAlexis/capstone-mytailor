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

			<table class = "table centered order-summary" border = "1" style="border:1px gray solid">
   				<center><h6 style="color:black"><b>Payment Summary</b></h6></center>
   				<thead style="border:1px teal solid; background-color:rgba(54, 162, 235, 0.5)">
            		<tr style="border:1px teal solid">
            			<th style="border:1px teal solid">Order Total Price</th>
            			<th style="border:1px teal solid">Amount Paid</th>
            			<th style="border:1px teal solid">Outstanding Balance</th>
            			<th style="border:1px teal solid; border-bottom:none">Payment Date</th>
            			<th style="border:1px teal solid">Issued By</th>
            		</tr>
            	</thead>
              	<tbody>
              	@foreach($orders as $order)
            	@if($order->strTransactionFK == $custs->strJobOrderID)
		            <tr>
		               <td  style="border:1px gray solid">P {{ number_format($order->dblOrderTotalPrice, 2) }}</td>
		               <td  style="border:1px gray solid">P {{ number_format($order->dblAmountToPay ,2)}}</td>
		               <td  style="border:1px gray solid">P {{ number_format($order->dblOutstandingBal, 2) }}</td>
		               <td  style="border:1px gray solid">{{ $order->dtPaymentDate }}</td>
		               <td  style="border:1px gray solid">{{ $empname->employeename }}</td>
		            </tr>
		         @endif
		         @endforeach
		        </tbody>
		    </table>

		</div>
	</body>
</html>