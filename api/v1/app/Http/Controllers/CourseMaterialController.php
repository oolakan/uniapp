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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class CourseMaterialController extends Controller
{
    private $status;
    private $message;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $Materials = CourseMaterial::with(['code', 'user'])->get();
            $this->status = 200;
            $this->message = 'Material fethced successfully';
            return response()->json(array('Material' => $Materials, 'status' => $this->status, 'message' => $this->message));
        } catch (\ErrorException $ex) {
            $this->status = 400;
            $this->message = 'Error occurred';
            return response()->json(array('Material' => '', 'status' => $this->status, 'message' => $this->message));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fetch($id)

    {
        try {
            $Material = CourseMaterial::where('course_codes_id', '=', $id)->first();
            if($Material){
                $this->status = 200;
                $this->message = 'Material fethced successfully';
                return response()->json(array('Material' => $Material, 'status' => $this->status, 'message' => $this->message));
            }

        }catch (\ErrorException $ex){
            $this->status = 400;
            $this->message = 'Error occurred';
            return response()->json(array('Material' => '', 'status' => $this->status, 'message' => $this->message));
        }
    }
}
