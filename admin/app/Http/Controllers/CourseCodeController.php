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

class CourseCodeController extends Controller
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
            $Roles      =   Role::all();
            $Users      =    User::all();
            $Codes      =    CourseCode::all();
            $Materials  =   CourseMaterial::all();
            $Pins       =   Pin::all();
            return view('course_code.index', compact(['Codes', 'Users', 'Materials', 'Roles', 'Pins', 'app_users']));
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
            $Users      =    User::all();
            $Codes      =    CourseCode::all();
            $Materials  =   CourseMaterial::all();
            $Roles          =   Role::all();
            $Pins           =   Pin::all();
            return view('course_code.create', compact(['Users', 'Codes', 'Materials', 'Roles', 'Pins','app_users']));
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
                'code' => 'required',
                'title'     => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $Codes       =   new CourseCode();
            $Codes->create($request->all());
            if($Codes){
                flash()->success($request->code.' added successfully');
                return redirect()->action('CourseCodeController@index');
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
            $Code       =   CourseCode::find($id);
            return $Code;
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
            $Code       =   CourseCode::find(base64_decode($id));
            if($Code){
                $Code->update($request->all());
                flash()->success($request->code.' updated successfully');
                return redirect()->action('CourseCodeController@index');
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
            $Code      =   CourseCode::find(base64_decode($id));
            $Code->delete();
            flash()->success('Course Code deleted successfully');
            return redirect()->action('CourseCodeController@index');
        }
        catch(\ErrorException $ex){
            $ex->getMessage();
        }
    }
}
