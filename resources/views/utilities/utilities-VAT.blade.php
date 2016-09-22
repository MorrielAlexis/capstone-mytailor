@extends('layouts.master')

@section('content')
  <div class="main-wrapper" style="margin-top:30px">

    <!-- Flash Messages -->
    <!--Edit -->
      @if (Session::has('flash_message_update'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel blue accent-1">
              <span class="alert alert-success"><i class="tiny mdi-navigation-close right" onclick="$('#flash_message').hide()"></i></span>
              <em> {!! session('flash_message_update') !!}</em>
            </div>
          </div>
        </div>
      @endif


   <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Utilities - Tax Settings</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5 style="color:#1b5e20"><center>Tax Settings</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

            <div class = "col s12 m12 l12 overflow-x">

            <table class = "table centered data-VAT" align = "center" border = "1">
              <thead>
                  @foreach($tax as $tax)
                  <tr>
                    <!--<th data-field="id">Garment ID</th>-->
                    <th data-field="tax name">Tax Name</th>
                    <th data-field="tax percentage">Tax Percentage</th>
                    <th data-field="Action">Actions</th>
                  </tr>
              </thead>

              <tbody>
                  
                  <tr>
                    <td>{{$tax->strTaxName}}</td>
                    <td>{{$tax->dblTaxPercentage}}</td>
                    <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of garment category" href="#edit{{$tax->intVatID}}"><i class="mdi-editor-mode-edit"></i></a>

                    <!-- Modal Structure for update vat settings --> 
                      <div id="edit{{$tax->intVatID}}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>UPDATE VAT SETTINGS</center> </font> </h5>                          
                            
                            {!! Form::open(['url' => 'utilities/utilities-VAT/update', 'method'=> 'post']) !!}
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                                
                              <div class="input-field">
                                <input value="{{$tax->intVatID}}" id="editVatID" name="editVatID" type="hidden">
                              </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input required value="{{$tax->strTaxName}}" id="editTaxName" name="editTaxName" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?" maxlength="30" minlength="2" >
                                <label for="name"> Tax Name  <span class="red-text"><b>*</b></span></label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                              <div class="input-field col s12">
                                <input required value= "{{$tax->dblTaxPercentage}}" id="editTaxPercent" name="editTaxPercent" type="text" class="validate" maxlength="5" pattern="^[1-9]\d{0,7}(?:\.\d{1,4})?|\.\d{1,4}$">
                                <label for="percentage"> Tax Percentage <span class="red-text"><b>*</b></span></label>
                              </div>
                          </div>
                          </div>

                          <div class="modal-footer col s12" style="background-color:#26a69a">
                              <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                              <a href="#!"  class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                          </div>
                    {!! Form::close() !!}
                  </div>
                  </td>
                  </tr>
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