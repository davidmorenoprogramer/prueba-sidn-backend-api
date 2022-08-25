<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;


class HomeController extends Controller{

    
    
    public function __invoke(){
        
        return view('home');
    }
}
