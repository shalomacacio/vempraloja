<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Ixudra\Curl\Facades\Curl;

/**
 * Class Offer.
 *
 * @package namespace App\Entities;
 */
class Offer extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'link',
        'thumbnail',
        'price',
        'discount',
    ];

    public function category(){
        return $this->belongsTo('App\Entities\Category', 'id', 'id');
    }

    public function store(){
        return $this->belongsTo('App\Entities\Story', 'id', 'id');
    }

    public function getByCategory(Client $client, $categoryId){

        $response = Curl::to($client->baseUrl.$client->appToken.'/offer/_category/'.$categoryId)
        ->withData(['sourceId'=>$client->sourceId])
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

        return $offers;
    }

    public function getByStore(Client $client, $store){

        $response = Curl::to($client->baseUrl.$client->appToken.'/offer/_store/'.$store)
        ->withData(['sourceId'=>$client->sourceId])
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

        return $offers;
    }


    

}