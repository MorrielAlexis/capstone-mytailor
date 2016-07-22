@extends('layouts.master')

@section('content')

  <div class="main-wrapper"  style="margin-top:30px" ng-app="tailoring" ng-controller="JobOrderController">

    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Job Order Progress</h4></span>
      </div>
    </div>

    <div class = "row">
      <div class="col s12 m12 l12">
        <div class="card-panel">

          <div class="row container left">
            <div class="input-field col s6">
              <i class="mdi-action-search prefix"></i>
              <input id="icon_prefix" type="text" class="validate">
              <label for="icon_prefix">Search Job Order</label>
            </div>
          </div>

          <div class="row">
            <div class="col s12">
              <table class="centered">
                <thead>
                  <tr>
                      <th style="color:#1b5e20">Track#</th>
                      <th style="color:#1b5e20">Customer Name</th>
                      <th style="color:#1b5e20">Due Date</th>
                      <th style="color:#1b5e20">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($joborder as $joborder)
                    <tr>
                      <td>{{$joborder->strJobOrderID}}</td>                        
                      <td>{{$joborder->strCompanyName}}{{$joborder->strIndivFName}} {{$joborder->strIndivMName}} {{$joborder->strIndivLName}}</td>
                      <td>{{$joborder->dtOrderExpectedToBeDone}}</td>
                      <td><button class="waves-effect waves-light btn" ng-click="details('{!! $joborder->strJobOrderID !!}')">Show Details</button></td>
                    </tr>                      
                  @endforeach
                </tbody>
              </table>
              <div class="col s12" style="border:3px solid #ffebee;" ng-hide="isEmpty">
                  <h3>Progress Update</h3>

                  <div class ="row">
                    <div class="col s12 m12 l12 overflow-x">
                      <table class = "centered">
                        <thead>
                          <tr>
                            <td> <center>Garment Category Name</center></td>
                            <td> <center>Segment Name</center></td>
                            <td> <center>Segment Pattern Name</center></td>
                            <td> <center>Quantity</center></td>
                            <td> <center>No. of Finished Garment</center></td>
                          </tr>
                        </thead>

                        <tbody>
                          
                            <tr ng-repeat="jobOrderDetail in jobOrderDetails">
                              <td>@{{ jobOrderDetail.strGarmentCategoryName }}</td>
                              <td>@{{ jobOrderDetail.strSegmentName }}</td>
                              <td>@{{ jobOrderDetail.strSegPName }}</td>
                              <td>@{{ jobOrderDetail.intQuantity }}</td>
                              <td>                      
                                <input type="input-field" value = "@{{ jobOrderDetail.intProgressAmount }}" id="progress[joborderDetail]"/>
                                <label id= "progress[joborderDetail]" fontsize= "+2"></label>                     
                              </td>
                            </tr>
                            <tr>
                              <td><b>TOTAL</b></td>
                              <td></td>
                              <td></td>
                              <td>@{{getTotal()}}</td>
                              <td>@{{getTotalProg()}}</td>
                            </tr>
                        </tbody>
                      </table>  
                    </div>
                    
                    <div class ="row">
                      <div class = "col s12">
                        <div class = "col s6">
                          <br>
                          <center><a class="waves-effect waves-light btn">Update</a></center>
                        </div>
                        <div class = "col s6">
                          <br>
                          <center><a class="waves-effect waves-light btn">Cancel</a></center>
                        </div>  
                      </div>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop

@section('scripts')

  <script>
    $(document).ready(function() {
      $('select').material_select();
      // var checked = 0;
      // var allItems = $('.chkbx').length;
      // $('.chkbx').each(function () {
      //   checked += this.checked ? 1 : 0;
      // });
      
      // var progress = checked > 0 ? ((checked/allItems) * 100) : 0;
      
      // console.log('progress', progress);
      
      // $('.determinate').css('width', progress + '%');

      // var lbl = document.getElementById("lbl");
      // lbl.style.fontSize = "2em";
      // lbl.innerHTML = progress + '%';

      // var span = document.getElementById("span");
      // span.style.fontSize = "1em";
      // span.innerHTML = progress + '%';
    });
  </script>


  <script type="text/javascript">
    // $('.chkbx').on('change', function () {
    //   var checked = 0;
    //   var allItems = $('.chkbx').length;
    //   $('.chkbx').each(function () {
    //     checked += this.checked ? 1 : 0;
    // });
      
    //   var progress = checked > 0 ? ((checked/allItems) * 100) : 0;
      
    //   console.log('progress', progress);
      
    // $('.determinate').css('width', progress + '%');

    //   var lbl = document.getElementById("lbl");
    //   lbl.style.fontSize = "2em";
    //   lbl.innerHTML = progress + '%';

    //   var span = document.getElementById("span");
    //   span.style.fontSize = "1em";
    //   span.innerHTML = progress + '%';
    // });
  </script>

 <script type="text/javascript">
    var app = angular.module('tailoring', []);

    app.controller('JobOrderController', function($scope, $http) {
      $scope.jobOrderDetails = [];
      $scope.isEmpty = true;
      // alert('Wahahahahaha');
      $scope.details = function(jobID) {
           $http.get('{!! url("details?jobID=") !!}' + jobID)
            .then(function(response) {
              var jobOrder = response.data.job_order_details;

              console.log(jobOrder);
              if(jobOrder.length > 0) {
                $scope.isEmpty = false;

                $scope.jobOrderDetails = jobOrder;
              } else {
                $scope.isEmpty = true;

              }
            }, function(response) {
                alert('No data found!');              
            });
      };
      $scope.getTotal = function(){
        var total = 0;
        for(var i = 0; i < $scope.jobOrderDetails.length; i++){
            var jobOrderDetail = $scope.jobOrderDetails[i];
            total += jobOrderDetail.intQuantity;
        }
        return total;
      }
      $scope.getTotalProg = function(){
        var totalProg = 0;
        for(var i = 0; i < $scope.jobOrderDetails.length; i++){
            var jobOrderDetail = $scope.jobOrderDetails[i];
            totalProg += jobOrderDetail.intProgressAmount;
        }
        return totalProg;
      }
      $scope.getProg = function(){
        var prog = 0;
        var total = 0;
        var totalProg = 0;

        for(var i = 0; i < $scope.jobOrderDetails.length; i++){
            var jobOrderDetail = $scope.jobOrderDetails[i];
            total += jobOrderDetail.intQuantity;
        }

        for(var i = 0; i < $scope.jobOrderDetails.length; i++){
            var jobOrderDetail = $scope.jobOrderDetails[i];
            totalProg += jobOrderDetail.intProgressAmount;
        }

        prog = (totalProg/total)*100;
        console.log(prog);
        $('.determinate').css('width', prog + '%');

        return prog;
      }
    });   
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('ul.tabs').tabs();
    });
  </script>

@stop