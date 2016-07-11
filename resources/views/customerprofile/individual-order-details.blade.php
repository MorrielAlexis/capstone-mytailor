@extends('layouts.masterOnline')

@section('content')

  <div class="row">
    <section id="ind_cust_profile">

      <!--HEADER-->
        <div class="col s12" style="padding-left:2%; padding-right:2%; padding-top:2%;">
          <div class="section">
            <div class="row" style="margin-top:40px;">
              

              <section id="ind_header">
                <div class="col s12">
                  <div class="col s4">
                    <div class="divider white" style="height:3px; margin-bottom:5px;"></div>
                    <div class="divider white" style="height:3px;"></div>
                  </div>

                  <div class="col s4" style="margin-top:-30px;">
                    <center><span><b>CUSTOMER PROFILE</b></span></center>
                  </div>

                  <div class="col s4">
                    <div class="divider white" style="height:3px; margin-bottom:5px;"></div>
                    <div class="divider white" style="height:3px;"></div>
                  </div>
                </div>
                <p class="center container">Welcome to your personal page here at MyTailor.</p>
              </section>


            </div>
          </div>
        </div>
      <!--END OF HEADER-->

      <!--CONTENT-->
        <div class="col s12" style="padding-left:2%; padding-right:2%;">

        <!--SIDE MENU-->
          <div class="col s3" style="padding:0;">
            <ul class="collapsible white">
              <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual')}}" class="collapsible-header"><font color="#424242">Information Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

              <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-measurement-details')}}" class="collapsible-header"><font color="#424242">Measurement Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

              <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-order-details')}}" class="collapsible-header teal lighten-4"><font size="+1" color="teal">Order Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

              <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-order-tracking')}}" class="collapsible-header"><font color="#424242">Order Tracking<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

              <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-payment-history')}}" class="collapsible-header"><font color="#424242">Payment History<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

              <div class="clear"></div>
            </ul>
          </div>
        <!--END OF SIDE MENU-->

        <!--CONTENT FOR SIDE MENU: Order Details-->
          <div class="col s9" style="margin-top:7px; padding-top:0; padding-right:0; padding-left:17px;">
            <div class="white" style="padding:20px;">
              <div style="border:4px solid #b2dfdb; padding:20px;">
                <section id="head">
                  <h3>Order Specification</h3>
                  <div class="divider" style="margin-top:-10px; margin-bottom:20px;"></div>
                  <span>Below are the list of orders you have made, as well as its specifications. Review each one to see if you have any changes to make.</span>
                </section>
                
                <br><br>
                <ul class="collapsible" data-collapsible="accordion" style="border:none;">
              
                  <li style="margin-bottom:10px;">
                    <div class="collapsible-header teal lighten-4">
                      <p style="margin:0; padding:0;"><b>Transaction No.:</b> #2316548</p>
                      <p style="margin:0; padding:0;"><b>Date of Order:</b> JUNE 07, 2016</p>
                    </div>

                    <div class="collapsible-body">
                      <div class = "row">

                        <div class="col s12 m12 l12 overflow-x">
                          <table class = "centered">
                            <thead>
                              <tr>
                                <th>Garment Type</th>
                                <th>Garment Name</th>
                                <th>Garment Image</th>
                                <th>Quantity</th>
                                <th>Fabric Type</th>
                                <th>Swatch Fabric Name</th>
                                <th>Swatch Image</th>
                                <th>Swatch Code</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Uniform</td>
                                <td>Women's Uniform</td>
                                <td><img class="responsive-img hoverable" src="../img/uniform3.jpg" style="width:100px; height:100px;"></td>
                                <td>1</td>
                                <td>Linen</td>
                                <td>Linen Keme</td>
                                <td><img class="responsive-img hoverable" src="../imgSwatches/citadel alpine.jpg" style="width:100px; height:100px;"></td>
                                <td>LINK001</td>
                              </tr>
                              <tr>
                                <td>Gown</td>
                                <td>Tube Cocktail</td>
                                <td><img class="responsive-img hoverable" src="../img/gown2.jpg" style="width:100px; height:100px;"></td>
                                <td>1</td>
                                <td>Cotton</td>
                                <td>Cotton Keme</td>
                                <td><img class="responsive-img hoverable" src="../imgSwatches/citadel grape.jpg" style="width:100px; height:100px;"></td>
                                <td>COT001</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                                  
                        <div class = "clearfix"></div>
                      </div>
                    </div>
                  </li>

                </ul>

              </div>
            </div>
          </div>
          <!--END OF CONTENT FOR SIDE MENU: Order Details-->

      </div>
    <!--END OF CONTENT-->

    </section>
  </div>

  <div class="col s12" style="margin:75px"></div>

@stop

@section('scripts')

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

  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>         

  <script>
   $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
   });
  </script>

  <script>
    $(document).ready(function(){
        $('.collapsible').collapsible({
          accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
    });
  </script>

  <script>
   $(document).ready(function(){
      $('.materialboxed').materialbox();
    });
   </script>

@stop