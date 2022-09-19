<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $faq=Faq::where('type',1)->get();
        return view('user/faq',compact('faq'));
    }
}
