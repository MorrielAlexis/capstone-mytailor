@extends('layouts.master')

@section('content')

  <div class="main-wrapper"  style="margin-top:30px">

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
      <span class="page-title"><h4>Customer Company</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
       <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new company to the table" href="#addCom">ADD COMPANY Customer</button>
      </div>
    </div>
  </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5 style="color:#1b5e20"><center>Customer Profile - (Company)</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

           <div class="col s12 m12 l12 overflow-x"> 

            <table class = "table centered data-custCompany" align = "center" border = "1">
              <thead>
                <tr>
                  <th data-field="name">Company Name</th>
                  <th data-field="address">Address</th>
                  <th data-field="contact">Contact Person</th>
                  <th data-field="comEmail">Company Email Address</th>
                  <th data-field="cellphone">Cellphone No.</th>
                  <th data-field="cellphone">Cellphone No. (alt)</th>
                  <th data-field="Landline">Telephone No.</th>
                  <th data-field="fax">Fax No.</th>
                  <th data-field="Edit">Edit</th>
                  <th data-field="Delete">Deactivate</th>
                </tr>
              </thead>

              <tbody>
                @foreach($company as $company)
                  @if($company->boolIsActive == 1)
                <tr>
                  <td>{{ $company->strCustCompanyName }}</td>
                  <td>{{ $company->strCustCompanyHouseNo }} {{ $company->strCustCompanyStreet }} {{ $company->strCustCompanyBarangay }} {{ $company->strCustCompanyCity }} {{ $company->strCustCompanyProvince }}  {{ $company->strCustCompanyZipCode }} </td>
                  <td>{{ $company->strCustContactPerson }} </td>
                  <td>{{ $company->strCustCompanyEmailAddress}}</td>                  
                  <td>{{ $company->strCustCompanyCPNumber }}</td> 
                  <td>{{ $company->strCustCompanyCPNumberAlt }}</td> 
                  <td>{{ $company->strCustCompanyTelNumber }}</td>                  
                  <td>{{ $company->strCustCompanyFaxNumber }}</td>        
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of customer" href="#edit{{$company->strCustCompanyID}}">EDIT</button></td>    
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove customer from table" href="#del{{$company->strCustCompanyID}}">DEACTIVATE</button></td>
                  

                    <div id="edit{{$company->strCustCompanyID}}" class="modal modal-fixed-footer">                     
                     <h5><font color = "#1b5e20"><center>EDIT COMPANY'S CUSTOMER PROFILE</center> </font> </h5>                      
                        <form action="{{URL::to('editCustCompany')}}" method="POST">
                          <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">
                        

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">                 
                          <input value="{{$company->strCustCompanyID}}" id="editComID" name="editComID" type="text" class="" readonly>
                          <label for="company_id">Company ID </label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                          <input required id="editComName" name = "editComName" value = "{{$company->strCustCompanyName}}" type="text" class="validateComName">
                          <label for="company_name">*Company Name </label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s3">
                            <input required value="{{$company->strCustCompanyHouseNo}}" id="editCustCompanyHouseNo" name="editCustCompanyHouseNo" type="text" class="validateHouseNo">
                            <label for="House No">*House No. </label>
                          </div>

                           <div class="input-field col s3">
                            <input required value="{{$company->strCustCompanyStreet }}" id="editCustCompanyStreet" name="editCustCompanyStreet" type="text" class="validateStreet">
                            <label for=" Street">*Street </label>
                          </div>

                          <div class="input-field col s3">
                            <input value="{{$company->strCustCompanyBarangay}}" id="editCustCompanyBarangay" name="editCustCompanyBarangay" type="text" class="validateBarangay">
                            <label for=" Brgy">Barangay/Subd </label>
                          </div>

                          <div class="input-field col s3">
                            <input required value="{{$company->strCustCompanyCity}}" id="editCustCompanyCity" name="editCustCompanyCity" type="text" class="validateCity">
                            <label for=" City">*City/Municipality </label>
                          </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s6">
                            <input value="{{$company->strCustCompanyProvince}}" id="editCustCompanyProvince" name="editCustCompanyProvince" type="text" class="validateProvince">
                            <label for=" Province">Province </label>
                          </div>

                           <div class="input-field col s6">
                            <input value="{{$company->strCustCompanyZipCode}}" id="editCustCompanyZipCode" name="editCustCompanyZipCode" type="text" class="validateZip">
                            <label for=" Zip Code">Zip Code </label>
                          </div>
                      </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s6">
                          <input required id="editConPerson" name = "editConPerson" value = "{{$company->strCustContactPerson}}" type="text" class="validateConPerson">
                          <label for="company_name">*Contact Person </label>
                        </div>

                        <div class="input-field col s6">
                          <input required id="editComEmailAddress" name = "editComEmailAddress" value = "{{$company->strCustCompanyEmailAddress}}" type="text" class="validateEmail">
                          <label for="com_email_address">*Company Email Address </label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s6">
                          <input required id="editCel" name = "editCel" value = "{{$company->strCustCompanyCPNumber}}" type="text" class="validateCell" maxlength="11">
                          <label for="cellphone"> *Cellphone Number </label>
                        </div>

                        <div class="input-field col s6">
                          <input id="editCelAlt" name = "editCelAlt" value = "{{$company->strCustCompanyCPNumberAlt}}" type="text" class="validateCellAlt" maxlength="11">
                          <label for="cellphone"> Cellphone Number (alternate)</label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                        <div class="input-field col s6">
                          <input id="editPhone" name = "editPhone" value = "{{$company->strCustCompanyTelNumber}}" type="text" class="validatePhone" maxlength="10">
                          <label for="tel"> Telephone Number </label>
                        </div>

                        <div class="input-field col s6">
                          <input id="editFax" name = "editFax" value = "{{$company->strCustCompanyFaxNumber}}" type="text" class="validateFax" maxlength="9" minlength="9">
                          <label for="fax"> Fax Number </label>
                        </div>
                    </div>
                        
                      </div>

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                         <button type="submit" class="waves-effect waves-green btn-flat">Update</button>  
                         <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>   
                      </div>
                    </form>
                   </div>
                    <!-- DELETE -->
                   <div id="del{{$company->strCustCompanyID}}" class="modal modal-fixed-footer">                      
                      <h5><font color="#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS CUSTOMER?</center></font></h5>                       
                        <form action="{{URL::to('delCustCompany')}}" method="POST">
                          <div class="divider" style="height:2px"></div>
                          <div class="modal-content col s12">

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <label for="first_name">Company ID </label>
                            <input value="{{$company->strCustCompanyID}}" id="delCompanyID" name="delCompanyID" type="text" class="" readonly>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <label for="first_name">Company Name </label>
                            <input value="{{$company->strCustCompanyName}}" id="delCompanyName" name="delCompanyName" type="text" class="" readonly>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s6">
                            <input value="{{$company->strCustContactPerson}}" id="delConPerson" name="delConPerson" type="text" class="" readonly>
                            <label for="LastName">Contact Person </label>
                          </div>

                            <div class="input-field col s6">
                            <input required id="delComEmailAddress" name = "delComEmailAddress" value = "{{$company->strCustCompanyEmailAddress}}" type="text" class="" readonly>
                            <label for="com_email_address">Company Email Address </label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s4">
                            <input required id="delCel" name = "delCel" value = "{{$company->strCustCompanyCPNumber}}" type="text" class="" maxlength="11"readonly>
                            <label for="cellphone"> Cellphone Number </label>
                          </div>

                          <div class="input-field col s4">
                            <input required id="delPhone" name = "delPhone" value = "{{$company->strCustCompanyTelNumber}}" type="text" class="" maxlength="10" readonly>
                            <label for="tel"> Telephone Number </label>
                          </div>

                          <div class="input-field col s4">
                            <input id="delFax" name = "delFax" value = "{{$company->strCustCompanyFaxNumber}}" type="text" class="" maxlength="9" minlength="9" readonly>
                            <label for="fax"> Fax Number </label>
                          </div>
                      </div>

                          <div class="input-field">
                            <input id="delInactiveComp" name = "delInactiveComp" value = "{{$company->strCustCompanyID}}" type="hidden">
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field col s12 wrap-text">
                            <input id="delInactiveReason" name = "delInactiveReason" value = "{{$company->strInactiveReason}}" type="text" class="validate" required>
                            <label for="fax"> *Reason for Deactivation </label>
                          </div>
                      </div>
                      </div>

                         <div class="modal-footer col s12" style="background-color:#26a69a">
                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                          </div> 
                        </form>
                      </div>                  
                </tr>
                @endif
                @endforeach    
              </tbody>
            </table>

            </div>

            <div class = "clearfix">

            </div>  
    
            <div id="addCom" class="modal modal-fixed-footer">
             <div class = "label"> <h5><font color = "#1b5e20"><center>ADD NEW COMPANY CUSTOMER PROFILE</center> </font> </h5>                      
                <form action="{{URL::to('addCustCompany')}}" method="POST">
                  <div class="divider" style="height:2px"></div>
                  <div class="modal-content col s12">

          <div class = "col s12" style="padding:15px;  border:3px solid white;">
              <div class="input-field col s12">                 
                <input value="{{$newID}}" id="addComID" name="addComID" type="text" class="" readonly>
                <label for="company_id">Company ID </label>
              </div>
          </div>

          <div class = "col s12" style="padding:15px;  border:3px solid white;">
              <div class="input-field col s12">
                <input required id="addComName" name = "addComName" type="text" class="validateComName">
                <label for="company_name"> *Company Name </label>
              </div>
          </div>

          <div class = "col s12" style="padding:15px;  border:3px solid white;">
              <div class="input-field col s3">
                  <input required id="addCustCompanyHouseNo" name="addCustCompanyHouseNo" type="text" class="validateHouseNo">
                  <label for="House No">*House No. </label>
              </div>

               <div class="input-field col s3">
                <input  required id="addCustCompanyStreet" name="addCustCompanyStreet" type="text" class="validateStreet">
                <label for=" Street">*Street </label>
              </div>

              <div class="input-field col s3">
                <input id="addCustCompanyBarangay" name="addCustCompanyBarangay" type="text" class="validateBarangay">
                <label for=" Brgy">Barangay/Subd </label>
              </div>

              <div class="input-field col s3">
                <input required="" id="addCustCompanyCity" name="addCustCompanyCity" type="text" class="validateCity">
                <label for=" City">*City/Municipality </label>
              </div>
          </div>

          <div class = "col s12" style="padding:15px;  border:3px solid white;">
              <div class="input-field col s6">
                <input id="addCustCompanyProvince" name="addCustCompanyProvince" type="text" class="validateProvince">
                <label for=" Province">Province </label>
              </div>

               <div class="input-field col s6">
                <input id="addCustCompanyZipCode" name="addCustCompanyZipCode" type="text" class="validateZip">
                <label for=" Zip Code">Zip Code </label>
              </div>
          </div>

          <div class = "col s12" style="padding:15px;  border:3px solid white;">
              <div class="input-field col s6">
                <input required id="addConPerson" name = "addConPerson" type="text" class="validateConPerson">
                <label for="company_name"> *Contact Person </label>
              </div>

              <div class="input-field col s6">
                <input required id="addComEmailAdd" name = "addComEmailAddress" type="text" class="validateEmail">
                <label for="com_email_address"> *Company Email Address </label>
              </div>
          </div>

          <div class = "col s12" style="padding:15px;  border:3px solid white;">
              <div class="input-field col s6">
                <input required id="addCel" name = "addCel" type="text" class="validateCell" maxlength="11" minlength="11">
                <label for="cellphone"> *Cellphone Number </label>
              </div>

              <div class="input-field col s6">
                <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11" minlength="11">
                <label for="cellphone"> Cellphone Number (alternate)</label>
              </div>
          </div>

          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
              <div class="input-field col s6">
                <input  id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10" minlength="10">
                <label for="tel"> Telephone Number </label>
              </div>

              <div class="input-field col s6">
                <input id="addFax" name = "addFax" type="text" class="validateFax" maxlength="9" minlength="9">
                <label for="fax"> Fax Number </label>
              </div>
          </div>

              </div>

            <div class="modal-footer col s12" style="background-color:#26a69a">
              <button type="submit" class=" waves-effect waves-green btn-flat">Add</button>  
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
          document.getElementById("addComName").value = "";
          document.getElementById("addConPerson").value = "";
          document.getElementById("addAddress").value = "";
          document.getElementById("addCel").value = "";
          document.getElementById("addPhone").value = "";
          document.getElementById("addComEmailAdd").value = "";
          document.getElementById("addFax").value = "";
      }
    </script>

      <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-custCompany').DataTable();

      setTimeout(function () {
            $('#success-message').hide();
        }, 5000);


      } );

      $(document).ready(function() {

          $('.data-reactcustCompany').DataTable();
          $('select').material_select();

      } );


      $(document).ready(function(){
      
        $('.tooltipped').tooltip({delay: 50});
      }); 
    </script>


@stop                             
    

