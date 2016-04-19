@extends('layouts.master')

@section('content')


  @if (Session::has('message'))

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
                  <th data-field="Edit">Deactivate</th>
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
                    <form action="{{URL::to('editRole')}}" method="POST">
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
                    </form>
                  </div>
                  <!---/////////////////DELETE ROLE//////////////////////-->
                  <div id="del{{$role->strEmpRoleID}}" class="modal modal-fixed-footer">                     
                     <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS EMPLOYEE ROLE?</center> </font> </h5>
                      <form action="{{URL::to('delRole')}}" method="POST">
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
        
    			<div id="addRole" class="modal">
            <h5><font color = "#1b5e20"><center>ADD NEW EMPLOYEE ROLE</center> </font> </h5>
              <form action="{{URL::to('addRole')}}" method="POST" id="formAddRole" name="formAddRole">
                <div class="divider" style="height:2px"></div>
               <div class="modal-content col s12">

                  <div class="input-field">
                    <input value="{{$newID}}" id="addRoleID" name="addRoleID" type="hidden">
                  </div>
                        
              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s12">
                    <input required pattern="[A-Za-z\s]+" id="addRoleName" name="addRoleName" type="text" class="validateRole">
                    <label for="role_name">*Role Name </label>
                  </div>
              </div>

              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                  <div class="input-field col s12">
                    <input required pattern="[A-Za-z\s]+" id="addRoleDescription" name="addRoleDescription" type="text" class="validateRole">
                    <label for="role_description">*Role Description </label>
                  </div>
              </div>
              </div>

                <div class="modal-footer col s12" style="background-color:#26a69a">
                  <button type="submit" class="modal-action  waves-effect waves-green btn-flat">Add</button>
                  <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

@stop

@section('scripts')
  <script>
    $('.validateRole').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

    $('.validateRole').blur('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
      //Kapag Number
      $('.validateRole').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });  

      //Kapag whitespace
      $('.validateRole').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 

      $('.validateRoleDesc').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var re=/^[a-zA-Z\'\-\s\.\,]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateRoleDesc').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag whitespace
      $('.validateRoleDesc').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
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
  
  <script>  

    $('#formAddRole').on('submit', function(){
        $.ajax({
                  url:"{{URL::to('addRole')}}",
                  type: "POST",
                  data:{
                      roleID: $('#addRoleID').val(),
                      roleName: $('#addRoleName').val(),
                      roleDesc: $('#addRoleDescription').val()
                  },
                  success: function(data){
                    alert('Added!');
                  },
                  error:function(xhr){
                    console.log(xhr);
                  }
              });//end of ajax
    });
    
    /*$("#addRole").click(function(){
              
          });//end of click*/
  </script>

@stop