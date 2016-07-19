<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Input;
use App\User;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegisterCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->beforeFilter('guest');
    }
    
    public function index()
    {
        //
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
        $rules = [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ];

        $input = Input::only('email', 'password', 'password_confirmation');

        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            return redirect()->back()->withInput(Input::except('password', 'password_confirmation'))->withErrors($validator, 'register');
        }

        $confirmation_code = str_random(30);
        $name = Input::get('compName');

        $user = new User;
            $user->id = Input::get('userId');
            $user->name = Input::get('compName');
            $user->type = 'customer';
            $user->email = Input::get('email');
            $user->password = bcrypt(Input::get('password'));
            $user->confirmation_code = $confirmation_code;
            $user->confirmed = 0;
            
        $user->save();
        /*User::create([
            'id' => Input::get('userId'),
            'first_name' => Input::get('userFName'),
            'last_name' => Input::get('userLName'),
            'type' => 'customer',
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password')),
            'confirmation_code' => $confirmation_code,
            'confirmed' => 0
        ]);*/

        Mail::send('emails.verify', ['name' => $name, 'confirmation_code' => $confirmation_code], function($message) {
            $message->to(Input::get('email'), Input::get('compName'))->subject('Verify your email address');
        });

        return redirect('/register/profile/company');
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

    public function confirm($confirmation_code)
    {
        $user = User::where('confirmation_code', '=', $confirmation_code)->where('confirmed', '=', 0);

        if ($user->count())
        {
            $user = $user->first();

            $user->confirmed = 1;
            $user->confirmation_code = null;
            $user->save();
        }

        return redirect('/')->with('flash_message', 'You have successfully verified your account.');
    }
}
