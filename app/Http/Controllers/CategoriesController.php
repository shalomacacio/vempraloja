<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Ixudra\Curl\Facades\Curl;
use App\Repositories\CategoryRepository;
use App\Validators\CategoryValidator;
use App\Entities\Category;
use App\Entities\Client;


/**
 * Class CategoriesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CategoriesController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $repository;

    /**
     * @var CategoryValidator
     */
    protected $validator;

    /**
     * CategoriesController constructor.
     *
     * @param CategoryRepository $repository
     * @param CategoryValidator $validator
     */

    protected $client;


    public function __construct( Client $client, Category $category  )
    {
        $this->client = $client;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $categories = $this->category->getAll($this->client);

        return view('admin.categories.index', compact('categories'));
    }

}
