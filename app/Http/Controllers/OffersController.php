<?php

namespace App\Http\Controllers;

use App\Entities\Client;
use Illuminate\Http\Request;

use Ixudra\Curl\Facades\Curl;
use App\Entities\Offer;


/**
 * Class OffersController.
 *
 * @package namespace App\Http\Controllers;
 */
class OffersController extends Controller
{
    protected $client;

    public function __construct( Client $client )
    {
        $this->client = $client;
    }

    public function index(Request $request){

        $response = Curl::to($this->client->baseUrl.$this->client->appToken.'/offer/_category/1')
        ->withData(['sourceId'=>$this->client->sourceId, 'size'=>'100'])
        ->asJson()
        ->get();

        $offers = collect(); 

        for($i=0; $i < count($response->offers) ; $i++ ){
            $offer = new Offer();
            $offer->id = $response->offers[$i]->id;
            $offer->name = $response->offers[$i]->name;
            $offer->thumbnail = $response->offers[$i]->thumbnail;
            $offer->price = $response->offers[$i]->price;
            $offer->discount = $response->offers[$i]->discount;
            $offer->link = $response->offers[$i]->link;
            $offers->push($offer);
        }

        return view('admin.offers.index', compact('offers'));
    }

    
}
