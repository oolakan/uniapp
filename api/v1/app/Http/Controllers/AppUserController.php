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
    private $appUser;
    private $status = 0;
    private $message;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activate(Request $request)
    {
        try {
            $Pin       =   Pin::where('code', '=', $request->code)
                                ->where('availability_status', '=', '0')
                                ->where('use_status', '=', '0')->first();
            if($Pin){
                $this->appUser  =   AppUser::create($request->all());
                $this->status   =   200;
                $this->message  =   'User activated successfully';
            }
            else{
                $this->status   =   400;
                $this->message  =   'Pin has been issued to someone else';
            }
            return response()->json(array('AppUser' =>  $this->appUser, 'message'   =>  $this->message, 'status'    =>  $this->status));
        }catch (\ErrorException $ex){
            return response()->json(array('AppUser' =>  '', 'message'   =>  $this->message, 'status'    =>  $this->status));
        }
    }
}
