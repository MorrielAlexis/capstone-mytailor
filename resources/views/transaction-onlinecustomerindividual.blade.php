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
      <span class="page-title"><h4>Individual Customers</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5 style="color:#1b5e20"><center>Pending Online Individual Orders</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

            <div class = "col s12 m12 l12 overflow-x">

            <table class = "table centered data-OCI" align = "center" border = "1">
              <thead>
                 
                  <tr>
                    <!--<th data-field="id">Garment ID</th>-->
                    <th >Job Order #</th>
                    <th >Customer Name</th>
                    <th >Email</th>
                    <th >Total Amount Due</th>
                    <th >Action</th>
                  </tr>
              </thead>

              <tbody>
              @foreach($onlineJO as $jo)
                <tr>
                  <td>{{$jo->strJobOrderID}}</td>
                  <td>{{$jo->strIndivFName}} {{$jo->strIndivMName}} {{$jo->strIndivLName}}</td>
                  <td>{{$jo->strIndivEmailAddress}}</td>
                  <td>{{'PHP'  . number_format($jo->dblOrderTotalPrice, 2)}}</td>
               {!! Form::open(['url' => 'transaction/accept-online-customer-individual', 'method' => 'POST']) !!} 
                  <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating yellow" data-position="bottom" data-delay="50" data-tooltip="Click to view Order Specification" href="#{{$jo->strJobOrderID}}"><i class="mdi-action-view-headline"></i></a>
                      <button type="submit" style="color:black" class="btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to accept online order"><i class="mdi-action-done"></i></button>
                      {{-- <a class="btn modal-trigger tooltipped btn-floating green" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="mdi-action-view-headline"></i></a> --}}
                      <input type="hidden" name="customerID" value="{!! $jo->strIndivID !!}"> 
                  <input type="hidden" name="joID" value="{{$jo->strJobOrderID}}">
                {!! Form::close() !!}
                  </td>
                </tr>
              @endforeach

              </tbody>
            </table>

            </div>

            @foreach($onlineJO as $onlineJob)
                                            <!-- Modal Struc  ture for order specification --> 
                  <div id="{{$onlineJob->strJobOrderID}}" class="modal modal-fixed-footer">
                    <h5 style="color:#1b5e20; margin-left:20px;">Order Specification</h5>
                      <div class = "row">
                        <div class="col s12 m12 l12 overflow-x">
                          <table class = "centered">
                            <thead>
                              <tr>
                                <th>Segment Name</th>
                                <th>Quantity</th>
                                <th>Fabric Type</th>
                         {{--        <th>Design</th> --}}
                                <th>Unit Price</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($onlineJOSpecs as $onlineJOSpec)
                                  @if($onlineJob->strJobOrderID == $onlineJOSpec->strJobOrderFK)
                                    <tr>
                                      <td>{{$onlineJOSpec->strSegmentName}}</td>
                                      <td>{{$onlineJOSpec->intQuantity}}</td>
                                      <td>{{$onlineJOSpec->strFabricName}}</td>
                                   {{--    <td>Collar - Button Down</td> --}}
                                      <td>{{"PHP" . number_format($onlineJOSpec->dblUnitPrice, 2)}}</td>
                                    </tr>
                               {{--  <tr> --}}
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

            </div>
            </div>
          </div>
        </div>
      </div>

  <!--Accept button Modal-->
  <div id="acceptmodal" class="modal modal-fixed-footer" style="height:320px; width:700px;">
    <div class="modal-content">
      <h4 style="color:#1b5e20" class="center">Accepted Order</h4>
      <div class="divider container" style="margin-bottom:20px;"></div>
      <div class="row">
            <div class="col s12">
                <div class="card" style="background-color:#ffebee">
                  <div class="card-content">
                    <table class="centered">
                  <tbody>
                      <tr>
                        <td>track#</td>
                        <td>customer name</td>
                        <td></td>
                        <td style="color:#1b5e20">Paid</td>
                      </tr>
                  </tbody>
              </table>
                  </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal-footer" style="background-color:#26a69a">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
    </div>
  </div>

  <!--Measurement button Modal-->
  <div id="measurementmodal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 style="color:#1b5e20" class="center">Measurements</h4>
      <div class="divider container" style="margin-bottom:20px;"></div>
      <div class="row">
        <div class="col s6">
          <div class="input-field">
                      <input id ="measurement" type="text" class="validate">
                      <label for="measurement">Measurement</label>
                  </div>
                  <div class="input-field">
                      <input id ="measurement" type="text" class="validate">
                      <label for="measurement">Measurement</label>
                  </div>
                  <div class="input-field">
                      <input id ="measurement" type="text" class="validate">
                      <label for="measurement">Measurement</label>
                  </div>
        </div>
        <div class="col s6">
          <div class="input-field">
                      <input id ="measurement" type="text" class="validate">
                      <label for="measurement">Measurement</label>
                  </div>
                  <div class="input-field">
                      <input id ="measurement" type="text" class="validate">
                      <label for="measurement">Measurement</label>
                  </div>
                  <div class="input-field">
                      <input id ="measurement" type="text" class="validate">
                      <label for="measurement">Measurement</label>
                  </div>
        </div>
      </div>

    </div>

    <div class="modal-footer" style="background-color:#26a69a">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
    </div>
  </div>

@stop

@section('scripts')

             <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-OCI').DataTable();
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