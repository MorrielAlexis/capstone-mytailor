<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Alteration;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AlterationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //   get all the alteration types

       $ids = \DB::table('tblAlteration')
            ->select('strAlterationID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strAlterationID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strAlterationID;
        $newID = $this->smartCounter($ID);  
        $alteration = Alteration::all();

       //  load the view and pass the fabric types

         return view('maintenance-alteration')
                    ->with('alteration', $alteration)
                    ->with('newID', $newID);
    
        
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
        $alteration = Alteration::create(array(
                'strAlterationID' => $request->input('addAlterationNameID'),
                'strAlterationName' =>trim($request->input('addAlterationName')),
                'txtAlterationDesc' => trim($request->input('addAlterationDesc')),  
                'dblAlterationPrice' => trim($request->input('addAlterationPrice')),  
                'boolIsActive' => 1
            ));
        $added = $alteration->save();

        return redirect('maintenance/alteration?success=true');
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

    function update_alteration(Request $request)
    {

        $alteration = Alteration::find($request->input('editAlterationNameID'));

               $alteration->strAlterationName = trim($request->input('editAlterationName'));
               $alteration->txtAlterationDesc = trim($request->input('editAlterationDesc'));
               $alteration->dblAlterationPrice = trim($request->input('editAlterationPrice'));

        $alteration->save();

         return redirect('maintenance/alteration');
        
       
    }

    
    function delete_alteration(Request $request)
    {
        $alteration = Alteration::find($request->input('delAlterationNameID'));

        $alteration->strAlterationInactiveReason = trim($request->input('delInactiveAlteration'));
        $alteration->boolIsActive = 0;
        $alteration->save();
        
        return redirect('maintenance/alteration');
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
