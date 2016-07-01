@extends('layouts.master')

@section('content')

<div class="main-wrapper"  style="margin-top:30px">

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Alteration </h5></center>
      </div>
    </div>

    <div class="row">
        <div class="col s12 m12 l12">
        	<div class="card-panel">

                <span class="card-title"><h5 style="color:#1b5e20"><center>Alteration Order</center></h5></span>
                <div class="divider" style="margin-bottom:50px;"></div>

            <div class="row">
                <div class="col s6" style="margin-top:10px;">
                      <div class="input-field col s12" style="padding:20px;">
                        <select>
                          <option value="" disabled selected>Choose your garment</option>
                          <option value="1">Uniform</option>
                          <option value="2">Gown</option>
                          <option value="3">Suit</option>
                        </select>
                        <label>Garment Type</label>
                      </div>
                      <div class="input-field col s12" style="padding:20px;">
                        <select>
                          <option value="" disabled selected>Choose your segment</option>
                          <option value="1">Polo</option>
                          <option value="2">Shorts</option>
                          <option value="3">Pants</option>
                        </select>
                        <label>Garment Segment</label>
                      </div>
                      <div class="input-field col s12" style="padding:20px;">
                        <div class="col s10">
                            <select multiple>
                              <option value="" disabled selected>What to alter?</option>
                              <option value="1">Hem</option>
                              <option value="2">Slim</option>
                              <option value="3">Sleeves</option>
                            </select>
                            <label>Alteration Type</label>
                        </div>
                        <div class="col s2">
                            <a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Supply measurements"><i class="mdi-av-playlist-add"></i></a>
                        </div>
                      </div>
                </div>
                <div class="col s6 container">
                    <center><img class="responsive-img" src="#!" style="height:250px; width:250px;"></center>
                    <form action="#">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </form>
                </div>
        	</div>

            <center><div><a class="btn green white-text container" style="height:50px; margin-top:20px; padding-top:5px;" href="{{URL::to('/transaction/walkin-individual-payment-customer-info')}}"><font color="black" size="+1">Proceed to CHECKOUT</font></a></div></center>

            </div>
        </div>
    </div>

    <!--Measurement button Modal-->
    <div id="measurementmodal" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4 style="color:#1b5e20" class="center">Measurements</h4>
            <div class="divider container" style="margin-bottom:20px;"></div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                </div>
            </div>

            <h4 style="color:#1b5e20" class="center">Note</h4>
            <div class="divider container" style="margin-bottom:20px;"></div>
                <div class="input-field col s12">
                    <textarea id="textarea" class="textarea"></textarea>
                    <label for="textarea"></label>
                </div>

        </div>

        <div class="modal-footer" style="background-color:#26a69a">
            <a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
            <a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
        </div>
    </div>
 @stop

 @section('scripts')

    <script>
          $(document).ready(function() {
            $('select').material_select();
          });
    </script>

    <script>
      $('.modal-trigger').leanModal({
          dismissible: true, // Modal can be dismissed by clicking outside of the modal
          opacity: .5, // Opacity of modal background
          in_duration: 300, // Transition in duration
          out_duration: 200, // Transition out duration
          width:400,
        }
      );
    </script>

@stop