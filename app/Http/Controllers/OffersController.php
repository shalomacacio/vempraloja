<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\OfferCreateRequest;
use App\Http\Requests\OfferUpdateRequest;
use App\Repositories\OfferRepository;
use App\Validators\OfferValidator;
use Curl;

/**
 * Class OffersController.
 *
 * @package namespace App\Http\Controllers;
 */
class OffersController extends Controller
{
    // BASE_URL=https://api.lomadee.com

    protected $baseUrl;
    protected $sourceId;
    protected $appToken;

    public function __construct()
    {
        $this->baseUrl = 'http://sandbox-api.lomadee.com/v3/';
        $this->sourceId = '36909873';
        $this->appToken = '16066839633338f8feedc';

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        $response = Curl::to('http://sandbox-api.lomadee.com/v3/'.$this->appToken.'/store/_all')
                ->withData(['sourceId'=>$this->sourceId])
                ->get();

        if ($request->wantsJson()) {
            return response()->json($response);
        }

        return $response;

    }
    // 
    public function categorias(){
        $response = Curl::to('http://sandbox-api.lomadee.com/v3/'.$this->appToken.'/category/_all')
                ->withData(['sourceId'=>$this->sourceId])
                ->get();
        return $response;
    }

    public function ofertas(){
        $response = Curl::to('http://sandbox-api.lomadee.com/v3/'.$this->appToken.'/offer/_category/1')
                ->withData(['sourceId'=>$this->sourceId])
                ->get();
        return $response;
    }

    // public function index()
    // {
    //     $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    //     $offers = $this->repository->all();

    //     if (request()->wantsJson()) {

    //         return response()->json([
    //             'data' => $offers,
    //         ]);
    //     }

    //     return view('offers.index', compact('offers'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OfferCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(OfferCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $offer = $this->repository->create($request->all());

            $response = [
                'message' => 'Offer created.',
                'data'    => $offer->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $offer,
            ]);
        }

        return view('offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = $this->repository->find($id);

        return view('offers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  OfferUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(OfferUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $offer = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Offer updated.',
                'data'    => $offer->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Offer deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Offer deleted.');
    }

    
}
