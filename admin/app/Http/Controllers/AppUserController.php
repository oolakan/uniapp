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
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class AppUserController extends Controller
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
            return view('app_user.index', compact(['Users', 'Roles', 'Codes', 'Materials', 'Pins', 'app_users']));
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
            $app_users  =   AppUser::all();
            $Codes      =   CourseCode::all();
            $Users      =   User::with(['role'])->get();
            $Roles      =   Role::all();
            $Pins       =   Pin::all();
            $Materials  =   CourseMaterial::all();
            return view('app_user.create', compact(['Roles', 'Users', 'Codes', 'Pins', 'Materials', 'app_users']));
        }
        catch(\ErrorException $ex){
            $ex->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
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
                'pin'     => 'required|max:10|unique:app_users',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $app_user       =   new AppUser();
            $app_user->create($request->all());
            if($app_user){
                flash()->success($request->name.' added successfully');
                return redirect()->action('AppUserController@index');
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
        try{
            $app_user       =   AppUser::find(base64_decode($id));
            if($app_user){
                $app_user->update($request->all());
                flash()->success('User info updated successfully');
                return redirect()->action('AppUserController@index');
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
            $app_user       =   AppUser::find(base64_decode($id));
            $app_user->delete();
            flash()->success('User info deleted successfully');
            return redirect()->action('AppUserController@index');
        }
        catch(\ErrorException $ex){
            $ex->getMessage();
        }
    }
}
