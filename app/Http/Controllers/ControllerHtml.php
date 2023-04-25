<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerHtml extends Controller
{
    public function displayHtml()
    {
        return view('display-html');
    }
    }
