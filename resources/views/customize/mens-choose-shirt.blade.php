@extends('layouts.masterOnline')

@section('content')

<div class="row" style="margin:40px;">

    <div class="row" style="margin-top:40px;">
      <div class="col s12">
        <div class="col s4">
          <div class="divider teal accent-4 white-text" style="margin-bottom:5px;"></div>
          <div class="divider teal accent-4 white-text"></div>
        </div>

        <div class="col s4" style="margin-top:-30px;">
          <center><span style="font-size:42px; color: #757575;">CHOOSE YOUR SHIRT</span></center>
        </div>

        <div class="col s4">
          <div class="divider teal accent-4 white-text" style="margin-bottom:5px;"></div>
          <div class="divider teal accent-4 white-text"></div>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="card col s12 m12 l12">   

      {!! Form::open(['url' => 'customize-mens-fabrics', 'method' => 'POST', "id" => "order-form"]) !!}

        <div class="col s12" style="margin-top:15px">

          <div class="divider" style="margin-bottom:40px; height:2px"></div>
          <p class="center-align" style="color:teal; margin-bottom:40px"><b>CHOOSE AMONG AVAILABLE PRODUCTS</b></p>
          <div class = "row">
            <div class="center col s4" style="margin-top:30px; margin-left:60px; color:red"><center><b style="font-size:18px">Quantity of Men Shirt</b></center></div>  
            <div class="col s3" style="margin-top:20px; padding:5px; margin-right:5px;"><input min = "1" required class = "menquantity" name="menquantity" value = "1" id="menquantity" type="number" style="border:2px teal solid; padding-left:18%; padding-right:18%" placeholder="How many?"></div>
          </div>
        
          @foreach($garments as $garment)
            @if($garment->boolIsActive==1)
             
                <div class="col s4">

                  <div class="center col s12">
                    <input type="radio" name = "menshirt" class="filled-in cbx-segment-name" id="{{$garment->strSegmentID}}" value="{{$garment->strSegmentID}}" style="padding:5px"/>
                    <label for="{{$garment->strSegmentID}}">{{$garment->strSegmentName}}</label>
                  </div>

                  <input type="hidden" value="{{$garment->strSegmentName}}" name="mname">
                  <input type="hidden" value="{{$garment->dblSegmentPrice}}" name="msegprice">
                  <input type="hidden" value="{{$garment->intMinDays}}" name="mdays">

                  <div class="center col s12">
                    <img src="{{$garment->strSegmentImage}}" style="height:200px; width:250px; padding:10px; border:3px gray solid">
                  </div>
                </div>

            @endif
          @endforeach
        </div>

                

                
        <div class="col s12">
          <div class="divider"></div>
          <button type="submit" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to customize orders" style="padding-left:10px; padding-right:10px; margin-top:20px; margin-bottom: 20px; font-size:15px; color:white; background-color: teal; opacity:0.90;">Customize Orders</a>
          
         <!--  <button class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to cancel orders" style="padding-left:10px; padding-right:10px; margin-top:20px; margin-bottom: 20px; font-size:15px; color:white; background-color: teal; opacity:0.90;">Reset Order</a> -->
        </div>
      {!! Form::close() !!}

    </div>
  </div>

</div>
@stop

@section('scripts')

  <script type="text/javascript">

    $(".cbx-segment-name").change(function(){
      var a = document.getElementsByClassName('cbx-segment-name');
      var b = document.getElementsByClassName('int-segment-qty');

      var i, j;

      for(i = 0; i < a.length; i++){
        for(j = 0; j < b.length; j++){
          if(a[i].id == b[j].id){
            if($('#' + a[i].id).is(":checked")){
              $('.' + b[j].id).removeAttr('disabled');
              $('.' + b[j].id).attr('required', true);
            }else{
              $('.' + b[j].id).attr('disabled', true);
              $('.' + b[j].id).val('');
            }
          }
        }
      }

    });

    $("#order-form").submit(function(){
      if(!$('.cbx-segment-name').is(":checked"))
      {
          alert('Please select at least one item.');
          return false;
      }
    })

  </script>

  <script>
    $(document).ready(function() {

      var values = {!! json_encode($values) !!};

      var cbx_id = document.getElementsByClassName('cbx-segment-name');
      var tf_qty = document.getElementsByClassName('int-segment-qty');

        for(var i = 0; i < values.length; i++){
          for(var j = 0; j < cbx_id.length; j++){
            if(cbx_id[j].id == values[i]){
              $('#' + cbx_id[j].id).prop('checked', true);
              $('.qty'  + tf_qty[j].id).val(quantity[i]);
              $('.qty'  + tf_qty[j].id).removeAttr('disabled');
            }
          }
        }


      $('select').material_select();
      });
  </script>

@stop