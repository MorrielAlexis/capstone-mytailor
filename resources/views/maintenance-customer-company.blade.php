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

      <div class="col s6 left">
       <a style="color:black; margin-right:35px; margin-left: 20px" class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new company to the table" href="#addCom"><i class="large mdi-content-add"></i></a>
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
                  <th data-field="Edit">Actions</th>
               
                </tr>
              </thead>
            

              <tbody>
                @foreach($company as $company)
                  @if($company->boolIsActive == 1)
                <tr>
                  <td>{{ $company->strCompanyName }}</td>
                  <td>{{ $company->strCompanyBuildingNo }} {{ $company->strCompanyStreet }} {{ $company->strCompanyBarangay }} {{ $company->strCompanyCity }} {{ $company->strCompanyProvince }}  {{ $company->strCompanyZipCode }} </td>
                  <td>{{ $company->strContactPerson }} </td>
                  <td>{{ $company->strCompanyEmailAddress}}</td>                  
                  <td>{{ $company->strCompanyCPNumber }}</td> 
                  <td>{{ $company->strCompanyCPNumberAlt }}</td> 
                  <td>{{ $company->strCompanyTelNumber }}</td>                  
                  <td>{{ $company->strCompanyFaxNumber }}</td>        
                  <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of role" href="#edit{{$company->strCompanyID}}"><i class="mdi-editor-mode-edit"></i></a>

                  <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove customer from table" href="#del{{$company->strCompanyID}}"><i class="mdi-action-delete"></i></a></td>
                  

                    <div id="edit{{$company->strCompanyID}}" class="modal modal-fixed-footer">                     
                     <h5><font color = "#1b5e20"><center>EDIT COMPANY'S CUSTOMER PROFILE</center> </font> </h5>                      
                        
                        {!! Form::open(['url' => 'maintenance/company/update']) !!}
                          <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">
                        

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">                 
                          <input value="{{$company->strCompanyID}}" id="editComID" name="editComID" type="text" class="" readonly>
                          <label for="company_id">Company ID </label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                          <input required id="editComName" name = "editComName" value = "{{$company->strCompanyName}}" placeholder="Company Name" type="text" class="validate" required data-position="bottom" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="30" minlength="2">
                          <label for="company_name">Company Name <span class="red-text"><b>*</b></span></label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s3">
                            <input required value="{{$company->strCompanyBuildingNo}}" id="editCustCompanyHouseNo" name="editCustCompanyHouseNo" pattern="[0-9a-zA-Z\-\s]+$" name="addEmpHouseNo" type="text" placeholder="1-A" class="validate">
                            <label for="House No">Building No. <span class="red-text"><b>*</b></span></label>
                          </div>

                           <div class="input-field col s3">
                            <input required value="{{$company->strCompanyStreet }}" id="editCustCompanyStreet" name="editCustCompanyStreet" pattern="^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$" type="text" placeholder="Malunggay"class="validate">
                            <label for=" Street">Street <span class="red-text"><b>*</b></span></label>
                          </div>

                          <div class="input-field col s3">
                            <input value="{{$company->strCompanyBarangay}}" id="editCustCompanyBarangay" name="editCustCompanyBarangay" pattern="^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$" type="text" placeholder="Daang Bakal" class="validate">
                            <label for=" Brgy">Barangay/Subd </label>
                          </div>

                          <div class="input-field col s3">
                            <input required value="{{$company->strCompanyCity}}" id="editCustCompanyCity" name="editCustCompanyCity" pattern="^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$" type="text" placeholder="Mandaluyong" class="validate">
                            <label for=" City">City/Municipality <span class="red-text"><b>*</b></span></label>
                          </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s6">
                            <input value="{{$company->strCompanyProvince}}" id="editCustCompanyProvince" name="editCustCompanyProvince" pattern="^[a-zA-Z\'\-\.]+( [a-zA-Z\'\-\.]+)*$" type="text" placeholder="Pampanga" class="validate">
                            <label for=" Province">Province </label>
                          </div>

                           <div class="input-field col s6">
                            <input value="{{$company->strCompanyZipCode}}" id="editCustCompanyZipCode" name="editCustCompanyZipCode" pattern="^[0-9]+$" type="text" placeholder="1001" class="validate">
                            <label for=" Zip Code">Zip Code </label>
                          </div>
                      </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s6">
                          <input required id="editConPerson" name = "editConPerson" value = "{{$company->strContactPerson}}" placeholder="Contact Person" type="text" class="validate" required data-position="bottom" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="30" minlength="2">
                          <label for="company_name">Contact Person <span class="red-text"><b>*</b></span></label>
                        </div>

                        <div class="input-field col s6">
                          <input required id="editComEmailAddress" name = "editComEmailAddress" value = "{{$company->strCompanyEmailAddress}}" type="email" class="validate">
                          <label for="com_email_address">Company Email Address <span class="red-text"><b>*</b></span></label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s6">
                          <input required id="editCel" name = "editCel" value = "{{$company->strCompanyCPNumber}}" pattern="^[0-9]{11,11}$" type="text" class="validate" placeholder="09361234567" maxlength="11">
                          <label for="cellphone"> Cellphone Number <span class="red-text"><b>*</b></span></label>
                        </div>

                        <div class="input-field col s6">
                          <input id="editCelAlt" name = "editCelAlt" value = "{{$company->strCompanyCPNumberAlt}}" pattern="^[0-9]{11,11}$" type="text" class="validate" placeholder="09361234567" maxlength="11">
                          <label for="cellphone"> Cellphone Number (alternate)</label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                        <div class="input-field col s6">
                          <input id="editPhone" name = "editPhone" value = "{{$company->strCompanyTelNumber}}" placeholder="5351673" pattern="^[0-9]{6,10}$" type="text" class="validate" maxlength="10">
                          <label for="tel"> Telephone Number </label>
                        </div>

                        <div class="input-field col s6">
                          <input id="editFax" name = "editFax" value = "{{$company->strCompanyFaxNumber}}" placeholder="5351673" pattern="^[0-9]{6,10}$" type="text" class="validate" maxlength="9">
                          <label for="fax"> Fax Number </label>
                        </div>
                    </div>
                        
                      </div>

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                         <button type="submit" class="waves-effect waves-green btn-flat">Update</button>  
                         <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>   
                      </div>
                    {!! Form::close() !!}
                   </div>
                   
                   <div id="del{{$company->strCompanyID}}" class="modal modal-fixed-footer">                      
                      <h5><font color="#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS CUSTOMER?</center></font></h5>                       
                        
                        {!! Form::open(['url' => 'maintenance/company/destroy']) !!}
                          <div class="divider" style="height:2px"></div>
                          <div class="modal-content col s12">

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <label for="first_name">Company ID </label>
                            <input value="{{$company->strCompanyID}}" id="delCompanyID" name="delCompanyID" type="text" class="" readonly>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <label for="first_name">Company Name </label>
                            <input value="{{$company->strCompanyName}}" id="delCompanyName" name="delCompanyName" type="text" class="" readonly>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s6">
                            <input value="{{$company->strContactPerson}}" id="delConPerson" name="delConPerson" type="text" class="" readonly>
                            <label for="LastName">Contact Person </label>
                          </div>

                            <div class="input-field col s6">
                            <input required id="delComEmailAddress" name = "delComEmailAddress" value = "{{$company->strCompanyEmailAddress}}" type="text" class="" readonly>
                            <label for="com_email_address">Company Email Address </label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s4">
                            <input required id="delCel" name = "delCel" value = "{{$company->strCompanyCPNumber}}" type="text" class="" maxlength="11"readonly>
                            <label for="cellphone"> Cellphone Number </label>
                          </div>

                          <div class="input-field col s4">
                            <input required id="delPhone" name = "delPhone" value = "{{$company->strCompanyTelNumber}}" type="text" class="" maxlength="10" readonly>
                            <label for="tel"> Telephone Number </label>
                          </div>

                          <div class="input-field col s4">
                            <input id="delFax" name = "delFax" value = "{{$company->strCompanyFaxNumber}}" type="text" class="" maxlength="9" minlength="9" readonly>
                            <label for="fax"> Fax Number </label>
                          </div>
                      </div>

                          <div class="input-field">
                            <input id="delInactiveComp" name = "delInactiveComp" value = "{{$company->strCompanyID}}" type="hidden">
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <!-- <div class="input-field col s12 wrap-text">
                            <input id="delInactiveReason" name = "delInactiveReason" value = "{{$company->strInactiveReason}}" type="text" class="validate" required>
                            <label for="fax"> Reason for Deactivation <span class="red-text"><b>*</b></span></label>
                          </div> -->
                      </div>
                      </div>

                         <div class="modal-footer col s12" style="background-color:#26a69a">
                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                          </div> 
                        {!! Form::close() !!}
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
                
                {!! Form::open(['url' => 'maintenance/company' , 'method' => 'post']) !!}
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
                <input required id="addComName" name = "addComName" placeholder="Company Name" type="text" class="validate" required data-position="bottom" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="30" minlength="2">
                <label for="company_name"> Company Name <span class="red-text"><b>*</b></span></label>
              </div>
          </div>

          <div class = "col s12" style="padding:15px;  border:3px solid white;">
              <div class="input-field col s3">
                  <input required id="addCustCompanyHouseNo" name="addCustCompanyHouseNo" pattern="[0-9a-zA-Z\-\s]+$" name="addEmpHouseNo" type="text" placeholder="1-A" class="validate">
                  <label for="House No">Building No. <span class="red-text"><b>*</b></span></label>
              </div>

               <div class="input-field col s3">
                <input  required id="addCustCompanyStreet" name="addCustCompanyStreet" pattern="^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$" type="text" placeholder="Malunggay"class="validate">
                <label for=" Street">Street <span class="red-text"><b>*</b></span></label>
              </div>

              <div class="input-field col s3">
                <input id="addCustCompanyBarangay" name="addCustCompanyBarangay" pattern="^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$" type="text" placeholder="Daang Bakal" class="validate">
                <label for=" Brgy">Barangay/Subd </label>
              </div>

              <div class="input-field col s3">
                <input required="" id="addCustCompanyCity" name="addCustCompanyCity" pattern="^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$" type="text" placeholder="Mandaluyong" class="validate">
                <label for=" City">City/Municipality <span class="red-text"><b>*</b></span></label>
              </div>
          </div>

          <div class = "col s12" style="padding:15px;  border:3px solid white;">
              <div class="input-field col s6">
                <input id="addCustCompanyProvince" name="addCustCompanyProvince" pattern="^[a-zA-Z\'\-\.]+( [a-zA-Z\'\-\.]+)*$" type="text" placeholder="Pampanga" class="validate">
                <label for=" Province">Province </label>
              </div>

               <div class="input-field col s6">
                <input id="addCustCompanyZipCode" name="addCustCompanyZipCode" pattern="^[0-9]+$" type="text" placeholder="1001" class="validate">
                <label for=" Zip Code">Zip Code </label>
              </div>
          </div>

          <div class = "col s12" style="padding:15px;  border:3px solid white;">
              <div class="input-field col s6">
                <input required id="addConPerson" name = "addConPerson" placeholder="Contact Person" type="text" class="validate" required data-position="bottom" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="30" minlength="2">
                <label for="company_name"> Contact Person <span class="red-text"><b>*</b></span></label>
              </div>

              <div class="input-field col s6">
                <input required id="addComEmailAdd" name = "addComEmailAddress" type="email" class="validate">
                <label for="com_email_address"> Company Email Address <span class="red-text"><b>*</b></span></label>
              </div>
          </div>

          <div class = "col s12" style="padding:15px;  border:3px solid white;">
              <div class="input-field col s6">
                <input required id="addCel" name = "addCel" pattern="^[0-9]{11,11}$" type="text" class="validate" placeholder="09361234567" maxlength="11">
                <label for="cellphone"> Cellphone Number <span class="red-text"><b>*</b></span></label>
              </div>

              <div class="input-field col s6">
                <input id="addCelAlt" name = "addCelAlt" pattern="^[0-9]{11,11}$" type="text" class="validate" placeholder="09361234567" maxlength="11">
                <label for="cellphone"> Cellphone Number (alternate)</label>
              </div>
          </div>

          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
              <div class="input-field col s6">
                <input  id="addPhone" name = "addPhone" placeholder="5351673" pattern="^[0-9]{6,10}$" type="text" class="validate" maxlength="10">
                <label for="tel"> Telephone Number </label>
              </div>

              <div class="input-field col s6">
                <input id="addFax" name = "addFax" placeholder="5351673" pattern="^[0-9]{6,10}$" type="text" class="validate" maxlength="9" minlength="9">
                <label for="fax"> Fax Number </label>
              </div>
          </div>

              </div>

            <div class="modal-footer col s12" style="background-color:#26a69a">
              <button type="submit" class=" waves-effect waves-green btn-flat">Add</button>  
              <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>
            </div>
            {!! Form::close() !!}
          </div> 
          </div>      
        </div>
       </div>  
    </div> 


@stop

@section('scripts') 
    {!! Html::script('js/customer_validation.js'); !!}


   <!--  <script>
      function clearData(){
          document.getElementById("addComName").value = "";
          document.getElementById("addConPerson").value = "";
          document.getElementById("addAddress").value = "";
          document.getElementById("addCel").value = "";
          document.getElementById("addPhone").value = "";
          document.getElementById("addComEmailAdd").value = "";
          document.getElementById("addFax").value = "";
      }
    </script> -->

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
    

