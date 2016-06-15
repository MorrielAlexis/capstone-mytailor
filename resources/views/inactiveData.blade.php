@extends('layouts.master')

@section('content')

  <div class="main-wrapper" style="margin-top:30px">
   <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Inactive Data</h4></span>
      </div>
    </div>
  </div>

   <!--Inacive Data-->
        @if(Session::has('flash_message_inactive'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow accent-1">
              <span class="alert alert-success"> <i class="material-icons right" onclick="$('#flash_message').hide()">clear</i></span>
             <em> {!! session('flash_message_inactive') !!}</em>
            </div>
          </div>
        </div>
      @endif

  <div style="padding:20px">

      <ul class="tabs transparent" style="float:left">
        <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabCustp">Customer</a></li>
        <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabEmp">Employee</a></li>
        <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabGarm">Garments</a></li>
        <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabFabmat">Fabrics</a></li>
        <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabMate">Materials</a></li>
        <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabCata">Catalogue</a></li>
        <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabAlte">Alteration</a></li>
        <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabPackages">Packages</a></li>
        <div class="indicator white" style="z-index:1"></div>
      </ul>

    <div id="tabCustp" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
    <div style="height:30px;"></div>

      <!--Individual Customer-->
      <p><h5 style="margin-left:20px"><b>Individual Customer</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Customers</center> </font> </h5>
                <table class = "table centered data-custInd" align = "center" border = "1">
                  <thead>
                    <tr>
                      <th data-field="fname">Customer Name</th>
                      <th data-field="address">Address</th>
                      <th data-field="email">Email Address</th>
                      <th data-field="cellphone">Cellphone No.</th>
                      <th data-field="cellphone">Cellphone No. (alt) </th>
                      <th data-field="Landline">Telephone No.</th>
                      <th data-field="Landline">Reason for Deactivation</th>
                      <th data-field="Edit">Reactivate</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($individual as $individual_1)
                      @if($individual_1->boolIsActive == 0)
                      <tr>
                        <td>{{ $individual_1->strIndivFName }} {{ $individual_1->strIndivMName }} {{ $individual_1->strIndivLName }}</td>
                        <td>{{ $individual_1->strIndivHouseNo }} {{ $individual_1->strIndivStreet }} {{ $individual_1->strIndivBarangay }} {{ $individual_1->strIndivCity }} {{ $individual_1->strIndivProvince }}  {{ $individual_1->strIndivZipCode }} </td>
                        <td>{{ $individual_1->strIndivEmailAddress}}</td>                  
                        <td>{{ $individual_1->strIndivCPNumber }}</td> 
                        <td>{{ $individual_1->strIndivCPNumberAlt }}</td> 
                        <td>{{ $individual_1->strIndivLandlineNumber }}</td> 
                        <td>{{ $individual_1->strIndivInactiveReason }}</td>      
                        <td>          
                          
                          {!! Form::open(['url' => 'utilities/inactive-data/reactivate-individual']) !!}
                            <input type="hidden" value="{{ $individual_1->strIndivID }}" id="reactID" name="reactID">
                            <input type="hidden" value="{{ $individual_1->strIndivID }}" id="reactInactiveIndiv" name="reactInactiveIndiv">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of customer to the table">REACTIVATE</button>
                          {!! Form::close() !!}
                        </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>
            </div>
          </div>
        </div>
      </div>

      <!--Company Customer-->
      <p><h5 style="margin-left:20px"><b>Company Customer</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">

                <h5><font color = "#1b5e20"><center>Inactive Customers</center> </font> </h5>
                <table class="table centered data-reactcustCompany" border="1">
                  <thead>
                    <tr>
                      <th data-field="name">Company Name</th>
                      <th data-field="address">Address</th>
                      <th data-field="contact">Contact Person</th>
                      <th data-field="comEmail">Company Email Address</th>
                      <th data-field="cellphone">Cellphone No.</th>
                      <th data-field="cellphone">Cellphone No. (alt)</th>
                      <th data-field="Landline">Telephone No.</th>
                      <th data-field="fax">Fax No.</th>
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="react">Reactivate</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($company as $company_1)
                            @if($company_1->boolIsActive == 0)
                          <tr>
                            <td>{{ $company_1->strCompanyName }}</td>
                            <td>{{ $company_1->strCompanyBuildingNo }} {{ $company_1->strCompanyStreet }} {{ $company_1->strCompanyBarangay }} {{ $company_1->strCompanyCity }} {{ $company_1->strCompanyProvince }}  {{ $company_1->strCompanyZipCode }} </td>
                            <td>{{ $company_1->strContactPerson }} </td>
                            <td>{{ $company_1->strCompanyEmailAddress}}</td>                  
                            <td>{{ $company_1->strCompanyCPNumber }}</td> 
                            <td>{{ $company_1->strCompanyCPNumberAlt }}</td> 
                            <td>{{ $company_1->strCompanyTelNumber }}</td>                  
                            <td>{{ $company_1->strCompanyFaxNumber }}</td>                  
                            <td>{{ $company_1->strCompanyInactiveReason }}</td>  
                          <td>
                            
                            {!! Form::open(['url' => 'utilities/inactive-data/reactivate-company']) !!}
                              <input type="hidden" value="{{ $company_1->strCompanyID }}" id="reactInactiveComp" name="reactInactiveComp">
                              <input type="hidden" value="{{ $company_1->strCompanyID }}" id="reactID" name="reactID">
                              <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to reeturn data of customer to the table">REACTIVATE</button>
                             
                            {!! Form::close() !!}
                          </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>
            

            </div>
          </div>
        </div>
      </div>

    </div>
    
    <div id="tabEmp" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
    <div style="height:30px;"></div>

      <!--Position Roles-->
      <p><h5 style="margin-left:20px"><b>Position Roles</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Roles</center> </font> </h5>
                <table class = "table centered data-reactRole" align = "center" border = "1">
                      <thead>
                        <tr>
                            <th data-field="name">Role Name</th>
                            <th data-field="address">Role Description</th>
                            <th data-field="React">Reason for Deactivation</th>
                            <th data-field="Edit">Reactivate</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($role as $role_1)
                        @if($role_1->boolIsActive == 0)
                        <tr>
                          <td>{{ $role_1->strEmpRoleName }}</td>
                          <td>{{ $role_1->strEmpRoleDesc }}</td>
                          <td>{{ $role_1->strRoleInactiveReason }}</td>
                          <td>
                            {!! Form::open(['url' => 'utilities/inactive-data/reactivate-employeeRole']) !!}
                              <input type="hidden" value="{{ $role_1->strEmpRoleID }}" id="reactID" name="reactID">
                              <input type="hidden" value="{{ $role_1->strEmpRoleID }}" id="reactInactiveRole" name="reactInactiveRole">
                              <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of position to the table">REACTIVATE</button>
                            {!! Form::close() !!}
                          </td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>

              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

      <!--Employee Profile-->
      <p><h5 style="margin-left:20px"><b>Employee Profile</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Employees</center> </font> </h5>
                <table class="table centered data-reactEmployee" border="1">
                  <thead>
                    <tr>
                      <th data-field="firstname">Employee Name</th>         
                      <th data-field="dtEmpBday">Date of Birth</th>
                      <th data-field="Sex">Sex</th>
                      <th data-field="address">Address</th>
                      <th data-field="Role">Role</th>
                      <th data-field="cellphone">Cellphone No.</th>
                      <th data-field="cellphone">Cellphone No. (alt)</th>
                      <th data-field="Landline">Phone No.</th>
                      <th data-field="email">Email Address</th>
                      <th data-field="React">Reason for Deactivation</th>
                       <th data-field="Edit">Reactivate</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($employee as $employee_1)
                    @if($employee_1->boolIsActive == 0)
                      <tr>
                            <td>{{ $employee_1->strEmpFName }} {{ $employee_1->strEmpMName }} {{ $employee_1->strEmpLName }}</td>
                            <td>{{ $employee_1->dtEmpBday }} </td>
                            <td>
                              @if($employee_1->strSex == 'M') Male
                              @else Female
                              @endif
                            </td>
                            <td>{{ $employee_1->strEmpHouseNo }} {{ $employee_1->strEmpStreet }} {{ $employee_1->strEmpBarangay }} {{ $employee_1->strEmpCity }} {{ $employee_1->strEmpProvince }}  {{ $employee_1->strEmpZipCode }} </td>
                            
                            <td>{{ $employee_1->strEmpRoleName}}</td>                  
                            <td>{{ $employee_1->strCellNo }}</td> 
                            <td>{{ $employee_1->strCellNoAlt }}</td> 
                            <td>{{ $employee_1->strPhoneNo }}</td>
                            <td>{{ $employee_1->strEmailAdd }}</td>
                            <td>{{ $employee_1->strEmpInactiveReason }}</td>
                            <td>
                            {!! Form::open(['url' => 'utilities/inactive-data/reactivate-employee']) !!}
                              <input type="hidden" value="{{ $employee_1->strEmployeeID }}" id="reactID" name="reactID">
                              <input type="hidden" value="{{ $employee_1->strEmployeeID }}" id="reactInactiveEmp" name="reactInactiveEmp">
                              <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of customer to the table">REACTIVATE</button>
                            {!! Form::close() !!}
                          </td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

    </div>

    <div id="tabGarm" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
    <div style="height:30px;"></div>
    
      <!--Category Garments-->
      <p><h5 style="margin-left:20px"><b>Category Garments</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Garment Categories</center> </font> </h5>
                <table class = "centered" align = "center" border = "1">
                  <thead>
                    <tr>
                      <!--<th data-field="id">Garment Details ID</th>-->
                      <th data-field="garmentName">Garment Name</th>
                      <th data-field="garmentDescription">Garment Description</th>
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="React">Reactivate</th>
                    </tr>
                  </thead>

                  <tbody>
                      @foreach($category as $category_1)
                      @if($category_1->boolIsActive == 0)
                      <tr>
                        <!--<td>{{ $category_1->strGarmentCategoryID }}</td>-->
                        <td>{{ $category_1->strGarmentCategoryName }}</td>
                        <td>{{ $category_1->textGarmentCategoryDesc }}</td>
                        <td>{{ $category_1->strGarmentCategoryInactiveReason }}</td>
                        <td>
                          {!! Form::open(['url' => 'utilities/inactive-data/reactivate-garmentCategory']) !!}
                            <input type="hidden" id="reactID" name="reactID" value="{{$category_1->strGarmentCategoryID}}">
                            <input type="hidden" id="reactInactiveGarment" name="reactInactiveGarment" value="{{$category_1->strGarmentCategoryID}}">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of garment category to the table">REACTIVATE</button>
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>
              
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

      <!--Segment Garments-->
      <p><h5 style="margin-left:20px"><b>Segment Garments</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Garment Segments</center> </font> </h5>
                <table class = "table centered data-reactSegment" align = "center" border = "1">
                  <thead>
                    <tr>
                      <!--<th data-field="id">Garment Details ID</th>-->
                      <th data-field="name">Category Name</th>
                      <th data-field="name">Segment Name</th>
                      <th data-field="address">Segment Description</th>
                      <th data-field="React">Reason for Deactivation</th>
                      <th>Reactivate</th>
                    </tr>
                  </thead>

                  <tbody>
                      @foreach($segment as $segment_1)
                      @if($segment_1->boolIsActive == 0)
                      <tr>
                        <!--<td>{{ $segment_1->strGarmentSegmentID }}</td>-->
                        <td>{{ $segment_1->strGarmentCategoryName }}</td>
                        <td>{{ $segment_1->strSegmentName }}</td>
                        <td>{{ $segment_1->textSegmentDesc }}</td>
                        <td>{{ $segment_1->strSegInactiveReason }}</td>
                        <td>
                          {!! Form::open(['url' => 'utilities/inactive-data/reactivate-segment']) !!}
                            <input type="hidden" id="reactID" name="reactID" value="{{$segment_1->strSegmentID}}">
                            <input type="hidden" id="reactInactiveSegment" name="reactInactiveSegment" value="{{$segment_1->strSegmentID}}">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of segment to the table">REACTIVATE</button>
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

      <!--Segment Pattern-->
      <p><h5 style="margin-left:20px"><b>Segment Pattern</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Segment Pattern</center> </font> </h5>
                <table class="centered" border="1">
                  <thead>
                    <tr>
                      <!--<th data-field= "Catalog ID">Segment Pattern ID</th>-->
                      <th data-field="Category Name">Category Name </th>
                      <th data-field="Garment Name">Segment Name </th>
                      <th data-field="Pattern Name">Pattern Name</th>
                      <th data-field="Pattern Image">Pattern Image</th>
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="React">Reactivate</th>
                    </tr>
                  </thead>

                  <tbody>
                      @foreach($pattern as $pattern_1)
                      @if($pattern_1->boolIsActive == 0)
                          <tr>
                            <!--<td>{{ $pattern_1->strDesignPatternID }}</td>-->
                            <td>{{ $pattern_1->strGarmentCategoryName }}</td>
                            <td>{{ $pattern_1->strSegmentName }}</td>
                            <td>{{ $pattern_1->strSegPName }}</td>
                            <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($pattern_1->strSegPImage)}}"></td>
                            <td>{{ $pattern_1->strSegPInactiveReason }}</td>
                            <td>
                            {!! Form::open(['url' => 'utilities/inactive-data/reactivate-segmentPattern']) !!}
                              <input type="hidden" value="{{ $pattern_1->strSegPatternID }}" id="reactID" name="reactID">
                              <input type="hidden" value="{{ $pattern_1->strDesignPatternID }}" id="reactInactivePattern" name="reactInactivePattern">
                              <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of segment pattern to the table">REACTIVATE</button>
                            {!! Form::close() !!}
                          </td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>
              
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

      <!--Measurement Category-->
      <p><h5 style="margin-left:20px"><b>Measurement Category</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Measurement Information</center> </font> </h5>
                <table class="centered" border="1">
                  <thead>
                    <tr>
                        <th data-field="Garmentcategory">Garment Category</th>
                        <th data-field="Garmentcategory">Segment</th>
                        <th data-field="MeasurementName">Measurement Name</th>
                        <th data-field="Garmentcategory">Reason for Deactivation</th>
                        <th data-field="MeasurementName">Reactivate</th>
                    </tr>
                  </thead>

                  <tbody>
                      @foreach($head as $head_1)
                      @if($head_1->boolIsActive == 0)
                          <tr>
                            <td>{{ $head_1->strGarmentCategoryName }}</td>
                            <td>{{ $head_1->strSegmentName }}</td>
                            <td>{{ $head_1->strMeasurementDetailName }}</td>
                            <td>{{ $head_1->strMeasCatInactiveReason }}</td>
                            <td>
                            {!! Form::open(['url' => 'utilities/inactive-data/reactivate-head']) !!}
                              <input type="hidden" value="{{ $head_1->strMeasCatID }}" id="reactID" name="reactID">
                              <input type="hidden" value="{{ $head_1->strMeasCatID }}" id="reactInactiveHead" name="reactInactiveHead">
                              <button type="submit"  style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return measuremennt information to the table">REACTIVATE</button>
                            {!! Form::close() !!}
                          </td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>
              
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

      <!--Measurement Details-->
      <p><h5 style="margin-left:20px"><b>Measurement Details</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Measurement Details</center> </font> </h5>
                <table class = "table centered data-reactSegment" align = "center" border = "1">
                  <thead>
                    <tr>
                        <th data-field="name">Measurement Name</th>
                        <th data-field="description">Measurement Description</th>
                        <th data-field="Garmentcategory">Reason for Deactivation</th>
                        <th data-field="MeasurementName">Reactivate</th>
                    </tr>
                  </thead>

                  <tbody>
                      @foreach($detail as $detail_1)
                      @if($detail_1->boolIsActive == 0)
                      <tr>
                        <td>{{ $detail_1->strMeasurementDetailName }}</td>
                        <td>{{ $detail_1->txtMeasurementDetailDesc }}</td>
                        <td>{{ $detail_1->strMeasDetInactiveReason }}</td>
                        <td>
                          {!! Form::open(['url' => 'utilities/inactive-data/reactivate-detail']) !!}
                            <input type="hidden" id="reactID" name="reactID" value="{{ $detail_1->strMeasurementDetailID }}">
                            <input type="hidden" id="reactInactiveDetail" name="reactInactiveDetail" value="{{ $detail_1->strMeasurementDetailID }}">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of segment to the table">REACTIVATE</button>
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

    </div>

    <div id="tabFabmat" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
    <div style="height:30px;"></div>

      <!--Fabric Types-->
      <p><h5 style="margin-left:20px"><b>Fabric Types</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Fabric Types</center> </font> </h5>
                <table class="centered" border="1">
                  <thead>
                    <tr>
                      <!--<th data-field="fabricID">Fabric Type ID</th>-->
                      <th data-field="fabricName">Fabric Type Name</th>
                      <th data-field="fabricDescription">Fabric Description</th> 
                      <th data-field="React">Reason for Deactivation</th>    
                      <th>Reactivate</th>
                    </tr>   
                  </thead>

                  <tbody>
                    @foreach($fabricType as $fabricType_1)
                    @if($fabricType_1->boolIsActive == 0)
                      <tr>
                        <!--<td>{{ $fabricType_1->strFabricTypeID }}</td>-->
                        <td>{{ $fabricType_1->strFabricTypeName }}</td>
                        <td>{{ $fabricType_1->txtFabricTypeDesc}}</td>
                        <td>{{ $fabricType_1->strFabricTypeInactiveReason }}</td>
                        <td>
                          {!! Form::open(['url' => 'utilities/inactive-data/reactivate-fabricType']) !!}
                            <input type="hidden" value="{{ $fabricType_1->strFabricTypeID }}" id="reactID" name="reactID">
                            <input type="hidden" value="{{ $fabricType_1->strFabricTypeID }}" id="reactInactiveFabric" name="reactInactiveFabric">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="CLick to return data of fabric type to the table">REACTIVATE</button>
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

      <!--Swatches-->
      <p><h5 style="margin-left:20px"><b>Swatches</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Fabric Swatches</center> </font> </h5>
                <table class="centered" border="1">
                  <thead>
                    <tr>
                      <!--<th date-field="Swatch ID">Swatch ID </th>-->
                      <th data-field="Swatch Type">Swatch Type</th>
                      <th data-field="SwatchName">Swatch Name</th>
                      <th data-field="SwatchCode">Swatch Code</th>
                      <th data-field="SwatchImage">Image</th>
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="reactSwatch">Reactivate</th>
                    </tr>
                  </thead>

                  <tbody>
                      @foreach($swatch as $swatch_1)
                        @if($swatch_1->boolIsActive == 0)
                      <tr>
                        <!--<td>{{ $swatch_1->strSwatchID }}</td>-->
                        <td>{{ $swatch_1->strFabricTypeName }}</td>
                        <td>{{ $swatch_1->strSwatchName }}</td>
                        <td>{{ $swatch_1->strSwatchCode }}</td>
                        <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($swatch_1->strSwatchImage)}}"></td>
                        <td>{{ $swatch_1->strSwatchInactiveReason }}</td>
                        <td>

                          {!! Form::open(['url' => 'utilities/inactive-data/reactivate-swatch']) !!}

                            <input type="hidden" value="{{ $swatch_1->strSwatchID }}" id="reactID" name="reactID">
                            <input type="hidden" value="{{ $swatch_1->strSwatchID }}" id="reactInactiveSwatch" name="reactInactiveSwatch">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of fabric swatch to the table">REACTIVATE</button>

                          {!! Form::close() !!}
                      </td>
                      </tr>
                  @endif
                  @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

      <!--Swatch Name-->
      <p><h5 style="margin-left:20px"><b>Swatch Names</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Swatch Names</center> </font> </h5>
                <table class="centered" border="1">
                  <thead>
                    <tr>
                      <!--<th data-field="fabricID">Fabric Type ID</th>-->
                      <th data-field="swatchName">Name</th>
                      <th data-field="swatchDescription">Description</th> 
                      <th data-field="React">Reason for Deactivation</th>    
                      <th>Reactivate</th>
                    </tr>   
                  </thead>

                  <tbody>
                    @foreach($swatchname as $swatchname_1)
                    @if($swatchname_1->boolIsActive == 0)
                      <tr>
                        <!--<td>{{ $fabricType_1->strFabricTypeID }}</td>-->
                        <td>{{ $swatchname_1->strSName}}</td>
                        <td>{{ $swatchname_1->txtSwatchNameDesc}}</td>
                        <td>{{ $swatchname_1->strSwatchNameInactiveReason }}</td>
                        <td>
                          {!! Form::open(['url' => 'utilities/inactive-data/reactivate-swatchName']) !!}
                            <input type="hidden" value="{{ $swatchname_1->strSwatchNameID }}" id="reactID" name="reactID">
                            <input type="hidden" value="{{ $swatchname_1->strSwatchNameID }}" id="reactInactiveSName" name="reactInactiveSName">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="CLick to return data of fabric type to the table">REACTIVATE</button>
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

    </div>

    <div id="tabMate" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
    <div style="height:30px;"></div>
    
      <!--THREADS-->
      <p><h5 style="margin-left:20px"><b>Threads</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Threads</center> </font> </h5>
                <table class="centered" border="1">
                  <thead>
                    <tr>
                      <!--<th date-field= "Thread ID">Thread ID</th>-->
                      <th data-field="Thread Brand">Thread Brand</th>
                      <th data-field="Thread Color">Thread Color</th>
                      <th data-field="Thread Desc">Description</th>
                      <th data-field="ThreadImage">Image</th>
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="React">Reactivate</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($thread as $thread_1)
                      @if($thread_1->boolIsActive == 0)
                      <tr>
                       <!-- <td>{{ $thread_1->strMaterialThreadID }}</td>-->
                        <td>{{ $thread_1->strThreadBrand }}</td>
                        <td>{{ $thread_1->strThreadColor }}</td>
                        <td>{{ $thread_1->strThreadDesc }}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($thread_1->strThreadImage)}}"></td> 
                          <td>{{ $thread_1->strThreadInactiveReason }}</td>   
                        <td>          
                        {!! Form::open(['url' => 'utilities/inactive-data/reactivate-thread']) !!}
                          <input type="hidden" value="{{ $thread_1->intThreadID }}" id="reactID" name="reactID">
                          <input type="hidden" value="{{ $thread_1->intThreadID }}" id="reactInactiveThread" name="reactInactiveThread">
                          <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of thread to the table">REACTIVATE</button>
                        {!! Form::close() !!}
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

      <!--NEEDLES-->
      <p><h5 style="margin-left:20px"><b>Needles</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Needles</center> </font> </h5>
                <table class="centered" border="1">
                  <thead>
                    <tr>
                      <!--<th data-field="Needle ID">Needle ID</th>-->
                      <th data-field="Needle Brand">Needle Brand</th>
                      <th data-field="Needle Size">Needle Size</th>
                      <th data-field="Needle Desc">Description</th>
                      <th data-field="Needle Image">Image</th>
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="React">Reactivate</th>         
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($needle as $needle_1)
                      @if($needle_1->boolIsActive == 0)
                      <tr>
                        <!--<td>{{ $needle_1->strMaterialNeedleID }}</td>-->
                        <td>{{$needle_1->strNeedleBrand}}</td>
                        <td>{{$needle_1->strNeedleSize}}</td>
                        <td>{{$needle_1->strNeedleDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($needle_1->strNeedleImage)}}"></td>  
                        <td>{{ $needle_1->strNeedleInactiveReason }}</td>    
                        <td>          
                        {!! Form::open(['url' => 'utilities/inactive-data/reactivate-needle']) !!}
                          <input type="hidden" value="{{ $needle_1->intNeedleID }}" id="reactID" name="reactID">
                          <input type="hidden" value="{{ $needle_1->intNeedleID }}" id="reactInactiveNeedle" name="reactInactiveNeedle">
                          <button type="submit"  style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of needle to the table">REACTIVATE</button>
                        {!! Form::close() !!}
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

      <!--BUTTONS-->
      <p><h5 style="margin-left:20px"><b>Buttons</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Buttons</center> </font> </h5>
                <table class="centered" border="1">
                  <thead>
                    <tr>
                      <!--<th data-field="Button ID">Button ID</th>-->
                      <th data-field="Button Brand">Button Brand</th>
                      <th data-field="Button Size">Button Size</th>
                      <th data-field="Button Color">Button Color</th>
                      <th data-field="Button Color">Description</th>
                      <th data-field="ButtonImage">Image</th>  
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="React">Reactivate</th>        
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($button as $button_1)
                      @if($button_1->boolIsActive == 0)
                      <tr>
                        <!--<td>{{ $button_1->strMaterialButtonID }}</td>-->
                        <td>{{$button_1->strButtonBrand}}</td>
                        <td>{{$button_1->strButtonSize}}</td>
                        <td>{{$button_1->strButtonColor}}</td>
                        <td>{{$button_1->strButtonDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($button_1->strButtonImage)}}"></td>
                        <td>{{ $button_1->strButtonInactiveReason }}</td>      
                        <td>          
                        {!! Form::open(['url' => 'utilities/inactive-data/reactivate-button']) !!}
                          <input type="hidden" value="{{ $button_1->intButtonID }}" id="reactID" name="reactID">
                          <input type="hidden" value="{{ $button_1->intButtonID }}" id="reactInactiveButton" name="reactInactiveButton">
                          <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of button to the table">REACTIVATE</button>
                        {!! Form::close() !!}
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

      <!--ZIPPERS-->
      <p><h5 style="margin-left:20px"><b>Zippers</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Zippers</center> </font> </h5>
                <table class="centered" border="1">
                  <thead>
                    <tr>
                      <!--<th data-field="Zipper ID">Zipper ID</th>-->
                      <th data-field="Zipper Brand">Zipper Brand</th>
                      <th data-field="Zipper Size">Zipper Size</th>
                      <th data-field="Zipper Color">Zipper Color</th>
                      <th data-field="Zipper Desc">Description</th>
                      <th data-field="ZipperImage">Image</th> 
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="React">Reactivate</th>         
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($zipper as $zipper_1)
                      @if($zipper_1->boolIsActive == 0)
                      <tr>
                        <!--<td>{{ $zipper_1->strMaterialZipperID }}</td>-->
                        <td>{{$zipper_1->strZipperBrand}}</td>
                        <td>{{$zipper_1->strZipperSize}}</td>
                        <td>{{$zipper_1->strZipperColor}}</td>
                        <td>{{$zipper_1->txtZipperDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($zipper_1->strZipperImage)}}"></td>
                        <td>{{ $zipper_1->strZipperInactiveReason }}</td>      
                        <td>          
                        {!! Form::open(['url' => 'utilities/inactive-data/reactivate-zipper']) !!}
                          <input type="hidden" value="{{ $zipper_1->intZipperID }}" id="reactID" name="reactID">
                          <input type="hidden" value="{{ $zipper_1->intZipperID }}" id="reactInactiveZipper" name="reactInactiveZipper">
                          <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of zippers to the table">REACTIVATE</button>
                        {!! Form::close() !!}
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

      <!--HOOK & EYE-->
      <p><h5 style="margin-left:20px"><b>Hook & Eye</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Hook and Eyes</center> </font> </h5>
                <table class="centered" border="1">
                  <thead>
                    <tr>
                      <!--<th data-field="Hook ID">Hook and Eye ID</th>-->
                      <th data-field="Hook and Eye Name"> Hook Brand</th>
                      <th data-field="Hook and Eye Size"> Hook Size</th>
                      <th data-field="Hook and Eye Color"> Hook Color</th>
                      <th data-field="Hook and Eye Desc">Description</th>
                      <th data-field="Image">Image</th>
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="React">Reactivate</th>         
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($hook as $hook_1)
                      @if($hook_1->boolIsActive == 0)
                      <tr>
                       <!-- <td>{{$hook_1->strMaterialHookID}}</td>-->
                        <td>{{$hook_1->strHookBrand}}</td>
                        <td>{{$hook_1->strHookSize}}</td>
                        <td>{{$hook_1->strHookColor}}</td>
                        <td>{{$hook_1->textHookDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($hook_1->strHookImage)}}"></td>
                        <td>{{$hook_1->strHookInactiveReason}}</td>     
                        <td>          
                        {!! Form::open(['url' => 'utilities/inactive-data/reactivate-hookAndEye']) !!}
                          <input type="hidden" value="{{$hook_1->intHookID}}" id="reactID" name="reactID">
                          <input type="hidden" value="{{$hook_1->intHookID}}" id="reactInactiveHook" name="reactInactiveHook">
                          <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of hook and eye to the table">REACTIVATE</button>
                        {!! Form::close() !!}
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="tabCata" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
    <div style="height:30px;"></div>
    
      <!--Catalogue-->
      <p><h5 style="margin-left:20px"><b>Catalogue</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Catalogue Designs</center> </font> </h5>
                <table class="centered" border="1">

                  <thead>
                    <tr>
                      <!--<th data-field= "Catalogue ID">Catalogue ID</th>-->
                      <th data-field="Catalogue Category">Catalogue Category</th>
                      <th data-field="Catalogue Name">Catalogue Name</th>
                      <th data-field="Description">Description</th>
                      <th data-field="Image">Image</th>
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="React">Reactivate</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($catalogue as $catalogue_1)
                    @if($catalogue_1->boolIsActive == 0)
                      <tr>
                        <!--<td>{{ $catalogue_1->strCatalogueID }}</td>-->
                        <td>{{ $catalogue_1->strGarmentCategoryName }}</td>
                        <td>{{ $catalogue_1->strCatalogueName }}</td>
                        <td>{{ $catalogue_1->strCatalogueDesc }}</td>
                        <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($catalogue_1->strCatalogueImage)}}"></td>
                        <td>{{ $catalogue_1->strCatalogueInactiveReason }}</td>
                        <td>
                          {!! Form::open(['url' => 'utilities/inactive-data/reactivate-catalogue']) !!}
                            <input type="hidden" value="{{ $catalogue_1->strCatalogueID }}" id="reactID" name="reactID">
                            <input type="hidden" value="{{ $catalogue_1->strCatalogueID }}" id="reactInactiveCatalogue" name="reactInactiveCatalogue">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of customer to the table">REACTIVATE</button>
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>

    </div>

    <div id="tabAlte" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
    <div style="height:30px;"></div>
    
      <!--Alterations-->
      <p><h5 style="margin-left:20px"><b>Alteration</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Alterations</center> </font> </h5>
                <table class="centered" border="1">

                  <thead>
                    <tr>
                      <!--<th data-field= "Catalogue ID">Catalogue ID</th>-->
                      <th data-field="alterationName">Name</th>
                      <th data-field="alterationDescription">Description</th>
                      <th data-field="alterationPrice">Price</th>
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="React">Reactivate</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($alteration as $alteration_1)
                    @if($alteration_1->boolIsActive == 0)
                      <tr>
                        <td>{{$alteration_1->strAlterationName}}</td>
                        <td>{{$alteration_1->txtAlterationDesc}}</td>
                        <td>{{"Php" . $alteration_1->dblAlterationPrice}}</td>
                        <td>{{ $alteration_1->strAlterationInactiveReason }}</td>
                        <td>
                          {!! Form::open(['url' => 'utilities/inactive-data/reactivate-alteration']) !!}
                            <input type="hidden" value="{{ $alteration_1->strAlterationID }}" id="reactID" name="reactID">
                            <input type="hidden" value="{{ $alteration_1->strAlterationID }}" id="reactInactiveCatalogue" name="reactInactiveCatalogue">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of customer to the table">REACTIVATE</button>
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>
      </div>

      <div id="tabPackages" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
    <div style="height:30px;"></div>

            <!--Packages-->
     <p><h5 style="margin-left:20px"><b>Alteration</b></h5></p>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class = "col s12 m12 l12 overflow-x">
                <h5><font color = "#1b5e20"><center>Inactive Packages</center> </font> </h5>
                <table class="centered" border="1">

                  <thead>
                    <tr>
                      <!--<th data-field= "Catalogue ID">Catalogue ID</th>-->
                      <th data-field="packageName">Name</th>
                      <th data-field="packagetion">Description</th>
                      <th data-field="packageImage">Image</th>
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="React">Reactivate</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($packages as $packages_1)
                    @if($packages_1->boolIsActive == 0)
                      <tr>
                        <td>{{$packages_1->strPackageName}}</td>
                        <td>{{$packages_1->strPackageDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($packages_1->strPackageImage)}}"></td>
                        <td>{{ $packages_1->strPackageInactiveReason }}</td>
                        <td>
                          {!! Form::open(['url' => 'utilities/inactive-data/reactivate-packages']) !!}
                            <input type="hidden" value="{{ $packages_1->strPackageID}}" id="reactID" name="reactID">
                            <input type="hidden" value="{{ $packages_1->strPackageID }}" id="reactInactivePackage" name="reactInactivePackage">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of customer to the table">REACTIVATE</button>
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>
              </div>
              <div class = "clearfix"></div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@stop

@section('scripts')
    <script>
    $(document).ready(function(){
      $('ul.tabs').tabs();
    });
    </script>

        <script type="text/javascript">
          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);

      } );
    </script>
@stop

  