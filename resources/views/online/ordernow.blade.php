@extends('layouts.masterOnline')

@section('content')

    <div class="section white" style="margin:40px; padding:40px;"> 

    <div class="row" style="margin-top:40px;">
      <div class="col s12">
        <div class="col s4">
          <div class="divider grey" style="margin-bottom:5px;"></div>
          <div class="divider grey"></div>
        </div>

        <div class="col s4" style="margin-top:-30px;">
          <center><span style="font-size:40px; color: #757575;">Shopping Cart</span></center>
        </div>

        <div class="col s4">
          <div class="divider grey" style="margin-bottom:5px;"></div>
          <div class="divider grey"></div>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col s12">

      @if($selecteds == null)
        <div class="row">
            <div class="col s12">
                <div class="card grey lighten-3 z-depth-0" style="border:1px solid pink; padding:2px;">
                  <div class="card-content" style="border:1px solid pink;">
                <center><p>Your shopping cart is currently empty.</p></center>
                  </div>
                </div>
            </div>
        </div>

        <div class="divider" style="margin-top:40px; margin-bottom:20px;"></div>
        <div>
          <a class="green-text" style="margin-left:20px;" href="{{URL::to('/online-home')}}"><i style="size:20px;" class="mdi-hardware-keyboard-arrow-left"></i>CONTINUE SHOPPING</a>
        </div>
      @endif
      @if($selecteds != null)
       @foreach($selecteds as $selected)
          <div class="col s6">
            <div class="row">
                <div class="col s12">
                    <div class="card grey lighten-3 z-depth-0" style="border:1px solid pink; padding:2px;">
                      <div class="card-content" style="border:1px solid pink;">
                        
                          
                          <div class="row">
                            
                              <div class="col s6">
                                <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
                                <center><img src="{{$selected->strSegmentImage}}" style="margin:20px;height:275px; width:275x; border:3px gray solid"></center>
                              </div>
                              <div class="col s6">
                            <!-- <div class="col s12" style=""><a class="btn right container teal accent-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to customize order" href="{{URL::to('/customize-womens-fabric')}}" style="margin-left:10px;">Customize Order</a></div> -->
                            
                            
                              <div class="col s12" style="margin-top:20px; color:gray"><p>Garment description below:</p></div>
                              <div class="col s12" style="padding:0">
                                <div style="padding:25px;">
                                  <div class="col s7" style="color:teal;"><p><b>Garment Category:</b></p></div>
                                  <div class="col s5"><p>{{$selected->strGarmentCategoryName}}</p></div>
                                </div>
                                <div style="padding:25px;">
                                  <div class="col s7" style="color:teal;"><p><b>Garment Segment:</b></p></div>
                                  <div class="col s5"><p>{{$selected->strSegmentName}}</p></div>
                                </div>
                                <div style="padding:25px;">
                                  <div class="col s7" style="color:teal;"><p><b>Sex(Applicable):</b></p></div>
                                  <div class="col s5">
                                    @if($selected->strSegmentSex == 'f')
                                      <p>Female</p>
                                    @else
                                      <p>Male</p>
                                    @endif
                                  </div>
                                </div>
                                <div style="padding:25px;">
                                  <div class="col s7" style="color:teal;"><p><b>Price starts from:</b></p></div>
                                  <div class="col s5" style="color:red"><p>{{$selected->dblSegmentPrice}}</p></div>
                                </div>
                                <div style="padding:25px;">
                                  <div class="col s7" style="color:teal;"><p><b>Time to finish(min):</b></p></div>
                                  <div class="col s5" style="color:red"><p>{{$selected->intMinDays}}</p></div>
                                </div>
                                <div style="padding:25px;">
                                  <div class="col s7" style="color:teal;"><p><b>Quantity:</b></p></div>
                                  @if($selected->strGarmentCategoryName = 'MEN SHIRT')
                                    <div class="col s5" style="color:red"><p>{{$mquantity}}</p></div>
                                  @elseif($selected->strGarmentCategoryName = 'WOMEN SHIRT')
                                    <div class="col s5" style="color:red"><p>{{$wquantity}}</p></div>
                                  @elseif($selected->strGarmentCategoryName = 'PANTS')
                                    <div class="col s5" style="color:red"><p>{{$pquantity}}</p></div>
                                  @elseif($selected->strGarmentCategoryName = 'SUITS')
                                    <div class="col s5" style="color:red"><p>{{$squantity}}</p></div>
                                  @endif
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        @endforeach
         <div class="divider"></div>
          <div class="col s12" style="padding:30px">
              <a href="{{URL::to('/online-order-now')}}" class="btn-flat white-text" style="color:white; background-color:teal;">Cancel Transaction</a>
              <a href="{{URL::to('/online-individual-checkout-measurement')}}" class="right btn-flat white-text red" style="color:white; background-color:teal;">Proceed to MEASUREMENT</a>
          </div>

          <div class="divider" style="margin-bottom:20px;"></div>
          <div class = "col s12">
            <div class = "row">
              <a class="green-text" style="margin-left:20px;" href="{{URL::to('/online-home')}}"><i style="size:20px;" class="mdi-hardware-keyboard-arrow-left"></i>CONTINUE SHOPPING</a>
            </div>
          </div>
      @endif
    </div>
  </div>

 

  <!--Remove Order Modal-->
  <div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
    <h5><font color="red"><center><b>Warning!</b></center></font></h5>
    <div class="divider" style="height:2px"></div>
    <div class="modal-content">
      <div class="row">
        <div class="col s3">
          <i class="mdi-alert-warning" style="font-size:50px; color:red"></i>
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

  <script>
    

  </script>

