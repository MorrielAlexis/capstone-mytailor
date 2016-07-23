@extends('layouts.master')

@section('content')

                    <div id="card-stats" style="padding:20px;">
                        <div class="row">
                        	<div class="col s4" style="margin-top:-12px;">
                                <div class="card z-depth-3" style="background-image:url('img/delivery.jpg');">
                                    <div class="card-header purple">
                                        <div class="card-title">
                                            <h3 class="card-title white-text" style="font-size:40px; padding-left:10px;">Delivery</h3>
                                            <p style="padding-left:10px;" class="flight-card-date white-text">June 18, Thu 04:50</p>
                                        </div>
                                    </div>
                                    <div class="white-text">
                                        <div class="card-content">
                                            <div class="row flight-state-wrapper">
                                                <div class="col s5 m5 l5 center-align">
                                                    <div class="flight-state">
                                                        <h4 class="margin">MNL</h4>
                                                    </div>
                                                </div>
                                                <div class="col s2 m2 l2 center-align">
                                                    <span class="activator"><i class="mdi-maps-local-shipping" style="font-size:70px;"></i></span>
                                                </div>
                                                <div class="col s5 m5 l5 center-align">
                                                    <div class="flight-state">
                                                        <h4 class="margin">CDO</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:100px;">
                                                <h5><div class="col s6 m6 l6 center-align">
                                                    <div class="flight-info">
                                                        <p class="small"><span class="grey-text text-lighten-4">Depart:</span> 04.50</p>
                                                    </div>
                                                </div></h5>
                                                <h5><div class="col s6 m6 l6 center-align flight-state-two">
                                                    <div class="flight-info">
                                                        <p class="small"><span class="grey-text text-lighten-4">Arrive:</span> 08.50</p>
                                                    </div>
                                            	</div></h5>
                                            </div>
                                           	<center><h5 style="margin-top:40px; margin-bottom:20px;">Transaction No.:1234567</h5></center>
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
                                    <div class="card-content blue-grey white-text">
                                        <center><p class="card-stats-title"><i class="mdi-editor-attach-money" style="font-size:30px;">Total Sales</i></p></center>
                                        <center><h3 class="card-stats-number black-text"><b>$8990.63</b></h3></center>
                                        <center><p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up" style="font-size:25px;"> 70% <span class="purple-text text-lighten-5">last month</span></i></p></center>
                                    </div>
                                    <div class="card-action blue-grey darken-2">
                                        <div id="sales-compositebar"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col s4">
								<div class="col s12">
	                                <ul id="task-card" class="collection with-header z-depth-3" style="border:0;">
	                                    <li class="collection-header cyan">
	                                        <h3 class="task-card-title white-text">Pending Orders</h3>
	                                        <h5 class="task-card-date white-text"><b>July 26, 2016</b></h5>
	                                    </li>
	                                    <li class="collection-item dismissable" style="padding:20px;">
	                                        <input type="checkbox" id="task1" />
	                                        <label for="task1">Create Mobile App UI. <a href="#" class="secondary-content"><span class="ultra-small">Today</span></a>
	                                        </label>
	                                        <span class="task-cat teal">Mobile App</span>
	                                    </li>
	                                    <li class="collection-item dismissable" style="padding:20px;">
	                                        <input type="checkbox" id="task2" />
	                                        <label for="task2">Check the new API standerds. <a href="#" class="secondary-content"><span class="ultra-small">Monday</span></a>
	                                        </label>
	                                        <span class="task-cat purple">Web API</span>
	                                    </li>
	                                    <li class="collection-item dismissable" style="padding:20px;">
	                                        <input type="checkbox" id="task3" checked="checked" />
	                                        <label for="task3">Check the new Mockup of ABC. <a href="#" class="secondary-content"><span class="ultra-small">Wednesday</span></a>
	                                        </label>
	                                        <span class="task-cat pink">Mockup</span>
	                                    </li>
	                                    <li class="collection-item dismissable" style="padding:20px;">
	                                        <input type="checkbox" id="task4" checked="checked" disabled="disabled" />
	                                        <label for="task4">I did it !</label>
	                                        <span class="task-cat cyan">Mobile App</span>
	                                    </li>
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