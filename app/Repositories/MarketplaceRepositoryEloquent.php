<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MarketplaceRepository;
use App\Entities\Marketplace;
use App\Validators\MarketplaceValidator;

/**
 * Class MarketplaceRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MarketplaceRepositoryEloquent extends BaseRepository implements MarketplaceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Marketplace::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
