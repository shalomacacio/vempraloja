<?php

namespace App\Http\Controllers;

use App\Entities\Link;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Entities\Offer;
use App\Entities\Category;
use App\Entities\Client;

class SiteController extends Controller
{
    protected $client;
    protected $category;
    protected $offer;

    public function __construct( Client $client, Category $category, Offer $offer)
    {
        $this->client = $client;
        $this->category = $category;
        $this->offer = $offer;
    }


    public function home(){

        $categories = $this->category->getAll($this->client);
        $offers = $this->offer->getByStore($this->client, 5992);
        return view('site.index', compact('offers', 'categories'));
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
