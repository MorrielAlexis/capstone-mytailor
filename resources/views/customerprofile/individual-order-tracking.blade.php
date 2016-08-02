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

                <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-order-details')}}" class="collapsible-header"><font color="#424242">Order Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

                <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-order-tracking')}}" class="collapsible-header teal lighten-4"><font size="+1" color="teal">Order Tracking<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

                <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-payment-history')}}" class="collapsible-header"><font color="#424242">Payment History<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

                <div class="clear"></div>
              </ul>
            </div>
          <!--END OF SIDE MENU-->

          <!--CONTENT FOR SIDE MENU: Order Tracking-->
            <div class="col s9" ng-app= "OrderTracking"  ng-controller= "OrderTrackingController" style="margin-top:7px; padding-top:0; padding-right:0; padding-left:17px;">
              <div class="white" style="padding:20px;">
                <div style="border:4px solid #b2dfdb; padding:20px;">
                  <section id="head">
                    <h3>Order Tracking</h3>
                    <div class="divider" style="margin-top:-10px; margin-bottom:20px;"></div>
                  </section>

                    <div class="row">
                      <div class="col s12">
                        <div class="col s12">
                          <div class="col offset-s8">
                            <div class = "input-field col s6">
                              <label for = "trackno"><font color="teal">Tracking code</font></label>
                              <input class="center" id = "trackno" name = "trackno" type = "text" ng-model= "trackID">
                            </div>
                            <div class = "col s6">
                              <button ng-click = "track(trackID)" class="teal waves-effect waves-light btn-flat white-text" style="margin-top:10px;" >Track</button>
                            </div>
                          </div>
                        </div>
                        <div class="col s12" style="border:3px solid #ffebee;" ng-hide="isEmpty">
                            <h3>Progress Update</h3>

                            <div class ="row">
                              <div class="col s12 m12 l12 overflow-x">
                                <table class = "centered">
                                  <thead>
                                    <tr>
                                      <th> <center>Garment Category Name</center></th>
                                      <th> <center>Segment Name</center></th>
                                      <th> <center>Quantity</center></th>
                                      <th> <center>No. of Finished Garment</center></th>
                                      <th> <center>Date Ordered</center></th>
                                      <th> <center>Date Order Expected to be Done</center></th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                    
                                      <tr ng-repeat="trackDetail in trackDetails">
                                        <td>@{{ trackDetail.strGarmentCategoryName }}</td>
                                        <td>@{{ trackDetail.strSegmentName }}</td>
                                        <td>@{{ trackDetail.intQuantity }}</td>
                                        <td>@{{ trackDetail.intProgressAmount }}</td>
                                        <td>@{{ trackDetail.dtOrderDate }}</td>
                                        <td>@{{ trackDetail.dtOrderExpectedToBeDone }}</td>                                       
                                      </tr>
                                      <tr>
                                        <td><b>TOTAL</b></td>
                                        <td></td>
                                        <td><b>@{{getTotal()}}</b></td>
                                        <td><b>@{{getTotalProg()}}</b></td>
                                        <td></td>
                                        <td></td>
                                      </tr>
                                  </tbody>
                                </table>  
                              </div>

                              <div class ="row">
                                <div class = "col s12">
                                  <label><font size = "+2">Progress Bar: &#09</font></label>
                                  <label id= "lbl"> <font Size= "+2">@{{getProg()}} %</font></label>
                                </div>
                              </div>

                              <div class = "clearfix"></div>
                              <div class="progress" style= "height: 30px;">
                                <div class="determinate" style="@{{getProg()}}" >
                                  <span id="span" style = "padding-left: 558px;"></span>
                                </div>
                              </div> 
                            </div>

                        </div>
                        <div class = "col s12" style= "border:3px solid #ffebee;" ng-hide="isNull">
                          <div class = "row">
                            <div class = "card">
                              <center><h4>No data found</h4></center>
                            </div>  
                          </div>  
                        </div>  
                      </div>
                    </div>
                </div>
              </div>
            </div>
          <!--END OF CONTENT FOR SIDE MENU: Order Tracking-->

      </div>
    <!--END OF CONTENT-->

    </section>
  </div>
  
  <div class="col s12" style="margin:75px"></div>

@stop

@section('scripts')

  <script type="text/javascript">
    var app = angular.module('OrderTracking', []);

    app.controller('OrderTrackingController', function($scope, $http){
      $scope.trackDetails = [];
      $scope.isEmpty = true;
      $scope.isNull = false;

      $scope.track = function(trackID){
        console.log(trackID);
        $http.get('{!! url("track?trackID=") !!}' + trackID)
          .then(function(response) {
            var trackOrder = response.data.track_details;

            if(trackOrder.length > 0) {
              $scope.isEmpty = false;
              $scope.isNull = true;

              $scope.trackDetails = trackOrder;
            } else {
              $scope.isEmpty = true;
              $scope.isNull = false;

            }
          }, function(response) {
              alert('No data found!');              
          });
      }

      $scope.getTotal = function(){
        var total = 0;
        for(var i = 0; i < $scope.trackDetails.length; i++){
            var trackDetail = $scope.trackDetails[i];
            total += parseInt(trackDetail.intQuantity);
        }
        return parseInt(total);
      }
      $scope.getTotalProg = function(){
        var totalProg = 0;
        for(var i = 0; i < $scope.trackDetails.length; i++){
            var trackDetail = $scope.trackDetails[i];
            totalProg += parseInt(trackDetail.intProgressAmount);
        }
        return parseInt(totalProg);
      }
      $scope.getProg = function(){
        var prog = 0;
        var total = 0;
        var totalProg = 0;


        for(var i = 0; i < $scope.trackDetails.length; i++){
            var trackDetail = $scope.trackDetails[i];
            total += parseInt(trackDetail.intQuantity);
        }

        for(var i = 0; i < $scope.trackDetails.length; i++){
            var trackDetail = $scope.trackDetails[i];
            totalProg += parseInt(trackDetail.intProgressAmount);
            
        }

        total = parseInt(total);
        totalProg = parseInt(totalProg);
        prog = (totalProg/total)*100;
        $('.determinate').css('width', prog + '%');

        return prog.toFixed(2);
      }

    });
  </script>

@stop