<!DOCTYPE html>
<html>
    <head>

      <title>Customer Module</title>
      
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      {!! Html::style('css/materialize.min.css') !!}
      {!! Html::style('css/styleOnline.css'); !!}

      <style>
        body{
          background: url('img/gradient.jpg');
          background-size: cover;
        }
        nav{
          box-shadow: 0px 0px;
          padding: 0;
        }
        .btn{
          background: #cccccc;
          padding: 0;
        }
        .fixed-footer{
          margin-bottom: -30px;
        }
      </style>
    </head>

    <body>

      <nav>
        <div class="navbar teal">
          <nav style="height:40px">
            <div class="nav-wrapper">
              <img src="../imgOnline/logo.jpg"  alt="" class="circle responsive-img valign profile-image center" style="height:90px; width:100px; margin-top:5px; margin-left:30px;">
            </div>
          </nav>
        </div>

        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
          <a class="btn-floating btn-large red accent-3 tooltipped" data-position="left" data-delay="50" data-tooltip="Hi, Honey May">
            <i class="large mdi-action-perm-identity" style="font-size:30px;"></i>
          </a>
          <ul>
            <li>
              <a class="btn-floating blue tooltipped" href="{{URL::to('/logout')}}" data-position="left" data-delay="50" data-tooltip="Logout">
              <i class="tiny mdi-action-input" style="font-size:25px;"></i>
              </a>
            </li>
            <li>
              <a class="btn-floating purple tooltipped" href="{{URL::to('/online-order-now')}}" data-position="left" data-delay="50" data-tooltip="Orders">
              <i class="tiny mdi-action-shopping-basket" style="font-size:25px;"></i>
              </a>
            </li>
            <li>
              <a class="btn-floating yellow tooltipped" href="{{URL::to('/customerprofile')}}" data-position="left" data-delay="50" data-tooltip="Profile">
              <i class="tiny mdi-action-info-outline" style="font-size:25px;"></i>
              </a>
            </li>
          </ul>
        </div>


        <div class="navbar teal">
          <nav>
            <div style="border-bottom:1px solid grey" class="nav-wrapper">

              <ul class="container">
                <li><a class="btn-flat" style="padding-left:10px; padding-right:10px; margin:0px; color: white;" href="{{URL::to('/online-home')}}"><b>HOME</b></a></li>
                <li><div class="divider" style="margin-top:20px; width:1px; height:25px;"></div></li>
                <li>
                  <a style="color: white; padding-left:15px; padding-right:15px; margin:0px;" class="dropdown-button btn-flat" data-beloworigin="true" href="#" data-activates="downdown"><b>GARMENTS</b></a>
                  <ul id="downdown" class="dropdown-content">
                    <li><a href="{{URL::to('/online-garment-suit')}}">SUITS</a></li>
                    <li><a href="{{URL::to('/online-garment-gown')}}">GOWNS</a></li>
                    <li><a href="{{URL::to('/online-garment-uniform-male')}}">UNIFORMS for MALE</a></li>
                    <li><a href="{{URL::to('/online-garment-uniform-female')}}">UNIFORMS for FEMALE</a></li>
                  </ul>
                </li>
                <li><div class="divider" style="margin-top:20px; width:1px; height:25px;"></div></li>
                <li>
                  <a style="color: white; padding-left:15px; padding-right:15px; margin:0px;" class="dropdown-button btn-flat" data-beloworigin="true" href="#" data-activates="alter"><b>ALTERATION</b></a>
                  <ul id="alter" class="dropdown-content">
                    <li><a href="{{URL::to('/online-alteration')}}">SERVICES</a></li>
                    <li><a href="{{URL::to('/online-alteration-transact')}}">TRANSACTION</a></li>
                  </ul>
                </li>
                <li><div class="divider" style="margin-top:20px; width:1px; height:25px;"></div></li>
                <li><a class="btn-flat" style="padding-left:10px; padding-right:10px; margin:0px; color: white" href="{{URL::to('/online-order-tracking')}}"><b>ORDER TRACKING</b></a></li>
                <li><div class="divider" style="margin-top:20px; width:1px; height:25px;"></div></li>
                <li><a class="btn-flat" style="padding-left:10px; padding-right:10px; margin:0px; color: white" href="{{URL::to('/online-how-it-works')}}"><b>HOW IT WORKS</b></a></li>                
              </ul>
              <ul id="shoppingcart" class="right" style="margin-right:10px;">
                <li><a href="{{URL::to('/online-order-now')}}" style="margin:0; padding:0;" class="btn-flat white-text">Shopping Cart</a></li>
                <li><a href="{{URL::to('/online-order-now')}}" style="margin:0; padding:0;" class="btn-flat"><i class="white-text mdi-action-shopping-cart" style="font-size:30px; margin-top:-15px;"></i></a></li>
              </ul>
            </div>
          </nav>
        </div>
      </nav>

      <!--
      <div class="right">
        <a href="{{URL::to('/ordernow')}}" class="btn-flat white-text" style="margin-right:-50px">Shopping Cart</a>
        <a href="{{URL::to('/ordernow')}}" class="btn-flat"><i class="white-text mdi-action-shopping-cart" style="font-size:30px;"></i></a>
      </div>
      -->


      <main>
        <div style="height:40px;"></div>
        @yield('content')

        <footer class="fixed-footer">
          <div style="background-color:#cccccc" class="page-footer">
              <div class="container">
                <div class="row">
                  <div class="col s3">
                    <h5 class="teal-text"><b>MY STORE</b></h5>
                    <ul>
                      <li><a class="black-text" href="#!">Order Now!</a></li>
                      <li><a class="black-text" href="#!">Uniform Garments</a></li>
                      <li><a class="black-text" href="#!">Gown Garments</a></li>
                      <li><a class="black-text" href="#!">Suit Garments</a></li>
                      <li><a class="black-text" href="#!">How It Works</a></li>
                      <li><a class="black-text" href="#!">Order Tracking</a></li>
                    </ul>
                  </div>
                  <div class="col s3">
                    <h5 class="teal-text"><b>SERVICE</b></h5>
                    <ul>
                      <li><a class="black-text" href="#!">Style Consultation</a></li>
                      <li><a class="black-text" href="#!">Showroom</a></li>
                      <li><a class="black-text" href="#!">Fit Promise</a></li>
                      <li><a class="black-text" href="#!">Shipping Policy</a></li>
                      <li><a class="black-text" href="#!">Alterations/ Remakes/ Returns</a></li>
                    </ul>
                  </div>
                  <div class="col s3">
                    <h5 class="teal-text"><b>ABOUT US</b></h5>
                    <ul>
                      <li><a class="black-text" href="#!">Our Story</a></li>
                      <li><a class="black-text" href="#!">Reviews</a></li>
                      <li><a class="black-text" href="#!">Quality</a></li>
                    </ul>
                  </div>
                  <div class="col s3">
                    <h5 class="teal-text"><b>MORE</b></h5>
                    <ul>
                      <li><a class="black-text" href="#!">Contact Us</a></li>
                      <li><a class="black-text" href="#!">Terms</a></li>
                      <li><a class="black-text" href="#!">FAQs</a></li>
                      <li><a class="black-text" href="#!">Shipping</a></li>
                    </ul>
                  </div>

                </div>
              </div>
              <div class="footer-copyright">
                <div class="container">
                Copyright © myTailor. All rights reserved.
                </div>
              </div>
            </div>
        </footer>
      </main>


      {!! Html::script('js/jquery-2.1.4.min.js') !!}
      {!! Html::script('js/materialize.min.js') !!}
      
      <script>

      $(document).ready(function(){
        $('.dropdown-button').dropdown({
          inDuration: 500,
          outDuration: 300,
          constrain_width: false, // Does not change width of dropdown to that of the activator
          hover: true, // Activate on hover
          gutter: 0, // Spacing from edge
          belowOrigin: false, // Displays dropdown below the button
          alignment: 'left' // Displays dropdown with edge aligned to the left of button
        });
      });
          
      </script>

      <script type="text/javascript">

      $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
      });

      </script>

      <script>
       $(document).ready(function(){
        $('.tooltipped').tooltip({delay: 50});
      });
      </script>

      <script>
        $('.fixed-action-btn').openFAB();
        $('.fixed-action-btn').closeFAB();
      </script>

        @yield('scripts')



    </body>


</html>