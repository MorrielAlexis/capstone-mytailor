@extends('layouts.master')

@section('content')

    <div class="col s12">
        
        <div id="card-stats"  >
            <div class="row" style="margin-top:30px">
                <div class="col s12 m6 l4">
                    <div class="card" >
                        @foreach($totalCustIndiv as $totalCustIndiv)
                        <div class="card-content  green lighten-2 white-text" style="max-height: 40%; min-height: 40%">
                            <center>
                                <p class="card-stats-title" style="font-size:19px"><i class="mdi-social-group-add"></i> Total Registered Individuals</p>
                                <h4 class="card-stats-number">{{$totalCustIndiv->ctr}}</h4>
                            </center>

                        </div>
                        <div class="card-action green" style="height:40px; padding-top: 2%; padding-bottom: 2%">
                            <div id="clients-bar">
                            <a href="{{URL::to('maintenance/individual')}}" style="color:white">
                            <i class="mdi-hardware-keyboard-arrow-up white-text"></i> Go to details
                            </a>
                            <canvas width="220" height="25" style="display: inline-block; width: 220px; height: 25px; vertical-align: top;"></canvas></div>
                               
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col s12 m6 l4">
                    <div class="card">
                        @foreach($totalCustComp as $totalCustComp)
                        <div class="card-content cyan darken-1 white-text" style="max-height: 40%; min-height: 40%">
                            <center>
                                <p class="card-stats-title" style="font-size:19px"><i class="mdi-action-account-child"></i>Total Registered Companies</p>
                                <h4 class="card-stats-number">{{$totalCustComp->totalCompanies}}</h4>
                            </center>
                        </div>
                        @endforeach
                        <div class="card-action  cyan darken-2"  style="height:40px; padding-top: 2%; padding-bottom: 2%">
                            <div id="sales-compositebar">
                            <a href="{{URL::to('maintenance/company')}}" style="color:white">
                           <i class="mdi-hardware-keyboard-arrow-up white-text"></i> Go to details
                            
                            </a>
                            <canvas width="220" height="25" style="display: inline-block; width: 220px; height: 25px; vertical-align: top;"></canvas></div>

                        </div>
                    </div>
                </div>                            
                <div class="col s12 m6 l4">
                    <div class="card">
                        @foreach($totalEmp as $totalEmp)
                        <div class="card-content blue-grey white-text" style="max-height: 40%; min-height: 40%">
                            <center>
                                <p class="card-stats-title" style="font-size:19px"><i class="mdi-action-accessibility"></i> Total Active Employees </p>
                                <h4 class="card-stats-number">{{$totalEmp->totalEmps}}</h4>
                            </center>
                            
                        </div>
                        @endforeach
                        <div class="card-action blue-grey darken-2" style="height:40px; padding-top: 2%; padding-bottom: 2%">
                            <div id="profit-tristate">
                            <a href="{{URL::to('maintenance/employee')}}" style="color:white">
                            <i class="mdi-hardware-keyboard-arrow-up white-text"></i> Go to details
                            
                            </a>
                            <canvas width="220" height="25" style="display: inline-block; width: 220px; height: 25px; vertical-align: top;"></canvas></div>
                        </div>
                    </div>
                </div>
                
        </div>
    </div>

    <div id="card-stats" style="padding:20px;">
        <div class="row">
            <!--<div class="col s12 m6 l4" style="margin-top:-12px;">
                <div class="card z-depth-3" style="background-image:url('img/1.jpg');">
                    <div class="card-header blue-grey">
                        <div class="card-title">
                            <center><h3 class="card-title white-text" style="font-size:35px; padding-top: 2%; padding-bottom: 2%"><b>My Tailor</b></h3></center>
                            <div class="center" style="color:white" id="Date"></div><div class="center" style="color:white" id= "clock"></div>
                        </div>
                    </div>
                    <div class="white-text">
                        <div class="card-content" style="height:385px;">
                            <div class="right" style="">
                                <a href="{{URL::to('/online-home')}}" style="font-size:30px; color:#bbdefb;"><i class="mdi-maps-local-mall"></i><b>Proceed to shop</b></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            </div>-->
            <div class="col s12 m12 l6" style="">
                <center>
                    <p style="font-size:20px; background-color: #567568" class="white-text"><i class="small mdi-action-work" style=""></i><font style="padding-top:0; margin-top: 0; margin-bottom: 0; padding-left: 3%;">Job Orders in Progress</font></p>
                </center>
                <ul id="issues-collection" class="collection " style="max-height: 480px; overflow-y: scroll;">
                    <!-- <li class="collection-item avatar">
                        <i class="mdi-action-bug-report circle red darken-2"></i>
                        <center><span class="collection-header"><font size="+1">JOB ORDERS IN PROGRESS</font></span></center>
                        <a href="#" class="secondary-content"></a>
                    </li> -->

                    @foreach($joborderprog as $joborderprog)
                        <li class="collection-item white-text" style="background-color: #567568">
                            <div class="row" style="padding-top: 4%; ">
                                <div class="col s7">
                                    <p class="collections-title"><b><font size="+2">{{$joborderprog->strJobOrderID}}</b></font></p>
                                    <p class="collections-content">Date Order: {{$joborderprog->dtOrderDate}}</p>
                                    <p class="collections-content">Date to be Finished: {{$joborderprog->dtOrderExpectedToBeDone}}</p>
                                </div>
                                <div class="col s2" style="padding-top: 6%">
                                    <span class="task-cat pink accent-2">P1</span>
                                </div>
                                <div class="col s3" style="padding-top: 6%">
                                    <div class="progress">
                                         <div class="determinate" style="width: 70%"></div>   
                                    </div>                                                
                                </div>
                            </div>
                        </li>
                    @endforeach    
                    
                </ul>
            </div>

            <div class="col s12 m12 l6" style="">
                <center>
                    <p style="font-size:20px; background-color: #7F9172" class="white-text"><i class="small mdi-social-notifications-on" style=""></i><font style="padding-top:0; margin-top: 0; margin-bottom: 0; padding-left: 3%">Job Order Near Payment Due Date</font></p>
                </center>
                <ul id="projects-collection" class="collection z-depth-3" style="max-height: 480px; overflow-y: scroll;">
                    <!-- <li class="collection-item avatar">
                        <i class="mdi-file-folder circle light-blue darken-2"></i>
                        <center><span class="collection-header"><font size="+1">JOB ORDER NEAR PAYMENT DUE DATE</font></span></center>
                        <a href="#" class="secondary-content"></a>
                    </li> -->
                    @foreach($neardue as $neardue)
                        <li class="collection-item" style="background-color: #7F9172">
                            <div class="row" style="padding-top: 4%">
                                <div class="col s8">
                                    <a href="{{URL::to('transaction/billing-collection')}}" class="white-text">
                                        <p class="collections-title"><b><font size="+2">{{$neardue->strJobOrderID}}</font></b></p>
                                        <p class="collections-content">{{$neardue->strCompanyName}}{{$neardue->strIndivFName}} {{$neardue->strIndivLName}}</p>
                                    </a>
                                </div>
                               <div class="col s4 white-text">
                                    <p style="color:darkgray">Payment due on</p>
                                    <p><u>{{$neardue->dtOrderExpectedToBeDone}}</u></p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
            
        <div class="row" style="padding-top:20px">
            
            <div class="col s12 m6 l4" >
                <div class="col s12">
                    <ul id="task-card" class="collection with-header z-depth-3" style="border:0;  min-height: 50%; max-width: 100%">
                        <li class="collection-header" style="background-color: #EF6F6C">
                        <center><p style="font-size:20px;" class="task-card-title white-text"><i class="small mdi-action-stars" style=""></i><font style="padding-top:0; margin-top: 0; padding-left: 3%">Top Customers</font></p></center>
                        </li>
                        @if($topCustomers == null)
                            <h2>Nothing to display</h2>
                        @endif
                        @foreach($topCustomers as $topCustomers)
                            
                            <li class="center collection-item dismissable" style="padding:5%;">
                                 <a href= "{{URL::to('queries/list-of-top-customers')}}" class="waves-effect waves-teal" style="color:#000000">{{$topCustomers->name}}</a>
                            </li>  
                              
                        @endforeach    
                    </ul>
                </div>
            </div>

            <div class="col s12 m6 l4" style="">
                <div class="col s12">
                    <ul id="task-card" class="collection with-header z-depth-3" style="border:0;  min-height:50%">
                        <li class="collection-header" style="background-color: #40C9A2">
                            <center><h3 style="font-size:20px; padding:0" class="task-card-title white-text"><i class=" small mdi-action-credit-card"></i> Customers with Balance</h3></center>
                        </li>
                        @if($results == null)
                            <li class="center collection-item dismissable" style="padding:5%;">
                                <a disabled href= "" class="waves-effect waves-teal" style="color:gray">No customers with balance</a>
                            </li>
                        @endif
                        @foreach($results as $results)
                         <!--   {{--  @if($results->custName == null) --}}
                                <li class="collection-item dismissable" style="">
                                     <a href= "{{URL::to('queries/customers-with-balances')}}" class="waves-effect waves-teal btn-flat">{{$results->custName}}</a>
                                </li>
                          {{--   @else -->
                                <li class="collection-item dismissable" style="">
                                     <a href= "{{URL::to('queries/customers-with-balances')}}" class="waves-effect waves-teal btn-flat"> {{$results->custName}} </a>
                                </li> <!-- --}}
                        {{--     @endif    --}}  -->    
                        @endforeach    
                    </ul>
                </div>
            </div>

            <div class="col s12 m6 l4" style="">
                <div class="col s12">
                    <ul id="task-card" class="collection with-header z-depth-3" style="border:0; min-height:50%">
                        <li class="collection-header" style="background-color: #81C3D7">
                            <center><h3 style="font-size:20px; padding:0" class="task-card-title white-text"><i class=" small mdi-notification-event-note" style="margin-right: 3%"></i>Pending Online Orders</h3></center>
                        </li>
                        @if($joborder == null)
                            <li class="center collection-item dismissable" style="padding:5%;">
                                <a disabled href= "" class="waves-effect waves-teal" style="color:gray">No pending orders</a>
                            </li>
                        @endif
                        @foreach($joborder as $joborder)

                            <li class="collection-item dismissable" style="">
                                 <a href="{{URL::to('transaction/online-customer-individual')}}" class="waves-effect waves-teal"> <i style="font-size:8px" class ="mdi-action-credit-card"> {{$joborder->strIndivFName}} {{$joborder->strIndivLName}}</i></a>
                            </li>
     
                        @endforeach    
                    </ul>
                </div>
            </div>
        </div>

            
        </div>
    </div>

@stop

@section('scripts')

    <script type="text/javascript">
        var monthNames = [ "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December" ];
        var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

        var newDate = new Date();
        newDate.setDate(newDate.getDate());    
        $('#Date').html(dayNames[newDate.getDay()] +" | " +" " + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + "," + ' ' + newDate.getFullYear());
    
    </script>

    <script type="text/javascript">
        function updateClock ( )
            {
            var currentTime = new Date ( );
            var currentHours = currentTime.getHours ( );
            var currentMinutes = currentTime.getMinutes ( );
            var currentSeconds = currentTime.getSeconds ( );

            // Pad the minutes and seconds with leading zeros, if required
            currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
            currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

            // Choose either "AM" or "PM" as appropriate
            var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

            // Convert the hours component to 12-hour format if needed
            currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

            // Convert an hours component of "0" to "12"
            currentHours = ( currentHours == 0 ) ? 12 : currentHours;

            // Compose the string for display
            var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
            
            
            $("#clock").html(currentTimeString);
                
         }

        $(document).ready(function()
        {
           setInterval('updateClock()', 1000);
        });
    </script>

@stop    
