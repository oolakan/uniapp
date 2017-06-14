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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class PinController extends Controller
{
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
            return view('pin.index', compact(['Users', 'Roles', 'Codes', 'Materials', 'Pins', 'app_users']));
        }
        catch(\ErrorException $ex){}
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
            $app_users  =   AppUser::all();
            $Users      =    User::all();
            $Codes      =    CourseCode::all();
            $Materials  =   CourseMaterial::all();
            $Pins       =   Pin::all();
            $Roles      =   Role::all();
            return view('pin.create', compact(['Users', 'Codes', 'Materials', 'Pins', 'Roles', 'app_users']));
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
          $number       = $request->number;
            $pin        =   [];
            for($i=0; $i<$number; $i++){
                $code   =   mt_rand(000000000,999999999);
                $_pin   =   array('code'=>$code, 'use_status'=> 0, 'users_id'=>Auth::user()->id);
                $pin[]  =   $_pin;
            }
            Pin::insert($pin);
            flash()->success('PIN added successfully');
            return redirect()->action('PinController@index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Destroy all PIN
     */
    public function destroyAll()
    {
        DB::table('pins')->truncate();
        flash()->success('All PIN records flushed');
        flash()->success('All PIN deleted successfully');
        return redirect()->action('PinController@index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * destroy PIN
     */
    public function destroy($id){
        $Pin    =   Pin::find(base64_decode($id));
        $Pin->delete();
        flash()->success('PIN deleted successfully');
        return redirect()->action('PinController@index');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * Send PIN
     */
    public function sendPin(Request $request, $id){
        $Pin        =   Pin::find(base64_decode($id));
        $pin_code   =   $Pin->code;
        $number     =   $request->phone;
        $message    =   'You can access the University Distance Learning App using this one time PIN: '.$pin_code;
        $message = preg_replace('/\s/', '%20', $message);
        $url = 'http://www.estoresms.com/smsapi.php?username=jaysicom&password=Oluwatobi43&sender=EasyStudy&recipient=' . $number . '&message=' . $message;
        $this->getContent($url);
        flash()->success('PIN sent successfully');
        return redirect()->action('PinController@index');

    }
    /**
     * @param $url
     * @return mixed|string
     * Get contents from url
     */
    public function getContent($url){
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        $contents = curl_exec($ch);
        if (curl_errno($ch)) {
            echo curl_error($ch);
            echo "\n<br />";
            $contents = '';
            return $contents;
        } else {
            curl_close($ch);
        }
        if (!is_string($contents) || !strlen($contents)) {
            echo "Failed to get contents.";
            $contents = '';
            return $contents;
        }
        return $contents;
    }

}
