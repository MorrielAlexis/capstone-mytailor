<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Package;

use App\Fabric;
use App\FabricType;
use App\FabricColor;
use App\FabricPattern;
use App\FabricThreadCount;

use App\Segment;
use App\SegmentPattern;
use App\SegmentStyle;

use App\Company;

use App\MeasurementCategory;
use App\MeasurementDetail;

class WalkInCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {       
        $data = [];
        $values = [];
        $quantity = [];
        $pattern = [];
        $fabric = [];

        session(['package_data' => $data]);
        session(['package_values' => $values]);
        session(['package_quantity' => (int)$quantity]);
        session(['package_segment_pattern' => $pattern]);
        session(['package_segment_fabric' => $fabric]);

        $packages = Package::all();

        return view('transaction-walkin-company')
                ->with('packages', $packages)
                ->with('values', $values)
                ->with('quantity', $quantity);
    }

    public function showPackages()
    {       

        if(session()->get('package_data') != null ){
            $values = session()->get('package_data');
            $quantity = session()->get('package_quantity');
            //$quantity = session()->get('segment_quantity');
        }else{
            $data = [];
            $values = [];
            $quantity = [];

            session(['package_data' => $data]);
            session(['package_values' => $values]);
            session(['package_quantity' => (int)$quantity]);
        }

        $packages = Package::all();

        return view('transaction-walkin-company')
                ->with('packages', $packages)
                ->with('values', $values)
                ->with('quantity', $quantity);
    }

    public function showOrder()
    {   
        $values = \DB::table('tblPackages')
                ->select('strPackageID', 'strPackageName', 'strPackageSex', 'strPackageSeg1FK', 
                    'strPackageSeg2FK', 'strPackageSeg3FK', 'dblPackagePrice', 'strPackageImage', 
                    'intPackageMinDays', 'strPackageDesc', 'boolIsActive')
                ->whereIn('strPackageID', session()->get('package_data'))
                ->get();

        for($i = 0; $i < count($values); $i++){
            $segment1[$i] = \DB::table('tblPackages AS a')
                    ->leftJoin('tblSegment AS b', 'a.strPackageSeg1FK', '=', 'b.strSegmentID')
                    ->leftJoin('tblGarmentCategory AS c', 'b.strSegCategoryFK', '=', 'c.strGarmentCategoryID')
                    ->select('a.strPackageID', 'b.*', 'c.strGarmentCategoryName')
                    ->where('a.strPackageID', $values[$i]->strPackageID)
                    ->get();

            $segment2[$i] = \DB::table('tblPackages AS a')
                    ->leftJoin('tblSegment AS b', 'a.strPackageSeg2FK', '=', 'b.strSegmentID')
                    ->leftJoin('tblGarmentCategory AS c', 'b.strSegCategoryFK', '=', 'c.strGarmentCategoryID')
                    ->select('a.strPackageID', 'b.*', 'c.strGarmentCategoryName')
                    ->where('a.strPackageID', $values[$i]->strPackageID)
                    ->get();

            $segment3[$i] = \DB::table('tblPackages AS a')
                    ->leftJoin('tblSegment AS b', 'a.strPackageSeg3FK', '=', 'b.strSegmentID')
                    ->leftJoin('tblGarmentCategory AS c', 'b.strSegCategoryFK', '=', 'c.strGarmentCategoryID')
                    ->select('a.strPackageID', 'b.*', 'c.strGarmentCategoryName')
                    ->where('a.strPackageID', $values[$i]->strPackageID)
                    ->get();               
        }

        $segments = [$segment1, $segment2, $segment3];

        session(['package_segments' => $segments]);
        session(['package_values' => $values]);

        return view('walkin-company-customize-order')
                ->with('values', $values);
    }//page before customization

    public function listOfOrders(Request $request)
    {   
        $data_segment = $request->input('cbx-package-name');
        $data_quantity = $request->input('int-package-qty');

        session(['package_data' => $data_segment]);
        session(['package_quantity' => $data_quantity]);

        $order = session()->get('package_data');
        $quantity = session()->get('package_quantity');
        $orderPackages = [];
        $k = 0;

        for($i = 0; $i < count($quantity); $i++){
            for($j = 0; $j < $quantity[$i]; $j++){
                $orderPackages[$k] = $order[$i];
                $k++;
            }
        }

        session(['package_ordered' => $orderPackages]);

        return redirect('transaction/walkin-company-show-order');
    }

    public function showCustomizeOrder()
    {   
        $to_be_customized = session()->get('package_customize');

        $segment1 = \DB::table('tblPackages AS a')
                ->leftJoin('tblSegment AS b', 'a.strPackageSeg1FK', '=', 'b.strSegmentID')
                ->leftJoin('tblGarmentCategory AS c', 'b.strSegCategoryFK', '=', 'c.strGarmentCategoryID')
                ->select('b.*', 'c.strGarmentCategoryName')
                ->where('a.strPackageID', $to_be_customized)
                ->get();

        $segment2 = \DB::table('tblPackages AS a')
                ->leftJoin('tblSegment AS b', 'a.strPackageSeg2FK', '=', 'b.strSegmentID')
                ->leftJoin('tblGarmentCategory AS c', 'b.strSegCategoryFK', '=', 'c.strGarmentCategoryID')
                ->select('b.*', 'c.strGarmentCategoryName')
                ->where('a.strPackageID', $to_be_customized)
                ->get();

        $segment3 = \DB::table('tblPackages AS a')
                ->leftJoin('tblSegment AS b', 'a.strPackageSeg3FK', '=', 'b.strSegmentID')
                ->leftJoin('tblGarmentCategory AS c', 'b.strSegCategoryFK', '=', 'c.strGarmentCategoryID')
                ->select('b.*', 'c.strGarmentCategoryName')
                ->where('a.strPackageID', $to_be_customized)
                ->get();

        $segments = [$segment1[0], $segment2[0], $segment3[0]];

        session(['package_segments_customize' => $segments]);

        $fabrics = Fabric::all();
        $fabricThreadCounts = FabricThreadCount::all();
        $fabricColors = FabricColor::all();
        $fabricTypes = FabricType::all();
        $fabricPatterns = FabricPattern::all();

        $segmentPatterns = SegmentPattern::all();
        $segmentStyles = SegmentStyle::all();

        $package = \DB::table('tblPackages')
                ->select('*')
                ->where('strPackageID', $to_be_customized)
                ->get();

        return view('walkin-company-customize-order-package')
                ->with('segments', $segments)
                ->with('package', $package)
                ->with('fabrics', $fabrics)
                ->with('fabricThreadCounts', $fabricThreadCounts)
                ->with('fabricColors', $fabricColors)
                ->with('fabricTypes', $fabricTypes)
                ->with('fabricPatterns', $fabricPatterns)
                ->with('patterns', $segmentPatterns)
                ->with('styles', $segmentStyles);
    }//mismong customize na.

    public function customize(Request $request)
    {   
        $to_be_customized = $request->input('hidden-package-id');
        session(['package_customize' => $to_be_customized]);

        return redirect('transaction/walkin-company-show-customize');
    }

    public function saveDesign(Request $request)
    {   
        $values = session()->get('package_segments_customize');
        $to_be_customized = session()->get('package_customize');
        $segmentStyles = SegmentStyle::all();
        $segmentFabrics = Fabric::all();
        $k = 0;
    
        for($i = 0; $i < count($values); $i++){
            for($j = 0; $j < count($segmentStyles); $j++){
                $tempPatterns = $request->input('rdb_pattern' . $segmentStyles[$j]->strSegStyleCatID . ($i+1));       
                if($tempPatterns != null){
                    $patterns[$i][$k] = $tempPatterns;
                    $k++;
                } 
            }
            $k = 0;
        }

        for($i = 0; $i < count($values); $i++){
            $sqlStyles[$i] = \DB::table('tblSegmentPattern AS a')
                    ->leftJoin('tblSegmentStyleCategory AS b', 'a.strSegPStyleCategoryFK', '=', 'b.strSegStyleCatID')
                    ->leftJoin('tblSegment AS c', 'b.strSegmentFK', '=', 'strSegmentID')
                    ->select('c.strSegmentID', 'a.strSegPStyleCategoryFK', 'a.strSegPatternID', 
                             'a.strSegPName', 'b.strSegStyleName', 'a.dblPatternPrice')
                    ->whereIn('a.strSegPatternID', $patterns[$i])
                    ->get();
        }
        
        for($i = 0; $i < count($values); $i++)
        {   
            $tempFabrics[$i] = $request->input('fabrics' . ($i+1));
        }
        
        $sqlFabric = \DB::table('tblFabric')
                ->select('strFabricID', 'strFabricName', 'dblFabricPrice')
                ->whereIn('strFabricID', $tempFabrics)
                ->get();
        
        $fabrics;

        for($i = 0; $i < count($values); $i++){
            for($j = 0; $j < count($sqlFabric); $j++){
                if($tempFabrics[$i] == $sqlFabric[$j]->strFabricID){
                    $fabrics[$i] = $sqlFabric[$j];
                }
            }
        }  
        

        for($i = 0; $i < (count($values) + 1); $i++)
        {
            if($i == 0) 
            {
                array_unshift($sqlStyles, $to_be_customized);
                array_unshift($fabrics, $to_be_customized);
                continue;
            }
        }
    
        $request->session()->push('package_segment_pattern', $sqlStyles);
        $request->session()->push('package_segment_fabric', $fabrics);

        //dd(session()->get('package_segment_pattern'));
        return redirect('transaction/walkin-company-show-order');
    }


    public function addEmployees()
    {   
        $order = session()->get('package_data');
        $segments = session()->get('package_segments');
        $packages = session()->get('package_values');
        $quantity = session()->get('package_quantity');
        $totalQuantity = 0  ;
        $k = 0;

        for($i = 0; $i < count($quantity); $i++)
            $totalQuantity = $totalQuantity + $quantity[$i];

        return view('walkin-company-add-employee')
                ->with('total_quantity', $totalQuantity)
                ->with('orderPackages', session()->get('package_ordered'))
                ->with('packages', $packages)
                ->with('orders', $order)
                ->with('segments', $segments);
    }//specifications ng employee

    public function saveEmployees(Request $request)
    {
        $employeeFirstName = $request->input('empFirstName');
        $employeeLastName = $request->input('empLastName');
        $employeeMiddleName = $request->input('empMiddleName');
        $employeeSex = $request->input('empSex');
        $employeeSet = $request->input('empSet');

        $quantity = session()->get('package_quantity');
        $totalQuantity = 0;

        for($i = 0; $i < count($quantity); $i++)
            $totalQuantity = $totalQuantity + $quantity[$i];

        for($i = 0; $i < $totalQuantity; $i++)
        {
            $employeeSegmentQuantity[$i] = $request->input('segment-qty' . $i);
        }

        session(['employee_fname' => $employeeFirstName]);
        session(['employee_lname' => $employeeLastName]);
        session(['employee_mname' => $employeeMiddleName]);
        session(['employee_sex'   => $employeeSex]);
        session(['employee_set'   => $employeeSet]);
        session(['employee_segment_qty' => $employeeSegmentQuantity]);

        return redirect('transaction/walkin-company-show-order');
    }//save employee specs

    public function retailProduct()
    {
        return view('walkin-company-retail-product');
    }

    public function catalogueDesign()
    {
        return view('walkin-company-catalogue-design');
    }

    //if a customer already has an existing profile with the shop
    public function customerCheck()
    {
        $company = Company::all();

        $quantity = session()->get('package_quantity');
        $packages = session()->get('package_values');
        $prices = [];
        
        for($i = 0; $i < count($packages); $i++) $prices[$i] = $packages[$i]->dblPackagePrice * $quantity[$i]; 

        return view('walkin-company-customer-check')
                ->with('company', $company)
                ->with('quantity', $quantity)
                ->with('packages', $packages)
                ->with('prices', $prices);;
    }

    public function companyInformation()
    {
        $quantity = session()->get('package_quantity');
        $packages = session()->get('package_values');
        $prices = [];

        for($i = 0; $i < count($packages); $i++) $prices[$i] = $packages[$i]->dblPackagePrice * $quantity[$i]; 

        $joID = \DB::table('tblJobOrder')
            ->select('strJobOrderID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strJobOrderID', 'desc')
            ->take(1)
            ->get();

        if($joID == null){
            $newID = $this->smartCounter("JOB000"); 
        }else{
            $ID = $joID["0"]->strJobOrderID;
            $newID = $this->smartCounter($ID);  
        }

        //get all the individuals
        $ids = \DB::table('tblCustCompany')
            ->select('strCompanyID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strCompanyID', 'desc')
            ->take(1)
            ->get();

        if($ids == null){
            $custID = $this->smartCounter("CUSTC000"); 
        }else{
            $ID = $ids["0"]->strCompanyID;
            $custID = $this->smartCounter($ID);  
        }             

        session(['compID' => $custID]);
        session(['compJOID' => $newID]);


        return view('walkin-company-checkout-info')
                ->with('quantity', $quantity)
                ->with('packages', $packages)
                ->with('prices', $prices)
                ->with('custID', $custID)
                ->with('joID', $newID);
    }

    public function existingCompanyInformation(Request $request)
    {
        $custID = $request->input('custID');

        $joID = \DB::table('tblJobOrder')
            ->select('strJobOrderID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strJobOrderID', 'desc')
            ->take(1)
            ->get();

        if($joID == null){
            $newID = $this->smartCounter("JOB000"); 
        }else{
            $ID = $joID["0"]->strJobOrderID;
            $newID = $this->smartCounter($ID);  
        }         

        session(['compID' => $custID]);
        session(['compJOID' => $newID]);

        return view('walkin-company-checkout-measure');
    }


    public function payment()
    {   
        $quantity = session()->get('package_quantity');
        $totalQuantity = 0;

        for($i = 0; $i < count($quantity); $i++)
            $totalQuantity = $totalQuantity + $quantity[$i];
        //dd(session()->get('package_segment_fabric'));
/*        for($l = 0; $l < count(session()->get('package_values')); $l++)
        {
            for($i = 0; $i < count(session()->get('package_segments')); $i++)
            {
                for($j = 0; $j < count(session()->get('package_segments')[$i]); $j++)
                {
                }
              if(session()->get('package_values')[$l]->strPackageID == session()->get('package_segment_fabric')[$l][0])
                {
                    var_dump(session()->get('package_segment_fabric')[$l][$i+1]->strFabricName);
                }
            }
        }
        dd("");*/

        //var_dump(session()->get('employee_set'), session()->get('employee_segment_qty'));

/*        for($i = 0; $i < count(session()->get('employee_set')); $i++)
        {
            var_dump(session()->get('employee_set')[$i]);
        }*/
        
         
        $l = 0;
        for($i = 0; $i < count(session()->get('package_segments')); $i++)
        {
            for($j = 0; $j < count(session()->get('package_segments')[$i]); $j++)
            {   
                //  for($k = 0; )
                //var_dump(session()->get('package_segments')[$i][$j]);
                if(session()->get('package_segment_fabric')[$j][0] == session()->get('package_segments')[$i][$j][0]->strPackageID)
                {
                    for($k = 0; $k < count(session()->get('package_segment_fabric')[$j]); $k++)
                    {
                        var_dump(session()->get('package_segment_fabric')[$j][$l+1]->strFabricName);
                    }
                //var_dump(session()->get('package_segment_fabric')[$j]);
                }
                //var_dump(session()->get('package_segments')[$i]);   
            }
        }
        dd("");
        return view('walkin-company-checkout-pay')
                ->with('joID', session()->get('compJOID'))
                ->with('package_values', session()->get('package_values'))
                ->with('package_segments', session()->get('package_segments'))
                ->with('segment_patterns', session()->get('package_segment_pattern'))
                ->with('segment_fabrics', session()->get('package_segment_fabric'))
                ->with('total_quantity', $totalQuantity);

    }

    /*For adding measurement profile*/
    public function measureProfile()
    {
        $quantity = session()->get('package_quantity');
        $totalQuantity = 0;

        for($i = 0; $i < count($quantity); $i++)
            $totalQuantity = $totalQuantity + $quantity[$i];

        $measurementCategory = MeasurementCategory::all()->take(2);
        $measurementDetail = \DB::table('tblMeasurementDetail')
                        ->select('*')
                        ->where('strMeasCategoryFK', 'MEASCAT002')
                        ->get();
        
/*        for($l = 0; $l < count($totalQuantity); $l++)
        {
            for($i = 0; $i < count(session()->get('package_segments')); $i++)
            {
                for($j = 0; $j < count(session()->get('package_segments')[$i]); $j++)
                {
                    if(session()->get('package_ordered')[$l] == session()->get('package_segments')[$i][$j][0]->strPackageID)
                    {
                        foreach($measurementDetail as $detail)
                        {
                            if(session()->get('package_segments')[$i][$j][0]->strSegmentID == $detail->strMeasDetSegmentFK)
                            {
                                var_dump($detail->strMeasDetailName);      
                            }
                        }
                    }
                }
                var_dump("===");
            }
        }
        dd("");*/
        return view('walkin-company-add-measurement')
                ->with('total_quantity', $totalQuantity)
                ->with('package_ordered', session()->get('package_ordered'))
                ->with('package_segments', session()->get('package_segments'))
                ->with('package_values', session()->get('package_values'))
                ->with('employee_fname', session()->get('employee_fname'))
                ->with('employee_lname', session()->get('employee_lname'))
                ->with('employee_mname', session()->get('employee_mname'))
                ->with('measurement_category', $measurementCategory)
                ->with('measurement_detail', $measurementDetail);
    }

    public function saveMeasurements(Request $request)
    {
        $quantity = session()->get('package_quantity');
        $totalQuantity = 0;

        for($i = 0; $i < count($quantity); $i++)
            $totalQuantity = $totalQuantity + $quantity[$i];

        $measurementDetail = \DB::table('tblMeasurementDetail')
                ->select('*')
                ->where('strMeasCategoryFK', 'MEASCAT002')
                ->get();

        //dd($totalQuantity);
        for($i = 0; $i < $totalQuantity; $i++)
        {   
            $measurement_value[] = $request->input($i);
            $measurement_id[] = $request->input('measID' . $i);    
        }
        
        session(['measurement_value' => $measurement_value]);
        session(['measurement_id'    => $measurement_id]);

        return redirect('transaction/walkin-company-payment-measure-detail');
    }

    public function measurement()
    {
        return view('walkin-company-checkout-measure');
    }

    /*For downloadable forms*/
    public function downloadForms()
    {
        return view('walkin-company-downloadable-forms');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        public function smartCounter($id)
    {   

        $lastID = str_split($id);

        $ctr = 0;
        $tempID = "";
        $tempNew = [];
        $newID = "";
        $add = TRUE;

        for($ctr = count($lastID)-1; $ctr >= 0; $ctr--){

            $tempID = $lastID[$ctr];

            if($add){
                if(is_numeric($tempID) || $tempID == '0'){
                    if($tempID == '9'){
                        $tempID = '0';
                        $tempNew[$ctr] = $tempID;

                    }else{
                        $tempID = $tempID + 1;
                        $tempNew[$ctr] = $tempID;
                        $add = FALSE;
                    }
                }else{
                    $tempNew[$ctr] = $tempID;
                }           
            }
            $tempNew[$ctr] = $tempID;   
        }

        
        for($ctr = 0; $ctr < count($lastID); $ctr++){
            $newID = $newID . $tempNew[$ctr];
        }

        return $newID;
    }
}
