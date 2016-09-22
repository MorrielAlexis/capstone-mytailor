@extends('layouts.master')

@section('content')

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Company - Order Process</h5></center>
      </div>
    </div>

	<div class="row">
		<div class="col s12 m12 l12">

			<div class="col s12">
				<ul class="tabs transparent" style="margin-top:15px">
					<li class="tab col s12" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" href="#shoppingCart"></a></li>	
					<div class="indicator white" style="z-index:1"></div>
	            </ul>
				<div id="shoppingCart" class="card-panel">
					<div class="card-content">
						<div class="row">
						<div class="col s12">

							<div class="col s6" style="margin-bottom:20px">
								<div class="input-field col s12">
										<select id="package-sex">
										    <option value="A" class="circle" selected>All</option>
										    <option value="M" class="circle">Male</option>
										    <option value="F" class="circle">Female</option>
										</select>
										<label for="" style="font-size:15px">Select packages for (sex):</label>
										
								</div>
							</div>

						</div>

						<!--Modal for Reset Order-->
						<div id="reset-order" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:120px;">
							<h5><font color="red"><center><b>Warning!</b></center></font></h5>	
							{!! Form::open(['url' => 'transaction/walkin-company-reset-order', 'method' => 'POST']) !!}
									<div class="divider" style="height:2px"></div>
									<div class="modal-content col s12">
										<div class="col s3">
											<i class="mdi-alert-error" style="font-size:50px; color:red"></i>
										</div>
										<div class="col s9">
											<p><font size="+1">Doing this will clear all orders made!</font></p>
										</div>
									</div>

									<div class="modal-footer col s12">
						                <button class="waves-effect waves-green btn-flat"><font color="black"><b>OK</b></font></button>
						                <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black"><b>Cancel</b></font></a>
						            </div>
							{!! Form::close() !!}
						</div>
						<!--End of Modal for Reset Order-->

						<!--Modal for View Cart-->
						<!-- <div id="view-cart" class="modal modal-fixed-footer">
							<h5><font color="teal"><center><b>List of Products Added to Cart</b></center></font></h5>	
							{!! Form::open() !!}
									<div class="divider" style="height:2px"></div>
									<div class="modal-content col s12" style="padding-top:30px; padding-bottom:50px">
				
						                        <table class = "table centered order-summary" border = "2">
								       				<thead style="color:red">
									          			<tr>													                  
										                  <th data-field="product">Product</th>
										                  <th data-field="quantity">Quantity</th>
										                  <th data-field="remove">Remove</th>
										                </tr>
										            </thead>
										            <tbody>
										            	<tr>
										            		<td>Men Set A</td>
										            		<td>38</td>
										            		<td><input type="checkbox" class="filled-in" id="remove"/><label for="remove"></label></td>
										            	</tr>
										            	<tr>
										            		<td>Women Set A</td>
										            		<td>19</td>
										            		<td><input type="checkbox" class="filled-in" id="remove"/><label for="remove"></label></td>
										            	</tr>
										            </tbody>
										        </table>
										    
									</div>

									<div class="modal-footer col s12">
						                <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="teal"><b>OK</b></font></a>
						            </div>
								{!! Form::close() !!}
						</div> -->
						<!--End of modal for view cart-->

						<!-- <div class="col s12" style="margin-bottom:20px">
							<div class="divider"></div> -->
								
									
								<!-- <a class="right btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to add orders to cart " style="margin-top:30px; background-color: teal; font-size:15px; color:white" href="#view-cart">View Cart</a> -->										
						<!-- </div> -->


						<!-- List of Packages Available-->
						<div class="col s12" style="margin-top:10px">
							<div class="divider"></div>
							<div class="divider"></div>
							<div class="divider"></div>
							<p class="center-align" style="color:teal"><b>CHOOSE AMONG AVAILABLE PACKAGE SETS</b></p>
					
							{!! Form::open(['url' => 'transaction/walkin-company-orders', 'method' => 'POST', 'id' => 'order-form']) !!}
								@foreach($packages as $package)
								<div class="col s4 package-general {{ $package->strPackageSex }}" style="margin-top:20px; margin-bottom:20px">
					           		 <div class="container">
					         			 <div class="z-depth-1 card medium" style="border:3px gray solid">
					           				 <div class="card-image">
					              				<img class="responsive-img" height = "50%" src="{{URL::asset($package->strPackageImage)}}">
					           				 </div>
					            			<div class="card-content">
					             				<p class="center-align">
					             				 <span class="card-title" style="color:black"><b>{{ $package->strPackageName }}</b></span>
					             					 <p class="center-align" style="color:teal">Package includes:</p>
					             					 <p class="center-align" style="color:gray">{{ $package->strPackageDesc }}</p>
					           				 	</p>
					           				 </div>

					         			 </div>

					         			<div class="col s12">
						         			<div class="center col s2" style="margin-top:10px; padding-right:5px">
						          				<input type="checkbox" name="cbx-package-name[]" class="filled-in cbx-package-name" id="{!! $package->strPackageID !!}" value="{{ $package->strPackageID }}">
				      							<label for="{!! $package->strPackageID !!}"></label>
					      					</div>
					      					<div class="col s10">
					      						<input class="center int-package-qty {{ $package->strPackageID }} qty{{ $package->strPackageID }}" disabled="true" name="int-package-qty[]" id="{{ $package->strPackageID }}" type="number">
					      					</div>
					      				</div>

					      			</div>
					       		</div>	
								@endforeach
					       		</div>

					       		 <!--End of List for packages-->
					       		 <div class="col s12">
									<div class="divider"></div>
								</div>

					       		<button type="submit" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to customize orders" style="margin-left:40px; margin-top:30px; font-size:15px; color:white; background-color: teal; opacity:0.90; margin-right:3%"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Customize Orders<!--</i>--></button>
					       		<!-- <a class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to add orders to cart " style="margin-top:30px; background-color: teal; font-size:15px; color:white" href="#!">Add to Cart</a> -->
								<!--<a href="{{URL::to('transaction/walkin-company-retail-products')}}" class="left" style="margin-top:30px; margin-left:15px; font-size:18px"><i class="mdi-navigation-arrow-back"></i><b><u>Switch to retail products</u></b></a>-->
								<a class="left btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to customize orders" style="margin-top:30px; font-size:15px; color:white; background-color: teal; opacity:0.90; margin-left:3%" href="#reset-order"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Reset Order<!--</i>--></a>
					       	{!! Form::close() !!}

			       		 <div class="col s12">
							<div class="divider" style="height:2px; margin-top:10px"></div>      	
			      			<center><p><font color="gray">End of product list for MyTailor</font></p></center>
						</div>

					</div>
				</div>
			</div>
		</div>


		</div>
	</div>


@stop

@section('scripts')

	<script type="text/javascript">
		$(".cbx-package-name").change(function(){
			var a = document.getElementsByClassName('cbx-package-name');
			var b = document.getElementsByClassName('int-package-qty');

			var i, j;

			for(i = 0; i < a.length; i++){
				for(j = 0; j < b.length; j++){
					if(a[i].id == b[j].id){
						if($('#' + a[i].id).is(":checked")){
							$('.' + b[j].id).removeAttr('disabled');
							$('.' + b[j].id).attr('required', true);
						}else{
							$('.' + b[j].id).attr('disabled', true);
							$('.' + b[j].id).val('');
						}
					}
				}
			}

		});

		$("#order-form").submit(function(){
			if(!$('.cbx-package-name').is(":checked"))
			{
			    alert('Please select at least one item.');
			    return false;
			}
		})

	</script>

	<script>
		var sex = $('#package-sex');

		sex.change(function () {
		  updateUI();
		});

		function updateUI () {
		  $('.package-general').hide();

		  var sexValue = sex.val();
		  
		  if (sexValue == 'A') return $('.package-general').show();
		  
		  var sexClass = sexValue == 'A' ? '' : '.' + sexValue;

		  var classesToUpdate = sexClass;
		  $(classesToUpdate).show();
		}

		updateUI();
	</script>

	<script>
	  $(document).ready(function() {

	  	var values = {!! json_encode($values) !!};
	  	var quantity = {!! json_encode($quantity) !!};

	  	var cbx_id = document.getElementsByClassName('cbx-package-name');
		var tf_qty = document.getElementsByClassName('int-package-qty');

	  	for(var i = 0; i < values.length; i++){
	  		for(var j = 0; j < cbx_id.length; j++){
	  			if(cbx_id[j].id == values[i]){
	  				$('#' + cbx_id[j].id).prop('checked', true);
	  				$('.qty'  + tf_qty[j].id).val(quantity[i]);
	  				$('.qty'  + tf_qty[j].id).removeAttr('disabled');
	  			}
	  		}
	  	}

	  });
	</script>

	<script>
	 $(document).ready(function(){
	 	$('select').material_select();
		$('.tooltipped').tooltip({delay: 50});
	 });
	</script>

@stop