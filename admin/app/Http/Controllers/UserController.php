<?php

namespace App\Http\Controllers;

use App\AppUser;
use App\CourseCode;
use App\CourseMaterial;
use App\Pin;
use App\Role;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $app_users  =   AppUser::all();
            $Codes      =   CourseCode::all();
            $Users      =   User::with(['role'])->get();
            $Roles      =   Role::all();
            $Materials  =   CourseMaterial::all();
            $Pins       =   Pin::all();
            return view('user.index', compact(['Users', 'Roles', 'Codes', 'Materials', 'Pins', 'app_users']));
        }catch (\ErrorException $ex){
            $ex->getMessage();
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $app_users   =   AppUser::all();
            $Codes      =   CourseCode::all();
            $Users      =   User::with(['role'])->get();
            $Roles      =   Role::all();
            $Pins       =   Pin::all();
            $Materials  =   CourseMaterial::all();
            return view('user.create', compact(['Roles', 'Users', 'Codes', 'Pins', 'Materials','app_users']));
        }
        catch(\ErrorException $ex){
            $ex->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            /**
             * Define rules
             */
            $rules = [
                'name' => 'required',
                'email'     => 'required|email|max:255|unique:users',
                'phone' => 'required',
                'password' => 'required|min:6|confirmed',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $User       =   new User();
            $User->create($request->all());
            if($User){
                flash()->success($request->name.' added successfully');
                return redirect()->action('UserController@index');
            }
        }
        catch(\ErrorException$ex){
            $ex->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $User       =   User::find($id);
            return $User;
        }
        catch(\ErrorException $ex){
            $ex->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        try{
            $User       =   User::find(base64_decode($id));
            if($User){
                $User->update($request->all());
                flash()->success('User info updated successfully');
                return redirect()->action('UserController@index');
            }
        }
        catch(\ErrorException $ex){
            $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $User       =   User::find(base64_decode($id));
            $User->delete();
            flash()->success('User info deleted successfully');
            return redirect()->action('UserController@index');
        }
        catch(\ErrorException $ex){
            $ex->getMessage();
        }
    }
}
