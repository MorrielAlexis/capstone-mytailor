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
      <span class="page-title"><h4>List of All Job Orders</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5 style="color:#1b5e20"><center>Individual Customers</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

            <div class = "col s12 m12 l12 overflow-x">

            <table class = "table centered data-MIO" align = "center" border = "1">
              <thead>
                  <tr>
                    <!--<th data-field="id">Garment ID</th>-->
                    <th data-field="order_name">JO No.</th>
                    <th data-field="customer_name">Customer Name</th>
                    <th data-field="Action">Actions</th>
                  </tr>
              </thead>

              <tbody>
                    @foreach($joborder as $jo)
                  <tr>
                    <td>{{$jo->strJobOrderID}}</td>
                    <td>{{$jo->strIndivFName}} {{$jo->strIndivMName}} {{$jo->strIndivLName}} {{$jo->strCompanyName}}</td>
                    <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating yellow" data-position="bottom" data-delay="50" data-tooltip="Click to view Order Specification" href="#{{$jo->strJobOrderID}}"><i class="mdi-action-view-headline"></i></a></td>
                  
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

            @foreach($joborder as $specs)  
                    <!-- Modal Structure for update vat settings --> 
                      <div id="{{$specs->strJobOrderID}}" class="modal modal-fixed-footer">
                            <h5 style="color:#1b5e20; margin-left:20px;">Order Specification</h5>

            <div class = "row">

                <div class="col s12 m12 l12 overflow-x">
                  <table class = "centered" >
                    <thead>
                      <tr>
                        <th>Garment Segment</th>
                        <th>Quantity</th>
                        <th>Fabric Type</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($onlineJOSpecs as $onlineJOSpec)
                          @if($specs->strJobOrderID == $onlineJOSpec->strJobOrderFK)
                      <tr>
                        <td>{{$onlineJOSpec->strSegmentName}}</td>
                        <td>{{$onlineJOSpec->intQuantity}}</td>
                        <td>{{$onlineJOSpec->strFabricName}}</td>
                      </tr>
                          @endif
                        @endforeach
                    </tbody>
                  </table>
                </div>
                       
                    <div class = "clearfix"></div>
                </div>
                  

                <div class="modal-footer" style="background-color:#26a69a">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                    
                </div>
              </div>
              @endforeach
               <div class = "clearfix">
            
                  

  <!--Measurement button Modal-->
  <div id="measurementmodal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 style="color:#1b5e20" class="center">Measurements</h4>
      <div class="divider container" style="margin-bottom:20px;"></div>
      <div class="row">
        <div class="col s6">
          <div class="input-field">
                      <input id ="measurement" type="text" class="validate">
                      <label for="measurement">Hem</label>
                  </div>
                  <div class="input-field">
                      <input id ="measurement" type="text" class="validate">
                      <label for="measurement">Slim</label>
                  </div>
                  <div class="input-field">
                      <input id ="measurement" type="text" class="validate">
                      <label for="measurement">Sleeves</label>
                  </div>
        </div>
        <div class="col s6">
          <div class="input-field">
                      <input id ="measurement" type="text" class="validate">
                      <label for="measurement">Hips</label>
                  </div>
                  <div class="input-field">
                      <input id ="measurement" type="text" class="validate">
                      <label for="measurement">Circumference</label>
                  </div>
                  <div class="input-field">
                      <input id ="measurement" type="text" class="validate">
                      <label for="measurement">Slit</label>
                  </div>
        </div>
      </div>

    </div>

    <div class="modal-footer" style="background-color:#26a69a">
      <a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
      <a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
    </div>
  </div>

  <!--Remove Order Modal-->
  <div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
    <h5><font color="red"><center><b>Warning!</b></center></font></h5>
    <div class="divider" style="height:2px"></div>
    <div class="modal-content">
      <div class="row">
        <div class="col s3">
          <i class="mdi-alert-warning" style="font-size:50px; color:yellow"></i>
        </div>
        <div class="col s9">
          <p><font size="+1">Are you sure you want to remove this order?</font></p>
        </div>
      </div>
    </div>
    <div class="modal-footer col s12" style="background-color:red; opacity:0.85">
            <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Yes</font></button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
        </div>
  </div>  


@stop

@section('scripts')
    
             <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-MIO').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);

          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );
    </script>

  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>         

  <script>
   $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
   });
  </script>

  <script>
   $(document).ready(function(){
      $('.materialboxed').materialbox();
    });
   </script>

          <!--TOOLTIP SCRIPT-->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.tooltipped').tooltip({delay: 50});
  }); 
  </script>
@stop