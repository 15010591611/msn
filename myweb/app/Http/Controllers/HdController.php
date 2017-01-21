<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HdController extends Controller
{
    public function getIndex(){
        return view('hd.index');
    }
}
