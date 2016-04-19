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

    <!--Add Catalogue-->
    @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added catalogue design!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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


    <!--Edit Catalogue-->
    @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edited catalogue design!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

    <!--Delete Catalogue-->
    @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deleted catalogue design!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

    
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Catalogue Design</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new catalogue design to the table" href="#addCatalogue">ADD CATALOGUE DESIGN</button>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col s12 m12 l12">
    	<div class="card-panel">
        <span class="card-title"><h5 style="color:#1b5e20"><center>Catalogue Details</center></h5></span>
        <div class="divider"></div>   
        <div class="card-content">

          <div class="col s12 m12 l12 overflow-x">
      		<table class = "table centered data-catalogue" align = "center" border = "1">
            <thead>
          		<tr>
                <!--<th data-field= "Catalogue ID">Catalogue ID</th>-->
                <th data-field="Catalogue Category">Catalogue Category</th>
             		<th data-field="Catalogue Name">Catalogue Name</th>
                <th data-field="Description">Description</th>
                <th data-field="Image">Image</th>
                <th data-field="Edit">Edit</th>
                <th data-field="Edit">Deactivate</th>
              </tr>
            </thead>

            <tbody>
              @foreach($catalogue as $catalogue)
              @if($catalogue->boolIsActive == 1)
              <tr>
                <!--<td>{{ $catalogue->strCatalogueID }}</td>-->
                <td>{{ $catalogue->strGarmentCategoryName }}</td>
              	<td>{{ $catalogue->strCatalogueName }}</td>
              	<td>{{ $catalogue->strCatalogueDesc }}</td>
                <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($catalogue->strCatalogueImage)}}"></td>
              	<td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit catalogue design detail" href="#edit{{$catalogue->strCatalogueID}}">EDIT</button></td>
                <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of catalogue design from the table" href="#del{{$catalogue->strCatalogueID}}">DEACTIVATE</button>

                  <div id="edit{{$catalogue->strCatalogueID}}" class="modal modal-fixed-footer">                   
                    <h5><font color = "#1b5e20"><center>EDIT CATALOGUE DESIGN</center></font> </h5>                     
                      <form action="{{URL::to('editCatalogueDesign')}}" method="POST" enctype="multipart/form-data">
                       <div class="divider" style="height:2px"></div>
                       <div class="modal-content col s12">

                        <div class="input-field">
                          <input value="{{$catalogue->strCatalogueID}}" id="editCatalogueID" name="editCatalogueID" type="text" class="" hidden>
                        </div>

                   <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                          <select class="browser-default" id="editCategory" name="editCategory"> 
                                <option disabled selected value="">Choose Category</option>
                              @foreach($category as $cat)
                                @if($catalogue->strCatalogueCategory == $cat->strGarmentCategoryID && $cat->boolIsActive == 0)
                                  <option selected value="{{$cat->strGarmentCategoryID}}" selected>{{$cat->strGarmentCategoryName}}</option>
                                @elseif($cat->boolIsActive == 1)
                                  <option value="{{$cat->strGarmentCategoryID}}" selected>{{$cat->strGarmentCategoryName}}</option>
                                @endif
                              @endforeach
                          </select>
                          <!--<label>Category</label>-->
                        </div> 
                    </div>     

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                          <input required value="{{$catalogue->strCatalogueName}}" id="editCatalogueName" name = "editCatalogueName" type="text" class="validateCatalogueName">
                          <label for="Catalogue_Name"> *Catalogue Name </label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                          <input  required value="{{$catalogue->strCatalogueDesc}}" id="editCatalogueDesc" name = "editCatalogueDesc" type="text" class="validateCatalogueDesc">
                          <label for="Category_Desc">*Catalogue Description </label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                        <div class="file-field input-field col s12">
                          <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                            <span>Upload Image</span>
                            <input id="editImg" name="editImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                          </div>

                          <div class="file-path-wrapper">
                            <input value="{{$catalogue->strCatalogueImage}}" id="editImage" name="editImage" class="file-path validate" type="text">
                          </div>
                        </div> 
                    </div>
                    </div>    

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                        <button type="submit" class="waves-effect waves-green btn-flat">Update</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                      </div>
                  </form>
                </div>

              <!-- DELETE DESIGN IN CATALOGUE -->
              <div id="del{{ $catalogue->strCatalogueID }}" class="modal modal-fixed-footer">               
                <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS CATALOGUE DESIGN?</center> </font> </h5>                     
                    <form action="{{URL::to('delCatalogueDesign')}}" method="POST">
                     <div class="divider" style="height:2px"></div>
                     <div class="modal-content col s12">

                      <div class="input-field">
                        <input value="{{$catalogue->strCatalogueID}}" id="delCatalogueID" name="delCatalogueID" type="hidden">
                      </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input value="{{ $catalogue->strGarmentCategoryName }}" type="text" class="validate" readonly>
                        <label for="catalogue_name"> Catalogue Category </label>
                      </div>
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input value="{{ $catalogue->strCatalogueName }}" type="text" class="validate" readonly>
                        <label for="catalogue_name"> Catalogue Name </label>
                      </div>
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input value="{{ $catalogue->strCatalogueDesc }}" type="text" class="validate" readonly>
                        <label for="catalogue_name"> Catalogue Description </label>
                      </div>
                  </div>
                      
                      <div class="input-field">
                        <input value="{{ $catalogue->strCatalogueID }}" id="delInactiveCatalogueID" name="delInactiveCatalogueID" type="hidden">
                      </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                      <div class="input-field col s12">
                        <input value="{{ $catalogue->strInactiveReason }}" id="delInactiveReason" name="delInactiveReason" type="text" class="validate" required>
                        <label for="catalogue_name"> *Reason for Deactivation </label>
                      </div>
                  </div>
                  </div>

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                        <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                      </div>          
                    </form>                 
                  </div>
                </td>
            </tr>
            @endif
            @endforeach 
          </tbody>
        </table>  
      </div>  
          <div class = "clearfix">
          </div>
        </div>	
      </div>
    </div>
  </div>
  
               <!-- ADD DESIGN IN CATALOGUE -->
          <div id="addCatalogue" class="modal modal-fixed-footer">            
            <h5><font color = "#1b5e20"><center>ADD NEW CATALOGUE DESIGN</center> </font> </h5>               
              <form action='{{URL::to('addCatalogueDesign')}}' method="POST" enctype="multipart/form-data">
              <div class="divider" style="height:2px"></div>
              <div class="modal-content col s12">               

              <div class="input-field">
                <input value="{{$newID}}" id="addCatalogueID" name="addCatalogueID" type="hidden"> 
              </div>

          <div class = "col s12" style="padding:15px;  border:3px solid white;">
              <div class="input-field col s12">
                <select class="browser-default" id="addCategory" name="addCategory">
                    <option disabled selected value="">Choose Category</option>
                    @foreach($category as $cat)
                        @if($cat->boolIsActive == 1)
                          <option value="{{$cat->strGarmentCategoryID}}" selected>{{$cat->strGarmentCategoryName}}</option>
                        @endif
                    @endforeach
                </select>
                <!--<label>Category</label>-->
              </div>   
          </div>   

          <div class = "col s12" style="padding:15px;  border:3px solid white;">
              <div class="input-field col s12">
                <input required id="addCatalogueName" name = "addCatalogueName" type="text" class="validateCatalogueName">
                <label for="Catalogue_Name"> *Catalogue Name </label>
              </div>
          </div>

          <div class = "col s12" style="padding:15px;  border:3px solid white;">
              <div class="input-field col s12">
                <input  id="addCatalogueDesc" name="addCatalogueDesc" type="text" class="validateCatalogueDesc">
                <label for="Category_Desc">*Category Description </label>
              </div>
          </div>

          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
              <div class="file-field input-field col s12">
                  <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                    <span>Upload Image</span>
                    <input id="addImg" name="addImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                  </div>
                
                  <div class="file-path-wrapper">
                    <input id="addImage" name="addImage" class="file-path validate" type="text" readonly="readonly">
                  </div>
              </div>
          </div>
          </div> 
            
            <div class="modal-footer col s12" style="background-color:#26a69a">                  
              <button type="submit" class=" waves-effect waves-green btn-flat">Add</button>  
              <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>                    
            </div>
          </form>
@stop

@section('scripts')
    <script>
      function clearData(){
          document.getElementById('addCatalogueName').value = "";
          document.getElementById('addCatalogueDesc').value = "";
          document.getElementById('addImage').value = "";
      }
    </script>

     <script>
      $(document).ready(function(){
    $('.materialboxed').materialbox();
     });
    </script>

     <script>
      $(document).ready(function(){
      $('select').material_select();
      });
    </script>

    <script type="text/javascript">
      $('.validateCatalogueName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateCatalogueName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      //Kapag whitespace
      $('.validateCatalogueName').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      });   

      $('.validateCatalogueName').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      //Kapag whitespace
      $('.validateCatalogueDesc').blur('input', function() {
        var desc = $(this).val();
        $(this).val(desc.trim());
      }); 

      $('.validateCatalogueDesc').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_desc=re.test(input.val());
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateCatalogueDesc').blur('input', function() {
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

          $('.data-catalogue').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );
    </script>
@stop