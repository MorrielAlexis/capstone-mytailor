<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Catalogue;
use App\GarmentCategory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //get all the catalogue designs

        // $catalogue = Catalogue::all();
        
            $ids = \DB::table('tblCatalogue')
            ->select('strCatalogueID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strCatalogueID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strCatalogueID;
        $newID = $this->smartCounter($ID);  

        $category = GarmentCategory::all();

        $catalogue = \DB::table('tblCatalogue')
                ->join('tblGarmentCategory', 'tblCatalogue.strCatalogueCategoryFK', '=', 'tblGarmentCategory.strGarmentCategoryID')
                // ->select('tblCatalogue.*', 'tblGarmentCategory.strGarmentCategoryName')
                // ->orderBy('created_at')
                ->get();

        return view ('maintenance-catalogue')
                    ->with('newID', $newID)
                    ->with('catalogue', $catalogue)
                    ->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->input('addImage');
        $destinationPath = 'imgCatalogue';

            if($file == '' || $file == null){
                $catalogue = Catalogue::create(array(
                'strCatalogueID' => $request->input('addCatalogueID'),
                'strCatalogueCategoryFK' => $request->input('addCategory'),
                'strCatalogueName' => trim($request ->input('addCatalogueName')),
                'strCatalogueDesc' => trim($request->input('addCatalogueDesc')),
                'strCatalogueImage' => 'imgCatalogue/' .$file,
                'boolIsActive' => 1
                ));     
                }else{
                    $request->file('addImg')->move($destinationPath, $file);

                    $catalogue = Catalogue::create(array(
                        'strCatalogueID' => $request->input('addCatalogueID'),
                        'strCatalogueCategoryFK' => $request->input('addCategory'),
                        'strCatalogueName' => $request->input('addCatalogueName'),
                        'strCatalogueDesc' => trim($request->input('addCatalogueDesc')),
                        'strCatalogueImage' => 'imgDesignPatterns/'.$file,
                        'boolIsActive' => 1
                    )); 

                }
            $catalogue->save();

            return redirect('maintenance/catalogue');
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
    function update_catalogue(Request $request)
    {

        $catalogue = Catalogue::find($request->input('editCatalogueID'));

        $file = $request->input('editImage');
        $destinationPath = 'imgCatalogue';

                if($file == $catalogue->strCatalogueImage)
                {
                    $catalogue->strCatalogueCategoryFK = $request->input('editCategory');
                    $catalogue->strCatalogueName = trim($request->input('editCatalogueName'));
                    $catalogue->strCatalogueDesc = trim($request->input('editCatalogueDesc'));
                }else{
                    $request->file('editImg')->move($destinationPath);

                    $catalogue->strCatalogueCategoryFK = $request->input('editCategory');
                    $catalogue->strCatalogueName = trim($request->input('editCatalogueName'));
                    $catalogue->strCatalogueDesc = trim($request->input('editCatalogueDesc'));
                    $catalogue->strCatalogueImage = 'imgCatalogue/'.$file;
                }           

                $catalogue->save();

            
            return redirect('maintenance/catalogue');
    }

    function delete_catalogue(Request $request)
    {

        $catalogue = Catalogue::find($request->input('delCatalogueID'));

        $catalogue->boolIsActive = 0;

        $catalogue->save();

        return redirect('maintenance/catalogue');
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
