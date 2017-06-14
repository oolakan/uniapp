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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class CourseMaterialController extends Controller
{
    private $image_base_path = '/public/materials/';
    private $pdf_base_path = "http://www.jasiride.com/api/v1/materials/pdf/";
    private $audio_base_path = "http://www.jasiride.com/api/v1/materials/audio/";
    private $video_base_path = "http://www.jasiride.com/api/v1/materials/video/";
    private $pdffile = 'pdffile';
    private $videofile = 'videofile';
    private $audiofile = 'audiofile';
    private $extension;
    private $fileName;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $app_users      =   AppUser::all();
            $Materials      =   CourseMaterial::with(['code', 'user'])->get();
            $Users          =   User::all();
            $Codes          =   CourseCode::all();
            $Roles          =   Role::all();
            $Pins           =   Pin::all();
            return view('course_material.index', compact(['Materials', 'Users', 'Codes', 'Roles', 'Pins', 'app_users']));
        } catch(\ErrorException $ex){}
        catch(MethodNotAllowedException $ex){
            return view('auth.login');
        }
        catch(MethodNotAllowedHttpException $ex) {
            return view('auth.login');
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
            $app_users      =   AppUser::all();
            $Materials      =   CourseMaterial::with(['code', 'user'])->get();
            $Users          =   User::all();
            $Codes          =   CourseCode::all();
            $Roles          =   Role::all();
            $Pins           =   Pin::all();
            return view('course_material.create', compact(['Materials', 'Users', 'Codes', 'Roles', 'Pins','app_users']));
        }
        catch(\ErrorException $ex){
        }
        catch(MethodNotAllowedException $ex){
            return view('auth.login');
        }
        catch(MethodNotAllowedHttpException $ex) {
            return view('auth.login');
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
        try {
            $Material = new CourseMaterial();
            $rules = [
//                'body_title'        =>  'required',
//                'body_sub_title'    =>  'required',
//                'body_content'      =>  'required',
                'course_codes_id' => 'required|unique:course_materials',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors(['Course material with this course code has been uploaded. Do you want to update the material? click edit material in the view page.']);
            }
//                      $Material->body_title                       =   $request->body_title;
//            $Material->body_sub_title                   =   $request->body_sub_title;
//            $Material->body_content                     =   $request->body_content;

            //get file

            if ($request->hasFile('course_file_name')) {
                if ($request->file('course_file_name')->isValid()) {
                    $this->extension = $request->course_file_name->extension();
                    if ($this->extension == '.pdf') {
                        $this->fileName = $this->pdffile . $request->course_codes_id . '.' . $request->file('course_file_name')->getClientOriginalExtension();
                        $Material->course_file_url = $this->pdf_base_path . $this->fileName;
                    } else if ($this->extension == '.mp3') {
                        $this->fileName = $this->audiofile . $request->course_codes_id . '.' . $request->file('course_file_name')->getClientOriginalExtension();
                        $Material->course_file_url = $this->audio_base_path . $this->fileName;
                    } else if ($this->extension == '.mp4') {
                        $this->fileName = $this->videofile . $request->course_codes_id . '.' . $request->file('course_file_name')->getClientOriginalExtension();
                        $Material->course_file_url = $this->video_base_path . $this->fileName;
                    } else {
                        flash()->error('Only files with .pdf, .mp3 and .mp4 extensions are allowed');
                        return back();
                    }
                    $request->file('course_file_name')->move(base_path() . $this->image_base_path, $this->fileName);
                    $Material->course_file_name = $this->fileName;
                } else {
                    flash()->error('Invalid file uploaded');
                    return back();
                }
            }
            else{
                flash()->error('No file was uploaded');
                return back();
            }
            $Material->course_codes_id      =   $request->course_codes_id;
            $Material->users_id             =   Auth::user()->id;
            $Material->save();
            flash()->success('File uploaded successfully');
            return redirect()->action('CourseMaterialController@index');
//            $cookie = cookie('name', 'value', 30);
//            $cookie = response()->cookie($cookie);
        }
        catch(\ErrorException $ex){
            flash()->error('Unable to upload file');
            return redirect()->action('CourseMaterialController@index');
        }
        catch(MethodNotAllowedException $ex){
            return view('auth.login');
        }
        catch(MethodNotAllowedHttpException $ex) {
            return view('auth.login');
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
            $app_users      =   AppUser::all();
            $Materials      =   CourseMaterial::with(['code', 'user'])->get();
            $Users          =   User::all();
            $Codes          =   CourseCode::all();
            $Roles          =   Role::all();
            $Pins           =   Pin::all();
            $material       =   CourseMaterial::find(base64_decode($id))->with(['code', 'user'])->first();
            return view('course_material.view', compact(['Materials', 'Users', 'Codes', 'Roles', 'Pins', 'app_users', 'material']));
        } catch(\ErrorException $ex){}
        catch(MethodNotAllowedException $ex){
            return view('auth.login');
        }
        catch(MethodNotAllowedHttpException $ex) {
            return view('auth.login');
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
            $Material = CourseMaterial::find(base64_decode($id));
            $rules = [
                'course_file_name' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
//            $Material->body_title                       =   $request->body_title;
//            $Material->body_sub_title                   =   $request->body_sub_title;
//            $Material->body_content                     =   $request->body_content;

            if ($request->hasFile('course_file_name')) {
                $fileName = $this->DOC .$request->course_codes_id. '.' .$request->file('course_file_name')->getClientOriginalExtension();
                if ($request->file('course_file_name')->isValid()) {
                    $this->extension                    =   $request->course_file_name->extension();
                    if($this->extension   == 'docx' || $this->extension == 'materials'){
                        $request->file('course_file_name')->move(base_path() . $this->image_base_path, $fileName);
                        $Material->course_file_name     =   $fileName;
                        $Material->course_file_url      =   $this->url_mage_base_path.$fileName;
                    }
                    else{
                        flash()->failure('Only word documents with .docx and .materials extensions are allowed');
                        return back();
                    }
                }
            }
            else{
                flash()->failure('No file wa uploaded');
                return back();
            }
            $Material->users_id             =   Auth::user()->id;
            $Material->save();
            flash()->success('File updated successfully');
            return redirect()->action('CourseMaterialController@index');
//            else{
//                flash()->failure('No file was uploaded, Select a file!');
//                return back();
//            }
//            $cookie = cookie('name', 'value', 30);
//            $cookie = response()->cookie($cookie);
        }
        catch(\ErrorException $ex){
            flash()->failure('Unable to upload file');
            return redirect()->action('CourseMaterialController@index');
        }
        catch(MethodNotAllowedException $ex){
            return view('auth.login');
        }
        catch(MethodNotAllowedHttpException $ex) {
            return view('auth.login');
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
        $Material   =   CourseMaterial::with(['code'])->find(base64_decode($id));
        File::Delete(base_path().$this->image_base_path.$Material->course_file_name);
        $Material->delete();
        flash()->success('File deleted successfully');
        return redirect()->action('CourseMaterialController@index');
    }
}
