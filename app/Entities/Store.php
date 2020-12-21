<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Ixudra\Curl\Facades\Curl;

/**
 * Class Store.
 *
 * @package namespace App\Entities;
 */
class Store extends Model implements Transformable
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
        'thumbnail',
        'link'

    ];

    public function getAll(Client $client){
        $response = Curl::to($client->baseUrl.$client->appToken.'/store/_all')
        ->withData(['sourceId'=>$client->sourceId, 'hasOffer' => 'true'])
        ->asJson()
        ->get();

        $stores = collect(); 

        for($i=0; $i < count($response->stores) ; $i++ ){
            $store = new Category();
            $store->id = $response->stores[$i]->id;
            $store->name = $response->stores[$i]->name;
            $store->thumbnail = $response->stores[$i]->thumbnail;
            $store->link = $response->stores[$i]->link;
            $store->hasOffer = $response->stores[$i]->hasOffer;
            $store->maxCommission = $response->stores[$i]->maxCommission;
            $stores->push($store);
        }

        return $stores;
    }

}
