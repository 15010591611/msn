<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function Index(){
    	// echo '后台模版';
    	return view('admin.index');
    }
}
