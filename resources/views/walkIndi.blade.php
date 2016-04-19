@extends('layouts.master')

@section('content')

	
	<div class = "row">
    <div class = "col s1">
      <a style="color:black; align= left;" class="btn btn-large center-text light-green accent-1" href="{{URL::to('transaction/walk')}}">Previous</a>
    </div>
    <div class = "col s10">
      &nbsp
    </div>
    <div class = "col s1">
      <align="right"><a style="color:black;" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/trans')}}">Next</a></align>
    </div>  
  </div> 
   
	<div class = "main-wrapper">	
		<div class="row">
      <div class="col s12 m12 l12">
      	<span class="page-title"><h4>Individual Customer</h4></span>
      </div>
  	</div>
	</div>

  	<div class = "container">
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
			</div>
		</div>
	</div>	
						

@stop

@section('scripts')
	<script type="text/javascript">
      $('.validateFirst').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateFirst').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });      

      $('.validateMiddle').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      // $('.validateMiddle').blur('input', function() {
      //   var input=$(this);
      //   var is_name=input.val();
      //   if(is_name){input.removeClass("invalid").addClass("valid");}
      //   else{input.removeClass("valid").addClass("invalid");}
      // });

      $('.validateLast').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateLast').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateAddress').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Validate Blank
      $('.validateAddress').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateEmail').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var is_email=re.test(input.val());
        if(is_email){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

       $('.validateEmail').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });


      $('.validateCell').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateCell').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
      });

      $('.validateCellAlt').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateCellAlt').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
      });

      //Validate Blank
      $('.validateCell').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

       $('.validateCell').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
        $(this).val($(this).val().replace(/(\d{4})\-?(\d{3})\-?(\d{4})/,'($1)-$2-$3'))
      });

      $('.validateCellAlt').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
        $(this).val($(this).val().replace(/(\d{4})\-?(\d{3})\-?(\d{4})/,'($1)-$2-$3'))
      });

       $('.validatePhone').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
      });     

      $('.validatePhone').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
        $(this).val($(this).val().replace(/(\d{3})\-?(\d{3})\-?(\d{4})/,'($1)$2-$3'))
      }); 

    </script>


@stop