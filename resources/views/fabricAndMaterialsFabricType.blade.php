@extends('layouts.master')

@section('content')
  <div class="main-wrapper" style="margin-top:30px">  <!-- Main Wrapper  -->   
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
  

      <!--Add Fabric Type-->
         @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added fabric type!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Edit Fabric Type-->
      @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edited fabric type!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Delete Fabric Type-->
      @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deactivated fabric type!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Reactivate Fabric Type-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back fabric type!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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
        <span class="page-title"><h4>Fabric Type</h4></span>
      </div> 
    </div>

    <div class="row">
      <div class="col s12 m12 l12">

          <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="CLick to add a new fabric type to the table" href="#addFabricType">ADD FABRIC TYPE</button>
      </div>
    </div>
  </div> <!-- End of Main Wrapper  --> 



  <div class="row"> <!-- row -->

    	<div class="col s12 m12 l12">  <!-- col s12 m12 l12 -->

    		<div class="card-panel">  <!-- card-panel -->
   		    <span class="card-title"><h5 style="color:#1b5e20"><center>Fabric Type</center></h5></span>
   				<div class="divider"> </div>
            <div class="card-content"><!-- card-content  --> 

              <div class="col s12 m12 l12 overflow-x">

       				<table class = "table centered data-fabricType" align = "center" border = "1">
                <thead>
                  <tr>
              		  <!--<th data-field="fabricID">Fabric Type ID</th>-->
                    <th data-field="fabricName">Fabric Type Name</th>
              		  <th data-field="fabricDescription">Fabric Description</th>
                    <th data-field="Edit">Edit</th>
                    <th data-field="Delete">Deactivate</th>

              	  </tr>
                </thead>

                <tbody>
                   @foreach($fabricType as $fabricType)
                   @if($fabricType->boolIsActive == 1)
                  <tr>
              		  <!--<td>{{ $fabricType->strFabricTypeID }}</td>-->
              		  <td>{{ $fabricType->strFabricTypeName }}</td>
              		  <td>{{ $fabricType->strFabricTypeDesc}}</td>
              		  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of fabric type" href="#edit{{$fabricType->strFabricTypeID}}">EDIT</button></td>
                    <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of fabric type from the table" href="#del{{$fabricType->strFabricTypeID}}">DEACTIVATE</button></td>
              	
                    <div id="edit{{ $fabricType->strFabricTypeID }}" class="modal modal-fixed-footer"> <!-- editFabricType  --> 
                      <h5><font color = "#1b5e20"><center>EDIT FABRIC TYPE</center> </font> </h5>
                      <form action="{{URL::to('editFabricType')}}" method="POST">
                        <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">
                        
                        <div class="input-field">
                          <input value = "{{ $fabricType->strFabricTypeID }}" id="editFabricTypeID" name = "editFabricTypeID" type="hidden">
                        </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                          <input required value = "{{ $fabricType->strFabricTypeName }}" id="editFabricTypeName" name = "editFabricTypeName" type="text" class="validateTypeName">
                          <label for="fabrictype_name">*Fabric Type Name </label>
                        </div>
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                        <div class="input-field col s12">
                          <input required value = "{{ $fabricType->strFabricTypeDesc }}" id="editFabricTypeDesc" name = "editFabricTypeDesc" type="text" class="validateTypeDesc">
                          <label for="fabrictype_description">*Fabric Desription </label>
                        </div>  
                  </div>
                  </div>

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                      </div>
                      </form>
                    </div> <!-- editFabricType  -->    
                  

              <!--**********DELETE***********-->
              <div id="del{{ $fabricType->strFabricTypeID }}" class="modal modal-fixed-footer">                     
                <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS FABRIC TYPE?</center> </font> </h5>                       
                  <form action="{{URL::to('delFabricType')}}" method="POST">
                    <div class="divider" style="height:2px"></div>
                    <div class="modal-content col s12">
                      
                          <div class="input-field">
                            <input value="{{$fabricType->strFabricTypeID}}" id="delFabricID" name="delFabricID" type="hidden">
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <label for="first_name">Fabric Type Name </label>
                            <input value="{{$fabricType->strFabricTypeName}}" id="delFabricName" name="delFabricName" type="text" readonly>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <label for="middle_name">Fabric Desription </label>
                            <input value="{{$fabricType->strFabricTypeDesc}}" id="delFabricDesc" name="delFabricDesc" type="text" readonly>
                          </div>
                      </div>

                          <div>
                            <input value="{{$fabricType->strFabricTypeID}}" id="delInactiveFabricType" name="delInactiveFabricType" type="hidden">
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                           <div class="input-field col s12">
                            <label for="middle_name">*Reason for Deactivation </label>
                            <input value="{{$fabricType->strInactiveReason}}" id="delInactiveReason" name="delInactiveReason" type="text" required>
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

            <!--********ADD******-->
              <div id="addFabricType" class="modal modal-fixed-footer"> <!-- addFabricType  -->                 
                <h5><font color = "#1b5e20"><center>ADD NEW FABRIC TYPE</center> </font> </h5> 
                <form action="{{URL::to('addFabricType')}}" method="POST">
                <div class="divider" style="height:2px"></div>
                <div class="modal-content col s12">
                          

                  <div class="input-field">
                    <input value = "{{$newID}}" id="addFabricTypeID" name = "addFabricTypeID" type="hidden">
                  </div>

              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s12">
                    <input required id="addFabricTypeName" name = "addFabricTypeName" type="text" class="validateTypeName">
                    <label for="fabrictype_name">*Fabric Name </label>
                  </div>
              </div>

              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                  <div class="input-field col s12">
                    <input required id="addFabricTypeDesc" name = "addFabricTypeDesc" type="text" class="validateTypeDesc">
                    <label for="fabrictype_description">*Fabric Desription </label>
                  </div>
              </div>
              </div>

                  <div class="modal-footer col s12" style="background-color:#26a69a">
                    <button type="submit" id="addFabType" class=" modal-action  waves-effect waves-green btn-flat">Add</button>
                    <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button> 
                  </div>
                </form>
    	       </div><!-- addFabricType  -->
            </div> <!-- card-content  --> 
        </div>  <!-- card-panel -->
      </div> <!-- col s12 m12 l12 --> 
  </div> 
      <!-- row --> 



@stop

@section('scripts')
    <script>
      function clearData(){
          document.getElementById('addFabricTypeDesc').value = "";
          document.getElementById('addFabricTypeName').value = "";

      }
    </script>

    <script type="text/javascript">
      $('.validateTypeName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateTypeName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });  

      //Kapag whitespace
      $('.validateTypeName').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      });      

      $('.validateTypeName').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateTypeDesc').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_desc=re.test(input.val());
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag whitespace
      $('.validateTypeDesc').blur('input', function() {
        var desc = $(this).val();
        $(this).val(desc.trim());
      }); 

      $('.validateTypeDesc').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_desc=re.test(input.val());
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
      </script>
        <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-fabricType').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );
    </script>

@stop