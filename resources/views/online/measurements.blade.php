@extends('layouts.master')

@section('content')

  <div class="section container white" style="width:90%; margin-top:20px; margin-bottom:20px; padding:40px;"> 

  	<div class="row" style="margin-top:40px;">
  		<div class="col s12">
  			<div class="col s2">
  				<div class="divider grey" style="margin-bottom:5px;"></div>
  				<div class="divider grey"></div>
  		  </div>

  	  	<div class="col s4" style="margin-top:-30px;">
  	  		<center><span style="font-size:43px; color: #757575; font-family:'Playfair Display','Times';">Choose measurement</span></center>
  	  	</div>

  		  <div class="col s6">
  				<div class="divider grey" style="margin-bottom:5px;"></div>
  				<div class="divider grey"></div>
  		  </div>
  	  </div>
    </div>

    <div class="container" style="width:90%;">

      <p>Our tailors can make your shirt to either your body or your favorite shirt measurements. For the best fit we recommend that you create your own measurements profile, otherwise we can adapt a standard size to your needs.</p>

      <div class="row" style="margin-top:20px; margin-bottom:20px;">
        <div class="col s2">
          <center><img style="margin-top:10px;" class = "responsive-img" src="imgOnline/measure_exist.jpg"></center>
        </div>
        <div class="col s10">
          <h5>I want to use previously added measurements</h5>
          <p>To use your profile please log in</p>
          <a class="btn-flat hoverable teal white-text modal-trigger" href="#modalLogin">LOG IN</a>
        </div>
      </div>

      <div class="row" style="margin-top:20px; margin-bottom:20px;">
        <div class="col s2">
          <center><img style="margin-top:10px;" class = "responsive-img" src="imgOnline/measure_body.jpg"></center>
        </div>
        <div class="col s10">
          <h5>Input a new set of measurements</h5>
          <p>Our measurement guide will help you take your body measurements with illustrated instructions.</p>
          <ul class="collapsible popout" data-collapsible="accordion">
            <li>
              <div class="collapsible-header pink accent-1"><i class="mdi-maps-local-florist"></i>MEASUREMENT FOR FEMALE</div>
              <div class="collapsible-body">
                <p class="pink-text accent-1"><b>For blazer, blouse, pants, and skirts</b></p>
                <div class="row">
                  <div class="col s6">
                    <ul>
                      <li>
                        <div class="input-field pink-text accent-1">
                          <input id="shoulder" type="text" class="validate">
                          <label for="shoulder">Shoulder:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="frontfigure" type="text" class="validate">
                          <label for="frontfigure">Front Figure:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="backfigure" type="text" class="validate">
                          <label for="backfigure">Back Figure:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="length" type="text" class="validate">
                          <label for="length">Length:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="bustline" type="text" class="validate">
                          <label for="bustline">Bust Line:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="bustpoint" type="text" class="validate">
                          <label for="bustpoint">Bust Point:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="bustdistance" type="text" class="validate">
                          <label for="bustdistance">Bust Distance:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="wasitline" type="text" class="validate">
                          <label for="wasitline">Waistline:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="firsthips" type="text" class="validate">
                          <label for="firsthips">1st Hips:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="secondhips" type="text" class="validate">
                          <label for="secondhips">2nd Hips:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="armhole" type="text" class="validate">
                          <label for="armhole">Armholearmhole:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="circumference" type="text" class="validate">
                          <label for="circumference">Circumference:</label>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="col s6">
                    <ul>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="sleeves" type="text" class="validate">
                          <label for="sleeves">Short/Long Sleeves:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="cuffs" type="text" class="validate">
                          <label for="cuffs">Cuffs:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="neckline" type="text" class="validate">
                          <label for="neckline">Neckline:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="frontchest" type="text" class="validate">
                          <label for="frontchest">Front Chest:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="backchest" type="text" class="validate">
                          <label for="backchest">Back Chest:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="skirtlength" type="text" class="validate">
                          <label for="skirtlength">Length of Skirt:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="pantslength" type="text" class="validate">
                          <label for="pantslength">Length of Pants:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="hipsterwaist" type="text" class="validate">
                          <label for="hipsterwaist">Waist (Hipster):</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="crotch" type="text" class="validate">
                          <label for="crotch">Crotch:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="thigh" type="text" class="validate">
                          <label for="thigh">Thigh:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="knee" type="text" class="validate">
                          <label for="knee">Knee:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field pink-text lighten-4">
                          <input id="bottom" type="text" class="validate">
                          <label for="bottom">Bottom:</label>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="collapsible-header green accent-2"><i class="mdi-maps-directions-car"></i>MEASUREMENT FOR MALE</div>
              <div class="collapsible-body">
                <div class="row">
                  <div class="col s6">
                    <p class="green-text accent-2"><b>Polo</b></p>
                    <ul>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="shoulder" type="text" class="validate">
                          <label for="shoulder">Shoulder:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="bust" type="text" class="validate">
                          <label for="bust">Bust:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="waist" type="text" class="validate">
                          <label for="waist">Waist:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="hips" type="text" class="validate">
                          <label for="hips">Hips:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="neck" type="text" class="validate">
                          <label for="neck">Neck:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="length" type="text" class="validate">
                          <label for="length">Length:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="sleeves" type="text" class="validate">
                          <label for="sleeves">Sleeves:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="armhole" type="text" class="validate">
                          <label for="armhole">Armhole:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="circumference" type="text" class="validate">
                          <label for="circumference">Circumference:</label>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="col s6">
                  <p class="green-text accent-2"><b>Pants</b></p>
                    <ul>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="crotch" type="text" class="validate">
                          <label for="crotch">Crotch:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="thigh" type="text" class="validate">
                          <label for="thigh">Thigh:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="knee" type="text" class="validate">
                          <label for="knee">Knee:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="bottom" type="text" class="validate">
                          <label for="bottom">Bottom:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="pantslength" type="text" class="validate">
                          <label for="pantslength">Pants Length:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="waist" type="text" class="validate">
                          <label for="waist">Waist:</label>
                        </div>
                      </li>
                      <li>
                        <div class="input-field green-text accent-2">
                          <input id="hip" type="text" class="validate">
                          <label for="hip">Hip:</label>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <a class="btn-flat hoverable teal white-text right" style="margin-right:25px;" href="#!">SUBMIT</a>
          <a class="btn-flat hoverable teal white-text right" style="margin-right:25px;" href="{{URL::to('/measuringTutorial')}}">GO TO TUTORIAL</a>
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

      <script type="text/javascript">

      $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
      });

      </script>


@stop