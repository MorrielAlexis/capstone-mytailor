@extends('layouts.master')
<style type="text/css">
	.tab .active {
	     background: #ffffff !important; 
	}
</style>
@section('content')
	<!-- Errors -->
    @if ($errors->any())
       <div class="row" id="flash_message">
      <div class="col s12 m12 l12">
        <div class="card-panel red">
          <span class="black-text" style="color:black"><i class="tiny mdi-navigation-close right" onclick="$('#flash_message').hide()"></i></span>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </div>
      </div>
    </div>
    @endif
	<div class="row">
		<div class="col s12 m12 l12">
			<span class="page-title">
				<center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center>
			</span>
			<center><h5>Reports - Sales By Job Order</h5></center>
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
				    	<span class="white-text"><center>SALES REPORT BY JOB ORDER</center></span>
				    </div>
			    </div>
		    </div>
		    <!-- TABS -->
			<div class="row">
				<div class="col s12">
					<ul class="tabs white">
						<li class="tab col s3"><a href="#tabular">Tabular</a></li>
						<li class="tab col s3"><a class="active" href="#graphical">Graphical
						</a></li>
						<li class="tab col s3"><a href="#custom">Custom</a></li>
					</ul>
				</div>
				<div class="col s12">
					<div id="tabular" class="col white s12">
						<p align="center">
							{!! Form::open(['url' => 'reports/sales/by-job-order-generate',
							'class' => 'col s12 offset-s3']) !!} 
							<input name="tabular" type="radio" id="weeklyTab1" onclick="showTab('weeklyTab')" value="1" />
					    	<label for="weeklyTab1">Weekly</label>
					    	<input name="tabular" type="radio" id="monthlyTab1" onclick="showTab('monthlyTab')" value="2" />
					    	<label for="monthlyTab1">Monthly</label>
					    	<input name="tabular" type="radio" id="quarterlyTab1" onclick="showTab('quarterlyTab')" value="3" />
					    	<label for="quarterlyTab1">Quarterly</label>
					    	<input name="tabular" type="radio" id="annuallyTab1" onclick="showTab('annuallyTab')" value="4" />
					    	<label for="annuallyTab1">Annually</label>
					    	<input name="tabular" type="radio" id="transactionTab1" onclick="showTab('transactionTab')" value="5" />
					    	<label for="transactionTab1">Transaction</label>
					    	<br><br>
					    	<input type="submit" class="btn col s5" name="btnGenerate" value="Generate PDF" style="margin-bottom:2%;margin-left: 6%">
					    	{!! Form::close() !!}
					    </p>
					    <div id="weeklyTab">
					    	<div class="row">
						    	<div class="col s12">
									<table class="highlight">
										<thead>
											<tr>
												<th data-field="id">Week #</th>
												<th data-field="name" class="right-align">Sum Amount</th>
												<th data-field="price" class="right-align">Cumulative Amount</th>
											</tr>
										</thead>
										<tbody>
											<?php $Cumulative = 0; ?>
											@foreach($Weekly as $value)
											<tr>
												<td>Week {{$value->WeekNumber}}</td>
												<td class="right-align">{{number_format($value->Total + $value->Fee)}}</td>
												<?php $Cumulative += $value->Total + $value->Fee ?>
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
												<th data-field="id">Month Name</th>
												<th data-field="name" class="right-align">Sum Amount</th>
												<th data-field="price" class="right-align">Cumulative Amount</th>
											</tr>
										</thead>
										<tbody>
											<?php $Cumulative = 0; ?>
											@foreach($Monthly as $value)
											<tr>
												<td>{{$value->Month}}</td>
												<td class="right-align">{{number_format($value->Total + $value->Fee)}}</td>
												<?php $Cumulative += $value->Total + $value->Fee ?>
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
												<th data-field="id">Quarter</th>
												<th data-field="name" class="right-align">Sum Amount</th>
												<th data-field="price" class="right-align">Cumulative Amount</th>
											</tr>
										</thead>
										<tbody>
											<?php $Cumulative = 0; ?>
											@foreach($Quarterly as $value)
											<tr>
												<td>Quarter {{$value->Quarter}}</td>
												<td class="right-align">{{number_format($value->Total + $value->Fee)}}</td>
												<?php $Cumulative += $value->Total + $value->Fee ?>
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
												<th data-field="id">Year</th>
												<th data-field="name" class="right-align">Sum Amount</th>
												<th data-field="price" class="right-align">Cumulative Amount</th>
											</tr>
										</thead>
										<tbody>
											<?php $Cumulative = 0; ?>
											@foreach($Annually as $value)
											<tr>
												<td>{{$value->YearNumber}}</td>
												<td class="right-align">{{number_format($value->Total + $value->Fee)}}</td>
												<?php $Cumulative += $value->Total + $value->Fee ?>
												<td class="right-align">{{number_format($Cumulative)}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
					    </div>
					    <div id="transactionTab">
						    <div class="row">
							    <div class="col s12">
								    <table class = "table centered data-custInd" align = "center" border = "1">
						                <thead>
						                  <tr>
						                    <th>Job Order ID</th>
						                    <th>Customer Name</th>
						                    <th>Partial Amount</th>
						                    <th>Fee</th>
						                    <th>Total</th>
						                    <th>Employee Name</th>
						                    <th>Date Finished</th>
						                  </tr>
						                </thead>
						                <tbody>
						                	@foreach($Transaction as $value)
												<tr>
													<td>{{$value->strJobOrderId}}</td>
													<td>
														@if($value->strCompanyName == null)
															{{$value->IndividualCustomer}}
														@else
															{{$value->strCompanyName}}
														@endif
													</td>
													<td>{{number_format($value->Total)}}</td>
													<td>{{number_format($value->Fee)}}</td>
													<td>{{number_format($value->Total + $value->Fee)}}</td>
													<td>{{$value->EmployeeName}}</td>
													<td>{{$value->Finished}}</td>
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
							<input name="group" type="radio" id="weekly1" onclick="show('weekly')"/>
					    	<label for="weekly1">Weekly</label>
					    	<input name="group" type="radio" id="monthly1" onclick="show('monthly')" />
					    	<label for="monthly1">Monthly</label>
					    	<input name="group" type="radio" id="quarterly1" onclick="show('quarterly')"/>
					    	<label for="quarterly1">Quarterly</label>
					    	<input name="group" type="radio" id="annually1" onclick="show('annually')"/>
					    	<label for="annually1">Annually</label>
					    </p>
						<canvas id="monthly"></canvas>
						<canvas id="annually"></canvas>
						<canvas id="weekly"></canvas>
						<canvas id="quarterly"></canvas>
					</div>
					<div id="custom">
						<div class="col white s12">
							<h6 align="center">Customize Reports</h6>
							{!! Form::open(['url' => 'reports/sales/by-job-order-custom']) !!} 
								<select name = "selType" class="col s8 offset-s2">
								    <option value="" disabled selected>Choose Report Type</option>
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
		var ctx = document.getElementById("monthly");
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: [
		        	@foreach($Monthly as $MonthName)
			                "{{$MonthName->Month}}",
		            @endforeach
		        ],
		        datasets: [
			        {
			            label: 'Sum of Amount',
			            data: [
				            @foreach($Monthly as $MonthAmount)
				                {{$MonthAmount->Total + $MonthAmount->Fee}},
			                @endforeach
			            ],
			            backgroundColor: [
			            	@foreach($Monthly as $MonthAmount)
				                'rgba(255, 99, 132, 0.2)',
			                @endforeach
			            ],
			            borderColor: [
			            	@foreach($Monthly as $MonthAmount)
				                'rgba(255,99,132,1)',
			                @endforeach
			                
			            ],
			            borderWidth: 1
			        },
			        {
			            label: 'Cumulative Amount',
			            data: [
			            	<?php $Cumulative = 0; ?>
				            @foreach($Monthly as $MonthAmount)
				            	<?php $Cumulative += $MonthAmount->Total + $MonthAmount->Fee?>
				                {{$Cumulative}},
			                @endforeach
			            ],
			            backgroundColor: [
			            	@foreach($Monthly as $MonthAmount)
				                'rgba(54, 162, 235, 0.2)',
			                @endforeach
			            ],
			            borderColor: [
			            	@foreach($Monthly as $MonthAmount)
				                'rgba(54, 162, 235, 1)',
			                @endforeach
			                
			            ],
			            borderWidth: 1
			        }
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
	</script>
	<script type="text/javascript">
		var ctx = document.getElementById("annually");
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: [
		        	@foreach($Annually as $value)
			                "{{$value->YearNumber}}",
		            @endforeach
		        ],
		        datasets: [
			        {
			            label: 'Sum of Amount',
			            data: [
				            @foreach($Annually as $value)
				                {{$value->Total + $value->Fee}},
			                @endforeach
			            ],
			            backgroundColor: [
			            	@foreach($Annually as $value)
				                'rgba(255, 99, 132, 0.2)',
			                @endforeach
			            ],
			            borderColor: [
			            	@foreach($Annually as $value)
				                'rgba(255,99,132,1)',
			                @endforeach
			                
			            ],
			            borderWidth: 1
			        },
			        {
			            label: 'Cumulative Amount',
			            data: [
				            <?php $Cumulative = 0; ?>
				            @foreach($Annually as $value)
				            	<?php $Cumulative += $value->Total + $value->Fee?>
				                {{$Cumulative}},
			                @endforeach
			            ],
			            backgroundColor: [
			            	@foreach($Annually as $value)
				                'rgba(54, 162, 235, 0.2)',
			                @endforeach
			            ],
			            borderColor: [
			            	@foreach($Annually as $value)
				                'rgba(54, 162, 235, 1)',
			                @endforeach
			                
			            ],
			            borderWidth: 1
			        }
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
	</script>
	<script type="text/javascript">
		var ctx = document.getElementById("weekly");
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: [
		        	@foreach($Weekly as $value)
			                "Week {{$value->WeekNumber}}",
		            @endforeach
		        ],
		        datasets: [
			        {
			            label: 'Sum of Amount',
			            data: [
				            @foreach($Weekly as $value)
				                {{$value->Total + $value->Fee}},
			                @endforeach
			            ],
			            backgroundColor: [
			            	@foreach($Weekly as $value)
				                'rgba(255, 99, 132, 0.2)',
			                @endforeach
			            ],
			            borderColor: [
			            	@foreach($Weekly as $value)
				                'rgba(255,99,132,1)',
			                @endforeach
			                
			            ],
			            borderWidth: 1
			        },
			        {
			            label: 'Cumulative Amount',
			            data: [
				            <?php $Cumulative = 0; ?>
				            @foreach($Weekly as $value)
				            	<?php $Cumulative += $value->Total + $value->Fee?>
				                {{$Cumulative}},
			                @endforeach
			            ],
			            backgroundColor: [
			            	@foreach($Weekly as $value)
				                'rgba(54, 162, 235, 0.2)',
			                @endforeach
			            ],
			            borderColor: [
			            	@foreach($Weekly as $value)
				                'rgba(54, 162, 235, 1)',
			                @endforeach
			                
			            ],
			            borderWidth: 1
			        }
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
	</script>
	<script type="text/javascript">
		var ctx = document.getElementById("quarterly");
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: [
		        	@foreach($Quarterly as $value)
			                "Quarter {{$value->Quarter}}",
		            @endforeach
		        ],
		        datasets: [
			        {
			            label: 'Sum of Amount',
			            data: [
			            	@foreach($Quarterly as $value)
					            {{$value->Total + $value->Fee}},
			            	@endforeach
			            ],
			            backgroundColor: [
			            	@foreach($Quarterly as $value)
				                'rgba(255, 99, 132, 0.2)',
			                @endforeach
			            ],
			            borderColor: [
			            	@foreach($Quarterly as $value)
				                'rgba(255, 99, 132, 1)',
			                @endforeach
			                
			            ],
			            borderWidth: 1
			        },
			        {
			            label: 'Cumulative Amount',
			            data: [
			            	<?php $Cumulative = 0; ?>
			            	@foreach($Quarterly as $value)
					            <?php $Cumulative += $value->Total + $value->Fee?>
				               	{{$Cumulative}},
			            	@endforeach
			            ],
			            backgroundColor: [
			            	@foreach($Quarterly as $value)
				                'rgba(54, 162, 235, 0.2)',
			                @endforeach
			            ],
			            borderColor: [
			            	@foreach($Quarterly as $value)
				                'rgba(54, 162, 235, 1)',
			                @endforeach
			                
			            ],
			            borderWidth: 1
			        }
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
	</script>
	<script>
		function show(id){
			$( "#weekly" ).addClass("hide");
			$( "#annually" ).addClass("hide");
			$( "#monthly" ).addClass("hide");
			$( "#quarterly" ).addClass("hide");
			$( '#'+id ).removeClass("hide");
		}
		function showTab(id){
			$( "#weeklyTab" ).addClass("hide");
			$( "#annuallyTab" ).addClass("hide");
			$( "#monthlyTab" ).addClass("hide");
			$( "#quarterlyTab" ).addClass("hide");
			$( "#transactionTab" ).addClass("hide");
			$( '#'+id ).removeClass("hide");
		}
		$(window).load(function() {
			//Graphical
            $( "#weekly" ).addClass("hide");
            $( "#annually" ).addClass("hide");
            $( "#monthly" ).addClass("hide");
            $( "#quarterly" ).addClass("hide");
            $("#weekly1").click()
            // Tabular
            $( "#weeklyTab" ).addClass("hide");
            $( "#annuallyTab" ).addClass("hide");
            $( "#monthlyTab" ).addClass("hide");
            $( "#quarterlyTab" ).addClass("hide");
            $( "#transactionTab" ).addClass("hide");
            $("#transactionTab1").click()
           
        });
	</script>
	<script type="text/javascript">
      $(document).ready(function() {
          $('.data-custInd').DataTable();
          $('select').material_select();
      } );
    </script>
@stop