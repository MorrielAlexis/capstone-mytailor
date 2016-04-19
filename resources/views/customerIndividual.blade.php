@extends('layouts.master')

@section('content')

    <div class="main-wrapper" style="margin-top:30px">
      <!--Input Validation-->
      @if (Input::get('input') == 'invalid')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Invalid input!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

      <!--Add Customer-->
      @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added customer!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

      <!--Edit Customer-->
      @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edited customer!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

      <!--Delete Customer-->
      @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deactivated customer!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

      <!--Reactivate Customer-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back customer!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

      <!--  <Duplicate Error Message>   -->
      @if (Input::get('success') == 'duplicate')
          <div class="row" id="success-message">
            <div class="col s12 m12 l12">
              <div class="card-panel red">
                <span class="black-text" style="color:black">Record already exists!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
              </div>
            </div>
          </div>
        @endif


      <div class="row">
        <div class="col s12 m12 l12">
          <span class="page-title"><h4>Customer Individual</h4></span>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l12">
          <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text  light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new customer to the table" href="#addCusIndi">ADD INDIVIDUAL CUSTOMER</button>
        </div>      
      </div>
    </div>    

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5 style="color:#1b5e20"><center>Customer Profile - (Individual)</center></h5></span>
          <div class="divider"></div>


          <div class="card-content">

            <div class="col s12 m12 l12 overflow-x">
    
              <table class = "table centered data-custInd" align = "center" border = "1">
                <thead>
                  <tr>
                    <th data-field="fname">Customer Name</th>
                    <th data-field="address">Address</th>
                    <th data-field="email">Email Address</th>
                    <th data-field="cellphone">Cellphone No.</th>
                    <th data-field="cellphone">Cellphone No. (alt) </th>
                    <th data-field="Landline">Telephone No.</th>
                    <th data-field="Edit">Edit</th>
                    <th data-field="Delete">Deactivate</th>

                  </tr>
                </thead>

                <tbody>           
                    @foreach($individual as $individual)
                    @if($individual->boolIsActive == 1)
                  <tr>
                    <td>{{ $individual->strCustPrivFName }} {{ $individual->strCustPrivMName }} {{ $individual->strCustPrivLName }}</td>
                    <td>{{ $individual->strCustPrivHouseNo }} {{ $individual->strCustPrivStreet }} {{ $individual->strCustPrivBarangay }} {{ $individual->strCustPrivCity }} {{ $individual->strCustPrivProvince }}  {{ $individual->strCustPrivZipCode }} </td>
                    <td>{{ $individual->strCustPrivEmailAddress}}</td>                  
                    <td>{{ $individual->strCustPrivCPNumber }}</td> 
                    <td>{{ $individual->strCustPrivCPNumberAlt }}</td> 
                    <td>{{ $individual->strCustPrivLandlineNumber }}</td>
                    <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-2" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of customer" href="#edit{{$individual->strCustPrivIndivID}}">EDIT</button></td>      
                    <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-2" data-position="bottom" data-delay="50" data-tooltip="Click to remove customer from table" href="#del{{$individual->strCustPrivIndivID}}">DEACTIVATE</button></td>


                    <div id="edit{{$individual->strCustPrivIndivID}}" class="modal modal-fixed-footer">                     
                      <h5><font color = "#1b5e20"><center>EDIT INDIVIDUAL'S CUSTOMER PROFILE</center> </font> </h5>
                        <form action="{{URL::to('editCustPrivIndiv')}}" method="POST">
                            <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">


                               <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">                 
                                    <input value="{{$individual->strCustPrivIndivID}}" id="editIndiID" name="editIndiID" type="text" class="" readonly>
                                    <label for="indi_id">Individual ID </label>
                                  </div>
                                </div>


                                <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s4">
                                    <input required id="editFName" name = "editFName" value = "{{$individual->strCustPrivFName}}" type="text" class="validateFirst">
                                    <label for="first_name"> *First Name </label>
                                  </div>

                                  <div class="input-field col s4">
                                    <input  id="editMName" name = "editMName" value = "{{$individual->strCustPrivMName}}" type="text" class="validateMiddle">
                                    <label for="middle_name"> Middle Name </label>
                                  </div>

                                  <div class="input-field col s4">
                                    <input required id="editLName" name = "editLName" value = "{{$individual->strCustPrivLName}}" type="text" class="validateLast">
                                    <label for="last_name"> *Last Name </label>
                                  </div>
                                </div>

                                <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s3">
                                    <input required value="{{$individual->strCustPrivHouseNo}}" id="editCustPrivHouseNo" name="editCustPrivHouseNo" type="text" class="validateHouseNo">
                                    <label for="House No">*House No. </label>
                                  </div>

                                  <div class="input-field col s3">
                                    <input required value="{{$individual->strCustPrivStreet }}" id="editCustPrivStreet" name="editCustPrivStreet" type="text" class="validateStreet">
                                    <label for=" Street">*Street </label>
                                  </div>

                                  <div class="input-field col s3">
                                    <input value="{{$individual->strCustPrivBarangay}}" id="editCustPrivBarangay" name="editCustPrivBarangay" type="text" class="validateBarangay">
                                    <label for=" Brgy">Barangay </label>
                                  </div>

                                  <div class="input-field col s3">
                                    <input required value="{{$individual->strCustPrivCity}}" id="editCustPrivCity" name="editCustPrivCity" type="text" class="validateCity">
                                    <label for=" City">*City/Municipality </label>
                                  </div>
                                </div>

                                <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s6">
                                    <input value="{{$individual->strCustPrivProvince}}" id="editCustPrivProvince" name="editCustPrivProvince" type="text" class="validateProvince">
                                    <label for=" Province">Province </label>
                                  </div>

                                  <div class="input-field col s6">
                                    <input value="{{$individual->strCustPrivZipCode}}" id="editCustPrivZipCode" name="editCustPrivZipCode" type="text" class="validateZip">
                                    <label for=" Zip Code">Zip Code </label>
                                  </div>
                                </div>

                                <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <input id="editEmail" name = "editEmail" value = "{{$individual->strCustPrivEmailAddress}}" type="text" class="validateEmail">
                                    <label for="email"> *Email Address </label>
                                  </div>
                                </div>

                                <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s6">
                                    <input required id="editCel" name = "editCel" value = "{{$individual->strCustPrivCPNumber}}" type="text" class="validateCell" maxlength="11">
                                    <label for="cellphone"> *Cellphone Number </label>
                                  </div>
                      
                                  <div class="input-field col s6">
                                    <input id="editCelAlt" name = "editCelAlt" value = "{{$individual->strCustPrivCPNumberAlt}}" type="text" class="validateCellAlt" maxlength="11">
                                    <label for="cellphone"> *Cellphone Number (alternate)</label>
                                  </div>
                                </div>

                                <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                  <div class="input-field col s12">
                                    <input id="editPhone" name = "editPhone" value = "{{$individual->strCustPrivLandlineNumber}}" type="text" class="validatePhone" maxlength="10">
                                    <label for="tel"> Telephone Number </label>
                                  </div>
                                </div>
                    </div>

                    <div class="modal-footer col s12" style="background-color:#26a69a">
                        <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Update</button> 
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>    
                    </div>
                    </form>
                  </div>

                    <div id="del{{$individual->strCustPrivIndivID}}" class="modal modal-fixed-footer">                     
                        <h5><font color:"#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS CUSTOMER?</center> </font> </h5>                        
                         <form action="{{URL::to('delCustPrivIndiv')}}" method="POST">
                           <div class="divider" style="height:2px"></div>
                          <div class="modal-content col s12">

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <label for="first_name">Individual ID </label>
                            <input value="{{$individual->strCustPrivIndivID}}" id="delIndivID" name="delIndivID" type="text" readonly>
                          </div>
                        </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s4">
                            <label for="first_name">First Name </label>
                            <input value="{{$individual->strCustPrivFName}}" id="delIndivFName" name="delIndivFName" type="text" readonly>
                          </div>

                           <div class="input-field col s4">
                            <label for="middle_name">Middle Name </label>
                            <input value="{{$individual->strCustPrivMName}}" id="delIndivMName" name="delIndivMName" type="text" readonly>
                          </div>

                          <div class="input-field col s4">
                            <input value="{{$individual->strCustPrivLName}}" id="delIndivLName" name="delIndivLName" type="text" readonly>
                            <label for="LastName">Last Name </label>
                          </div>
                        </div>

                          <div class="input-field col s12">
                            <input id="delInactiveIndiv" name = "delInactiveIndiv" value = "{{$individual->strCustPrivIndivID}}" type="hidden">
                          </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field col s12">
                            <input id="delInactiveReason" name = "delInactiveReason" value = "{{$individual->strInactiveReason}}" type="text" class="validate" required>
                            <label for="fax"> *Reason for Deactivation </label>
                          </div>
                        </div>
                        </div>

                          <div class="modal-footer col s12" style="background-color:#26a69a">
                            <button type="submit" style="color:black" class="modal-action waves-effect waves-green btn-flat">OK</button>
                            <a href="#!" style="color:black" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                          </div> 
                        </form>
                    </div>
                 </td> 
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>

            </div>

            <div class = "clearfix">

            </div>
             

            <div id="addCusIndi" class="modal modal-fixed-footer">
              <div class = "label"><h5><font color = "#1b5e20"><center>ADD NEW INDIVIDUAL CUSTOMER PROFILE </center> </font> </h5>
                <form action="{{URL::to('addCustPrivIndiv')}}" method="POST">
                  <div class="divider" style="height:2px"></div>
                  <div class="modal-content col s12">

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">                 
                          <input value = "{{$newID}}" id="addIndiID" name="addIndiID" type="text" class="" readonly>
                          <label for="indi_id">Individual ID </label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s4">
                          <input required id="addFName" name = "addFName" type="text" class="validateFirst">
                          <label for="first_name" > *First Name </label>
                        </div>

                        <div class="input-field col s4">
                          <input id="addMName" name = "addMName" type="text" class="validateMiddle">
                          <label for="middle_name"> Middle Name </label>
                        </div>

                        <div class="input-field col s4">
                          <input required id="addLName" name = "addLName" type="text" class="validateLast">
                          <label for="last_name"> *Last Name </label>
                        </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s3">
                            <input required id="addCustPrivHouseNo" name="addCustPrivHouseNo" type="text" class="validateHouseNo">
                            <label for="House No">*House No. </label>
                          </div>

                           <div class="input-field col s3">
                            <input required id="addCustPrivStreet" name="addCustPrivStreet" type="text" class="validateStreet">
                            <label for=" Street">*Street </label>
                          </div>

                          <div class="input-field col s3">
                            <input  id="addCustPrivBarangay" name="addCustPrivBarangay" type="text" class="validateBarangay">
                            <label for=" Brgy">Barangay/Subd </label>
                          </div>

                          <div class="input-field col s3">
                            <input required id="addCustPrivCity" name="addCustPrivCity" type="text" class="validateCity">
                            <label for=" City">*City/Municipality </label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s6">
                            <input id="addCustPrivProvince" name="addCustPrivProvince" type="text" class="validateProvince">
                            <label for=" Province">Province/Region </label>
                          </div>

                           <div class="input-field col s6">
                            <input id="addCustPrivZipCode" name="addCustPrivZipCode" type="text" class="validateZip">
                            <label for=" Zip Code">Zip Code </label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input required id="addEmail" name = "addEmail" type="text" class="validateEmail">
                            <label for="email"> *Email Address </label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s6">
                            <input required id="addCel" name = "addCel" type="text" class="validateCell" maxlength="11">
                            <label for="cellphone"> *Cellphone Number </label>
                          </div>

                          <div class="input-field col s6">
                            <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11">
                            <label for="cellphone"> Cellphone Number (alternate)</label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field col s12">
                            <input id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10">
                            <label for="tel"> Telephone Number </label>
                          </div>
                      </div>
                </div>

              <div class="modal-footer col s12" style="background-color:#26a69a">
                <button type="submit" class="waves-effect waves-green btn-flat">Save</button> 
                <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>  
              </div>
            </form>
            </div>
          </div>            
        </div>
      </div> 
    </div> 
    @stop

@section('scripts')
    {{ HTML::script('js/customer_validation.js') }}

    <script>
      function clearData(){
          document.getElementById("addFName").value = "";
          document.getElementById("addMName").value = "";
          document.getElementById("addLName").value = "";
          document.getElementById("addAddress").value = "";
          document.getElementById("addEmail").value = "";
          document.getElementById("addCel").value = "";
          document.getElementById("addPhone").value = "";
          
      }

    </script>

          <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-custInd').DataTable();
           $('select').material_select();

        setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );

    </script>

      <!--TOOLTIP SCRIPT-->
    <script type="text/javascript">
         $(document).ready(function(){
           $('.tooltipped').tooltip({delay: 50});
          }); 
    </script>
@stop