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
							<div class="col s5">
								<div class="input-field col s12" style="background-color:teal">
										<select class="browser-default">
											<option value="" readonly style="color:gray">Choose a garment category...</option>
										    <option value="1" class="circle">Uniform</option>
										    <option value="2" class="circle">Suit</option>
										    <option value="3" class="circle">Gown</option>
										</select>
								</div>
							</div>
						

							<div class="col s5" style="margin-bottom:20px">
								<div class="input-field col s12" style="background-color:teal">
										<select class="browser-default">
											<option value="" readonly style="color:gray">Show garments for...</option>
										    <option value="1" class="circle">Male</option>
										    <option value="2" class="circle">Female</option>
										    <option value="3" class="circle">All</option>
										</select>
										
								</div>
							</div>

							<div class="col s2" style="margin-bottom:20px; background-color:white">
						        <!--<nav class="white" style="border: 2px black inset">
						            <div class="input-field col s12" style="padding-top:20px;">
						                <input id="search" type="search" required="" placeholder="Search...">
						                <label for="search"><i class="large mdi-action-search" style="color:gray"></i></label>
						                <i class="mdi-navigation-close"></i>
						            </div>
						        </nav>-->
						        <a href="#!" class="btn" style="background-color:#26a69a; color:white; margin-top:20px; margin-left:20px">Search</a>
							</div>
						</div>

						<div class="col s12" style="margin-bottom:20px">
							<div class="divider"></div>
								<a class="left btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to customize orders" style="margin-top:30px; font-size:15px; color:white; background-color: teal; opacity:0.90" href="#reset-order"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Reset Order<!--</i>--></a>
									<div id="reset-order" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:120px;">
										<h5><font color="red"><center><b>Warning!</b></center></font></h5>	
										{!! Form::open() !!}
												<div class="divider" style="height:2px"></div>
												<div class="modal-content col s12">
													<div class="col s3">
														<i class="mdi-alert-error" style="font-size:50px; color:red"></i>
													</div>
													<div class="col s9">
														<p><font size="+1">Doing this will clear all orders made!</font></p>
													</div>
												</div>

												<div class="modal-footer col s12" style="background-color:red; opacity:0.85">
									                <a class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-company')}}"><font color="white">OK</font></a>
									                <a href="{{URL::to('transaction/walkin-company')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="white">Cancel</font></a>
									            </div>
											{!! Form::close() !!}
									</div>
								<a class="right btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to add orders to cart " style="margin-top:30px; background-color: teal; font-size:15px; color:white" href="#view-cart"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  View Cart<!--</i>--></a>							
									<div id="view-cart" class="modal modal-fixed-footer">
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
									                <a class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-company')}}"><font color="teal"><b>OK</b></font></a>
									                <a href="{{URL::to('transaction/walkin-company')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="teal"><b>Cancel</b></font></a>
									            </div>
											{!! Form::close() !!}
									</div>
						</div>


						<!-- List of Packages Available-->
						<div class="col s12" style="margin-top:10px">
							<div class="divider"></div>
							<div class="divider"></div>
							<div class="divider"></div>
							<p class="center-align" style="color:teal"><b>CHOOSE AMONG AVAILABLE PACKAGE SETS</b></p>
					
					{!! Form::open(['url' => 'transaction/walkin-company-customize-orders', 'method' => 'POST']) !!}
						@foreach($packages as $package)
						<div class="col s4" style="margin-top:20px; margin-bottom:20px">
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
				         			<div class="center col s3" style="margin-top:10px; padding-right:5px">
				          				<input type="checkbox" name="cbx-package-name[]" class="filled-in cbx-package-name" id="{{ $package->strPackageID }}" value="{{ $package->strPackageID }}">
		      							<label for="{!! $package->strPackageID !!}"></label>
			      					</div>

			      					<div class="center col s9">
							          <input type="text" name="int-package-qty[]" id="{{ $package->strPackageID }}" class="center int-package-qty {!! $package->strPackageID !!}" value=1 disabled="true">
							          <label for="{!! $package->strPackageID !!}">Quantity</label>
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

			       		<button type="submit" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to customize orders" style="margin-left:40px; margin-top:30px; font-size:15px; color:white; background-color: teal; opacity:0.90"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Customize Orders<!--</i>--></button>
			       		<a class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to add orders to cart " style="margin-top:30px; background-color: teal; font-size:15px; color:white" href="#!"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Add to Cart<!--</i>--></a>
						<a href="{{URL::to('transaction/walkin-company-retail-products')}}" class="left" style="margin-top:30px; margin-left:15px; font-size:18px"><i class="mdi-navigation-arrow-back"></i><b><u>Switch to retail products</u></b></a>
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

	<script>
		$(".cbx-package-name").change(function(){
			var a = document.getElementsByClassName('cbx-package-name');
			var b = document.getElementsByClassName('int-package-qty');

			var i, j;

			for(i = 0; i < a.length; i++){
				for(j = 0; j < b.length; j++){
					if(a[i].id == b[j].id){
						if($('#' + a[i].id).is(":checked")){
							$('.' + b[j].id).removeAttr('disabled');
						}else{
							$('.' + b[j].id).attr('disabled', true);
							$('.' + b[j].id).val('');
						}
					}		
				}
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
		$('.tooltipped').tooltip({delay: 50});
	 });
	</script>

@stop