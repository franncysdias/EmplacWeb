<?php

namespace LaraDev\Http\Controllers;

use CoffeeCode\Optimizer\Optimizer;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(){
        return view('front.home');
    }

    public function process(){
        return view('front.process');
    }

    public function article(){
        return view('front.article');
    }

    public function blog(){
        return view('front.blog');
    }

    public function contact(){
        return view('front.contact');
    }
}
