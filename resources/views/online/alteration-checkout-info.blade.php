@extends('layouts.masterOnline')

@section('content')

  <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Online Alteration - Payout</h5></center>
      </div>
    </div>

  <div class="row white" style="margin:40px;">
      <div style="padding:30px">

    <ul class="col s12 breadcrumb">
      {{-- <li><a class="active" style="padding-left:200px" href="#customer-info"><b>FILL-UP FORM</b></a></li> --}}
      <li><a style="padding-left:200px"><b>PAYMENT</b></a></li>
    </ul>

          <div class="row">
            <div class="col s12 m12 l12">
              <span class="page-title" style="margin:15px"><center><h5><b>Customer's Personal Information</b></h5></center></span>
              <div class="divider" style="height:1px; background-color:#80d8ff"></div>
              <div class="divider" style="height:1px; background-color:#80d8ff"></div>
            </div>
          </div>
          
        {!! Form::open(['url' => 'transaction/online-alteration-add-newcustomer-checkout-info', 'method' => 'POST']) !!}
          <div class="row" style="background-color:white;">
            <div class="container">
              <div class="col s12">    
                <div class="col s6">       
                  <div style="color:black; padding-left:140px" class="input-field col s12">                 
                    <input value="{{ $custID }}" id="addIndiID" name="addIndiID" type="text" readonly>
                    <label for="addIndiID" style="color:gray"><b>Individual ID </b></label>
                  </div>

                  <div style="color:black; padding-left:140px; margin-left:1px" class="input-field col s12">    
                    <input value="{{ $newID }}" id="alteID" name="alteID" type="text" readonly>
                    <label style="color:gray"><b>Transaction No. </b></label>
                  </div>
                </div>

                <button type="submit" class="btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to save data and proceed to next step" style="margin-top:20px; margin-left:40px; padding:10px; padding-left:19px; padding-right:19px; padding-bottom:45px; background-color:teal; color:white">Save and Proceed</button>                                
                <a id="cancelTransac" href="#cancel-order" class="btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to cancel transaction and go back to homepage" style="margin-top:30px; margin-left:40px; padding:10px; padding-bottom:45px; background-color:teal; color:white">Cancel Transaction</a>
              </div>
            </div>
          </div>       

      <div class="row">
        <div class="col s12" style="margin-top:30px">
          <div class="divider" style="margin-bottom:30px"></div>
        
            <span class="col s12" style="color:teal;"><b>Customer Detail</b></span>
            <div class="card-panel col s12" style="border:3px solid gray; padding:15px;">
                <div style="color:black" class="input-field col s4">                 
                  <input value="" id="first_name" name="first_name" type="text" class="" pattern="^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$">
                  <label style="color:gray" for="first_name"><b><span class="red-text"><b>*</b></span>First Name</b></label>
                </div>

                <div style="color:black" class="input-field col s4">                 
                  <input value="" id="middle_name" name="middle_name" type="text" class="" pattern="^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$">
                  <label style="color:gray" for="middle_name"><b>Middle Name</b></label>
                </div>

                <div style="color:black" class="input-field col s4">                 
                  <input value="" id="last_name" name="last_name" type="text" class="" pattern="^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$">
                  <label style="color:gray" for="last_name"><b><span class="red-text"><b>*</b></span>Last Name </b></label>
                </div>

                <div style="color:black" class="input-field col s6">
                  <p style="color:gray"><b>Sex</b></p>
                  <select name="cust-sex">
                      <option value="F">Female</option>
                      <option value="M">Male</option>
                  </select>
                </div>
            </div>

            <span class="col s12" style="color:teal; margin-top:20px"><b>Customer Address</b></span>
            <div class="card-panel col s12" style="border:3px solid gray; padding:15px">
                <div style="color:black" class="input-field col s4">
                    <input required id="addCustPrivHouseNo" name="addCustPrivHouseNo" type="text" class="validateHouseNo" pattern="[0-9a-zA-Z\-\s]+$">
                    <label style="color:gray" for="house_no"><b><span class="red-text"><b>*</b></span>House No. </b></label>
                </div>

                <div style="color:black" class="input-field col s4">
                    <input required id="addCustPrivStreet" name="addCustPrivStreet" type="text" class="validateStreet" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                    <label style="color:gray" for=" Street"><b><span class="red-text"><b>*</b></span>Street </b></label>
                </div>

                <div style="color:black" class="input-field col s4">
                    <input  id="addCustPrivBarangay" name="addCustPrivBarangay" type="text" class="validateBarangay" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                    <label style="color:gray" for=" Brgy"><b>Barangay/Subd </b></label>
                </div>

                <div style="color:black" class="input-field col s4">
                    <input required id="addCustPrivCity" name="addCustPrivCity" type="text" class="validateCity" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                    <label style="color:gray" for=" City"><b><span class="red-text"><b>*</b></span>City/Municipality </b></label>
                </div>


                <div style="color:black" class="input-field col s4">
                    <input id="addCustPrivProvince" name="addCustPrivProvince" type="text" class="validateProvince" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                    <label style="color:gray" for=" Province"><b>Province/Region </b></label>
              </div>

                <div style="color:black" class="input-field col s4">
                    <input id="addCustPrivZipCode" name="addCustPrivZipCode" type="text" class="validateZip" pattern="^[0-9]+$">
                    <label style="color:gray" for=" Zip Code"><b>Zip Code </b></label>
              </div>
          </div>

          <span class="col s12" style="color:teal; margin-top:20px"><b>Customer Contact Information</b></span>
            <div class="card-panel col s12" style="border:3px solid gray; padding:15px">
              <div style="color:black" class="input-field col s6">
                    <input required id="addEmail" name = "addEmail" type="text" class="validateEmail">
                    <label style="color:gray" for="email"><b> <span class="red-text"><b>*</b></span>Email Address </b></label>
                </div>

                <div style="color:black" class="input-field col s6">
                    <input id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10" pattern="^[0-9]{6,10}$">
                    <label style="color:gray" for="tel"><b> Telephone Number </b></label>
                </div>

                <div style="color:black" class="input-field col s6">
                    <input required id="addCel" name = "addCel" type="text" class="validateCell" maxlength="11" pattern="^[0-9]{11,11}$">
                    <label style="color:gray" for="cellphone"><b> <span class="red-text"><b>*</b></span>Cellphone Number </b></label>
                </div>

                <div style="color:black" class="input-field col s6">
                    <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11" pattern="^[0-9]{11,11}$">
                    <label style="color:gray" for="cellphone"><b> Cellphone Number (alternate)</b></label>
                </div>
            </div>
        </div>
      </div>
    {!! Form::close() !!}
      <div style="color:gray; margin-top:30px; margin-left:20px" class="col s12">
        <h6>IMPORTANT NOTE: Fields with asterisk (*) must not be left blank.</h6>
      </div>
      <div class="divider" style="height:2px; margin-bottom:20px; margin-top:50px"></div>        
      <center><p><font color="gray">End of Customer Profile Information Form</font></p></center>

    </div>
  </div>

    <!--CANCEL-ORDER-->
    <div id="cancel-order" class="modal modal-fixed-footer row" style="height:250px; width:500px; margin-top:80px">
      <h5><font color="red"><center><b>Warning!</b></center></font></h5>
        {!! Form::open(['url' => 'transaction/online-alterationtransaction-newcustomer', 'method' => 'post']) !!}
          <div class="divider" style="height:2px"></div>
          <div class="modal-content col s12">
            <div class="center col s4"><i class="mdi-alert-warning" style="color:red; font-size:60px"></i></div>
            <div class="col s8"><p style="font-size:18px">Are you sure? Doing this will delete current transaction.</p></div>
          </div>

          <div class="modal-footer col s12">
              <button type="submit" class="waves-effect waves-green btn-flat"><font color="black">Yes</font></button>
              <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
          </div>
        {!! Form::close() !!}
    </div>

@stop

@section('scripts')

  <script>

  </script>

  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script> 

@stop