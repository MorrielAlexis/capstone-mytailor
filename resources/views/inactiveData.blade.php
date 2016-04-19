@extends('layouts.master')

@section('content')

  <div class="main-wrapper" style="margin-top:30px">
   <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Inactive Data</h4></span>
      </div>
    </div>
  </div>

  <!--Reactivate Garment Segment-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back record!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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
                      <th data-field="fname">First Name</th>
                      <th data-field= "mname">Middle Name </th>
                      <th data-field="lname">Last Name</th>
                      <th data-field="address">Address</th>
                      <th data-field="email">Email Address</th>
                      <th data-field="cellphone">Cellphone No.</th>
                      <th data-field="Landline">Telephone No.</th>
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="React">Reactivate</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($individual as $individual_1)
                      @if($individual_1->boolIsActive == 0)
                      <tr>
                        <td>{{ $individual_1->strCustPrivFName }}</td>
                        <td>{{ $individual_1->strCustPrivMName }}</td>
                        <td>{{ $individual_1->strCustPrivLName }}</td>
                        <td>{{ $individual_1->strCustPrivHouseNo }} {{ $individual_1->strCustPrivStreet }} {{ $individual_1->strCustPrivBarangay }} {{ $individual_1->strCustPrivCity }} {{ $individual_1->strCustPrivProvince }}  {{ $individual_1->strCustPrivZipCode }} </td>
                        <td>{{ $individual_1->strCustPrivEmailAddress}}</td>                  
                        <td>{{ $individual_1->strCustPrivCPNumber }}</td> 
                        <td>{{ $individual_1->strCustPrivLandlineNumber }}</td> 
                        <td>{{ $individual_1->strInactiveReason }}</td>      
                        <td>          
                          <form action="{{URL::to('reactCustPrivIndiv')}}" method="POST">
                            <input type="hidden" value="{{ $individual_1->strCustPrivIndivID }}" id="reactID" name="reactID">
                            <input type="hidden" value="{{ $individual_1->strCustPrivIndivID }}" id="reactInactiveIndiv" name="reactInactiveIndiv">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of customer to the table">REACTIVATE</button>
                          </form>
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
                            <td>{{ $company_1->strCustCompanyName }}</td>
                            <td>{{ $company_1->strCustCompanyHouseNo }} {{ $company_1->strCustCompanyStreet }} {{ $company_1->strCustCompanyBarangay }} {{ $company_1->strCustCompanyCity }} {{ $company_1->strCustCompanyProvince }}  {{ $company_1->strCustCompanyZipCode }} </td>
                            <td>{{ $company_1->strCustContactPerson }} </td>
                            <td>{{ $company_1->strCustCompanyEmailAddress}}</td>                  
                            <td>{{ $company_1->strCustCompanyCPNumber }}</td>
                            <td>{{ $company_1->strCustCompanyCPNumberAlt }}</td>  
                            <td>{{ $company_1->strCustCompanyTelNumber }}</td>                  
                            <td>{{ $company_1->strCustCompanyFaxNumber }}</td>                 
                            <td>{{ $company_1->strInactiveReason }}</td>  
                          <td>
                            <form action="{{URL::to('reactCustCompany')}}" method="POST">
                            <input type="hidden" value="{{ $company_1->strCustCompanyID }}" id="reactInactiveComp" name="reactInactiveComp">
                            <input type="hidden" value="{{ $company_1->strCustCompanyID }}" id="reactID" name="reactID">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to reeturn data of customer to the table">REACTIVATE</button>
                           
                            </form>
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
                          <td>{{ $role_1->strInactiveReason }}</td>
                          <td>
                            <form action="{{URL::to('reactRole')}}" method="POST">
                              <input type="hidden" value="{{ $role_1->strEmpRoleID }}" id="reactID" name="reactID">
                              <input type="hidden" value="{{ $role_1->strEmpRoleID }}" id="reactInactiveRole" name="reactInactiveRole">
                              <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of position to the table">REACTIVATE</button>
                            </form>
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
                      <th data-field="firstname">First Name</th>
                      <th data-field="middlename">Middle Name</th>
                      <th data-field="lastname">Last Name</th>          
                      <th data-field="dtEmpBday">Date of Birth</th>
                      <th data-field="Sex">Sex</th>
                      <th data-field="address">Address</th>
                      <th data-field="Role">Role</th>
                      <th data-field="cellphone">Cellphone No.</th>
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
                            <td>{{ $employee_1->strEmpFName }}</td>
                            <td>{{ $employee_1->strEmpMName }}</td>
                            <td>{{ $employee_1->strEmpLName }}</td>
                            <td>{{ $employee_1->dtEmpBday }} </td>
                            <td>
                              @if($employee_1->strSex == 'M') Male
                              @else Female
                              @endif
                            </td>
                            <td>{{ $employee_1->strEmpHouseNo }} {{ $employee_1->strEmpStreet }} {{ $employee_1->strEmpBarangay }} {{ $employee_1->strEmpCity }} {{ $employee_1->strEmpProvince }}  {{ $employee_1->strEmpZipCode }} </td>
                            <td>{{ $employee_1->strEmpRoleName}}</td>                  
                            <td>{{ $employee_1->strCellNo }}</td> 
                            <td>{{ $employee_1->strPhoneNo }}</td>
                            <td>{{ $employee_1->strEmailAdd }}</td>
                            <td>{{ $employee_1->strInactiveReason }}</td>
                            <td>
                            <form action="{{URL::to('reactEmployee')}}" method="POST">
                            <input type="hidden" value="{{ $employee_1->strEmployeeID }}" id="reactID" name="reactID">
                            <input type="hidden" value="{{ $employee_1->strEmployeeID }}" id="reactInactiveEmp" name="reactInactiveEmp">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of customer to the table">REACTIVATE</button>
                            </form>
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
                      <th data-field="name">Category Name</th>
                      <th data-field="address">Category Description</th>
                      <th data-field="React">Reason for Deactivation</th>
                      <th><th data-field="React">Reactivate</th>
                    </tr>
                  </thead>

                  <tbody>
                      @foreach($category as $category_1)
                      @if($category_1->boolIsActive == 0)
                      <tr>
                        <!--<td>{{ $category_1->strGarmentCategoryID }}</td>-->
                        <td>{{ $category_1->strGarmentCategoryName }}</td>
                        <td>{{ $category_1->strGarmentCategoryName }}</td>
                        <td>{{ $category_1->strGarmentCategoryDesc }}</td>
                        <td>{{ $category_1->strInactiveReason }}</td>
                        <td>
                          <form action="{{URL::to('reactGarmentCategory')}}" method="POST">
                            <input type="hidden" id="reactID" name="reactID" value="{{$category_1->strGarmentCategoryID}}">
                            <input type="hidden" id="reactInactiveGarment" name="reactInactiveGarment" value="{{$category_1->strGarmentCategoryID}}">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of garment category to the table">REACTIVATE</button>
                          </form>
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
                        <td>{{ $segment_1->strGarmentSegmentName }}</td>
                        <td>{{ $segment_1->strGarmentSegmentDesc }}</td>
                        <td>{{ $segment_1->strInactiveReason }}</td>
                        <td>
                          <form action="{{URL::to('reactGarmentSegment')}}" method="POST">
                            <input type="hidden" id="reactID" name="reactID" value="{{$segment_1->strGarmentSegmentID}}">
                            <input type="hidden" id="reactInactiveSegment" name="reactInactiveSegment" value="{{$segment_1->strGarmentSegmentID}}">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of segment to the table">REACTIVATE</button>
                          </form>
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
                            <td>{{ $pattern_1->strGarmentSegmentName }}</td>
                            <td>{{ $pattern_1->strPatternName }}</td>
                            <td><img class="materialboxed" width="650" src="{{URL::asset($pattern_1->strPatternImage)}}"></td>
                            <td>{{ $pattern_1->strInactiveReason }}</td>
                            <td>
                            <form action="{{URL::to('reactDesignPattern')}}" method="POST">
                            <input type="hidden" value="{{ $pattern_1->strDesignPatternID }}" id="reactID" name="reactID">
                            <input type="hidden" value="{{ $pattern_1->strDesignPatternID }}" id="reactInactivePattern" name="reactInactivePattern">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of segment pattern to the table">REACTIVATE</button>
                            </form>
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
                           <td>{{ $head_1->strGarmentSegmentName }}</td>
                           <td>{{ $head_1->meas_details }}</td>
                           <td>{{ $head_1->strInactiveReason }}</td>
                            <td>
                            <form action="{{URL::to('reactMeasurementCategory')}}" method="POST">
                              <input type="hidden" value="{{ $head_1->strMeasurementID }}" id="reactID" name="reactID">
                              <input type="hidden" value="{{ $head_1->strMeasurementID }}" id="reactInactiveHead" name="reactInactiveHead">
                              <button type="submit"  style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return measuremennt information to the table">REACTIVATE</button>
                            </form>
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
                        <td>{{ $detail_1->strMeasurementDetailDesc }}</td>
                        <td>{{ $detail_1->strInactiveReason }}</td>
                        <td>
                          <form action="{{URL::to('reactMeasurementDetail')}}" method="POST">
                            <input type="hidden" id="reactID" name="reactID" value="{{ $detail_1->strMeasurementDetailID }}">
                            <input type="hidden" id="reactInactiveDetail" name="reactInactiveDetail" value="{{ $detail_1->strMeasurementDetailID }}">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of segment to the table">REACTIVATE</button>
                          </form>
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
                      <th data-field="fabricName">Fabric TypeName</th>
                      <th data-field="fabricDesc">Fabric Description</th> 
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
                        <td>{{ $fabricType_1->strFabricTypeDesc }}</td>
                        <td>{{ $fabricType_1->strInactiveReason }}</td>
                        <td>
                          <form action="{{URL::to('reactFabricType')}}" method="POST">
                            <input type="hidden" value="{{ $fabricType_1->strFabricTypeID }}" id="reactID" name="reactID">
                            <input type="hidden" value="{{ $fabricType_1->strFabricTypeID }}" id="reactInactiveFabric" name="reactInactiveFabric">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="CLick to return data of fabric type to the table">REACTIVATE</button>
                          </form>
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
                      <th data-field="Swatch fabric type Name">Swatch Fabric Type Name</th>
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
                        <td>{{ $swatch_1->strInactiveReason }}</td>
                        <td>

                         <form action="{{URL::to('reactSwatch')}}" method="POST">
                            <input type="hidden" value="{{ $swatch_1->strSwatchID }}" id="reactID" name="reactID">
                            <input type="hidden" value="{{ $swatch_1->strSwatchID }}" id="reactInactiveSwatch" name="reactInactiveSwatch">
                        <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of fabric swatch to the table">REACTIVATE</button>

                        </form>
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
                      <th data-field="Thread Name">Thread Name</th>
                      <th data-field="Thread Color">Thread Color</th>
                      <th data-field="Thread Description">Description</th>
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
                        <td>{{ $thread_1->strMaterialThreadName }}</td>
                        <td>{{ $thread_1->strMaterialThreadColor }}</td>
                          <td>{{ $thread_1->strMaterialThreadDesc }}</td>
                        <td><img src="{{URL::asset($thread_1->strMaterialThreadImage)}}"></td> 
                          <td>{{ $thread_1->strInactiveReason }}</td>   
                        <td>          
                        <form action="{{URL::to('reactThread')}}" method="POST">
                        <input type="hidden" value="{{ $thread_1->strMaterialThreadID }}" id="reactID" name="reactID">
                        <input type="hidden" value="{{ $thread_1->strMaterialThreadID }}" id="reactInactiveThread" name="reactInactiveThread">
                        <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of thread to the table">REACTIVATE</button>
                        </form>
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
                      <th data-field="Needle Name">Needle Name</th>
                      <th data-field= "Needle Size">Needle Size </th>
                      <th data-field="Image">Image</th> 
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="React">Reactivate</th>         
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($needle as $needle_1)
                      @if($needle_1->boolIsActive == 0)
                      <tr>
                        <!--<td>{{ $needle_1->strMaterialNeedleID }}</td>-->
                        <td>{{ $needle_1->strMaterialNeedleName }}</td>
                        <td>{{ $needle_1->strMaterialNeedleSize }}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($needle_1->strMaterialNeedleImage)}}"> </td>  
                        <td>{{ $needle_1->strInactiveReason }}</td>    
                        <td>          
                        <form action="{{URL::to('reactNeedle')}}" method="POST">
                        <input type="hidden" value="{{ $needle_1->strMaterialNeedleID }}" id="reactID" name="reactID">
                        <input type="hidden" value="{{ $needle_1->strMaterialNeedleID }}" id="reactInactiveNeedle" name="reactInactiveNeedle">
                        <button type="submit"  style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of needle to the table">REACTIVATE</button>
                        </form>
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
                      <th data-field="Button Name">Button Name</th>
                      <th data-field= "Button Size">Button Size </th>
                      <th data-field= "Button Color">Button Color </th>
                      <th data-field="Image">Image</th>  
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="React">Reactivate</th>        
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($button as $button_1)
                      @if($button_1->boolIsActive == 0)
                      <tr>
                        <!--<td>{{ $button_1->strMaterialButtonID }}</td>-->
                        <td>{{ $button_1->strMaterialButtonName }}</td>
                        <td>{{ $button_1->strMaterialButtonSize }}</td>
                        <td>{{ $button_1->strMaterialButtonColor }}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($button_1->strMaterialButtonImage)}}"> </td>
                        <td>{{ $button_1->strInactiveReason }}</td>      
                        <td>          
                        <form action="{{URL::to('reactButton')}}" method="POST">
                        <input type="hidden" value="{{ $button_1->strMaterialButtonID }}" id="reactID" name="reactID">
                        <input type="hidden" value="{{ $button_1->strMaterialButtonID }}" id="reactInactiveButton" name="reactInactiveButton">
                        <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of button to the table">REACTIVATE</button>
                        </form>
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
                      <th data-field="Zipper Name">Zipper Name</th>
                      <th data-field= "Zipper Size">Zipper Size </th>
                      <th data-field= "Zipper Color">Zipper Color </th>
                      <th data-field="Image">Image</th> 
                      <th data-field="React">Reason for Deactivation</th>
                      <th data-field="React">Reactivate</th>         
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($zipper as $zipper_1)
                      @if($zipper_1->boolIsActive == 0)
                      <tr>
                        <!--<td>{{ $zipper_1->strMaterialZipperID }}</td>-->
                        <td>{{ $zipper_1->strMaterialZipperName }}</td>
                        <td>{{ $zipper_1->strMaterialZipperSize }}</td>
                        <td>{{ $zipper_1->strMaterialZipperColor }}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($zipper_1->strMaterialZipperImage)}}"> </td>
                        <td>{{ $zipper_1->strInactiveReason }}</td>      
                        <td>          
                        <form action="{{URL::to('reactZipper')}}" method="POST">
                        <input type="hidden" value="{{ $zipper_1->strMaterialZipperID }}" id="reactID" name="reactID">
                        <input type="hidden" value="{{ $zipper_1->strMaterialZipperID }}" id="reactInactiveZipper" name="reactInactiveZipper">
                        <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of zippers to the table">REACTIVATE</button>
                        </form>
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
                      <th data-field="Hook Name">Hook and Eye Name</th>
                      <th data-field= "Hook Size">Hook and Eye Size </th>
                      <th data-field= "Hook Color">Hook and Eye Color </th>
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
                        <td>{{$hook_1->strMaterialHookName}}</td>
                        <td>{{$hook_1->strMaterialHookSize}}</td>
                        <td>{{$hook_1->strMaterialHookColor}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($hook_1->strMaterialHookImage)}}"> </td> 
                        <td>{{$hook_1->strInactiveReason}}</td>     
                        <td>          
                        <form action="{{URL::to('reactHook')}}" method="POST">
                        <input type="hidden" value="{{$hook_1->strMaterialHookID}}" id="reactID" name="reactID">
                        <input type="hidden" value="{{$hook_1->strMaterialHookID}}" id="reactInactiveHook" name="reactInactiveHook">
                        <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of hook and eye to the table">REACTIVATE</button>
                        </form>
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
                        <td>{{ $catalogue_1->strInactiveReason }}</td>
                        <td>
                          <form action="{{URL::to('reactCatalogueDesign')}}" method="POST">
                            <input type="hidden" value="{{ $catalogue_1->strCatalogueID }}" id="reactID" name="reactID">
                            <input type="hidden" value="{{ $catalogue_1->strCatalogueID }}" id="reactInactiveCatalogue" name="reactInactiveCatalogue">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of customer to the table">REACTIVATE</button>
                          </form>
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
@stop