@extends('layouts.master')

@section('content')

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Company - Customization Process</h5></center>
      </div>
    </div>

	<div class="row">
		<div class="col s12 m12 l12">


			<!-- CUSTOMIZING ORDER HERE -->
			<div class="col s12">
				<ul class="tabs transparent" style="margin-top:10px">
					<li class="tab col s12" style="border-top-left-radius: 20px; border-top-right-radius: 20px;"><a style="color:black; padding-top:5px; opacity:0.80" href="#shoppingCart"></a></li>	
					<div class="indicator white" style="z-index:1"></div>
	            </ul>
				<div class="card-panel">
					<div class="card-content">
						<div class="row">
						<div class="col s12">						
							<div class="col s12">
								
								<div class="col s6"><p><h5><b>Customize Orders Per Package</b></h5></p></div>
									<div class="right col s1"><a style="margin-top:15px; background-color:teal" class="waves-effect waves-green btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to go back home" href="{{URL::to('transaction/walkin-company-show-packages')}}"><i class="mdi-action-home" style="color:white; opacity:0.90; font-size:30px;"></i></a></div>
									<div class="right col s5"><a style="background-color:teal; margin-top:15px" type="submit" class="right waves-effect waves-green btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to edit data for company employees" href="{{URL::to('transaction/walkin-company-add-employees')}}"><font color="white" size="+1"><!--<i class="mdi-action-payment" style="font-size:20px;">  -->Add Employees Now<!--</i>--></font></a></div>				
							</div>
							
							<div class="divider" style="margin-bottom:30px"></div>
							<div class="divider" style="margin-bottom:30px"></div>
							<div class="divider" style="margin-bottom:20px; height:3px"></div>

							<div class="col s12" style="margin-top:2px; padding-top:5px; margin-bottom:30px;">
						        <center><h4 style="color:teal"><b>List of Orders</b><!--<a class="right btn-floating tooltipped btn-large blue" data-position="bottom" data-delay="50"  data-tooltip="CLick to print a receipt for current transaction" href="#!" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-editor-mode-edit"></i></a>--></h4></center>
						        <center><p style="color:gray">Click on each of the products purchased for customization</p></center>
						        <div class="divider" style="margin-bottom:5px; background-color:teal; height:2px"></div>
						    </div>    

						    
						@for($i = 0; $i < count($values); $i++)

							{!! Form::open(['url' => 'transaction/walkin-company-customize-orders', 'method' => 'POST']) !!}
							<!--Package Detail-->
							<div class="col s6" style="margin-bottom:40px">
								
								<a style="color:black; margin-left:50px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#removeOrder{{ $i }}"><i class="mdi-navigation-close"></i></a>
								


								<div class="z-depth-2 card medium" style="margin-left:100px; margin-top:20px; height:350px; width:350px; border:3px gray solid">
			           				<input type="hidden" name="hidden-package-id" value="{{ $values[$i]->strPackageID }}">
			           				<input type="hidden" name="hidden-package-index" value="{{ $i }}">
			           				<div class="card-image">
			              				<img class="responsive-img" height = "80%" src="{{URL::asset($values[$i]->strPackageImage)}}">
			           				</div>
			            			<div class="card-content">
			             				<p class="center-align">
			             				 	<span class="card-title" style="color:black"><b>{{ $values[$i]->strPackageName }}</b></span>
			             						<p class="center-align" style="color:teal">Package includes:</p>
			             						<p class="center-align" style="color:gray">{{ $values[$i]->strPackageDesc }}</p>
			           				 	</p>
			           				</div>
			           				<div style="margin-top:20px">		
				         				<center><button type="submit" class="center btn" style="font-size:15px; color:white; background-color: red; opacity:0.90"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Customize Orders<!--</i>--></button></center>
			           				</div>
			         			</div>
	                  			
							</div>
							{!! Form::close() !!}


							{!! Form::open(['url' => 'transaction/walkin-company-remove-package', 'method' => 'POST']) !!}
							<!--Modal for Remove Order-->
							<div id="removeOrder{{ $i }}" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
							  		
								<h5><font color="red"><center><b>Warning!</b></center></font></h5>
									
									<input type="hidden" name="hidden_remove_package" value="{{ $i }}">
									<div class="divider" style="height:2px"></div>
									<div class="modal-content col s12">
										<div class="col s3">
											<i class="mdi-alert-warning" style="font-size:50px; color:red"></i>
										</div>
										<div class="col s9">
											<p><font size="+1">Are you sure you to remove this order from the cart?</font></p>
										</div>
									</div>
									<div class="modal-footer col s12">
							            <button type="submit" class="waves-effect waves-green btn-flat"><font color="black">Yes</font></button>
							            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
							        </div>
							</div>
							{!! Form::close() !!}
							<!--End of modal for remove order-->
						@endfor
						<!--End of package detail-->
        

						</div>
					</div>							


					<div class="divider" style="height:2px;margin-top:40px"></div>
					<div class="col s12" style="padding:3%">
						<div class="left col s5">
							<a href="{{URL::to('transaction/walkin-company')}}" class="left btn" style="color:white; background-color:teal; border:3px teal solid">Cancel Transaction</a>
						</div>	

						<div class="col s7">
							<a href="{{URL::to('transaction/walkin-company-show-packages')}}" class="right btn" style="color:white; background-color:teal; border:3px teal solid">Add another set</a>
							<!--<a href="{{URL::to('transaction/walkin-company-retail-products')}}" class="right btn" style="color:white; background-color:teal; border:3px teal solid">Add a retail order</a>-->
						</div>
						
					</div>


						<div class="divider" style="height:2px; margin-top:50px"></div>    
						<div class="divider" style="height:2px; margin-top:50px"></div>   	
			      		<center><p><font color="gray">End of list of packages purchased</font></p></center>
					
					</div>
			</div>
		</div>


				<!-- END OF CUSTOMIZATION HERE-->

			</div>
		</div>


@stop

@section('scripts')

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