<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\AboutSlider;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutslider = AboutSlider::orderBy('id','DESC')->get();
        $team = Team::orderBy('id','DESC')->get();
        return view('user/about', compact('aboutslider', 'team'));
    }
}
