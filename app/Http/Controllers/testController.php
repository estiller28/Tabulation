<?php

namespace App\Http\Controllers;

use App\Models\Dogs;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index(){



        return view('export.dogs');
    }
}
