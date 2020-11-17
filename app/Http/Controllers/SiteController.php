<?php

namespace App\Http\Controllers;

use App\Entities\Link;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        $links = Link::all();
        return view('site.index', compact('links'));
    }

    public function black(){
         $links = Link::all();
         return view('site.black', compact('links'));
    }

    public function cursos(){
        // $links = Link::all();
        return view('site.cursos');
    }
}
