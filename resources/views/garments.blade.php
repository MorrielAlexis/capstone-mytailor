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


    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Garment Category</h4></span>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
      <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="CLick to add a new type of garment to the table" href="#addGCategory">ADD GARMENT CATEGORY</button>

     </div>
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
                    <th data-field="Edit">Edit</th>
                    <th>Deactivate</th>
                  </tr>
              </thead>

              <tbody>
                @foreach($category as $category)
                  @if($category->boolIsActive == 1)
                  <tr>
                    <!--<td>{{ $category->strGarmentCategoryID }}</td>-->
                    <td>{{ $category->strGarmentCategoryName }}</td>
                    <td>{{ $category->strGarmentCategoryDesc }}</td>
                    <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of category" href="#edit{{ $category->strGarmentCategoryID }}">EDIT</button></td>
                    <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of category from the table" href="#del{{ $category->strGarmentCategoryID }}">DEACTIVATE</button></td>
              
                      <!-- Modal Structure for Edit Garment Category> -->
                      <div id="edit{{ $category->strGarmentCategoryID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>EDIT GARMENT CATEGORY</center> </font> </h5>                          
                            <form action="{{URL::to('editGarmentCategory')}}" method="POST">       
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                                
                              <div class="input-field">
                                <input value="{{ $category->strGarmentCategoryID }}" id="editGarmentID" name="editGarmentID" type="hidden">
                              </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input required value="{{ $category->strGarmentCategoryName }}" id="editGarmentName" name="editGarmentName"type="text" class="validateGarmentName">
                                <label for="garment_name">*Garment Name </label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                              <div class="input-field col s12">
                                <input required value= "{{ $category->strGarmentCategoryDesc }}" id="editGarmentDescription" name="editGarmentDescription" name="GarmentDescription" type="text" class="validateGarmentDesc">
                                <label for="garment_description">*Garment Desription </label>
                              </div>
                          </div>
                          </div>

                          <div class="modal-footer col s12" style="background-color:#26a69a">
                              <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                          </div>
                    </form>
                  </div>
                      <!--///////////////////////DELETE/////////////////////-->
                      <div id="del{{ $category->strGarmentCategoryID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS GARMENT CATEGORY?</center> </font> </h5>
                        <form action="{{URL::to('delGarmentCategory')}}" method="POST">
                          <div class="divider" style="height:2px"></div>
                          <div class="modal-content col s12">
                            
                              <div class="input-field">
                                <input value="{{ $category->strGarmentCategoryID }}" id="delGarmentID" name="delGarmentID" type="hidden">
                              </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input required pattern="[A-Za-z\s]+" value="{{ $category->strGarmentCategoryName }}" type="text" class="" readonly>
                                <label for="garment_name">Garment Name </label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                               <input  value= "{{ $category->strGarmentCategoryDesc }}" type="text" class="" readonly>
                                <label for="garment_description">Garment Desription </label>
                              </div>
                          </div>

                              <div class="input-field">
                                <input value="{{ $category->strGarmentCategoryID }}" type="hidden" id="delInactiveGarment" name="delInactiveGarment">
                              </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                              <div class="input-field">
                                <input value="{{ $category->strInactiveReason }}" type="text" id="delInactiveReason" name="delInactiveReason" class="validate" required>
                                <label for="reason"> *Reason for Deactivation </label>
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
             
         <!--    <Modal for Add Garment Category> -->
            <div id="addGCategory" class="modal modal-fixed-footer">
              <h5><font color = "#1b5e20"><center>ADD NEW GARMENT CATEGORY</center> </font> </h5>
              <form action="{{URL::to('addGarmentCategory')}}" method="POST" id="addGarmentCategory" name="addGarmentCategory"> 
                <div class="divider" style="height:2px"></div>
                <div class="modal-content col s12">
  
                  <div class="input-field">
                    <input value="{{ $newID }}" id="addGarmentID" name="addGarmentID" type="hidden">
                  </div>

                <div class = "col s12" style="padding:15px;  border:3px solid white;">
                    <div class="input-field col s12">
                      <input required id="addGarmentName" name="addGarmentName" type="text" class="validateGarmentName">
                      <label for="garment_name">*Garment Name </label>
                    </div>
                </div>

                <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                    <div class="input-field">
                      <input required id="addGarmentDesc" name="addGarmentDesc" type="text" class="validateGarmentDesc">
                      <label for="garment_description">*Garment Desription </label>
                    </div>
                </div>
                </div>

                <div class="modal-footer" style="background-color:#26a69a">
                  <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Add</button>
                  <vutton type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button> 
                </div>
              </form>
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

    <script>
      function clearData(){
          document.getElementById("addGarmentDesc").value = "";
          document.getElementById("addGarmentName").value = "";
      }
    </script>

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