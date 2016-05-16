@extends('layouts.master')

@section('content')

	<div class = "main-wrapper" style="margin-top:30px">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Billing</h4></span>
	      </div>
    	</div>
  	</div>

  	<div div class = "col s12 m12 l12" style="background:#80d8ff; opacity:0.75; margin-top:20px; margin-right:15px; margin-left:10px; padding:25px;">
  		<label style="color:black; margin-left:40px"><font size="+0.90">Block</font></label><label style="color:red"><font size="+0.90" style="margin-left:5px">3</font></label>
  		<label style="color:black; margin-left:50px"><font size="+0.90">Billing Month</label><label style="color:red"><font size="+0.90" style="margin-left:5px">MARCH</font></label>
  		<label style="color:black; margin-left:50px"><font size="+0.90">Billing Year</label><label style="color:red"><font size="+0.90" style="margin-left:5px">2016</font></label>
  		<label style="color:black; margin-left:50px"><font size="+0.90">Billing Date</label><label style="color:red"><font size="+0.90" style="margin-left:5px">3/12/2016</font></label>
  		<label style="color:black; margin-left:50px"><font size="+0.90">Total No. of Customer</label><label style="color:red"><font size="+0.90" style="margin-left:5px">3</font></label>
  	</div>

  	<div class = "col s12 m12 l12" style="background:white; margin-top:20px; margin-right:15px; margin-left:10px; padding:25px;  border:3px outset gray;">			
		<label style="color:black"><font size="+2">Record Data</font></label>	
			<div class="input-field col s12" style="padding-left:10px">
				<div class="col s12" style="margin-top:5px; background:white; padding-top:20px; padding-bottom:25px;">
					<table class = "table centered" border = "10px">
					<div class="divider"></div>
	       				<thead>
		          			<tr>
		          				 <th data-field="cust_id">Customer ID</th>
		                 		 <th data-field="name">Name</th>  
		                 		 <th data-field="cust_type">Customer Type</th>
		                 		 <th data-field="payment_type">Payment Type</th>
		                 		 <th data-field="total_amount">Total Amount</th>
		                 		 <th data-field="downpayment">Downpayment</th>
		                 		 <th data-field="amount_paid">Amount Paid</th>
		                 		 <th data-field="balance">Balance</th>
		                 		 <th data-field="amount_tendered">Amount Tendered</th>
		                 		 <th data-field="date">Date of Payment</th>
		                 	</tr>
	                 	</thead>
	                 	<tbody>
	                 		<tr>
	                 			<td>IND 001</td>
	                 			<td>Honey May Buenavides</td>
	                 			<td>Individual</td>
	                 			<td>Cash</td>
	                 			<td>2,000.00</td>
	                 			<td>1,000.00</td>
	                 			<td>1,000.00</td>
	                 			<td>1,000.00</td>
	                 			<td>2,000.00</td>
	                 			<td>2016-12-3</td>
	                 		</tr>
	                 		<tr>
	                 			<td>COM 002</td>
	                 			<td>Nestle</td>
	                 			<td>Company</td>
	                 			<td>Check</td>
	                 			<td>12,000.00</td>
	                 			<td>6,000.00</td>
	                 			<td>12,000.00</td>
	                 			<td>0.00</td>
	                 			<td>12,000.00</td>
	                 			<td>2016-12-3</td>
	                 		</tr>
	                 		<tr>
	                 			<td>COM 002</td>
	                 			<td>Twitter</td>
	                 			<td>Company</td>
	                 			<td>Check</td>
	                 			<td>16,000.00</td>
	                 			<td>8,000.00</td>
	                 			<td>9,000.00</td>
	                 			<td>5,000.00</td>
	                 			<td>10,000.00</td>
	                 			<td>2016-12-3</td>
	                 		</tr>
	                 	</tbody>
                 	</table> 
	  			</div>

			</div>

			<div class="divider"></div>

			<div class="modal-footer" style="margin-left:600px; margin-top:50px">
  				<button class="waves-effect waves-dark btn light-green accent-1" style="color:black;  margin-right:25px"><i class="material-icons left">system_update_alt</i>Print</button>
	  			<button class="waves-effect waves-dark btn light-green accent-1" style="color:black;"><i class="material-icons left">delete</i>Remove Data</button>
  			</div>
		</div>


@stop