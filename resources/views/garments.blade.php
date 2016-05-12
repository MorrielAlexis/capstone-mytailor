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
      
      <!--Add Garment Category-->
         @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added garment category!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Edit Garment Category-->
      @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edited garment category!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Delete Garment Category-->
      @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deactivated garment category!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Reactivate Garment Category-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back garment category!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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
              <span class="black-text" style="color:black">Sorry! Cannot deactivate garment category. It's still being used!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

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


    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Garment Category</h4></span>
      </div>
    </div>

       <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="left" data-delay="50"  data-tooltip="CLick to add a new type of garment to the table" href="#addGCategory" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
       </div>
     </div>
   
  

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5 style="color:#1b5e20"><center>Garments(Category)</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

            <div class = "col s12 m12 l12 overflow-x">

            <table class = "table centered data-garments" align = "center" border = "1">
              <thead>
                  <tr>
                    <!--<th data-field="id">Garment ID</th>-->
                    <th data-field="garmentName">Garment Name</th>
                    <th data-field="garmentDescription">Garment Description</th>
                    <th data-field="Edit">Actions</th>
                    <!-- <th>Deactivate</th> -->
                  </tr>
              </thead>

              <tbody>
                @foreach($garment as $garment)
                  @if($garment->boolIsActive == 1)
                  <tr>
                    <td>{{ $garment->strGarmentCategoryName }}</td>
                    <td>{{ $garment->textGarmentCategoryDesc }}</td>
                    <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of garment category" href="#edit{{ $garment->strGarmentCategoryID }}"><i class="mdi-editor-mode-edit"></i></a>

                    <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of garment from table" href="#del{{$garment->strGarmentCategoryID}}"><i class="mdi-action-delete"></i></a></td>
              
                      <!-- Modal Structure for Edit Garment Category> -->
                      <div id="edit{{ $garment->strGarmentCategoryID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>EDIT GARMENT CATEGORY</center> </font> </h5>                          
                            
                            {!! Form::open(['url' => 'maintenance/garment-category/update']) !!}
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                                
                              <div class="input-field">
                                <input value="{{ $garment->strGarmentCategoryID }}" id="editGarmentID" name="editGarmentID" type="hidden">
                              </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input required value="{{ $garment->strGarmentCategoryName }}" id="editGarmentName" name="editGarmentName"type="text" class="validate" pattern="^[a-zA-Z\-'`\s]{2,}$" maxlength="30" minlength="2" >
                                <label for="garment_name">*Garment Name </label>
                                <span class="red-text"><b>*</b></span>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                              <div class="input-field col s12">
                                <input required value= "{{ $garment->textGarmentCategoryDesc }}" id="editGarmentDescription" name="editGarmentDescription" name="GarmentDescription" type="text" class="validate">
                                <label for="garment_description"><span class="red-text"><b>*</b></span> *Garment Desription </label>
                              </div>
                          </div>
                          </div>

                          <div class="modal-footer col s12" style="background-color:#26a69a">
                              <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                              <a href="#!"  class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                          </div>
                    {!! Form::close() !!}
                  </div>
                      
                      <div id="del{{ $garment->strGarmentCategoryID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS GARMENT CATEGORY?</center> </font> </h5>
                        
                        {!! Form::open(['url' => 'maintenance/garment-category/destroy']) !!}
                          <div class="divider" style="height:2px"></div>
                          <div class="modal-content col s12">
                            
                              <div class="input-field">
                                <input value="{{ $garment->strGarmentCategoryID }}" id="delGarmentID" name="delGarmentID" type="hidden">
                              </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input required pattern="[A-Za-z\s]+" value="{{ $garment->strGarmentCategoryName }}" type="text" class="" readonly>
                                <label for="garment_name">Garment Name </label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                               <input  value= "{{ $garment->textGarmentCategoryDesc }}" type="text" class="" readonly>
                                <label for="garment_description">Garment Desription </label>
                              </div>
                          </div>

                              <div class="input-field">
                                <input value="{{ $garment->strGarmentCategoryID }}" type="hidden" id="delInactiveGarment" name="delInactiveGarment">
                              </div>

                          <!-- <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                              <div class="input-field">
                                <input value="{{ $garment->strGarmentCategoryInactiveReason }}" type="text" id="delInactiveReason" name="delInactiveReason" class="validate" required>
                                <label for="reason"> *Reason for Deactivation </label>
                              </div>
                          </div> -->
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
             
         
            <div id="addGCategory" class="modal modal-fixed-footer">
              <h5><font color = "#1b5e20"><center>ADD NEW GARMENT CATEGORY</center> </font> </h5>
              
              {!! Form::open(['url' => 'maintenance/garment-category', 'method' => 'post']) !!}
                <div class="divider" style="height:2px"></div>
                <div class="modal-content col s12">
  
                  <div class="input-field">
                    <input value="{{ $newID }}" id="addGarmentID" name="addGarmentID" type="hidden">
                  </div>

                <div class = "col s12" style="padding:15px;  border:3px solid white;">
                    <div class="input-field col s12">
                      <input required id="addGarmentName" name="addGarmentName" type="text" class="validateG" pattern="^[a-zA-Z\-'`\s]{2,}$">
                      <label for="garment_name">Garment Name<span class="red-text"><b>*</b></span> </label>
                    </div>
                </div>

                <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                    <div class="input-field">
                      <input required id="addGarmentDesc" name="addGarmentDesc" type="text" class="validate">
                      <label for="garment_description">Garment Desription <span class="red-text"><b>*</b></span> </label>
                    </div>
                </div>
                </div>

                <div class="modal-footer" style="background-color:#26a69a">
                  <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Add</button>
                  <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button> 
                </div>
              {!! Form::close() !!}
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>


@stop

@section('scripts')
    <script>
    $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
      }
      );
    </script>

    <script>
      $(document).ready(function(){
      $('select').material_select();
      });
    </script>

<!--     <script>
      function clearData(){
          document.getElementById("addGarmentDesc").value = "";
          document.getElementById("addGarmentName").value = "";
      }
    </script> -->

    <script type="text/javascript">
      $('.validateGarmentName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateGarmentName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      $('.validateGarmentName').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      //Kapag whitespace
      $('.validateGarmentName').blur('input', function() {
        var desc = $(this).val();
        $(this).val(desc.trim());
      }); 

      $('.validateGarmentDesc').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateGarmentDesc').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      $('.validateGarmentDesc').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      //Kapag whitespace
      $('.validateGarmentDesc').blur('input', function() {
        var desc = $(this).val();
        $(this).val(desc.trim());
      }); 
 

    </script>

             <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-garments').DataTable();
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