<?php
/**
 * Created by PhpStorm.
 * User: HighStrit
 * Date: 29/10/2016
 * Time: 23:47
 */

namespace App\Http\Controllers;

use App\Taxi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller{
    private $mail;
    private $sender = 'info@parcelit.com.ng';
    private $sender2 = 'opeoluwa.joseph@cbcemea.com';
    private $msg_title2 = 'CBC Emea Housing';


    private $msg_title = 'Parcel-it';
    private $recipient_email;
    private $recipient_password;
    private $subject = 'Your Login Credentials';

    private $recipient_name;
    public function __construct(){
    }

    public function invoice(){
        return view('emails.invoice');
    }

    /**
     * @param $name
     * @param $email
     * @param $username
     * @param $password
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     * send user credentials
     */
    public function credentials($name, $email,$username, $password)
    {
        $this->recipient_name   =   $name;
        $this->recipient_email  =   $email;
        Mail::send('emails.password', ['username' => $username, 'password' => $password], function ($m) {
            $m->from($this->sender, $this->msg_title);
            $m->to($this->recipient_email, $this->recipient_name)->subject($this->subject);
        });
        return response()->json(['message'  => 'message sent']);
    }


    /**
     * @param $username
     * @param $email
     * @param $msg
     * @param $title
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */

    public function message($username, $email, $msg, $title)
    {
        $this->recipient_email  =   $email;
        $this->msg_title        =   $title;
        $this->recipient_name   =   $username;
        $this->subject          =   $title;
        Mail::send('emails.message', ['username' => $this->recipient_name, 'msg' => $msg, 'title'   =>  $title], function ($m) {
            $m->from($this->sender, $this->msg_title);
            $m->to($this->recipient_email, $this->recipient_name)->subject($this->subject);
        });
        return response()->json(['message'  => 'message sent']);
    }


    /**
     * @param $name
     * @param $email
     * @param $username
     * @param $password
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     * send user credentials
     */
    public function cred($name, $email,$username, $password, $msg)
    {
        $this->recipient_name   =   $name;
        $this->recipient_email  =   $email;
        Mail::send('email.password', ['username' => $username, 'password' => $password, 'msg' => $msg], function ($m) {
            $m->from($this->sender2, $this->msg_title2);
            $m->to($this->recipient_email, $this->recipient_name)->subject($this->subject);
        });
        return response()->json(['message'  => 'message sent']);
    }
    /**
     * @param $username
     * @param $email
     * @param $msg
     * @param $title
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */

    public function msg($email, $msg, $title)
    {
        $this->recipient_email  =   $email;
        $this->msg_title        =   $title;
        $this->recipient_name   =   '';
        $this->subject          =   $title;
        Mail::send('email.message', ['username' => $this->recipient_name, 'msg' => $msg, 'title'   =>  $title], function ($m) {
            $m->from($this->sender2, $this->msg_title2);
            $m->to($this->recipient_email, $this->recipient_name)->subject($this->subject);
        });
        return response()->json(['message'  => 'message sent']);
    }
}