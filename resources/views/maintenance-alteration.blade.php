@extends('layouts.master')

@section('content')
  <div class="main-wrapper" style="margin-top:30px">  <!-- Main Wrapper  -->   
      <!--Input Validation-->
      

    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Alterations</h4></span>
      </div> 
    </div>

      <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50"  data-tooltip="CLick to add a new role to the table" href="#addFabricType" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
      </div>
    </div>
   <!-- End of Main Wrapper  --> 



  <div class="row"> <!-- row -->

    	<div class="col s12 m12 l12">  <!-- col s12 m12 l12 -->

    		<div class="card-panel">  <!-- card-panel -->
   		    <span class="card-title"><h5 style="color:#1b5e20"><center>Alteration</center></h5></span>
   				<div class="divider"> </div>
            <div class="card-content"><!-- card-content  --> 

              <div class="col s12 m12 l12 overflow-x">

       				<table class = "table centered data-alterationName" align = "center" border = "1">
                <thead>
                  <tr>
              		  <!--<th data-field="fabricID">Fabric Type ID</th>-->
                    <th data-field="alterationName">Name</th>
              		  <th data-field="alterationDescription">Description</th>
                    <th data-field="alterationPrice">Price</th>
                    <th data-field="Edit">Actions</th>
                    

              	  </tr>
                </thead>
              
                <tbody>
                  @foreach($alteration as $alteration)
                    @if($alteration->boolIsActive == 1)
                  <tr>
              		 
                    <td>{{$alteration->strAlterationName}}</td>
              		  <td>{{$alteration->txtAlterationDesc}}</td>
                    <td>{{$alteration->strAlterationPrice}}</td>
              		  <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of alteration name" href="#editAlterationName"><i class="mdi-editor-mode-edit"></i></a>
                    <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of alteration name from the table" href="#delAlterationName"><i class="mdi-action-delete"></i></a></td>
              	
                    <div id="editAlterationName" class="modal modal-fixed-footer"> <!-- editFabricType  --> 
                      <h5><font color = "#1b5e20"><center>EDIT FABRIC TYPE</center> </font> </h5>
                        
                      <div class="divider" style="height:2px"></div>
                      <div class="modal-content col s12">
                        
                        <div class="input-field">
                          <input value = "editAlterationNameID" id="editAlterationNameID" name = "editAlterationNameID" type="hidden">
                        </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input required value = "editAlterationName" id="editAlterationName" name = "editAlterationName" type="text" class="validateName">
                            <label for="alteration_name">Alteration Name <span class="red-text"><b>*</b></span> </label>
                          </div>
                        </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input required value = "editAlterationDesc" id="editAlterationDesc" name = "editAlterationDesc" type="text" class="validateDesc">
                            <label for="alteration_description">Alteration Desription <span class="red-text"><b>*</b></span> </label>
                          </div>  
                        </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field col s12">
                            <input required value = "editAlterationPrice" id="editAlterationPrice" name = "editAlterationPrice" type="text" class="validate">
                            <label for="alteration_price">Alteration Price <span class="red-text"><b>*</b></span> </label>
                          </div>  
                        </div>

                      </div>

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                      </div>
                     
                    </div> <!-- editFabricType  -->    
                  

              <!--**********DELETE***********-->
                    <div id="delAlterationName" class="modal modal-fixed-footer">                     
                      <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS ALTERATION NAME?</center> </font> </h5>                       
                          
                        
                      <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">
                            
                          <div class="input-field">
                            <input value="delAlterationNameID" id="delAlterationNameID" name="delAlterationNameID" type="hidden">
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <label for="alteration_name">Alteration Name </label>
                                <input value="delAlterationName" id="delAlterationName" name="delAlterationName" type="text" readonly>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <label for="alteration_desc">Alteration Desription </label>
                                <input value="delAlterationDesc" id="delAlterationDesc" name="delAlterationDesc" type="text" readonly>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <label for="alteration_price">Alteration Price</label>
                                <input value="delAlterationPrice" id="delAlterationPrice" name="delAlterationPrice" type="text" readonly>
                              </div>
                          </div>

                          <div>
                            <input value="delInactiveAlterationName" id="delInactiveAlterationName" name="delInactiveAlterationName" type="hidden">
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                 
                          </div>
                        </div>

                        <div class="modal-footer col s12" style="background-color:#26a69a">
                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                        </div> 
                              
                      </div>
                    </tr>
                </tbody>
              </table>
              </div>

              <div class = "clearfix">

              </div>  

            <!--********ADD******-->
            <div id="addFabricType" class="modal modal-fixed-footer">                  
              <h5><font color = "#1b5e20"><center>ADD NEW ALTERATION NAME</center> </font> </h5> 
              
             
              <div class="divider" style="height:2px"></div>
                <div class="modal-content col s12">
                          

                  <div class="input-field">
                    <input value = "addAlterationNameID" id="addAlterationNameID" name = "addAlterationNameID" type="hidden">
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input required id="addAlterationName" name = "addAlterationName" type="text" class="validate" pattern="[0-9a-zA-Z\-\s]+$">
                        <label for="alteration_name">Alteration Name <span class="red-text"><b>*</b></span></label>
                      </div>
                  </div>    

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input required id="addAlterationDesc" name = "addAlterationDesc" type="text" class="validateDesc">
                        <label for="alteration_description">Alteration Description <span class="red-text"><b>*</b></span></label>
                      </div>
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                      <div class="input-field col s12">
                        <input required id="addAlterationPrice" name = "addAlterationPrice" type="text" class="validate">
                        <label for="alteration_Price">Alteration Price <span class="red-text"><b>*</b></span></label>
                      </div>
                  </div>
                </div>

                <div class="modal-footer col s12" style="background-color:#26a69a">
                  <button type="submit" id="addFabType" class=" modal-action  waves-effect waves-green btn-flat">Add</button>
                  <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button> 
                </div>
    	       </div><!-- addFabricType  -->
            </div><!-- card-content  --> 
        </div>  <!-- card-panel -->
      </div> <!-- col s12 m12 l12 --> 
  </div> 
      <!-- row --> 



@stop

@section('scripts')

    <script type="text/javascript">
      $('.validateName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });  

      //Kapag whitespace
      $('.validateName').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      });      

      $('.validateName').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateDesc').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_desc=re.test(input.val());
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag whitespace
      $('.validateDesc').blur('input', function() {
        var desc = $(this).val();
        $(this).val(desc.trim());
      }); 

      $('.validateDesc').blur('input', function() {
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

          $('.data-fabricName').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );
    </script>

@stop