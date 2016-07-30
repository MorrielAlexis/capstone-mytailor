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
                            <th> <center>Garment Category Name</center></th>
                            <th> <center>Segment Name</center></th>
                            <th> <center>Quantity</center></th>
                            <th> <center>No. of Finished Garment</center></th>
                            <th><center>Action</center><th>
                          </tr>
                        </thead>

                        <tbody>
                          
                            <tr ng-repeat="jobOrderDetail in jobOrderDetails">
                              <td>@{{ jobOrderDetail.strGarmentCategoryName }}</td>
                              <td>@{{ jobOrderDetail.strSegmentName }}</td>
                              <td>@{{ jobOrderDetail.intQuantity }}</td>
                              <td>                     
                                <input type="text" min= "0" max = "@{{ jobOrderDetail.intQuantity }}"  ng-model ="jobOrderDetail.intProgressAmount"/>                
                              </td> 
                              <td><button class="waves-effect waves-light btn" ng-click="update(jobOrderDetail.strJOSpecificID, jobOrderDetail.intProgressAmount)">Update</button></td>

                            </tr>
                            <tr>
                              <td><b>TOTAL</b></td>
                              <td></td>
                              <td><b>@{{getTotal()}}</b></td>
                              <td><b>@{{getTotalProg()}}</b></td>
                              <td></td>
                            </tr>
                        </tbody>
                      </table>  
                    </div>
                    
                    <div class ="row">
                      <div class = "col s12">
                        <br>
                        <center><button class="waves-effect waves-light btn" ng-click="cancel()">CLOSE</button></center>
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
    });
  </script>

<script type="text/javascript">
  $('.progress').on('input', function(){
   alert($(this).val());
   console.log($(this).val()); 
  });
</script>


 <script type="text/javascript">
    var app = angular.module('tailoring', [])
      .constant('CSRF_TOKEN', '{!! csrf_token() !!}');

    app.controller('JobOrderController', function($scope, $http, CSRF_TOKEN) {
      $scope.jobOrderDetails = [];
      $scope.isEmpty = true;
      // $scope.qty = [];
      $scope.details = function(jobID) {
           $http.get('{!! url("details?jobID=") !!}' + jobID)
            .then(function(response) {
              var jobOrder = response.data.job_order_details;

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
      $scope.cancel = function(){
        $scope.isEmpty=true;
      }
      $scope.update = function(progID, intQua){
        console.log(progID);
        console.log(intQua);

        $http({
          url: '{!! url("update") !!}',
          method: 'post',
          data: $.param({
            _token          : CSRF_TOKEN,
            strJOSpecificID : progID,
            intQuantity     : intQua
          }),
          headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {
          console.log(response.data);
          alert('Successfully Updated!');
        }, function(error) {
          alert('An error occurred!');
        });

      } 
      $scope.getTotal = function(){
        var total = 0;
        for(var i = 0; i < $scope.jobOrderDetails.length; i++){
            var jobOrderDetail = $scope.jobOrderDetails[i];
            total += parseInt(jobOrderDetail.intQuantity);
        }
        return parseInt(total);
      }
      $scope.getTotalProg = function(){
        var totalProg = 0;
        for(var i = 0; i < $scope.jobOrderDetails.length; i++){
            var jobOrderDetail = $scope.jobOrderDetails[i];
            totalProg += parseInt(jobOrderDetail.intProgressAmount);
        }
        return parseInt(totalProg);
      }
      $scope.getProg = function(){
        var prog = 0;
        var total = 0;
        var totalProg = 0;


        for(var i = 0; i < $scope.jobOrderDetails.length; i++){
            var jobOrderDetail = $scope.jobOrderDetails[i];
            total += parseInt(jobOrderDetail.intQuantity);
        }

        for(var i = 0; i < $scope.jobOrderDetails.length; i++){
            var jobOrderDetail = $scope.jobOrderDetails[i];
            totalProg += parseInt(jobOrderDetail.intProgressAmount);
            
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