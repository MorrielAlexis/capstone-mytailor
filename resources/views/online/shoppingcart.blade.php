@extends('layouts.masterOnline')

@section('content')

<div class="section container" style="padding:20px; width:95%; margin-top:20px; margin-bottom:20px;">
  
  <center><h1 style="color:white; font-family:'Playfair Display','Times';">Shopping Cart</h1></center>
  <div class="divider" style="margin-bottom:15px;"></div>

</div>

  <div class="section container white" style="width:90%; margin-top:20px; margin-bottom:20px;"> 

      <div>
        <a style="margin-left:20px;" href="{{URL::to('/online-home')}}"><i style="size:20px;" class="mdi-hardware-keyboard-arrow-left"></i>CONTINUE SHOPPING</a>
      </div>

    <div class="divider" style="margin-top:5px;"></div>

    <div class="row">

      <div class="col s8">
        <h5 style="margin-left:20px; margin-top:20px; ">My shopping cart</h5>
        <div class="row">
          <div class="col s6">
            <h6 style="padding-left:20px;">2 ITEMS</h6>
          </div>
          <div class="col s6">
            <h6>ITEM DESCRIPTION</h6>
          </div>
        </div>

        <div class="container" style="width:95%; margin-top:-15px;">

          <!--Order 1-->
          <div class="grey lighten-3">
            <div class="row">

              <div class="col s6">
                <img style="padding:20px;" class = "responsive-img" src="imgOnlineUniform/uni4.jpg">
              </div>

              <div class="col s6">
                <div class="row">

                  <div class="col s7">
                    <p style="margin-top:30px;"><font size="+1">Women's Uniform</font></p>
                    <ul>
                      <li>Long Sleeves</li>
                      <li>Skirt</li>
                    </ul>
                  </div>

                  <div class="col s5">

                    <a class="right" style="padding:0px; margin-right:5px;" href="#!"><i style="color:grey" class="material-icons right">close</i></a>
                    <p class = "input-field" style="width:90%; margin-top:55px;">
                      <input class="center" id = "price" value = "PHP 1,400.00" name = "price" type = "text" readonly>
                      <label for = "price"><font size="+1" color="green"><b>PRICE:</b></font></label>
                    </p>

                  </div>

                  <div class="divider container" style"color:teal accent-4;"></div>

                  <form action="uniform">
                    <p>
                      <input class="with-gap" name="onlineshop" type="radio" id="shop"/>
                        <label for="shop">Go to shop for measurement</label>
                    </p>
                    <p>
                        <input class="with-gap" name="onlineshop" type="radio" id="online"/>
                        <label for="online">Submit measurement online</label>
                    </p>
                  </form>

                </div>
              </div>
            </div>


            <div class="row" style="margin-top:-20px;">
              <div class="col s6">
                <center><h6>Quantity</h6></center>
                <div class="container">
                  <div class="row">
                    <div class="col s3"><i class="small mdi-content-add-circle" style="color:teal"></i></div>
                    <div class="input-field col s6" style="margin-top:-2px;">
                      <input class="center" id="quantity" value="1" type="text" readonly>
                    </div>
                    <div class="col s3"><i class="small mdi-content-remove-circle" style="color:teal"></i></div>
                  </div>
                </div>
              </div>

              <div class="col s6">
                <div style="margin-right:10px;">
                  <center><a style="width:100%;" class="btn-flat disabled modal-trigger hoverable teal white-text" href="{{URL::to('/online-measurements')}}">MEASUREMENT</a></center>

                  <center><a style="width:100%; margin-top:10px;" class="btn-flat modal-trigger hoverable teal white-text" href="{{URL::to('/online-customize-order')}}">CUSTOMIZE ORDER</a></center>
                </div>
              </div>
            </div>

          </div>
          
          <!--Order 2-->
          <div class="grey lighten-3">
            <div class="row">

              <div class="col s6">
                <img style="padding:20px;" class = "responsive-img" src="imgOnlineGown/gown2.jpg">
              </div>

              <div class="col s6">
                <div class="row">

                  <div class="col s7">
                    <p style="margin-top:30px;"><font size="+1">Gown</font></p>
                    <ul>
                      <li>Tube</li>
                      <li>Cocktail</li>
                    </ul>
                  </div>

                  <div class="col s5">

                    <a class="right" style="padding:0px; margin-right:5px;" href="#!"><i style="color:grey" class="material-icons right">close</i></a>
                    <p class = "input-field" style="width:90%; margin-top:55px;">
                      <input class="center" id = "price" value = "PHP 2,700.00" name = "price" type = "text" readonly>
                      <label for = "price"><font size="+1" color="green"><b>PRICE:</b></font></label>
                    </p>

                  </div>

                  <div class="divider container" style"color:teal accent-4;"></div>

                  <form action="gown">
                    <p>
                      <input class="with-gap" name="gownonlineshop" type="radio" id="gownshop"/>
                        <label for="gownshop">Go to shop for measurement</label>
                    </p>
                    <p>
                        <input class="with-gap" name="gownonlineshop" type="radio" id="gownonline"/>
                        <label for="gownonline">Submit measurement online</label>
                    </p>
                  </form>

                </div>
              </div>
            </div>


            <div class="row" style="margin-top:-20px;">
              <div class="col s6">
                <center><h6>Quantity</h6></center>
                <div class="container">
                  <div class="row">
                    <div class="col s3"><i class="small mdi-content-add-circle" style="color:teal"></i></div>
                    <div class="input-field col s6" style="margin-top:-2px;">
                      <input class="center" id="quantity" value="1" type="text" readonly>
                    </div>
                    <div class="col s3"><i class="small mdi-content-remove-circle" style="color:teal"></i></div>
                  </div>
                </div>
              </div>

              <div class="col s6">
                <div style="margin-right:10px;">
                  <center><a style="width:100%;" class="btn-flat disabled modal-trigger hoverable teal white-text" href="{{URL::to('/online-measurements')}}">MEASUREMENT</a></center>

                  <center><a style="width:100%; margin-top:10px;" class="btn-flat modal-trigger hoverable teal white-text" href="{{URL::to('/online-customize-order')}}">CUSTOMIZE ORDER</a></center>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>

      <div class="col s4">
      <div style="height:55px;"></div>
          <p style="color:green;"><b>ORDER SUMMARY</b></p>
          <div class="divider" style="margin-top:-15px; width:90%;"></div>

              <div class="row container" style="width:95%;">
                <p class="col s6">Subtotal</p>
                <p class = "col s6 input-field" style="margin-top:-1px;">
                  <input class="center" id = "subtotal" value = "PHP 4,100.00" name = "subtotal" type = "text" readonly>
                </p>
              </div>

              <div class="row container" style="width:95%; margin-top:-20px;">
                <p class="col s6">Downpayment</p>
                <p class = "col s6 input-field" style="margin-top:-1px;">
                  <input class="center" id = "downpayment" value = "PHP 2,050.00" name = "downpayment" type = "text" readonly>
                </p>
              </div>
          
          <div class="divider" style="margin-top:-15px; width:90%;"></div>
          
          <div class="row container" style="width:95%;">
            <p class="col s6 red-text"><font size="+1"><b>TOTAL</b></font></p>
            <p class = "col s6 input-field" style="margin-top:-0px;">
                <b><input class="center" id = "total" value = "PHP 4,100.00" name = "total" type = "text" readonly></b>
            </p>
          </div>

        <div style="margin-top:-20px;">
          <a class="btn" style="width:90%; background:#e53935; height:60px; padding:10px;" href="{{URL::to('/online-check-out')}}">PROCEED TO CHECKOUT</a>
        </div>
      </div>

    </div>

  </div>

  <!--MODAL FOR LOG IN-->

      <div id="modalLogin" class="modal" style = "max-width:30%; max-height:70%;">
        <div class="modal-content">
          <h4>Log In</h4>
          <div class="row">
            <div class="input-field col s12">
                <i class="mdi-social-person-outline prefix"></i>
                <input class="validate" id="email" type="email">
                <label for="email" data-error="wrong" data-success="right" class="center-align">Email</label>
            </div>
          </div>

              <div class="row">
                  <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input id="password" type="password">
                    <label for="password">Password</label>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Log in</a>          
        </div>
      </div>




@stop

@section('scripts')  
    
    <script>
      $(document).ready(function(){
        $('.collapsible').collapsible({
          accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
      });

    </script>
    
@stop   
