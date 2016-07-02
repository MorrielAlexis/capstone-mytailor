@extends('layouts.masterOnline')


@section('content')

  <div class="section" style="margin-top:20px; margin-bottom:20px;">
    <div class="row">
      <div class="col s12">
        <ul class="tabs teal">
          <li id="tabLogin" class="tab col s4 active"><a href="#login"><font color="white" size="+1">1. LOGIN</font></a></li>
          <li id="tabdelivery" class="tab col s4"><a href="#delivery"><font color="white" size="+1">2. delivery</font></a></li>
          <li id="tabPayment" class="tab col s4"><a href="#payment"><font color="white" size="+1">3. PAYMENT</font></a></li>
              <div class="indicator teal accent-4" style="z-index:1"></div>
        </ul>
      </div>

      <!--LOGIN TAB-->
      <div id="login" class="col s12 white" style="border: 1px solid #00bfa5;">
        <div style="height:20px;"></div>

        <div class="container">
          <div style="padding:5px; border: 1px solid #00bfa5; margin-bottom:20px;">
            <h6 style="margin-left:20px;"><b>Login</b></h6>
            <div class="divider"></div>
            
            <div class="container" style="margin-top:40px; margin-bottom:40px;">
              <div class="container">
                <div class="input-field">
                  <input id ="email" type="text" class="validate">
                  <label for="email">Enter your email address</label>
                </div>
                <div class="input-field">
                  <input id ="password" type="text" class="validate">
                  <label for="password">Password</label>
                </div>
                <p class="right-align blue-text">Lost your password?</p>
                <div class="btn red darken-1 white-text container" style="width:100%;" href="#tabdelivery">CONTINUE</div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!--END OF LOGIN TAB-->

      <!--delivery TAB-->
      <div id="delivery" class="col s12 white" style="border: 1px solid #00bfa5;">
        <div style="height:20px;"></div>

          <div class="container">
            <div style="padding:5px; border: 1px solid #00bfa5; margin-bottom:20px;">
              <h6 style="margin-left:20px;"><b>Your delivery address</b></h6>
              <div class="divider"></div>
              
              <div class="container" style="margin-top:40px; margin-bottom:40px;">
                <div class="input-field">
                  <input id ="name" type="text" class="validate">
                  <label for="name">First & Last Name</label>
                </div>
                <div class="input-field">
                  <input id ="address" type="text" class="validate">
                  <label for="address">Complete Address</label>
                </div>
                <div class="input-field">
                  <input id ="province" type="text" class="validate">
                  <label for="province">Province</label>
                </div>
                <div class="input-field">
                  <input id ="city" type="text" class="validate">
                  <label for="city">City / Municipality</label>
                </div>
                <div class="input-field">
                  <input id ="brgy" type="text" class="validate">
                  <label for="brgy">Barangay</label>
                </div>
                <div class="input-field">
                  <input id ="number" type="text" class="validate">
                  
                  <label for="number">Mobile Number</label>
                </div>
                <form action="#">
                  <p>
                    <input type="checkbox" id="employee" />
                    <label for="employee">If this order is under a transaction from a company please indicate the name and address below before proceeding.</label>
                  </p>
                </form>
                <div class="input-field">
                  <input disabled id ="companyname" type="text" class="validate">
                  <label for="companyname">Company Name</label>
                </div>
                <div class="input-field">
                  <input disabled id ="companyadd" type="text" class="validate">
                  <label for="companyadd">Company Address</label>
                </div>

                <div class="container">
                  <center><h5 style="color:#e53935">Estimated Delivery</h5></center>
                  <p class = "input-field">
                    <input class="center" placeholder="days / weeks" id = "deliverydate" type = "text" class="validate">
                  </p>
                </div>

                <div class="divider"></div>

                  <form action="#">
                    <p class="center">
                      <input type="checkbox" id="delivernot" />
                      <label for="delivernot"><b><font size="+1" style="color:black">Pick-up order at MyTailor shop</font></b></label>
                    </p>
                  </form>

                <div class="btn red darken-1 white-text container" style=" margin-top:20px; width:100%; padding:5px; height:50px;" href="#tabPayment">CONTINUE</div>
              </div>

            </div>

          </div>
      </div>
      <!--END OF delivery TAB-->

      <!--PAYMENT TAB-->
      <div id="payment" class="col s12 white" style="border: 1px solid #00bfa5;">
        <div style="height:20px;"></div>

        <div class="row">
          <div class="col s4">
            <div style="border: 1px solid #00bfa5; margin-bottom:20px;">
              <h6 style="margin-left:20px;"><b>Delivery and Billing address</b><span class="blue-text" href="#!">  Edit</span></h6>
              <div class="divider"></div>
              
              <div class="container" style="margin-top:40px; margin-bottom:40px;">
                <div class="input-field">
                  <p><input class="center" placeholder="Full Name" id = "name" value = "" name = "name" type = "text" readonly></p>
                  <input class="center" placeholder="Complete Address" id = "completeaddress" value = "" name = "completeaddress" type = "text" readonly>
                  <input class="center" placeholder="Province - City - Brgy" id = "address" value = "" name = "address" type = "text" readonly>
                  <input class="center" placeholder="Mobile Number" id = "mobilenumber" value = "" name = "mobilenumber" type = "text" readonly>
                </div>
              </div>

            </div>
          </div>

          <div class="col s8">
            <div style="padding:5px; border: 1px solid #00bfa5;">
              <h6 class="green-text"><b>Order Summary</b> (2 items)</h6>
              <div class="divider"></div>
              <table class="responsive-table scrollable" style="margin-top:10px; margin-bottom:10px;">
                <thead>
                  <tr style="background-color:grey lighten-3;">
                    <th class="left-align"><font size="-1">PRODUCT</font></th>
                    <th class="center"><font size="-1">QUANTITY</font></th>
                    <th class="right-align"><font size="-1">PRICE</font></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Women's Uniform</td>
                    <td class="center">1</td>
                    <td class="right">1,700.00</td>
                  </tr>
                  <tr>
                    <td>Gown</td>
                    <td class="center">1</td>
                    <td class="right">2,400.00</td>
                  </tr>
                </tbody>
              </table>

              <div class="divider"></div>
              <div class="row" style="margin-top:10px; margin-bottom:10px;">
                <p class="col s6"><b>Downpayment</b></p>
                <p class = "col s6 input-field" style="margin-top:-1px;">
                  <input class="center" id = "subtotal" value = "P 2,050.00" name = "subtotal" type = "text" readonly>
                </p>
              </div>
              <div class="divider"></div>
              <div class="row" style="margin-top:10px;">
                <h6 class="col s6 blue-text"><b>Estimated Delivery</b></h6>
                  <p class = "col s6 input-field" style="margin-top:-1px;">
                    <b><input class="center" id = "deliverydate" value = "14 Mar - 15 Mar" name = "deliverydate" type = "text" readonly></b>
                  </p>
              </div>
            </div>
          </div>

        </div>

          <div class="row container">
            <div class="col s12">

              <div class="row" style="margin-top:70px;">
                
                <div class="col s12">
                  <div class="col s4">
                    <div class="divider grey"></div>
                  </div>

                  <div class="col s4" style="margin-top:-30px;">
                    <center><span style="font-size:35px; color: #e53935; font-family:'Playfair Display','Times';">Total amount to pay</span></center>
                  </div>

                  <div class="col s4">
                    <div class="divider grey"></div>
                  </div>
                </div>
              </div>

              <div class="container">
                <div class="container" style="font-family:'Playfair Display','Times';""><center><h3><b>Php 4,100.00</b></h3></center></div>
                <form action="#">
                  <p class="center">
                    <input type="checkbox" id="terms" />
                    <label for="terms">I have read and accepted the terms and conditions. - <font color="#40c4ff">View our terms (popup) here.</font></label>
                  </p>
                </form>
                <center><div class="btn red darken-1 white-text container" style="width:70%; height:40px; margin-top:20px;" href="{{URL::to('/online-home')}}"><i class="mdi-action-lock" style="margin-right:5px;"></i>PLACE YOUR ORDER</div></center>


              </div>
            </div>
          </div>


      </div>
      <!--END OF PAYMENT TAB-->


    </div>
  </div>


@stop

@section('scripts') 
  <script>
    $(document).ready(function(){
      $('ul.tabs').tabs();
    });
    </script>
@stop
