<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index(){
        $term=Faq::where('type',2)->get();
        return view('user/term',compact('term'));
    }
}
