@extends('layouts.master')
<style type="text/css">
	.tab .active {
	     background: #ffffff !important; 
	}
</style>
@section('content')

	<div class="row">
		<div class="col s12 m12 l12">
			<span class="page-title">
				<center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center>
			</span>
			<center><h5>Reports - Sales By Product</h5></center>
			<center>
				<h7 style="color:gray">Weekly, Monthly, Quarterly and Annual Sales</h7>
			</center> 
		</div>
	</div>

	<div class="row" style="margin-top:3%;">
		<div class="col s12 m12 l12">
			<div class="row" style="margin-bottom:0">
			    <div class="col s12 m12">
				    <div class="card-panel teal">
				    	<span class="white-text"><center>SALES REPORT BY PRODUCT</center></span>
				    </div>
			    </div>
		    </div>
		    <!-- TABS -->
			<div class="row">
				<div class="col s12">
					<ul class="tabs white">
						<li class="tab col s3"><a href="#tabular">Tabular</a></li>
						<li class="tab col s3"><a class="active" href="#graphical">Graphical</a></li>
						<li class="tab col s3"><a href="#custom">Custom</a></li>
					</ul>
				</div>
				<div class="col s12">
					<div id="tabular" class="col white s12">
						<p align="center">
							{!! Form::open(['url' => 'reports/sales/by-product-generate',
							'class' => 'col s12 offset-s3']) !!} 
							<input name="tabular" type="radio" id="dailyTab1" onclick="showTab('dailyTab')"/ value="0">
					    	<label for="dailyTab1">Daily</label>
							<input name="tabular" type="radio" id="weeklyTab1" onclick="showTab('weeklyTab')"/ value="1">
					    	<label for="weeklyTab1">Weekly</label>
					    	<input name="tabular" type="radio" id="monthlyTab1" onclick="showTab('monthlyTab')" / value="2">
					    	<label for="monthlyTab1">Monthly</label>
					    	<input name="tabular" type="radio" id="quarterlyTab1" onclick="showTab('quarterlyTab')"/ value="3">
					    	<label for="quarterlyTab1">Quarterly</label>
					    	<input name="tabular" type="radio" id="annuallyTab1" onclick="showTab('annuallyTab')"/ value="4">
					    	<label for="annuallyTab1">Annually</label>
					    	<br><br>
					    	<input type="submit" class="btn col s5" name="btnGenerate" value="Generate PDF" style="margin-bottom:2%;margin-left: 5%;">
					    	{!! Form::close() !!}
					    </p>
					    <div id="dailyTab">
					    	<div class="row">
						    	<div class="col s12">
									<table class="highlight">
										<thead>
											<tr>
												<th>#</th>
												<th>Segment Name</th>
												<th>Times Ordered</th>
												<th class="right-align">Sum Amount</th>
												<th class="right-align">Cumulative Amount</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$Cumulative = 0; 
												$CurValue = "";
											?>
											@foreach($Daily as $value)
											<tr>
												<td>
												@if($CurValue == $value->Day)
													{{""}}
													<?php $CurValue = $value->Day?>
												@else
													{{$value->Day}}
													<?php $CurValue = $value->Day?>
												@endif
												</td>
												<td>{{$value->strSegmentName}}</td>
												<td>{{$value->TimesOrdered}}</td>
												<td class="right-align">{{number_format($value->Amount)}}</td>
												<?php $Cumulative += $value->Amount?>
												<td class="right-align">{{number_format($Cumulative)}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
					    </div>
					    <div id="weeklyTab">
					    	<div class="row">
						    	<div class="col s12">
									<table class="highlight">
										<thead>
											<tr>
												<th>Week #</th>
												<th>Segment Name</th>
												<th>Times Ordered</th>
												<th class="right-align">Sum Amount</th>
												<th class="right-align">Cumulative Amount</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$Cumulative = 0; 
												$CurValue = "";
											?>
											@foreach($Weekly as $value)
											<tr>
												<td>
												@if($CurValue == $value->WeekNumber)
													{{""}}
													<?php $CurValue = $value->WeekNumber?>
												@else
													Week {{$value->WeekNumber}}
													<?php $CurValue = $value->WeekNumber?>
												@endif
												</td>
												<td>{{$value->strSegmentName}}</td>
												<td>{{$value->TimesOrdered}}</td>
												<td class="right-align">{{number_format($value->Amount)}}</td>
												<?php $Cumulative += $value->Amount?>
												<td class="right-align">{{number_format($Cumulative)}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
					    </div>
					    <div id="monthlyTab">
					    	<div class="row">
						    	<div class="col s12">
									<table class="highlight">
										<thead>
											<tr>
												<th>Month</th>
												<th>Segment Name</th>
												<th>Times Ordered</th>
												<th class="right-align">Sum Amount</th>
												<th class="right-align">Cumulative Amount</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$Cumulative = 0; 
												$CurValue = "";
											?>
											@foreach($Monthly as $value)
											<tr>
												<td>
												@if($CurValue == $value->MonthName)
													{{""}}
													<?php $CurValue = $value->MonthName?>
												@else
													{{$value->MonthName}}
													<?php $CurValue = $value->MonthName?>
												@endif
												</td>
												<td>{{$value->strSegmentName}}</td>
												<td>{{$value->TimesOrdered}}</td>
												<td class="right-align">{{number_format($value->Amount)}}</td>
												<?php $Cumulative += $value->Amount?>
												<td class="right-align">{{number_format($Cumulative)}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
					    </div>
					    <div id="quarterlyTab">
					    	<div class="row">
						    	<div class="col s12">
									<table class="highlight">
										<thead>
											<tr>
												<th>Quarter</th>
												<th>Segment Name</th>
												<th>Times Ordered</th>
												<th class="right-align">Sum Amount</th>
												<th class="right-align">Cumulative Amount</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$Cumulative = 0; 
												$CurValue = "";
											?>
											@foreach($Quarterly as $value)
											<tr>
												<td>
												@if($CurValue == $value->QuarterNumber)
													{{""}}
													<?php $CurValue = $value->QuarterNumber?>
												@else
													Quarter {{$value->QuarterNumber}}
													<?php $CurValue = $value->QuarterNumber?>
												@endif
												</td>
												<td>{{$value->strSegmentName}}</td>
												<td>{{$value->TimesOrdered}}</td>
												<td class="right-align">{{number_format($value->Amount)}}</td>
												<?php $Cumulative += $value->Amount?>
												<td class="right-align">{{number_format($Cumulative)}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
					    </div>
					    <div id="annuallyTab">
					    	<div class="row">
						    	<div class="col s12">
									<table class="highlight">
										<thead>
											<tr>
												<th>Year</th>
												<th>Segment Name</th>
												<th>Times Ordered</th>
												<th class="right-align">Sum Amount</th>
												<th class="right-align">Cumulative Amount</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$Cumulative = 0; 
												$CurValue = "";
											?>
											@foreach($Annually as $value)
											<tr>
												<td>
												@if($CurValue == $value->YearNumber)
													{{""}}
													<?php $CurValue = $value->YearNumber?>
												@else
													{{$value->YearNumber}}
													<?php $CurValue = $value->YearNumber?>
												@endif
												</td>
												<td>{{$value->strSegmentName}}</td>
												<td>{{$value->TimesOrdered}}</td>
												<td class="right-align">{{number_format($value->Amount)}}</td>
												<?php $Cumulative += $value->Amount?>
												<td class="right-align">{{number_format($Cumulative)}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
					    </div>
					</div>
					<div id="graphical" class="col white s12">
						<p align="center">
							<input name="group" type="radio" id="daily1" onclick="show('daily')"/>
					    	<label for="daily1">Daily</label>
							<input name="group" type="radio" id="weekly1" onclick="show('weekly')"/>
					    	<label for="weekly1">Weekly</label>
					    	<input name="group" type="radio" id="monthly1" onclick="show('monthly')" />
					    	<label for="monthly1">Monthly</label>
					    	<input name="group" type="radio" id="quarterly1" onclick="show('quarterly')"/>
					    	<label for="quarterly1">Quarterly</label>
					    	<input name="group" type="radio" id="annually1" onclick="show('annually')"/>
					    	<label for="annually1">Annually</label>
					    </p>
					    <div id="daily">
					    	@foreach($Days as $value)
					    		<canvas id="{{$value->Day}}"></canvas><br>
					    	@endforeach
					    </div>
					    <div id="monthly">
					    	@foreach($Months as $value)
					    		<canvas id="{{$value->Month}}"></canvas><br>
					    	@endforeach
					    </div>
						
						<div id="weekly">
					    	@foreach($Weeks as $value)
					    		<canvas id="{{$value->Week}}"></canvas><br>
					    	@endforeach
					    </div>
					    <div id="quarterly">
					    	@foreach($Quarter as $value)
					    		<canvas id="{{$value->Quarter}}"></canvas><br>
					    	@endforeach
					    </div>
					    <div id="annually">
					    	@foreach($Annual as $value)
					    		<canvas id="{{$value->Annual}}"></canvas><br>
					    	@endforeach
					    </div>
					</div>
					<div id="custom">
						<div class="col white s12">
							<h6 align="center">Customize Reports</h6>
							{!! Form::open(['url' => 'reports/sales/by-product-custom']) !!} 
								<select name = "selType" class="col s8 offset-s2">
								    <option value="" disabled selected>Choose Report Type</option>
								    <option value="0">Daily</option>
								    <option value="1">Weekly</option>
								    <option value="2">Monthly</option>
								    <option value="3">Quarterly</option>
								    <option value="4">Annually</option>
								</select>
								<input type="date" class="datepicker col s3 offset-s2" name="datFrom" id="date_from">
								<div class="center col s1" style="margin-top:2%; color:gray" id="to"><b> to </b></div>
								<input type="date" class="datepicker col s4" name="datTo" id="date_to">	
								<input type="submit" class="btn col s8 offset-s2" name="btnGenerate" value="Generate Report" style="margin-bottom:2%">
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
			<!-- TABS -->
		</div>
	</div>
@stop

@section('scripts')
	<script type="text/javascript">
		function getRandomColor() {
            var letters = '0123456789ABCDEF'.split('');
            var color = '#';
            for (var i = 0; i < 6; i++ ) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
     
        @foreach($Days as $valueDay)
		var ctx = document.getElementById("{{$valueDay->Day}}");
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: [
		        	"{{$valueDay->Day}}",
		        ],
		        datasets: [
		        	@foreach($Daily as $value)
			        	@if($value->Day == $valueDay->Day)
					        {
					            label: "{{$value->strSegmentName}}",
					            data: [
						                {{$value->TimesOrdered}},
					            ],
					            backgroundColor: [
					            	getRandomColor()
					            ],
					            borderWidth: 1
					        },
				        @endif
			        @endforeach
		        ]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
		@endforeach

		@foreach($Months as $valueMonth)
		var ctx = document.getElementById("{{$valueMonth->Month}}");
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: [
		        	"{{$valueMonth->Month}}",
		        ],
		        datasets: [
		        	@foreach($Monthly as $value)
			        	@if($value->MonthName == $valueMonth->Month)
					        {
					            label: "{{$value->strSegmentName}}",
					            data: [
						                {{$value->TimesOrdered}},
					            ],
					            backgroundColor: [
					            	getRandomColor()
					            ],
					            borderWidth: 1
					        },
				        @endif
			        @endforeach
		        ]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
		@endforeach

		@foreach($Weeks as $valueWeek)
		var ctx = document.getElementById("{{$valueWeek->Week}}");
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: [
		        	"Week {{$valueWeek->Week}}",
		        ],
		        datasets: [
		        	@foreach($Weekly as $value)
			        	@if($value->WeekNumber == $valueWeek->Week)
					        {
					            label: "{{$value->strSegmentName}}",
					            data: [
						                {{$value->TimesOrdered}},
					            ],
					            backgroundColor: [
					            	getRandomColor()
					            ],
					            borderWidth: 1
					        },
				        @endif
			        @endforeach
		        ]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
		@endforeach

		@foreach($Quarter as $valueQtr)
		var ctx = document.getElementById("{{$valueQtr->Quarter}}");
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: [
		        	"Quarter {{$valueQtr->Quarter}}",
		        ],
		        datasets: [
		        	@foreach($Quarterly as $value)
			        	@if($value->QuarterNumber == $valueQtr->Quarter)
					        {
					            label: "{{$value->strSegmentName}}",
					            data: [
						                {{$value->TimesOrdered}},
					            ],
					            backgroundColor: [
					            	getRandomColor()
					            ],
					            borderWidth: 1
					        },
				        @endif
			        @endforeach
		        ]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
		@endforeach

		@foreach($Annual as $valueAnn)
		var ctx = document.getElementById("{{$valueAnn->Annual}}");
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: [
		        	"Year {{$valueAnn->Annual}}",
		        ],
		        datasets: [
		        	@foreach($Annually as $value)
			        	@if($value->YearNumber == $valueAnn->Annual)
					        {
					            label: "{{$value->strSegmentName}}",
					            data: [
						                {{$value->TimesOrdered}},
					            ],
					            backgroundColor: [
					            	getRandomColor()
					            ],
					            borderWidth: 1
					        },
				        @endif
			        @endforeach
		        ]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
		@endforeach
	</script>
	
	<script>
		function show(id){
			$( "#daily" ).addClass("hide");
			$( "#weekly" ).addClass("hide");
			$( "#annually" ).addClass("hide");
			$( "#monthly" ).addClass("hide");
			$( "#quarterly" ).addClass("hide");
			$( '#'+id ).removeClass("hide");
		}
		function showTab(id){
			$( "#dailyTab" ).addClass("hide");
			$( "#weeklyTab" ).addClass("hide");
			$( "#annuallyTab" ).addClass("hide");
			$( "#monthlyTab" ).addClass("hide");
			$( "#quarterlyTab" ).addClass("hide");
			$( '#'+id ).removeClass("hide");
		}
		$(window).load(function() {
			//Graphical
			$( "#daily" ).addClass("hide");
            $( "#weekly" ).addClass("hide");
            $( "#annually" ).addClass("hide");
            $( "#monthly" ).addClass("hide");
            $( "#quarterly" ).addClass("hide");
            $("#daily1").click()
            // Tabular
            $( "#dailyTab" ).addClass("hide");
            $( "#weeklyTab" ).addClass("hide");
            $( "#annuallyTab" ).addClass("hide");
            $( "#monthlyTab" ).addClass("hide");
            $( "#quarterlyTab" ).addClass("hide");
            $("#dailyTab1").click()
           
        });
	</script>
	<script type="text/javascript">
      $(document).ready(function() {
          $('.data-custInd').DataTable();
          $('select').material_select();
      } );
    </script>
@stop