@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Individual - Payout</h5></center>
      </div>
    </div>

	<div class="row" style="padding:30px">
        
        <ul class="col s12 breadcrumb">
			<li><a style="padding-left:200px"><b>1.FILL-UP FORM</b></a></li>
			<li><a class="active" style="padding-left:200px" href="#payment-info"><b>2.PAYMENT</b></a></li>
			<li><a style="padding-left:200px"><b>3.ADD MEASUREMENT DETAIL</b></a></li>
		</ul>

		<!-- Tab for Payment-->
	    <div id="payment-info" class = "hue col s12 active" style="background-color: white; border:2px outset">
	        <div class="row">
		        <div class="col s12 m12 l12">
                	<span class="page-title" style="margin:15px"><center><h5><b>Payment Information</b></h5></center></span>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              	</div>
	       	</div>

	       	<div class="col s12 left">
		        <a class="right btn-floating tooltipped btn-large green" data-position="bottom" data-delay="50"  data-tooltip="CLick to print a receipt for current transaction" href="#!" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-action-print"></i></a>
		    </div>

	       	<div class="row" style="background-color:white;">
	       		<div class="container">
	            <div class="col s12"> 

	            	<div class="col s12" style="margin-bottom:20px">
	            	   <div style="color:gray; padding-left:140px;" class="input-field col s6">                 
                          <input value="" id="transac_no" name="transac_no" type="text" class="" readonly>
                          <label style="color:gray" for="transac_no">Transaction #: </label>
                        </div>
                        <div style="color:gray; padding-left:140px;" class="input-field col s6">                 
                          <input value="" id="transac_date" name="transac_date" type="date" class="datepicker">
                          <label style="color:gray" for="transac_date">Date and Time: </label>
                        </div>
                    </div>


                    <label style="font-size:15px; color:black"><center>Order Summary</center></label>
                        <table class = "table centered order-summary" border = "1">
		       				<thead style="color:gray">
			          			<tr>
				                  <th data-field="product">Product</th>    
				                  <th data-field="design">Design</th>
				                  <th data-field="fabric">Fabric</th>
				                  <th data-field="price">Unit Price</th>
				              	</tr>
			              	</thead>
			              	<tbody>
			              		@foreach($segments as $segment)
					            <tr>
					               <td>{{ $segment->strGarmentCategoryName }}, {{ $segment->strSegmentName }}</td>
					               <td> </td>
					               <td> </td>
					               <td>{{ number_format($segment->dblSegmentPrice, 2) }} PHP</td>
					            </tr>
					            @endforeach
					        </tbody>
					    </table>

					<div class="divider" style="margin-bottom:30px"></div>
					{!! Form::open() !!}
		      		<div class="container">
			      			<div style="color:gray; padding-left:140px;" class="input-field col s12">                 
	                          <input id="total-price" name="total-price" type="text" class="" readonly>
	                          <label style="color:red" for="total-price">Total Amount: </label>
	                        </div>
	                        <div class="left col s12" id="mode-of-payment">
			          				<input name="modePayment" type="radio" class="filled-in payment" id="half_pay" />
	      							<label for="half_pay">Half-payment (Pay first 50%)</label>

				          			<input name="modePayment" type="radio" class="filled-in payment" id="full_pay" />
		      						<label for="full_pay">Full-payment</label>
		      				</div>
		      				<div style="color:gray; padding-left:140px;" class="input-field col s12">                 
	                          <input value="" id="amount-payable" name="amount-payable" type="text" class="" readonly>
	                          <label style="color:red" for="amount-payable">Amount Payable: </label>
	                        </div>
		      				<div style="color:gray; padding-left:140px;" class="input-field col s12">                 
	                          <input value="" id="balance" name="balance" type="text" class="" readonly>
	                          <label style="color:red" for="balance">Remaining Balance: </label>
	                        </div>
                    </div>

                    <div class="container">
                    	
                    		<a href="{{URL::to('transaction/walkin-individual-payment-measure-detail')}}" class="right btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save payment information and get measured" style="background-color:teal; padding:9.5px; padding-bottom:45px; margin-top:20px;"><label style="font-size:15px; color:white">Start Measurement</label></a>
                    		<a href="#cancel-order" class="left btn modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Click to cancel current unsaved transaction and be transfered back to the shop" style="background-color:teal; padding:9.5px; padding-bottom:45px; margin-top:20px;"><label style="font-size:15px; color:white">Cancel Transaction</label></a>
                    			<div id="cancel-order" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:80px">
									<h5><font color="red"><center><b>Warning!</b></center></font></h5>
										
											<div class="divider" style="height:2px"></div>
											<div class="modal-content col s12">
												<div class="center col s4"><i class="mdi-alert-warning" style="color:red; font-size:60px"></i></div>
												<div class="col s8"><p style="font-size:18px">Are you sure? Doing this will delete current transaction.</p></div>
											</div>

											<div class="modal-footer col s12">
								                <a class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-individual')}}"><font color="black">Yes</font></a>
								                <a href="{{URL::to('/transaction/walkin-individual-payment-payment-info')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
								            </div>
								</div>
                    </div>
					{!! Form::close() !!}


	            </div>
	        	</div>
	        </div>

	        <div class="divider" style="height:2px; margin-bottom:20px; margin-top:50px"></div>
	      	
	      		<center><p><font color="gray">End of Payment Information Form</font></p></center>
	
	    </div>
	    <!-- End of Tab for Payment-->

	</div>

@stop

@section('scripts')

	<script type="text/javascript">
		$(document).ready(function(){

			var a = {!! json_encode($segments) !!};
			var totalAmount = 0.00;

			for(var i = 0; i < a.length; i++)
				totalAmount += a[i].dblSegmentPrice;
			
			$('#total-price').val(totalAmount.toFixed(2) + ' PHP');

		});
	</script>

	<script>
			$('.payment').change(function(){
				if($('#half_pay').prop("checked")){

					var a = {!! json_encode($segments) !!};
					var totalAmount = 0.00;

					for(var i = 0; i < a.length; i++)
						totalAmount += a[i].dblSegmentPrice;
					
					$('#amount-payable').val((totalAmount/2).toFixed(2) + ' PHP');
					$('#balance').val((totalAmount - (totalAmount/2)).toFixed(2) + 'PHP');
				}

				if($('#full_pay').prop("checked")){

					var a = {!! json_encode($segments) !!};
					var totalAmount = 0.00;

					for(var i = 0; i < a.length; i++)
						totalAmount += a[i].dblSegmentPrice;
					
					$('#amount-payable').val(totalAmount.toFixed(2) + ' PHP');
					$('#balance').val((totalAmount - totalAmount).toFixed(2) + 'PHP');
				}
		});
	</script>

	<script>
	  $(document).ready(function() {
	    $('select').material_select();
	  });
	</script>	

	<script>
	$(document).ready(function(){
    	$('body').on('load', 'ul.tabs', function() {
   	 	$('ul.tabs').tabs();
		});
  		
  		$("#addMeasurementDetail").on('click', function(){
/*  			setTimeout(function(){
  				$('ul.tabs').tabs();
  				$('#tabMeasurementDetail').style('display', 'block');
  			}, 2000);
*/  		});

  	});

	</script>

	<script>
	function tabInit() {
    $('ul.tabs').tabs();
	}

	$.ajax({
	    type: "GET",
	    //Url to the XML-file
	    url: "transaction/walkInIndividualCheckout",
	    dataType: "blade.php",
	    success: tabInit
	});
	</script>


@stop