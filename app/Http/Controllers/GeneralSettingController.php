<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function language($lang){

        session()->put('language', $lang);
        return redirect()->back();
    }
}
