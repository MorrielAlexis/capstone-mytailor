@extends('layouts.master')

@section('content')
  <div class="main-wrapper" style="margin-top:30px">  <!-- Main Wrapper  -->   
      
    <div class="row">
        <div class="col s12 m12 l12">
          <span class="page-title"><h4>Online Alteration Orders</h4></span>
        </div> 
    </div>
    </div>
   <!-- End of Main Wrapper  --> 



  <div class="row"> <!-- row -->

    	<div class="col s12 m12 l12">  <!-- col s12 m12 l12 -->

    		<div class="card-panel">  <!-- card-panel -->
   		    <span class="card-title"><h5 style="color:#1b5e20"><center>List of Online Alteration Orders</center></h5></span>
   				<div class="divider"> </div>
            <div class="card-content"><!-- card-content  --> 

              <div class="col s12 m12 l12 overflow-x">

       				<table class = "centered" align = "center" border = "1">
                <thead>
                  <tr>
                    <th style="color:#1b5e20">Alteration No.</th>
                    <th style="color:#1b5e20">Customer Name</th>
                    <th style="color:#1b5e20">Total Price</th>
                    <th data-field="Edit">Actions</th>
              	  </tr>
                </thead>
              
                <tbody>
                @foreach($onlineAlteration as $onlineAlteration)
                       {{-- @if($onlineAlteration->boolisOnline == 1) --}}
                        <tr>
                          <td>{{$onlineAlteration->strNonShopAlterID}}</td>                        
                          <td>{{$onlineAlteration->strCompanyName}}{{$onlineAlteration->strIndivFName}} {{$onlineAlteration->strIndivMName}} {{$onlineAlteration->strIndivLName}}</td>
                          <td>{{"Php" . $onlineAlteration->dblOrderTotalPrice}}</td>
                          <td><a class=" btn modal-trigger tooltipped btn-floating green" href="#OrderDetails" data-position="top" data-delay="50" data-tooltip="Show alteration order details."><i class="mdi-action-view-headline"></i></a>
                    		  <a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to accept online order" href="{{URL::to('/alteration-acceptorder')}}"><i class="mdi-action-done"></i></a>
                          <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to reject order." href="#rejectmodal"><i class="mdi-action-delete"></i></a></td>
              

              <!--**********Orrder Details Modal***********-->
            {{--         <div id="OrderDetails" class="modal modal-fixed-footer">                     
                      <h5><font color = "#1b5e20"><center>Order Details</center> </font> </h5>                       
                          
                        {!! Form::open(['url' => 'transaction/alteration-online-transaction-details']) !!} 
                      <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">
                            
                          <div class="input-field">
                            <input value="{{$onlineAltSpecifics->strNonAlterSpecificID}}" id="delAlterationNameID" name="delAlterationNameID" type="text" readonly>
                          </div>


                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <label for="alteration_desc">Segment</label>
                                <input value="{{$onlineAltSpecifics->strSegmentName}}" id="delAlterationDesc" name="delAlterationDesc" type="text" readonly>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <label for="alteration_price">Alteration Price</label>
                                <input value="{{$onlineAltSpecifics->strAlterationName}}" id="delAlterationPrice" name="delAlterationPrice" type="text" readonly>
                              </div>
                          </div>

                          <div class="input-field col s12">
                            <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                            <input required  value="{{ $onlineAltSpecifics->txtAlterationDesc }}" id="delInactiveAlteration" name="delInactiveAlteration" type="text">
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                 
                          </div>
                        </div>

                        <div class="modal-footer col s12" style="background-color:#26a69a">
                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                        </div> 
                        {!! Form::close() !!}      
                      </div> --}}
                    </tr>
                   {{--  @endif --}}
                  @endforeach
                </tbody>
              </table>
              </div>

              <div class = "clearfix">

              </div>  
            </div><!-- card-content  --> 
        </div>  <!-- card-panel -->
      </div> <!-- col s12 m12 l12 --> 
  </div> 
      <!-- row --> 



@stop

@section('scripts')

        <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-alteration').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);

      } );
    </script>

@stop