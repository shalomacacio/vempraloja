<?php

namespace App\Http\Controllers;

use App\Entities\Link;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        $links = Link::all();
        return view('site.home.index', compact('links'));
    }
}
