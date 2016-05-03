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
  

        <!--Add Employee-->
         @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added employee!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Edit Employee-->
      @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edited employee!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Delete Employee-->
     @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deleted employee!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Reactivate Employee-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back employee!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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

      <!--  <Data Dependency Message> -->
       @if (Input::get('success') == 'beingUsed')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Someone is still assigned to this role!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Employee Profile</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
       <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new employee to the table" href="#newemp">ADD EMPLOYEE PROFILE</button>
     </div>
    </div>
  </div>


    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    <span class="card-title"><h5 style="color:#1b5e20"><center>Employee Profile</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
            <div class="col s12 m12 l12 overflow-x">

      			<table class = "table centered data-employee" border = "1">
       				<thead>
          			<tr>
                  <th data-field="firstname">Employee Name</th>         
                  <th data-field="dtEmpBday">Date of Birth</th>
                  <th data-field="Sex">Sex</th>
                  <th data-field="address">Address</th>
                  <th data-field="Role">Role</th>
                  <th data-field="cellphone">Cellphone No.</th>
                  <th data-field="cellphone">Cellphone No. (alt)</th>
                  <th data-field="Landline">Phone No.</th>
                  <th data-field="email">Email Address</th>
                  <th data-field="Edit">Edit</th>
                  <th data-field="Delete">Deactivate</th>
              	</tr>
              </thead>
            
              <tbody>
                @foreach($employee as $employee)
                  @if($employee->boolIsActive == 1)
                <tr>
                  <td>{{ $employee->strEmpFName }} {{ $employee->strEmpMName }} {{ $employee->strEmpLName }}</td>
                  <td>{{ $employee->dtEmpBday }} </td>
                  <td>
                    @if($employee->strSex == 'M') Male
                    @else Female
                    @endif
                  </td>
                  <td>{{ $employee->strEmpHouseNo }} {{ $employee->strEmpStreet }} {{ $employee->strEmpBarangay }} {{ $employee->strEmpCity }} {{ $employee->strEmpProvince }}  {{ $employee->strEmpZipCode }} </td>
                  
                  <td>{{ $employee->strEmpRoleName}}</td>                  
                  <td>{{ $employee->strCellNo }}</td> 
                  <td>{{ $employee->strCellNoAlt }}</td> 
                  <td>{{ $employee->strPhoneNo }}</td>
                  <td>{{ $employee->strEmailAdd }}</td>
              		<td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of employee" href="#edit{{$employee->strEmployeeID}}">EDIT</button></td>
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of employee from table" href="#del{{$employee->strEmployeeID}}">DEACTIVATE</button>
                  

                   <div id="edit{{$employee->strEmployeeID}}" class="modal modal-fixed-footer">                       
                    <h5><font color = "#1b5e20"><center>EDIT EMPLOYEE'S PROFILE</center> </font> </h5>
                        
                      {!! Form::open(['url' => 'editEmployee']) !!} 
                        <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <label for="first_name">Employee ID </label>
                            <input value="{{$employee->strEmployeeID}}" id="editEmpID" name="editEmpID" type="text" class="" readonly>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s4">
                            <input required value="{{$employee->strEmpFName}}" id="editFirstName" name="editFirstName" type="text" class="validateFirst">
                            <label for="first_name">*First Name </label>
                          </div>

                          <div class="input-field col s4">
                            <input value="{{$employee->strEmpMName}}" id="editMiddleName" name="editMiddleName" type="text" class="validateMiddle">
                            <label for="middle_name">Middle Name </label>
                          </div>

                          <div class="input-field col s4">
                            <input required value="{{$employee->strEmpLName}}" id="editLastName" name="editLastName" type="text" class="validateLast">
                            <label for="LastName">*Last Name </label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="col s6">
                            <p><font size = "-1" color = "gray">*Date of Birth </font></p>
                            <input id="editdtEmpBday" required name="editdtEmpBday" type="date" value="{{date("Y-m-d", strtotime( $employee->dtEmpBday ))}}" class = "datepicker">
                          </div>  

                           <div class="input-field col s6" style="margin-top:47px">                                                    
                            <select required name='editSex'>
                              <option disabled>Sex</option>
                                  @if($employee->strSex == "M")
                                    <option selected value="{{$employee->strSex}}">Male</option>
                                    <option value="F">Female</option>
                                  @else
                                    <option value="M">Male</option>
                                    <option selected value="{{$employee->strSex}}">Female</option>
                                  @endif
                            </select>    
                            <label>Sex</label>
                          </div>  
                        </div> 


                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s3">
                            <input required value="{{$employee->strEmpHouseNo}}" id="editEmpHouseNo" name="editEmpHouseNo" type="text" class="validateHouseNo">
                            <label for="Emp House No">*House No. </label>
                          </div>

                           <div class="input-field col s3">
                            <input required value="{{$employee->strEmpStreet}}" id="editEmpStreet" name="editEmpStreet" type="text" class="validateStreet">
                            <label for="Emp Street">*Street </label>
                          </div>

                          <div class="input-field col s3">
                            <input value="{{$employee->strEmpBarangay}}" id="editEmpBarangay" name="editEmpBarangay" type="text" class="validateBarangay">
                            <label for="Emp Brgy">Barangay/Subd </label>
                          </div>

                          <div class="input-field col s3">
                            <input required value="{{$employee->strEmpCity}}" id="editEmpCity" name="editEmpCity" type="text" class="validateCity">
                            <label for="Emp City">*City/Municipality </label>
                          </div>
                        </div>


                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s6">
                            <input value="{{$employee->strEmpProvince}}" id="editEmpProvince" name="editEmpProvince" type="text" class="validateProvince">
                            <label for="Emp Province">Province </label>
                          </div>

                           <div class="input-field col s6">
                            <input value="{{$employee->strEmpZipCode}}" id="editEmpZipCode" name="editEmpZipCode" type="text" class="validateZip">
                            <label for="Emp Zip Code">Zip Code </label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">                                                    
                            <select required name='editRoles'>
                                @foreach($roles as $role)
                                    @if($employee->strRole == $role->strEmpRoleID AND $role->boolIsActive == 1)
                                      <option selected value="{{ $role->strEmpRoleID }}">{{ $role->strEmpRoleName }}</option>
                                    @elseif($role->boolIsActive == 1)
                                      <option value="{{ $role->strEmpRoleID }}">{{ $role->strEmpRoleName }}</option>
                                    @endif
                                @endforeach
                            </select>    
                            <label >Role</label>
                          </div> 
                        </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s6">
                            <input required value="{{$employee->strCellNo}}" id="editCellNo" name="editCellNo" type="text" class="validateCell" maxlength="11">
                            <label for="cellphone_number">*Cellphone Number </label>
                          </div>

                          <div class="input-field col s6">
                            <input value="{{$employee->strCellNoAlt}}" id="editCellNoAlt" name="editCellNoAlt" type="text" class="validateCellAlt" maxlength="11">
                            <label for="cellphone_number">Cellphone Number (alternate)</label>
                          </div>
                        </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field col s6">
                            <input value="{{$employee->strPhoneNo}}" id="editPhoneNo" name="editPhoneNo" type="text" class="validatePhone" maxlength="10">
                            <label for="landline_number">Landline Number </label>
                          </div>

                          <div class="input-field col s6">
                            <input  value="{{$employee->strEmailAdd}}" id="editEmail" name="editEmail"type="text" class="validateEmail">
                            <label for="email">Email Address </label>
                          </div>
                        </div>
                        </div>

                        <div class="modal-footer col s12" style="background-color:#26a69a">
                          <button type="submit" class="waves-effect waves-green btn-flat">Update</button>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                        </div>                  
                      {!! Form::close() !!}
                    </div> 

    
                    <div id="del{{$employee->strEmployeeID}}" class="modal modal-fixed-footer">                        
                      <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS EMPLOYEE?</center> </font> </h5>
                          
                          {!! Form::open(['url' => 'delEmployee']) !!}
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12">

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                            <div class="input-field">
                              <label for="first_name">Employee ID </label>
                              <input value="{{$employee->strEmployeeID}}" id="delEmpID" name="delEmpID" type="text" class="" readonly>
                            </div>
                        </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                            <div class="input-field col s4">
                              <input value="{{$employee->strEmpFName}}" id="delFirstName" name="delFirstName" type="text" class="" readonly>
                              <label for="first_name">First Name </label>
                            </div>

                            <div class="input-field col s4">
                              <input value="{{$employee->strEmpMName}}" id="delMiddleName" name="delMiddleName" type="text" class="" readonly>
                              <label for="middle_name">Middle Name </label>
                            </div>

                            <div class="input-field col s4">
                              <input value="{{$employee->strEmpLName}}" id="delLastName" name="delLastName" type="text" class="" readonly>
                              <label for="LastName">Last Name </label>
                            </div>
                        </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                            <div class="input-field col s12">       
                                <input type="text" value="{{$employee->strEmpRoleName}}" readonly>                                                                               
                            </div>
                        </div>

                          <div class="input-field">
                            <input id="delInactiveEmp" name = "delInactiveEmp" value = "{{$employee->strEmployeeID}}" type="hidden">
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
                

    			<div id="newemp" class="modal modal-fixed-footer">              
            <h5><font color = "#1b5e20"><center>ADD NEW EMPLOYEE PROFILE</center> </font> </h5>
              
              {!! Form::open(['url' => 'maintenance/employee', 'method' => 'post']) !!}
                <div class="divider" style="height:2px"></div>
                <div class="modal-content col s12">

              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s12">
                    <label for="empID">Employee ID </label>
                    <input value="{{$newID}}" id="addEmpID" name="addEmpID" type="text" class="" readonly>                      
                  </div>
              </div>

              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s4">
                      <input name="addFirstName" placeholder="Hope" id="addFirstName" type="text" class="validate" required data-position="bottom" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="30" minlength="2">
                      <label for="addFirstName" class="active">First Name<span class="red-text"><b>*</b></span></label>
                  </div>

                  <div class="input-field col s4">
                    <input name="addMiddleName" placeholder="Elizabeth" id="addMiddleName" type="text" class="validate" data-position="bottom" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
                    <label for="strMiddleName" class="active">Middle Name</label>
                  </div>

                  <div class="input-field col s4">
                    <input name="addLastName" placeholder="Soberano" id="addLastName" type="text" class="validate" required data-position="bottom" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="15" minlength="2">
                    <label for="strLastName" class="active">Last Name<span class="red-text"><b>*</b></span></label>
                  </div>
              </div>

              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="col s6">
                    <p><font size = "-1" color = "gray">Date of Birth<span class="red-text"><b>*</b></span></font></p>
                    <input id="addDtEmpBday" name="addDtEmpBday" type="date" class = "datepicker" value="January/1/1996" placeholder="January 1, 1996" >
                  </div>

                  <div class="input-field col s6" style="margin-top:47px">
                    <select value="" name='addSex' id='addSex' required>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                    </select>    
                    <label>Sex</label>
                  </div>
              </div>   

              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s3">
                    <input required id="addEmpHouseNo." pattern="[0-9a-zA-Z\-\s]+$" name="addEmpHouseNo" type="text" placeholder="1-A" class="validate">
                    <label for="Emp House No">House No.<span class="red-text"><b>*</b></span></label>
                  </div>

                   <div class="input-field col s3">
                    <input required id="addEmpStreet" pattern="^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$" name="addEmpStreet" type="text" placeholder="Malunggay"class="validate">
                    <label for="Emp Street">Street<span class="red-text"><b>*</b></span></label>
                  </div>

                  <div class="input-field col s3">
                    <input  id="addEmpBarangay" pattern="^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$" name="addEmpBarangay" type="text" placeholder="Daang Bakal" class="validate">
                    <label for="Emp Brgy">Barangay/Subd.</label>
                  </div>

                  <div class="input-field col s3">
                    <input required id="addEmpCity" pattern="^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$" name="addEmpCity" type="text" placeholder="Mandaluyong" class="validate">
                    <label for="Emp City">City/Municipality<span class="red-text"><b>*</b></span></label>
                  </div>
              </div>

              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s6">
                    <input id="addEmpProvince" pattern="^[a-zA-Z\'\-\.]+( [a-zA-Z\'\-\.]+)*$" name="addEmpProvince" type="text" placeholder="Pampanga" class="validate">
                    <label for="Emp Province">Province</label>
                  </div>

                   <div class="input-field col s6">
                    <input  id="addEmpZipCode" pattern="^[0-9]+$"name="addEmpZipCode" type="text" placeholder="1001" class="validate">
                    <label for="Emp Zip Code">Zip Code</label>
                  </div>
              </div>

              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s12">
                    <select name='addRoles' id='addRoles' required>
                      @foreach($roles as $role)
                        @if($role->boolIsActive == 1)
                          <option value="{{ $role->strEmpRoleID }}" selected>{{ $role->strEmpRoleName }}</option>
                        @endif
                      @endforeach
                    </select>   
                    <label>Role<span class="red-text"><b>*</b></span></label>
                  </div>
              </div>      
                
              <div class = "col s12" style="padding:15px;  border:3px solid white;">   
                  <div class="input-field col s6">
                    <input required id="addCellNo" pattern="^[0-9]{11,11}$" name="addCellNo" type="text" class="validate" placeholder="09361234567" maxlength="11">
                    <label for="cellphone_number">Cellphone Number <span class="red-text"><b>*</b></span></label>
                    <span id="left"></span>
                  </div>

                  <div class="input-field col s6">
                    <input id="addCellNo" pattern="^[0-9]{11,11}$" name="addCellNo" type="text" class="validate" placeholder="09361234567" maxlength="11">
                    <label for="cellphone_number">Cellphone Number (Alt)</label>
                    <span id="left"></span>
                  </div>
              </div>

              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                  <div class="input-field col s6">
                    <input id="addPhoneNo" placeholder="5351673" pattern="^[0-9]{6,15}$" name="addPhoneNo" type="text" class="validate" maxlength="15">
                    <label for="landline_number">Landline Number </label>
                  </div>

                  <div class="input-field col s6">
                    <input required id="addEmail" placeholder="capstone_email@gmail.com" name="addEmail" type="email" class="validate">
                    <label for="email" data-error="wrong" data-success="right">Email Address <span class="red-text"><b>*</b></span></label>
                  </div>
              </div>
              </div>

              <div class="modal-footer col s12" style="background-color:#26a69a">
                <button type="submit" id="send" name="send" class="modal-action waves-effect waves-green btn-flat">Add</button>
                <button type="button" onclick="clearData()" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>
              </div>
            {!! Form::close() !!}
          </div>
        
            </div>
        </div>
      </div>
     </div>
@stop


@section('scripts')

    <script>
    $( document ).ready(function() {
    
      $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
      });

      $('select').material_select();

    });
    </script>
  
    <script>
      function clearData(){
          document.getElementById("addFirstName").value = "";
          document.getElementById("addMiddleName").value = "";
          document.getElementById("addLastName").value = "";
          document.getElementById("addAddress").value = "";
          document.getElementById("addAge").value = "";
          document.getElementById("addCellNo").value = "";
          document.getElementById("addPhoneNo").value = "";
          document.getElementById("addEmail").value = "";
      }

    </script>
    <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-employee').DataTable();

      } );

      $('.validate').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 

    </script>


    <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-reactEmployee').DataTable();
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