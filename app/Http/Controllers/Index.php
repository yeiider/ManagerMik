<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Config;


class Index extends Controller
{
    public function index(){       	    
        return view('index');
    	
    }
}
