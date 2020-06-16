<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing(){
        return view('landing');
    }
    public function index($id) {
        if(is_numeric($id)){
            session()->put('judge', $id); 
            return view('index');
        } else {
            return view('landing');
        }
    }
    public function admin(){
        return view('dashboard');
    }
}
