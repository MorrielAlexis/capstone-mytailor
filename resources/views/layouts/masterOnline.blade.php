<!DOCTYPE html>
<html>
    <head>

      <title>MyTailor - Customer Module</title>
      
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Cormorant+Infant|Lemonada|Lobster+Two|Pacifico|Yatra+One|Philosopher" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Sintony:400,700" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Mada" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Rambla" rel="stylesheet">

      {!! Html::style('css/materialize.min.css') !!}
      {!! Html::style('css/styleOnline.css'); !!}

      <style>
      @import 'https://fonts.googleapis.com/css?family=Cormorant+Infant|Lemonada|Lobster+Two|Pacifico|Philosopher|Yatra+One|Roboto+Slab';
      </style>

      <style>

        body{
          background: #f2f2f2;
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
        <div class="navbar teal " >
          <nav style="height:40px">
            <div class="nav-wrapper">
              <img src="../../{{ Session::get('shop_logo') }}"  alt="" class="circle responsive-img valign profile-image center" style="height:90px; width:100px; margin-top:5px; margin-left:30px;">
            </div>
      </nav>
        </div>

        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
          @if(Auth::check())
          <a class="btn-floating btn-large red accent-3 tooltipped" data-position="left" data-delay="50" data-tooltip="Hi, {{ Auth::user()->name }}">
            @endif
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
              <a class="btn-floating yellow tooltipped" href="{{URL::to('/customerprofile-individual')}}" data-position="left" data-delay="50" data-tooltip="Profile">
              <i class="tiny mdi-action-info-outline" style="font-size:25px;"></i>
              </a>
            </li>
          </ul>
        </div>


        <div class="navbar  teal">
          <nav style=" font-family:'Sintony', sans-serif;  ">
            <div style="border-bottom:1px solid grey" class="nav-wrapper">

              <ul class="container">
                <li ><a class="btn-flat" style="color: white;font-size:18px" href="{{URL::to('/online-home')}}"><b >HOME</b></a></li>
                <li><div class="divider" style="margin-top:20px; width:1px; height:30px;"></div></li>
                <li>
                  <a style="color: white;font-size:18px" class="dropdown-button btn-flat" data-beloworigin="true" data-activates="downdown"><b>GARMENTS</b></a>
                  <ul id="downdown" class="dropdown-content" style="margin-left:14px">
                    <li><a href="{{URL::to('/online-garment-suit')}}">SUITS</a></li>
                   <!-- <li><a href="{{URL::to('/online-garment-gown')}}">GOWNS</a></li> -->
                    <li><a href="{{URL::to('/online-garment-uniform-male')}}">MEN'S SHIRT</a></li>
                    <li><a href="{{URL::to('/online-garment-uniform-female')}}">WOMEN'S SHIRT</a></li>
                    <li><a href="{{URL::to('/online-garment-pants')}}">PANTS</a></li>
                    <li><a href="{{URL::to('/online-garment-sets')}}">SETS</a></li>
                  </ul>
                </li>
                <li><div class="divider" style="margin-top:20px; width:1px; height:30px;"></div></li>
                <li>
                  <a style="color: white;font-size:18px" class="dropdown-button btn-flat" data-beloworigin="true" href="#" data-activates="alter"><b>ALTERATION</b></a>
                  <ul id="alter" class="dropdown-content" style="margin-left:14px">
                    <li><a href="{{URL::to('transaction/online-alteration')}}">SERVICES</a></li>
                    <li><a href="{{URL::to('transaction/online-alteration-transact')}}">TRANSACTION</a></li>
                  </ul>
                </li>
                <li><div class="divider" style="margin-top:20px; width:1px; height:30px;"></div></li>
                <li><a class="btn-flat" style="color: white;font-size:18px" href="{{URL::to('/online-how-it-works')}}"><b>HOW IT WORKS</b></a></li>
                <li><div class="divider" style="margin-top:20px; width:1px; height:30px;"></div></li>
                <li><a class="btn-flat" style="color: white;font-size:18px" href="{{URL::to('')}}"><b>CATALOGUE</b></a></li>
              </ul>
              <ul id="shoppingcart" class="right" style="margin-right:10px;">
                <li><a href="{{URL::to('/shopping-cart')}}" style="margin:0; padding:0;" class="btn-flat white-text">Shopping Cart</a></li>
                <li><a href="{{URL::to('/shopping-cart')}}" style="margin:0; padding:0;" class="btn-flat"><i class="white-text mdi-action-shopping-cart" style="font-size:30px; margin-top:-15px;"></i></a></li>
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

        <footer class="page-footer teal">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text" >My Tailor</h5>
                <p class="grey-text text-lighten-4" style="font-size:18px">This is the Customer site of the system My Tailor. Go customize your orders!</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">About Us</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Contact Us</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            Copyright © 2015-2016 My Tailor. All rights reserved
            
            </div>
          </div>
        </footer>
      </main>


      {!! Html::script('js/jquery-2.1.4.min.js') !!}
      {!! Html::script('js/materialize.min.js') !!}
      {!! Html::script('js/angular.min.js'); !!}
      
      <script>

      $(document).ready(function(){
        $('.dropdown-button').dropdown({
          inDuration: 500,
          outDuration: 500,
          constrain_width: true, // Does not change width of dropdown to that of the activator
          hover: false, // Activate on hover
          gutter: -2, // Spacing from edge
          belowOrigin: false, // Displays dropdown below the button
          alignment: 'right'
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