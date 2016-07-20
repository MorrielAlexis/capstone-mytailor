<?php

namespace App\Http\Controllers;

use View;
use Input;
use App\User;
use App\Individual;
use App\Company;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function showWelcome()
    {
        $ids = \DB::table('users')
            ->select('id')
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->id;
        $newUser = $this->smartCounter($ID);  

    	return View::make('login')->with('newUserId', $newUser);
    }

    public function LogIn()
    {
    	 $rules = [
            'email' => 'required|exists:users',
            'password' => 'required'
        ];

        $input = Input::only('email', 'password');

        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            return Redirect::back()->withInput(Input::except('password'))->withErrors($validator, 'login');
        }

        $email = Input::get('email');
        $pass = Input::get('password');

        if (Auth::attempt(['email' => $email, 'password' => $pass])) {
            // Authentication passed...
            $user = User::where('email', '=', Input::get('email'))->first();

            if($user->confirmed == 1)
            {
                if(Auth::user()->type == 'employee'){
                    return redirect()->intended('/dashboard');
                }else if(Auth::user()->type == 'customer'){
                    return redirect()->intended('/online-home');
                }

            }else{
                return redirect('/')->with('flash_message', 'Please verify your email to activate your account.')
                    ->withInput(Input::except('password'));
            }
            
        }else{
            return redirect('/')->with('flash_message', 'Email and password do not match.')
                    ->withInput(Input::except('password'));
        }
    }

    public function LogOut()
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect('/');
        }
    }

    

    public function indiv()
    {
        $ids = \DB::table('tblCustIndividual')
            ->select('strIndivID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strIndivID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strIndivID;
        $newID = $this->smartCounter($ID);

        return view('signup-individual')->with('newID', $newID);
    }

    public function saveDetailsIndiv(Request $request)
    {
        $ind = Individual::get();

        $individual = Individual::create(array(
                    'strIndivID' => $request->input('strIndivID'),
                    'strIndivFName' => trim($request->input('strIndivFName')),     
                    'strIndivMName' => trim($request->input('strIndivMName')),
                    'strIndivLName' => trim($request->input('strIndivLName')),
                    'strIndivHouseNo' => trim($request->input('strIndivHouseNo')), 
                    'strIndivStreet' => trim($request->input('strIndivStreet')),
                    'strIndivBarangay' => trim($request->input('strIndivBarangay')),   
                    'strIndivCity' => trim($request->input('strIndivCity')),   
                    'strIndivProvince' => trim($request->input('strIndivProvince')),
                    'strIndivZipCode' => trim($request->input('strIndivZipCode')),
                    'strIndivLandlineNumber' => trim($request->input('strIndivLandlineNumber')),
                    'strIndivCPNumber' => trim($request->input('strIndivCPNumber')), 
                    'strIndivCPNumberAlt' => trim($request->input('strIndivCPNumberAlt')),
                    'strIndivEmailAddress' => trim($request->input('strIndivEmailAddress')),
                    'boolIsActive' => 1
                    ));

                $individual->save();

        \Session::flash('flash_message','Profile updated.');
        return redirect('/')->with('flash_message', 'Thank you for signing up! Please check your email first to activate your account.');

    }

    public function comp()
    {
        $ids = \DB::table('tblCustCompany')
            ->select('strCompanyID')
            ->orderBy('created_at', 'desc')
            ->orderBy('strCompanyID', 'desc')
            ->take(1)
            ->get();

        $ID = $ids["0"]->strCompanyID;
        $newComp = $this->smartCounter($ID);

        return view('signup-company')->with('newCompId', $newComp);
    }

    public function saveDetailsComp(Request $request)
    {
        $comp = Company::get();

        $company = Company::create(array(
                    'strCompanyID' => $request->input('strCompanyID'),
                    'strCompanyName' => trim($request->input('strCompanyName')),     
                    'strCompanyBuildingNo' => trim($request->input('strCompanyBuildingNo')),   
                    'strCompanyStreet' => trim($request->input('strCompanyStreet')),
                    'strCompanyBarangay' => trim($request->input('strCompanyBarangay')), 
                    'strCompanyCity' => trim($request->input('strCompanyCity')), 
                    'strCompanyProvince' => trim($request->input('strCompanyProvince')),
                    'strCompanyZipCode' => trim($request->input('strCompanyZipCode')),
                    'strContactPerson' => trim($request->input('strContactPerson')),
                    'strCompanyEmailAddress' => trim($request->input('strCompanyEmailAddress')),         
                    'strCompanyCPNumber' => trim($request->input('strCompanyCPNumber')), 
                    'strCompanyCPNumberAlt' => trim($request->input('strCompanyCPNumberAlt')), 
                    'strCompanyTelNumber' => trim($request->input('strCompanyTelNumber')),
                    'strCompanyFaxNumber' => trim($request->input('strCompanyFaxNumber')),
                    'boolIsActive' => 1
                    ));

                $company->save();

        \Session::flash('flash_message','Profile updated.');
        return redirect('/')->with('flash_message', 'Thank you for signing up! Please check your email first to activate your account.');
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
