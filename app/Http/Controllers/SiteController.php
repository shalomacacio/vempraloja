<?php

namespace App\Http\Controllers;

use App\Entities\Link;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Entities\Offer;
use App\Entities\Category;
use App\Entities\Client;
use App\Entities\Store;

class SiteController extends Controller
{
    protected $client;
    protected $category;
    protected $offer;
    protected $store;

    public function __construct( Client $client, Category $category, Offer $offer, Store $store)
    {
        $this->client = $client;
        $this->category = $category;
        $this->offer = $offer;
        $this->store =  $store;
    }


    public function home(){

        $categories = $this->category->getAll($this->client);
        // $ofertas = $this->offer->getByStore($this->client, 5992);
        $ofertas = $this->offer->getByCategory($this->client, 1);
        return view('site.index', compact('categories', 'ofertas'));
    }

    public function search(Request $request){

        if($request->categoryId == 0){
            $request->categoryId = [1,2];
        }

        $categories = $this->category->getAll($this->client);
        $ofertas = $this->offer->getByName($this->client, $request->name );



        return view('site.index', compact('categories', 'ofertas'));

    }

    public function offer($id){
        return dd($id);

        return view('site.offer');
    }


    public function black(){
         $links = Link::all();
         return view('site.black', compact('links'));
    }

    public function cursos(){
        // $links = Link::all();
        return view('site.cursos');
    }

    public function convert(){
        $stores = $this->store->getAll($this->client);
        return view('site.convert', compact('stores'));
    }

    public function getOffer(Request $request){
        $stores = $this->store->getAll($this->client);
        $offers = $this->offer->getById($this->client, $request->storeId, $request->sku);
        
        return view('site.convert', compact('offers', 'stores'));
    }
}
