<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestEmail;

class TestController extends Controller
{

    public function index(){
        $subject = 'Test Subject';
        $body = 'Test Message';

        Mail::to('reysterjoshuabalaga@gmail.com')->send(new TestEmail($subject, $body));
        Mail::to('cikoyag913@irnini.com')->send(new TestEmail($subject, $body));
    }

}