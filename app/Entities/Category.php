<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Ixudra\Curl\Facades\Curl;

/**
 * Class Category.
 *
 * @package namespace App\Entities;
 */
class Category extends Model implements Transformable
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
        'hasOffer',
        'link'
    ];

    public function getById(Client $client, $categoryId){
        $response = Curl::to($client->baseUrl.$client->appToken.'/category/_id/'.$categoryId)
        ->withData(['sourceId'=>$client->sourceId])
        ->asJson()
        ->get();

        return $response;
    }

    public function getAll(Client $client){
        $response = Curl::to($client->baseUrl.$client->appToken.'/category/_all')
        ->withData(['sourceId'=>$client->sourceId])
        ->asJson()
        ->get();

        $categories = collect(); 

        for($i=0; $i < count($response->categories) ; $i++ ){
            $category = new Category();
            $category->id = $response->categories[$i]->id;
            $category->name = $response->categories[$i]->name;
            $category->hasOffer = $response->categories[$i]->hasOffer;
            $category->link = $response->categories[$i]->link;
            $categories->push($category);
        }

        return $categories;
    }




}
