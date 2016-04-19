@extends('layouts.master')

@section('content')

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Walk in Customer</h4></span>
	      </div>
    	</div>
  	</div>


  	<div class="row">
	    <div class="col s12">
	      <ul class="tabs">
	        <li class="tab col s3"><a href="#tabIndi">Individual</a></li>
	        <li class="tab col s3"><a href="#tabCom">Company</a></li>
	      </ul>
	    </div>

	    <div id="tabIndi" class="col s12">
	    	<div class="row">
		      	<div class="col s12 m12 l12">
			        <div class="card-panel">
			          	<div class="card-content">
							<form action="{{URL::to('addCustPrivIndiv')}}" method="POST">
				                <div class="input-field">                 
				                  <input value = "INDI001" id="addIndiID" name="addIndiID" type="text" class="" readonly>
				                  <label for="indi_id">Individual ID: </label>
				                </div>

				                <div class="input-field">
				                  <input required id="addFName" name = "addFName" type="text" class="validateFirst">
				                  <label for="first_name"> *First Name: </label>
				                </div>

				                <div class="input-field">
				                  <input id="addMName" name = "addMName" type="text" class="validateMiddle">
				                  <label for="middle_name"> Middle Name: </label>
				                </div>

				                <div class="input-field">
				                  <input required id="addLName" name = "addLName" type="text" class="validateLast">
				                  <label for="last_name"> *Last Name: </label>
				                </div>

				                <div class="input-field">
				                  <input id="addAddress" name = "addAddress" type="text" class="validateAddress">
				                  <label for="address"> *Address: </label>
				                </div>

				                <div class="input-field">
				                  <input required id="addEmail" name = "addEmail" type="text" class="validateEmail">
				                  <label for="email"> *Email Address: </label>
				                </div>

				                <div class="input-field">
				                  <input required id="addCel" name = "addCel" type="text" class="validateCell" maxlength="11">
				                  <label for="cellphone"> *Cellphone Number: </label>
				                </div>

				                <div class="input-field">
				                  <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11">
				                  <label for="cellphone"> Cellphone Number: (alternate)</label>
				                </div>

				                <div class="input-field">
				                  <input id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10">
				                  <label for="tel"> Telephone Number: </label>
				                </div>
								<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="">Save</a></center>
								<br>
						    </form>
						</div>
					</div>

					<div class = "row">
						<div class = "col s6">
							<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/alteration')}}">Go to Alterations</a></center>
						</div>
						<div class = "col s6">
							<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/madeOrder')}}">Go to Made to Order</a></center>
						</div>
					</div>	
				</div>
			</div>
	    </div>

	    <div id="tabCom" class="col s12">
	    	<div class="row">
		      	<div class="col s12 m12 l12">
			        <div class="card-panel">
			          	<div class="card-content">
							<form action="{{URL::to('addCustCompany')}}" method="POST">
						      <div class="input-field">                 
						        <input value="CCUS001" id="addComID" name="addComID" type="text" class="" readonly>
						        <label for="company_id">Company ID: </label>
						      </div>

						      <div class="input-field">
						        <input required id="addComName" name = "addComName" type="text" class="validateComName">
						        <label for="company_name"> *Company Name: </label>
						      </div>

						      <div class="input-field">
						        <input required id="addAddress" name = "addAddress" type="text" class="validateAddress">
						        <label for="address"> *Address: </label>
						      </div>

						      <div class="input-field">
						        <input required id="addConPerson" name = "addConPerson" type="text" class="validateConPerson">
						        <label for="company_name"> *Contact Person: </label>
						      </div>

						      <div class="input-field">
						        <input required id="addComEmailAdd" name = "addComEmailAddress" type="text" class="validateEmail">
						        <label for="com_email_address"> *Company Email Address: </label>
						      </div>

						      <div class="input-field">
						        <input required id="addCel" name = "addCel" type="text" class="validateCell" maxlength="11" minlength="11">
						        <label for="cellphone"> *Cellphone Number: </label>
						      </div>

						      <div class="input-field">
						        <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11" minlength="11">
						        <label for="cellphone"> Cellphone Number: (alternate)</label>
						      </div>

						      <div class="input-field">
						        <input  id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10" minlength="10">
						        <label for="tel"> Telephone Number: </label>
						      </div>

						      <div class="input-field">
						        <input id="addFax" name = "addFax" type="text" class="validateFax" maxlength="9" minlength="9">
						        <label for="fax"> Fax Number: </label>
						      </div>
						      <center><a style="color:black" class="btn btn-large center-text light-green accent-1" href= "">Save</a></center>
								<br>
						    </form>
						</div>
					</div>
					<div class = "row">
						<div class = "col s6">
							<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/alteration')}}">Go to Alterations</a></center>
						</div>
						<div class = "col s6">
							<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/madeOrder')}}">Go to Made to Order</a></center>
						</div>
					</div>	
				</div>	
			</div>
	    </div>
  	</div>
  	<!-- <div class = "container">
	  	<div class="row">
	      	<div class="col s12 m12 l12">
		        <div class="card-panel">
		          	<div class="card-content">
		          		<div class = "col s12">
		          			<label><font size= "+2" color = "black">Choose Customer Type</font></label>
		          		</div>		

		          		<div class = "row">
		          			<div class ="col s6">
		          				<br>
		          				<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/walkIndi')}}">Individual</a></center>
	                  		</div>
	                  		<div class ="col s6">
	                  			<br>
		          				<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/walkCom')}}">Company</a></center>
	                  		</div>	          			
		          		</div>	
		          	</div>
		        </div>
		    </div>
		</div>
	</div> -->          	


@stop