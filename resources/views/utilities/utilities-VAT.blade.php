@extends('layouts.master')

@section('content')
  <div class="main-wrapper" style="margin-top:30px">

   <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Utilities - Tax Settings</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5 style="color:#1b5e20"><center>List of Tax</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

            <div class = "col s12 m12 l12 overflow-x">

            <table class = "table centered data-VAT" align = "center" border = "1">
              <thead>
                  <tr>
                    <!--<th data-field="id">Garment ID</th>-->
                    <th data-field="garmentName">Tax Name</th>
                    <th data-field="garmentDescription">Tax Percentage</th>
                    <th data-field="Edit">Actions</th>
                  </tr>
              </thead>

              <tbody>
                  
                  <tr>
                    <td></td>
                    <td></td>
                    <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of garment category" href="#edit"><i class="mdi-editor-mode-edit"></i></a>

                    <!-- Modal Structure for Edit Garment Category> -->
                      <div id="edit" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>EDIT GARMENT CATEGORY</center> </font> </h5>                          
                            
                           {{--  {!! Form::open(['url' => 'maintenance/garment-category/update']) !!} --}}
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                                
                              <div class="input-field">
                                <input value="" id="editGarmentID" name="editGarmentID" type="hidden">
                              </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input required value="" id="editGarmentName" name="editGarmentName" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?" maxlength="30" minlength="2" >
                                <label for="garment_name"> Garment Name   <span class="red-text"><b>*</b></span></label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                              <div class="input-field col s12">
                                <input  value= "" id="editGarmentDescription" name="editGarmentDescription" type="text" class="validate">
                                <label for="garment_description"> Garment Desription </label>
                              </div>
                          </div>
                          </div>

                          <div class="modal-footer col s12" style="background-color:#26a69a">
                              <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                              <a href="#!"  class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                          </div>
                    {{-- {!! Form::close() !!} --}}
                  </div>
                  </tr>
                  
              </tbody>
            </table>

            </div>

            <div class = "clearfix">

            </div>
            </div>
          </div>
        </div>
      </div>



@stop

@section('scripts')
    
             <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-VAT').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);

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