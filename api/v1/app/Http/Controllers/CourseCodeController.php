<?php

namespace App\Http\Controllers;

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
     *Return Course Codes
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $Codes      =    CourseCode::all();
            return response()->json(array('Codes' =>  $Codes));
        }catch (\ErrorException $ex){
            return response()->json(array('Codes'=>$ex->getMessage()));
        }
    }
}
