@extends('layouts.masterOnline')

@section('content')
    
    <style type="text/css">
        #gallery h2{
            background-color: #f2f2f2;
            border-style: solid;
            border-color: #595959;
            border-width: 4px 4px 4px 0px;
        }
        .slider .indicators .indicator-item{
            background-color: #262626;
        }
        .slider .indicators .indicator-item.active{
            background-color: #26a69a;
        }
    </style>

        
    <div class="slider" style="margin-bottom:40px;">
        <ul class="slides">
            <li>
                <img src="imgOnlineHomepageSlider/1.jpg">
            </li>
            <li>
                <img src="imgOnlineHomepageSlider/2.jpg">
            </li>
            <li>
                <img src="imgOnlineHomepageSlider/3.jpg">
            </li>
            <li>
                <img src="imgOnlineHomepageSlider/slide6.jpg">
            </li>
            <li>
                <img src="imgOnlineHomepageSlider/slide16.jpg">
            </li>
        </ul>
    </div>

    <!--Add -->
        @if(Session::has('flash_message'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow accent-1">
              <span class="alert alert-success"> <i class="tiny mdi-navigation-close right" onclick="$('#flash_message').hide()"></i></span>
             <em> {!! session('flash_message') !!}</em>
            </div>
          </div>
        </div>
      @endif

    <div class="row">

        <div class="col s12 m12 l6 center" style="margin-top:40px">
            <section id="gallery" >
                <h2><a style="background-color:transparent; color:#009688; font-weight:normal;font-family: 'Mada', sans-serif;" href="{{URL::to('/online-garment-uniform-female')}}">Custom Uniform</a></h2>
                <img alt="" src="imgOnline/uniform.jpg"  style="">
                <p class="center-align" style="color:#212121;font-family: 'Rambla', sans-serif;">
                    From different designs and options to choose from,
                    personalize <br>uniforms for an exclusive style and
                    distinction.
                </p>          
                <a class="waves-effect  btn-flat" style="background-color:#26a69a;color:white" href="{{URL::to('/online-garment-uniform-female')}}">PROCEED TO UNIFORM</a>
            </section>
        </div>
        
        <div class="col s12 m12 l6 center" style="margin-top:40px"> 
            <section id="gallery" >
                <h2><a style="background-color:transparent; color:#009688; font-weight:normal;font-family: 'Mada', sans-serif;" href="{{URL::to('/online-garment-gown')}}">Custom Gown</a></h2>
                <img alt=""  src="imgOnline/gown.jpg" style="">
                <p class="center-align" style="color:#212121;font-family: 'Rambla', sans-serif;">
                    Be the eye-catcher in events with custom
                    designed gowns and<br> dresses. Choose from a variety
                    of fabrics!
                </p>         
                <a class="waves-effect waves-green btn-flat" style="background-color:#26a69a;color:white" href="{{URL::to('/online-garment-gown')}}">PROCEED TO GOWNS</a>
            </section>
        </div>
    </div>

    <div class="col s12" style="margin:75px"></div>

    <div class="row">
        <div class="col s12 m12 l6 center" style="margin-top:40px">
            <section id="gallery" >
                <h2><a style="background-color:transparent; color:#009688; font-weight:normal;font-family: 'Mada', sans-serif;" href="{{URL::to('/online-garment-suit')}}">Custom Suits</a></h2>
                <img alt="" src="imgOnline/suit4.jpg" style="">
                <p class="center-align" style="color:#212121;font-family: 'Rambla', sans-serif;">
                    Look your best in a custom suit made 
                    with high quality fabrics & <br>materials!
                </p>   
                <a class="waves-effect waves-green btn-flat" style="background-color:#26a69a;color:white" href="{{URL::to('/online-garment-suit')}}">PROCEED TO SUITS</a>
            </section>
        </div>
        
        <div class="col s12 m12 l6 center" style="margin-top:40px">
            <section id="gallery" >
                <h2><a style="background-color:transparent; color:#009688; font-weight:normal;font-family: 'Mada', sans-serif;" href="{{URL::to('/online-order-tracking')}}">Order Tracking</a></h2>
                <img alt="" src="imgOnline/csuit.jpg" style="">
                <p class="center-align" style="color:#212121;padding-left:60px; padding-right:60px;font-family: 'Rambla', sans-serif;">
                    Experience made more personal with
                    this feature that let's you <br> monitor 
                    order progress in real-time.
                </p>           
                <a class="waves-effect waves-green btn-flat" style="background-color:#26a69a;color:white" href="{{URL::to('/online-order-tracking')}}">TRACK YOURS HERE</a>
            </section>
        </div>
    </div>

    <div class="col s12" style="margin:75px"></div>
    <!-- 
    <div class="row container">        
        <div class="container center">
            <div class="container">
                <h2 class="white-text" style="font-family:'Playfair Display','Times';">How It Works</h2>
                <img style="width:100%; height:300px;" class="responsive-img" src="imgOnline/howitwork.jpg">
                <p class="center-align" style="font-size:20px;">
                    Easy steps to follow for a perfect fit.
                    In just a couple of minutes, the measurements
                    for perfect fitting will be ready for the garments! 
                </p>
            </div>
        </div>
    </div>
    <div class="row container">
        <div class="container center">
            <div><a class="waves-effect waves-green btn-flat teal-text" href="{{URL::to('/online-how-it-works')}}" style="background-color:#ede7f6;">MEASURE ON YOUR OWN</a></div>
        </div>
    </div>
    -->
      
    @stop

@section('scripts')  
     <script>
        $(document).ready(function(){
            $('.slider').slider({full_width: true});
            // Pause slider
            $('.slider').slider('pause');
            // Start slider
            $('.slider').slider('start');
            // Next slide
            $('.slider').slider('next');
            // Previous slide
            $('.slider').slider('prev');
        });
    </script>

    <script>
    $(window).load(function() {
    // The slider being synced must be initialized first
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 210,
            itemMargin: 5,
            asNavFor: '#slider'
        });
 
        $('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel"
        });
    });
    </script>
@stop                             
        