@extends('layouts.masterOnline')

@section('content')
  
  <div class="container">
    <div style="padding:20px; margin-bottom:20px;"> 

    <div id="customer-info" class = "hue col s12" style="background-color: white;">
          <div class="row">
            <div class="col s12 m12 l12">
                  <span class="page-title" style="margin:15px"><center><h5><b>Customer's Personal Information</b></h5></center></span>
                  <div class="divider" style="height:1px; background-color:#80d8ff"></div>
                  <div class="divider" style="height:1px; background-color:#80d8ff"></div>
                </div>
          </div>

          <div class="row">
            <div style="padding:20px;">

              <!--Start of header with customer id and transaction no-->
              <div class="col s12">

                  <div class="col s12">
                      <div class="col s6">       
                        <div class="col s5" style="color:teal; font-size:17px"><p><b>Customer ID</b></p></div>
                        <div class="col s7" style="color:red;"><p><input value="" id="addIndiID" name="addIndiID" type="text" readonly></p></div> 
                      </div>
                      <div class="col s6">
                        <div class="col s5" style="color:teal; font-size:17px"><p><b>Transaction No.</b></p></div>
                        <div class="col s7" style="color:red;"><p><input value="" id="addJOID" name="addJOID" type="text" readonly></p></div> 
                      </div>
                </div>
                
              </div>
              <!--end of header for customer id and transaction no-->

              <!-- Start of Customer Information-->
                <div class="col s12" style="margin-top:10px">
                  <div class="divider" style="height:2px; background-color:teal; margin-bottom:40px"></div>
                
                    <span class="col s12" style="color:teal;"><b>Customer Detail</b></span>
                    <div class="card-panel col s12" style="border:3px solid gray; padding:15px;">
                        <div style="color:black" class="input-field col s4">                 
                          <input required value="" id="first_name" name="first_name" type="text" class="" placeholder="Hope Elizabeth">
                          <label style="color:gray" for="first_name"><b><span class="red-text"><b>*</b></span>First Name</b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">                 
                          <input value="" id="middle_name" name="middle_name" type="text" class="" placeholder="Soberano">
                          <label style="color:gray" for="middle_name"><b>Middle Name</b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">                 
                          <input required value="" id="last_name" name="last_name" type="text" class="" placeholder="Aquino">
                          <label style="color:gray" for="last_name"><b><span class="red-text"><b>*</b></span>Last Name </b></label>
                        </div>

                        <div style="color:black" class="input-field col s12">
                          <p style="color:gray"><b>Sex</b></p>
                          <select>
                            <option value="0"></option>
                              <option value="1">Female</option>
                              <option value="2">Male</option>
                          </select>
                        </div>
                    </div>

                    <span class="col s12" style="color:teal; margin-top:20px"><b>Customer Address</b></span>
                    <div class="card-panel col s12" style="border:3px solid gray; padding:15px">
                        <div style="color:black" class="input-field col s4">
                            <input required id="addCustPrivHouseNo" name="addCustPrivHouseNo" type="text" class="validateHouseNo" placeholder="77-B">
                            <label style="color:gray" for="house_no"><b><span class="red-text"><b>*</b></span>House No. </b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input required id="addCustPrivStreet" name="addCustPrivStreet" type="text" class="validateStreet" placeholder="Dolce Amore">
                            <label style="color:gray" for=" Street"><b><span class="red-text"><b>*</b></span>Street </b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input  id="addCustPrivBarangay" name="addCustPrivBarangay" type="text" class="validateBarangay" placeholder="Willpower Homes">
                            <label style="color:gray" for=" Brgy"><b><span class="red-text"><b>*</b></span>Barangay/Subd </b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input required id="addCustPrivCity" name="addCustPrivCity" type="text" class="validateCity" placeholder="Mandaluyong">
                            <label style="color:gray" for=" City"><b><span class="red-text"><b>*</b></span>City/Municipality </b></label>
                        </div>


                        <div style="color:black" class="input-field col s4">
                            <input id="addCustPrivProvince" name="addCustPrivProvince" type="text" class="validateProvince" placeholder="Metro Manila">
                            <label style="color:gray" for=" Province"><b>Province/Region </b></label>
                      </div>

                        <div style="color:black" class="input-field col s4">
                            <input id="addCustPrivZipCode" name="addCustPrivZipCode" type="text" class="validateZip" placeholder="1016">
                            <label style="color:gray" for=" Zip Code"><b>Zip Code </b></label>
                      </div>
                  </div>

                  <span class="col s12" style="color:teal; margin-top:20px"><b>Customer Contact Information</b></span>
                    <div class="card-panel col s12" style="border:3px solid gray; padding:15px">
                      <div style="color:black" class="input-field col s6">
                            <input required id="addEmail" name = "addEmail" type="text" class="validateEmail" placeholder="lizahope@gmail.com">
                            <label style="color:gray" for="email"><b> Email Address </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10">
                            <label style="color:gray" for="tel"><b> Telephone Number </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input required id="addCel" name = "addCel" type="text" class="validateCell" maxlength="11" placeholder="09178919988">
                            <label style="color:gray" for="cellphone"><b> <span class="red-text"><b>*</b></span>Cellphone Number </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11">
                            <label style="color:gray" for="cellphone"><b> Cellphone Number (alternate)</b></label>
                        </div>
                    </div>

                </div>
              <!--End of Customer Information-->
              
              <!--Start of bottom button-->
              <div class="col s12" style="margin-top:30px">
                  <a id="addPayment" href="{{URL::to('/online-alteration-checkout-measurement')}}" class="right btn-flat tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to save data and proceed to next step" style="margin-left:40px; background-color:#00695c; color:white"><b><i class="mdi-navigation-check" style="padding-right:10px"></i>Save</b></a>                                
                  <a id="cancelTransac" href="#cancel-order" class="right btn-flat modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to cancel transaction and go back to homepage" style="background-color:#a7ffeb; color:black"><b><i class="mdi-navigation-close" style="padding-right:10px"></i>Cancel</b></a>                   
                  <div id="cancel-order" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:80px">
                      <h5><font color="red"><center><b>Warning!</b></center></font></h5>
                        
                        {!! Form::open(['url' => 'transaction/walkin-individual-clear-order', 'method' => 'POST']) !!}
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
                </div>
                <!--End of bottom button-->

            </div>

                <div style="color:gray; margin-top:10px; margin-left:20px" class="col s12">
                      <h6>IMPORTANT NOTE: Fields with asterisk (*) must not be left blank.</h6>
                </div>
          </div>
          <div class="divider" style="height:2px; margin-bottom:20px; margin-top:30px"></div>
          
      </div>          

    </div>
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