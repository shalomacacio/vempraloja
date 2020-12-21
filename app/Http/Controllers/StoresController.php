<?php

namespace App\Http\Controllers;

use App\Entities\Client;
use App\Entities\Store;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\StoreCreateRequest;
use App\Http\Requests\StoreUpdateRequest;
use App\Repositories\StoreRepository;
use App\Validators\StoreValidator;

/**
 * Class StoresController.
 *
 * @package namespace App\Http\Controllers;
 */
class StoresController extends Controller
{
    protected $client;
    protected $store;

    public function __construct(Client $client, Store $store )
    {
        $this->client = $client;
        $this->store = $store;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = $this->store->getAll($this->client);

        // return dd($stores);

        return view('admin.stores.index', compact('stores'));
    }

}
