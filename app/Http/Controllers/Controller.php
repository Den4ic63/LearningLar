<?php

namespace App\Http\Controllers;


use http\Env\Request;
use http\Env\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Chlocale($locale)
    {
        session(['locale'=>$locale]);
        App::setLocale($locale);
        return redirect()->back();
    }

    public function send()
    {
        Mail::send(['text'=>'mail'],['name'=>'Test email'],function ($message){
            $message->to('maloylod@gmail.com','To Mail')->subject('test mail');
            $message->from('maloylod@gmail.com','Mail');
        });
    }

}
