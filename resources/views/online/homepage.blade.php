@extends('layouts.masterOnline')

@section('content')

        
    <div class="slider">
        <ul class="slides">
            <li>
                <img src="imgOnlineHomepageSlider/hmpgslider1.jpg">
            </li>
            <li>
                <img src="imgOnlineHomepageSlider/hmpgslider2.jpg">
            </li>
            <li>
                <img src="imgOnlineHomepageSlider/hmpgslider3.jpg">
            </li>
            <li>
                <img src="imgOnlineHomepageSlider/hmpgslider4.jpg">
            </li>
        </ul>
    </div>

    <div class="section container grey lighten-2" style="margin-top:20px; margin-bottom:100px; width:95%; height:70px;">
        <center><h5 style="font-family:'Playfair Display','Times'; margin:0px;"><b>FREE delivery</b></h5></center>
        <center><p style="margin:0px;">also with free alteration on every purchased item!</p></center>
    </div>

    <div class="row">
        <div class="col s6 center">
            <section id="gallery">
                <h2><a style="background-color:transparent; color:white; font-weight:normal" href="{{URL::to('/online-garment-uniform-female')}}">Custom Uniform</a></h2>
                <img alt="" src="imgOnline/uniform3.jpg">
                <p class="center-align white-text">
                    From different designs and options to choose from,
                    personalize uniforms for an exclusive style and
                    distinction.
                </p>          
                <a class="waves-effect waves-green btn-flat" href="{{URL::to('/online-garment-uniform-female')}}">PROCEED TO UNIFORM</a>
            </section>
        </div>
        
        <div class="col s6 center">
            <section id="gallery">
                <h2><a style="background-color:transparent; color:white; font-weight:normal" href="{{URL::to('/online-garment-gown')}}">Custom Gown</a></h2>
                <img alt="" src="imgOnline/gowns.jpg">
                <p class="center-align white-text">
                    Be the eye-catcher in events with custom
                    designed gowns and dresses. Choose from a variety
                    of fabrics!
                </p>         
                <a class="waves-effect waves-green btn-flat" href="{{URL::to('/online-garment-gown')}}">PROCEED TO GOWNS</a>
            </section>
        </div>
    </div>

    <div class="col s12" style="margin:75px"></div>

    <div class="row">
        <div class="col s6 center">
            <section id="gallery">
                <h2><a style="background-color:transparent; color:white; font-weight:normal" href="{{URL::to('/online-garment-suit')}}">Custom Suits</a></h2>
                <img alt="" src="imgOnline/suits.jpg">
                <p class="center-align white-text">
                    Look your best in a custom suit made 
                    with high quality fabrics & materials!
                </p>        
                <a class="waves-effect waves-green btn-flat" href="{{URL::to('/online-garment-suit')}}">PROCEED TO SUITS</a>
            </section>
        </div>
        
        <div class="col s6 center">
            <section id="gallery">
                <h2><a style="background-color:transparent; color:white; font-weight:normal" href="{{URL::to('/online-order-tracking')}}">Order Tracking</a></h2>
                <img alt="" src="imgOnline/ordertrack1.jpg">
                <p class="center-align white-text" style="padding-left:60px; padding-right:60px">
                    Experience made more personal with
                    this feature that let's you monitor 
                    order progress in real-time.
                </p>           
                <a class="waves-effect waves-green btn-flat" href="{{URL::to('/online-order-tracking')}}">TRACK YOURS HERE</a>
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
                <p class="center-align white-text" style="font-size:20px;">
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
        