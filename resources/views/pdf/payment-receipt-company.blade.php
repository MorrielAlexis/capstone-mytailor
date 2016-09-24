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
						<td style="width:60%; font-size:18px; color:teal; text-align:right;"><b>job order here</b></td>
						<td style="margin:15px; color:white">Hahah</td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Receipt No:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>receipt no. here</b></td>
					</tr>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Company Name:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>company name</b></td>
						<td></td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Company Id:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>company id</b></td>
					</tr>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Date:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ date('F d, Y') }}</b></td>
						<td></td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Time:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>{{ date('h:i A') }}</b></td>
					</tr>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Contact Person:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>contact person name</b></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Issued By:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>employee name</b></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
        	</table>
        </div>

      

		<div class="col s12 page-break" style="margin-top:1%;">
			<table class="table centered" border="1">
                	<thead style="border:1px teal solid; background-color:rgba(54, 162, 235, 0.8)">
                		<tr style="border:1px teal solid">
                			<th style="border:1px teal solid">Quantity</th>
                			<th colspan="3" style="border:1px teal solid">Description</th>
                			<th style="border:1px teal solid; border-bottom:none"></th>
                			<th style="border:1px teal solid"></th>
                		</tr>
                		<tr style="border:1px teal solid">
                			<th style="border:1px teal solid; border-top:none"></th>
                			<th style="border:1px teal solid" colspan="2">Package Name</th>
                			<th style="border:1px teal solid">Package Price</th>
                			<th style="border:1px teal solid">Unit Price</th>
                			<th style="border:1px teal solid">Total Price</th>
                		</tr>
                	</thead>
                	<tbody style="border:1px teal solid">
                	
                		<tr style="border:1px teal solid">
                			<td style="border:1px teal solid; background-color:rgba(52, 162, 232, 0.2)"><b></b></td>
                			<td style="border:1px teal solid; padding-left:5%; padding-right:5%; background-color:rgba(52, 162, 232, 0.2)"><b></b></td>
                			<td style="border:1px teal solid; padding-left:2%; padding-right:2%; background-color:rgba(52, 162, 232, 0.2)"></td>
                			<td style="border:1px teal solid; padding-left:2%; padding-right:2%; background-color:rgba(52, 162, 232, 0.2)"></td>
                			<td style="border:1px teal solid; padding-left:2%; padding-right:2%; background-color:rgba(52, 162, 232, 0.2)"></b></td>
                			<td style="border:1px teal solid; padding-left:2%; padding-right:2%; background-color:rgba(52, 162, 232, 0.2)"><b></b></td>
                		</tr>
                				                        	
                	</tbody>
                </table>

             <center><h7 style="padding-top:1%"><b>Package Detail for <font color="teal">Package name here</font></b></h7></center>
			<table class="table centered z-depth-1">
				<thead style="background-color:rgba(255, 99, 132, 0.2)">
					<tr>
						<th style="border:1px rgba(255, 99, 132, 1) solid">Excess Quantity</th>
						<th style="border:1px rgba(255, 99, 132, 1) solid" colspan="3">Description</th>
						<th style="border:1px rgba(255, 99, 132, 1) solid">Style Price</th>
						<th style="border:1px rgba(255, 99, 132, 1) solid">Additional Price</th>
					</tr>
					<tr>
						<th style="border:1px rgba(255, 99, 132, 1) solid"></th>
						<th style="border:1px rgba(255, 99, 132, 1) solid">Item</th>
						<th style="border:1px rgba(255, 99, 132, 1) solid"></th>
						<th style="border:1px rgba(255, 99, 132, 1) solid">Price</th>
						<th style="border:1px rgba(255, 99, 132, 1) solid"></th>
						<th style="border:1px rgba(255, 99, 132, 1) solid"></th>
					</tr>
				</thead>
				<tbody>								
                		
                    		<tr style="border:1px teal solid">
                    			<td style="border:1px teal solid; background-color:rgba(52, 162, 232, 0.2)"></td>
                    			<td style="border:none; background-color:rgba(52, 162, 232, 0.2)"></td>
                    			<td style="border:1px teal solid; padding-top:0; padding-bottom:0; background-color:rgba(52, 162, 232, 0.2)"><br> <font color="gray"><b><i></i></b></font></td>
                    			<td style="border:1px teal solid; padding-top:0; padding-bottom:0; background-color:rgba(52, 162, 232, 0.2)"></td>
                    			<td style="border:1px teal solid; padding-top:0; padding-bottom:0; background-color:rgba(52, 162, 232, 0.2)"></td>
                    			<td style="border:1px teal solid; padding-top:0; padding-bottom:0; background-color:rgba(52, 162, 232, 0.2)"></td>
                    			
                    		</tr>
                    		<tr style="border:1px teal solid">
                    			<td style="border:1px teal solid"></td>
                    			<td class="right" style="border:none; color:teal; padding-right:10%">Fabric Name</td>
                    			<td style="border:1px teal solid"></td>
                    			<td style="border:1px teal solid"></td>
                    			<td style="border:1px teal solid"></td>
                    			<td style="border:1px teal solid"></td>		                        			
                			</tr>
                        	<tr style="border:1px teal solid">
                        		<td style="border:1px teal solid"></td>
                        		<td class="right" style="border:none; color:teal; padding-right:10%">Style name and pattern (with custom fabric)</td>
                        		<td style="border:1px teal solid">
                        			<br> 
	                        			<font color="gray"><b><i></i></b></font><br>
										<br> 
	                        			<font color="gray"><b><i></i></b></font><br>
										
                        		</td>
                        		<td style="border:1px teal solid">
                        			</i>)<br>
	                        			
									
                        		</td>
                        		<td style="border:1px teal solid"></td>
                        		<td style="border:1px teal solid"></td>		                        			
                    		</tr>
                    		<!-- eeto yung nasa baba na total-->
							<tr>
								<td style="width:50%; border-right:1px teal solid; background-color:teal; height:5%"></td>
								<td style="width:50%; border-right:1px teal solid; background-color:teal; height:5%"></td>
								<td style="width:50%; border-right:1px teal solid; background-color:teal; height:5%"></td>
								<td style="width:50%; border-right:1px teal solid; background-color:teal; height:5%"></td>
								<td class="right" style="width:50%; background-color:teal; border-right:1px teal solid; color:white; font-size:1em; height:5%;"><b>TOTAL ITEM QTY</b></td>
								<td style="width:50%; height:5%; color:teal"><b></b></td>
							</tr>
							<tr>
								<td style="width:50%; border-right:1px teal solid; background-color:teal; opacity:0.90; height:5%"></td>
								<td style="width:50%; border-right:1px teal solid; background-color:teal; height:5%"></td>
								<td style="width:50%; border-right:1px teal solid; background-color:teal; height:5%"></td>
								<td style="width:50%; border-right:1px teal solid; background-color:teal; opacity:0.90; height:5%"></td>
								<td class="right" style="width:50%; background-color:teal; border-right:1px teal solid; opacity:0.90; color:white; font-size:1em; height:5%;"><b>GRAND TOTAL</b></td>
								<td style="width:50%; height:5%; color:teal"><b></b></td>
							</tr>
							<!--end nung sa total-->
				</tbody>
			</table>
			
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
						<td style="width:60%; font-size:18px; color:teal; text-align:right;"><b>payment id</b></td>
						<td style="margin:15px; color:white">Hahah</td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Receipt No:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>payment receipt id</b></td>
					</tr>
					<tr>
						<td style="width:40%; font-size:18px; text-align:left"><b>Customer Name:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>company name</b></td>
						<td></td>
						<td style="width:40%; font-size:18px; text-align:left"><b>Customer Id:</b></td>
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>company id</b></td>
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
						<td style="width:60%; font-size:18px; text-align:right; color:teal"><b>employee</b></td>
						<td></td>
						<td></td>
						<td></td>
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
						<!--condition ng terms of payment dito-->
							<th>DOWNPAYMENT (50%)</th>
						<!-- end -->
						<th>TOTAL AMOUNT PRICE</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%"><b>job order id</b></td>
						<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%">terms of payment</td>
						<!--condition ng terms of payment dito-->
							<td style="width:40%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%">P balance</td>
						<!-- end -->
						<td style="width:60%">
							<b>Sub total: </b>P sub total<br>
							<b>Additional Fee: </b>P 0.00<br><br>
							<div class="col s12"><div class="divider" style="height:1px; background-color:gray; margin-left:10%; margin-right:10%"></div></div>
							<b style="color:teal; padding-left:3%">Grand Total: </b><b>grand total</b>
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
						<td style="width:50%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%; font-size:1.2em"><b>P amount na binayaran</b></td>
					</tr>
					<tr>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; background-color:teal; color:white; border: 2px white solid">AMOUNT TENDERED</td>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%; font-size:1em">amount na inabot</td>
					</tr>
					<tr>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; background-color:teal; color:white; border: 2px white solid">CHANGE</td>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%; font-size:1em">amount na sukli</td>
					</tr>
					
					<tr>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; background-color:teal; color:white; border: 2px white solid">OUTSTANDING BALANCE<p></p></td>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%; font-size:1.2em">
							<b> balance</b>
						</td>
					</tr>
					<!-- condition ng terms of payment dito -->
					<tr>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; background-color:teal; opacity:0.80; color:white; border: 2px white solid">DUE DATE FOR PAYMENT</td>
						<td style="width:50%; padding-top:10px; padding-bottom:10px; padding-left:10%; padding-right:10%; font-size:1.2em; color:teal"><b>due date ng balance</b> <br><font color="gray" size="15px">*Pay balance before or on the said date</font></td>
					</tr>
					<!-- end -->
				</tbody>
			</table>


			
		</div>

	</body>

</html>