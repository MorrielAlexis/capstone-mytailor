@extends('layouts.master')

@section('content')

  <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div>

  @if (count($errors) > 0)
    <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">
                @foreach ($errors->all() as $error)
                  {{ $error }}
                @endforeach
                <i class="material-icons right" onclick="$('#success-message').hide()">clear</i>
              </span>
            </div>
          </div>
        </div>
  @endif

  <div class="main-wrapper" style="margin-top:30px">
        <!--Add Employee Role-->
         @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added employee role!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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


      <!--Edit Employee Role-->
      @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edited employee role!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

      <!--Delete Employee Role-->
      @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deactivated employee role!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Reactivate Employee Role-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back employee role!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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
        <span class="page-title"><h4>Employee Roles</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
       <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="CLick to add a new role to the table" href="#addRole">ADD EMPLOYEE ROLE</button>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col s12 m12 l12">
    	<div class="card-panel">
        <span class="card-title"><h5 style="color:#1b5e20"><center>Roles</center></h5></span>
   			<div class="divider"></div>

    		<div class="card-content">
          <div class="col s12 m12 l12 overflow-x">
         
      		<table class = "table centered data-role" border = "1">
       			<thead>
          		<tr>
             		  <th data-field="name">Role Name</th>
              	  <th data-field="address">Role Description</th>
                  <th data-field="Edit">Edit</th>
                  <th data-field="Delete">Deactivate</th>
              </tr>
            </thead>
          
            <tbody>
              @foreach($role as $role)
              @if($role->boolIsActive == 1)
              <tr>
                <td>{{ $role->strEmpRoleName }}</td>
                <td>{{ $role->strEmpRoleDesc }}</td>
                <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of role" href="#edit{{$role->strEmpRoleID}}">EDIT</button></td>
                <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of role from table" href="#del{{$role->strEmpRoleID}}">DEACTIVATE</button>
                </td>	
                  <div id="edit{{$role->strEmpRoleID}}" class="modal modal-fixed-footer">                     
                    <h5><font color = "#1b5e20"><center>EDIT EMPLOYEE ROLE</center> </font> </h5>
                      
                    {!! Form::open(['url' => 'editRole']) !!}
                      <div class="divider" style="height:2px"></div>
                      <div class="modal-content col s12">

                          <div class="input-field col s12">
                            <input value="{{$role->strEmpRoleID}}" id="editRoleID" name="editRoleID" type="hidden">
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input required pattern="[A-Za-z\s]+" value="{{$role->strEmpRoleName}}" id="editRoleName" name="editRoleName" type="text" class="validateRole">
                            <label for="role_name">*Role Name </label>
                          </div>
                      </div>


                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field col s12">
                            <input required value="{{$role->strEmpRoleDesc}}" id="editRoleDescription" name="editRoleDescription" type="text" class="validateRole">
                            <label for="role_description">*Role Description </label>
                          </div>  
                      </div>
                      </div>

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                      </div>
                    {!! Form::close() !!}
                  </div>
                  
                  <div id="del{{$role->strEmpRoleID}}" class="modal modal-fixed-footer">                     
                     <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS EMPLOYEE ROLE?</center> </font> </h5>
                        
                      {!! Form::open(['url' => 'delRole']) !!}
                        <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">


                          <div class="input-field col s12">
                            <input value="{{$role->strEmpRoleID}}" id="delRoleID" name="delRoleID" type="hidden">
                          </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input pattern="[A-Za-z\s]+" value="{{$role->strEmpRoleName}}" type="text" class="" readonly>
                            <label for="role_name">Role Name </label>
                          </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input  value="{{$role->strEmpRoleDesc}}" type="text" class="" readonly>
                            <label for="role_description">Role Description </label>
                          </div>  
                    </div>

                          <div class="input-field">
                            <input id="delInactiveRole" name = "delInactiveRole" value = "{{$role->strEmpRoleID}}" type="hidden">
                          </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field">
                            <input id="delInactiveReason" name = "delInactiveReason" value = "{{$role->strInactiveReason}}" type="text" class="validate" required>
                            <label for="fax"> *Reason for Deactivation </label>
                          </div>
                    </div>    
                      </div>

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
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
        
    			<div id="addRole" class="modal">
            <h5><font color = "#1b5e20"><center>ADD NEW EMPLOYEE ROLE</center> </font> </h5>
                
              {!! Form::open(['url' => 'maintenance/employeeRole', 'method' => 'post']) !!}
                <div class="divider" style="height:2px"></div>
                <div class="modal-content col s12">

                  <div class="input-field">
                    <input value="{{$newID}}" id="addRoleID" name="addRoleID" type="hidden">
                  </div>
                        
              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s12">
                    <input required id="addRoleName" name="addRoleName" type="text" class="validate" placeholder="Sewer" required data-position="bottom" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="30" minlength="2">
                    <label for="addRoleName" class="active">Role Name <span class="red-text"><b>*</b></span></label>
                  </div>
              </div>

              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s12">
                    <input required id="addRoleDescription" name="addRoleDescription" type="text" class="validate" placeholder="In charge in manufacturing garments." required data-position="bottom" pattern="^[a-zA-Z\-'`\s]{2,}$">
                    <label for="addRoleDescription" class="active">Role Name <span class="red-text"><b>*</b></span></label>
                  </div>
              </div>
              </div>

                <div class="modal-footer col s12" style="background-color:#26a69a">
                  <button type="submit" id="send" name"send" class="modal-action  waves-effect waves-green btn-flat">Add</button>
                  <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>


@stop

@section('scripts')
  <script>
    $(document).ready(function() {
    
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
          document.getElementById("addRoleDescription").value = "";
          document.getElementById("addRoleName").value = "";
      }
    </script>
     <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-role').DataTable();

      } );

      $('.validate').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 

    </script>


       <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          // $('.data-role').DataTable();
          $('.data-reactRole').DataTable();
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