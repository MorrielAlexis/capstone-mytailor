@extends('layouts.master')

@section('content')

                    <div id="card-stats" style="padding:40px;">
                        <div class="row">
	                            <div class="col s12 m6 l4">
	                                <div class="card" style="border-top-left-radius:20px;">
	                                    <div class="card-content  green white-text">
	                                        <p class="card-stats-title"><i class="mdi-social-group-add"></i> New Clients</p>
	                                        <h4 class="card-stats-number">566</h4>
	                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="green-text text-lighten-5">from yesterday</span>
	                                        </p>
	                                    </div>
	                                    <div class="card-action  green darken-2">
	                                        <div id="clients-bar"></div>
	                                    </div>
	                                </div>
	                                <div class="card" style="border-top-left-radius:20px;">
	                                    <div class="card-content purple white-text">
	                                        <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Total Sales</p>
	                                        <h4 class="card-stats-number">$8990.63</h4>
	                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 70% <span class="purple-text text-lighten-5">last month</span>
	                                        </p>
	                                    </div>
	                                    <div class="card-action purple darken-2">
	                                        <div id="sales-compositebar"></div>
	                                    </div>
	                                </div>
	                            </div>
                            <div class="col s12 m6 l4">
								<div class="col s12">
	                                <ul id="task-card" class="collection with-header">
	                                    <li class="collection-header cyan">
	                                        <h4 class="task-card-title">My Task</h4>
	                                        <p class="task-card-date">March 26, 2015</p>
	                                    </li>
	                                    <li class="collection-item dismissable">
	                                        <input type="checkbox" id="task1" />
	                                        <label for="task1">Create Mobile App UI. <a href="#" class="secondary-content"><span class="ultra-small">Today</span></a>
	                                        </label>
	                                        <span class="task-cat teal">Mobile App</span>
	                                    </li>
	                                    <li class="collection-item dismissable">
	                                        <input type="checkbox" id="task2" />
	                                        <label for="task2">Check the new API standerds. <a href="#" class="secondary-content"><span class="ultra-small">Monday</span></a>
	                                        </label>
	                                        <span class="task-cat purple">Web API</span>
	                                    </li>
	                                    <li class="collection-item dismissable">
	                                        <input type="checkbox" id="task3" checked="checked" />
	                                        <label for="task3">Check the new Mockup of ABC. <a href="#" class="secondary-content"><span class="ultra-small">Wednesday</span></a>
	                                        </label>
	                                        <span class="task-cat pink">Mockup</span>
	                                    </li>
	                                    <li class="collection-item dismissable">
	                                        <input type="checkbox" id="task4" checked="checked" disabled="disabled" />
	                                        <label for="task4">I did it !</label>
	                                        <span class="task-cat cyan">Mobile App</span>
	                                    </li>
	                                </ul>
	                            </div>
                            </div>
                        </div>
                    </div>

@stop