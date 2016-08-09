@extends('layouts.master')

@section('content')

    <div id="card-stats" style="padding:20px;">
        <div class="row">
            <div class="col s4" style="margin-top:-12px;">
                <div class="card z-depth-3" style="background-image:url('img/1.jpg');">
                    <div class="card-header blue-grey">
                        <div class="card-title">
                            <h3 class="card-title white-text" style="font-size:40px; padding-left:10px;">My Tailor</h3>
                            <p style="padding-left:10px;" class="flight-card-date white-text">June 18, Thu 04:50</p>
                        </div>
                    </div>
                    <div class="white-text">
                        <div class="card-content" style="height:400px;">
                            <div class="right" style="margin-top:-20px;">
                                <a href="{{URL::to('/online-home')}}" style="font-family:cursive; font-size:30px; font-color:teal accent-4;">Go to shop<i class="mdi-maps-local-mall"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card z-depth-3">
                    <div class="card-content  green white-text">
                        <center><p class="card-stats-title"><i class="mdi-social-group-add" style="font-size:30px;"> New Clients</i></p></center>
                        <center><h3 class="card-stats-number black-text"><b>566</b></h3></center>
                        <center><p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up" style="font-size:25px;"> 15% <span class="green-text text-lighten-5">from yesterday</span></i></p></center>
                    </div>
                    <div class="card-action  green darken-2">
                        <div id="clients-bar"></div>
                    </div>
                </div>
                <div class="card z-depth-3">
                    <div class="card-content purple white-text">
                        <center><p class="card-stats-title"><i class="mdi-editor-attach-money" style="font-size:30px;">Total Sales</i></p></center>
                        <center><h3 class="card-stats-number black-text"><b>$8990.63</b></h3></center>
                        <center><p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up" style="font-size:25px;"> 70% <span class="purple-text text-lighten-5">last month</span></i></p></center>
                    </div>
                    <div class="card-action purple darken-2">
                        <div id="sales-compositebar"></div>
                    </div>
                </div>
            </div>

            <div class="col s4">
                <div class="col s12">
                    <ul id="task-card" class="collection with-header z-depth-3" style="border:0;">
                        <li class="collection-header cyan">
                            <h3 class="task-card-title white-text">Pending Orders</h3>
                            <h6><div id= "Date"></div></h6>
                        </li>
                        @foreach($joborder as $joborder)
                            <li class="collection-item dismissable" style="padding:20px;">
                                 <a class="waves-effect waves-teal btn-flat"> {{$joborder->dtOrderExpectedToBeDone}} {{$joborder->strCompanyName}}{{$joborder->strIndivFName}} {{$joborder->strIndivLName}}</a>
                            </li>
                        @endforeach    
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <ul id="projects-collection" class="collection z-depth-3">
                    <li class="collection-item avatar">
                        <i class="mdi-file-folder circle light-blue darken-2"></i>
                        <span class="collection-header"><font size="+1">CUSTOMER NEAR DUE DATE</font></span>
                        <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s6">
                                <p class="collections-title">Web App</p>
                                <p class="collections-content">AEC Company</p>
                            </div>
                            <div class="col s3">
                                <span class="task-cat cyan">Development</span>
                            </div>
                            <div class="col s3">
                                <div id="project-line-1"></div>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s6">
                                <p class="collections-title">Mobile App for Social</p>
                                <p class="collections-content">iSocial App</p>
                            </div>
                            <div class="col s3">
                                <span class="task-cat grey darken-3">UI/UX</span>
                            </div>
                            <div class="col s3">
                                <div id="project-line-2"></div>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s6">
                                <p class="collections-title">Website</p>
                                <p class="collections-content">MediTab</p>
                            </div>
                            <div class="col s3">
                                <span class="task-cat teal">Marketing</span>
                            </div>
                            <div class="col s3">
                                <div id="project-line-3"></div>
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s6">
                                <p class="collections-title">AdWord campaign</p>
                                <p class="collections-content">True Line</p>
                            </div>
                            <div class="col s3">
                                <span class="task-cat green">SEO</span>
                            </div>
                            <div class="col s3">
                                <div id="project-line-4"></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col s6">
                <ul id="issues-collection" class="collection z-depth-3">
                    <li class="collection-item avatar">
                        <i class="mdi-action-bug-report circle red darken-2"></i>
                        <span class="collection-header"><font size="+1">JOB ORDERS IN PROGRESS</font></span>
                        <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s7">
                                <p class="collections-title"><strong>#102</strong> Home Page</p>
                                <p class="collections-content">Web Project</p>
                            </div>
                            <div class="col s2">
                                <span class="task-cat pink accent-2">P1</span>
                            </div>
                            <div class="col s3">
                                <div class="progress">
                                     <div class="determinate" style="width: 70%"></div>   
                                </div>                                                
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s7">
                                <p class="collections-title"><strong>#108</strong> API Fix</p>
                                <p class="collections-content">API Project </p>
                            </div>
                            <div class="col s2">
                                <span class="task-cat yellow darken-4">P2</span>
                            </div>
                            <div class="col s3">
                                <div class="progress">
                                    <div class="determinate" style="width: 40%"></div>   
                                </div>                                                
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s7">
                                <p class="collections-title"><strong>#205</strong> Profile page css</p>
                                <p class="collections-content">New Project </p>
                            </div>
                            <div class="col s2">                                                
                                <span class="task-cat light-green darken-3">P3</span>
                            </div>
                            <div class="col s3">
                                <div class="progress">
                                    <div class="determinate" style="width: 95%"></div>   
                                </div>                                                
                            </div>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s7">
                                <p class="collections-title"><strong>#188</strong> SAP Changes</p>
                                <p class="collections-content">SAP Project</p>
                            </div>
                            <div class="col s2">
                                <span class="task-cat pink accent-2">P1</span>
                            </div>
                            <div class="col s3">
                                <div class="progress">
                                     <div class="determinate" style="width: 10%"></div>   
                                </div>                                                
                            </div>
                        </div>
                    </li>
                </ul>
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