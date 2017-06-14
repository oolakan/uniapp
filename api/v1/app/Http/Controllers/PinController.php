<?php

namespace App\Http\Controllers;

use App\CourseCode;
use App\CourseMaterial;
use App\Pin;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class PinController extends Controller
{
    private $status = false;
    private $Pin;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        try{
            $this->Pin   =   Pin::find($id);
            if($this->Pin){
                $this->status =   true;
                return response()->json(array('Pin' => $this->Pin, 'status' => $this->status));
            }
            else{
                $this->status   =   false;
                return response()->json(array('Pin' => $this->Pin, 'status' => $this->status));
            }
        }
        catch(\ErrorException $ex){
            $this->status   =   false;
            return response()->json(array('Pin' => $this->Pin, 'status' => $this->status));
        }
    }
}
