<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Link.
 *
 * @package namespace App\Entities;
 */
class Link extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'img',
        'name',
        'disc',
        'span',
        'stars',
        'link',
        'price',
        'price_old',
        'description',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo('App\Entities\Category');
    }


}
