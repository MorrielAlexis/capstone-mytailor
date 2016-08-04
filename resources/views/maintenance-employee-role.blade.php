@extends('layouts.master')

@section('content')

  <div class="main-wrapper" style="margin-top:30px">



  <!-- Errors Messages -->
        @if ($errors->any())
           <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black"><i class="material-icons right" onclick="$('#flash_message').hide()">clear</i></span>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
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


     <!--Add Fabric Type-->
        @if(Session::has('flash_message'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow accent-1">
              <span class="alert alert-success"> <i class="material-icons right" onclick="$('#flash_message').hide()">clear</i></span>
             <em> {!! session('flash_message') !!}</em>
            </div>
          </div>
        </div>
      @endif

     <!--Edit Fabric Type-->
      @if (Session::has('flash_message_update'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel blue accent-1">
              <span class="alert alert-success"><i class="material-icons right" onclick="$('#flash_message').hide()">clear</i></span>
              <em> {!! session('flash_message_update') !!}</em>
            </div>
          </div>
        </div>
      @endif

      <!--Delete Fabric Type-->
      @if (Session::has('flash_message_delete'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel red accent-2">
              <span class="alert alert-success"><i class="material-icons right" onclick="$('#flash_message').hide()">clear</i></span>
               <em> {!! session('flash_message_delete') !!}</em>
            </div>
          </div>
        </div>
      @endif

      @if (Session::has('flash_message_duplicate'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel red accent-1">
              <span class="alert alert-success"><i class="material-icons right" onclick="$('#flash_message').hide()">clear</i></span>
              <em> {!! session('flash_message_duplicate') !!}</em>
            </div>
          </div>
        </div>
      @endif 

      {{-- End of Flash Messages --}}
      
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Maintenance -  Employee Roles</h4></span>
      </div>
    </div>

      <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50"  data-tooltip="CLick to add a new role to the table" href="#addRole" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
     </div>
  </div>



  <div class="row">
    <div class="col s12 m12 l12">
    	<div class="card-panel">
        <span class="card-title"><h5 style="color:#1b5e20"><center>List of Roles</center></h5></span>
   			<div class="divider"></div>

    		<div class="card-content">
          <div class="col s12 m12 l12 overflow-x">
         
      		<table class = "table centered data-role" border = "1">
       			<thead>
          		<tr>
             		  <th data-field="name">Role Name</th>
              	  <th data-field="address">Role Description</th>
                  <th data-field="Edit">Actions</th>
                
              </tr>
            </thead>
          
            <tbody>
              @foreach($role as $role)
              @if($role->boolIsActive == 1)
              <tr>
                <td>{{ $role->strEmpRoleName }}</td>
                <td>{{ $role->strEmpRoleDesc }}</td>
                <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of role" href="#edit{{$role->strEmpRoleID}}"><i class="mdi-editor-mode-edit"></i></a>
                <a style="color:black" class="modal-trigger btn tooltipped btn-floating red"data-position="bottom" data-delay="50" data-tooltip="Click to remove data of role from table" href="#del{{$role->strEmpRoleID}}"><i class="mdi-action-delete"></i></a>
                </td>	
                  <div id="edit{{$role->strEmpRoleID}}" class="modal modal-fixed-footer">                     
                    <h5><font color = "#1b5e20"><center>UPDATE EMPLOYEE ROLE</center> </font> </h5>
                      
                    {!! Form::open(['url' => 'maintenance/employee-role/update']) !!}
                      <div class="divider" style="height:2px"></div>
                      <div class="modal-content col s12">

                          <div class="input-field col s12">
                            <input value="{{$role->strEmpRoleID}}" id="editRoleID" name="editRoleID" type="hidden">
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                             <input required id="editRoleName" name="editRoleName" type="text" class="validate" required data-position="bottom" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?" maxlength="30" minlength="2" value="{{$role->strEmpRoleName}}">
                            <label for="role_name">Role Name<span class="red-text"><b>*</b></span> </label>
                          </div>
                      </div>
                      
                      <!-- ^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?
                      <!-- ^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$ -->
                      


                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field col s12">         
                          <input  id="editRoleDescription" name="editRoleDescription" type="text" class="validate" value="{{$role->strEmpRoleDesc}}">
                            <label for="role_description">Role Description</label>
                          </div>  
                      </div>
                      </div>

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" button type="reset" value="Reset">Cancel</a> 
                      </div>
                    {!! Form::close() !!}
                  </div>

                  <!-- //Deactivate Role -->
                  
                  <div id="del{{$role->strEmpRoleID}}" class="modal modal-fixed-footer">                     
                     <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS EMPLOYEE ROLE?</center> </font> </h5>
                        
                      {!! Form::open(['url' => 'maintenance/employee-role/destroy']) !!}
                        <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">


                          <div class="input-field col s12">
                            <input value="{{$role->strEmpRoleID}}" id="delRoleID" name="delRoleID" type="hidden">
                          </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input id="delEmpRoleName" name="delEmpRoleName" pattern="[A-Za-z\s]+" value="{{$role->strEmpRoleName}}" type="text" class="" readonly>
                            <label for="role_name">Role Name </label>
                          </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input  value="{{$role->strEmpRoleDesc}}" type="text" class=""  id="delEmpRoleDesc" name="delEmpRoleDesc" readonly>
                            <label for="role_description">Role Description </label>
                          </div>  
                    </div>

                          <div class="input-field col s12">
                            <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                            <input required id="delInactiveRole" name = "delInactiveRole" value = "{{$role->strRoleInactiveReason}}" type="text">
                          </div>

                    <!-- <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field">
                            <input id="delInactiveReason" name = "delInactiveReason" value = "{{$role->strInactiveReason}}" type="text" class="validate" required>
                            <label for="fax"> *Reason for Deactivation </label>
                          </div>
                    </div>    --> 
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
            <h5><font color = "#1b5e20"><center>CREATE EMPLOYEE ROLE</center> </font> </h5>
                
              {!! Form::open(['url' => 'maintenance/employee-role', 'method' => 'post']) !!}
                <div class="divider" style="height:2px"></div>
                <div class="modal-content col s12">

                  <div class="input-field">
                    <input value="{{$newID}}" id="strEmpRoleID" name="strEmpRoleID" type="hidden">
                  </div>
                        
              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s12">
                    <input required id="strEmpRoleName" name="strEmpRoleName" type="text" class="validate" placeholder="Sewer" required data-position="bottom" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?" maxlength="30" minlength="2">
                    <label for="addRoleName" class="validate" >Role Name <span class="red-text"><b>*</b></span></label>
                  </div>  
                  <!-- [A-Za-z]+(\s[A-Za-z]+)?
                  ^[a-zA-Z\-'`\s]{2,}$ -->
                 
              </div>

              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s12">
                    <input  id="strEmpRoleDesc" name="strEmpRoleDesc" type="text" class="validate" placeholder="In charge in manufacturing garments.">
                    <label for="addRoleName" class="active">Role Description</label>
                  </div>
              </div>
              </div>

                <div class="modal-footer col s12" style="background-color:#26a69a">
                  <button type="submit" id="send" name"send" class="modal-action  waves-effect waves-green btn-flat">Add</button>
                  <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button> 
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
  

<!--   <script>
      function clearData(){
          document.getElementById("addRoleDescription").value = "";
          document.getElementById("addRoleName").value = "";
      }
  </script>
   -->
     <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-role').DataTable();

      } );

      $('.validate').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 

      //Kapag whitespace
      $('.validateRole').blur('input', function() {
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
            $('#flash_message').hide();
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