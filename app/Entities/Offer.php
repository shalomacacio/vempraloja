<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Ixudra\Curl\Facades\Curl;
use App\Entities\Category;

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

    // public function getCategoryAttribute(){       
    //     return dd($response);
    // }

    // public function store(){
    //     return $this->belongsTo('App\Entities\Store', 'id', 'id');
    // }

    public function getById(Client $client, $storeId , $sku){
        $response = Curl::to($client->baseUrl.$client->appToken.'/offer/_id/'.$sku)
        ->withData(['sourceId'=>$client->sourceId, 'storeId'=> $storeId ,'size'=>'100'])
        ->asJson() 
        ->get();

        $offers = collect(); 

        for($i=0; $i < count($response->offers) ; $i++ ){
            $offer = new Offer();
            $offer->id = $response->offers[$i]->id;
            $offer->name = $response->offers[$i]->name;
            $offer->thumbnail = $response->offers[$i]->thumbnail;
            $offer->category = $response->offers[$i]->category->name;
            $offer->store = $response->offers[$i]->store->thumbnail;
            $offer->price = $response->offers[$i]->price;
            $offer->discount = $response->offers[$i]->discount;
            $offer->link = $response->offers[$i]->link;
            $offers->push($offer);
        }

        return $offers;

    }

    public function getByCategory(Client $client, $categoryId){

        $response = Curl::to($client->baseUrl.$client->appToken.'/offer/_category/'.$categoryId)
        ->withData(['sourceId'=>$client->sourceId,'size'=>'100'])
        ->asJson()
        ->get();

        // return dd($response);

        $offers = collect(); 

        for($i=0; $i < count($response->offers) ; $i++ ){
            $offer = new Offer();
            $offer->id = $response->offers[$i]->id;
            $offer->name = $response->offers[$i]->name;
            $offer->thumbnail = $response->offers[$i]->thumbnail;
            $offer->category = $response->offers[$i]->category->name;
            $offer->store = $response->offers[$i]->store->thumbnail;
            $offer->price = $response->offers[$i]->price;
            $offer->discount = $response->offers[$i]->discount;
            $offer->link = $response->offers[$i]->link;
            $offers->push($offer);
        }

        return $offers;
    }

    public function getByStore(Client $client, $store){

        $response = Curl::to($client->baseUrl.$client->appToken.'/offer/_store/'.$store)
        ->withData(['sourceId'=>$client->sourceId, 'sort'=> 'price' ,  'size'=>'100'])
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

    public function getByName(Client $client, $name){

        $response = Curl::to($client->baseUrl.$client->appToken.'/offer/_search')
        ->withData(['sourceId'=>$client->sourceId, 'keyword'=> $name , 'sort'=> 'price' ,'size'=>'100'])
        ->asJson() 
        ->get();

        $offers = collect(); 

        for($i=0; $i < count($response->offers) ; $i++ ){
            $offer = new Offer();
            $offer->id = $response->offers[$i]->id;
            $offer->name = $response->offers[$i]->name;
            $offer->thumbnail = $response->offers[$i]->thumbnail;
            $offer->category = $response->offers[$i]->category->name;
            $offer->store = $response->offers[$i]->store->thumbnail;
            $offer->price = $response->offers[$i]->price;
            $offer->discount = $response->offers[$i]->discount;
            $offer->link = $response->offers[$i]->link;
            $offers->push($offer);
        }
        return $offers;
    }
}
