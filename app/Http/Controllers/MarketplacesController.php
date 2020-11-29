<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MarketplaceCreateRequest;
use App\Http\Requests\MarketplaceUpdateRequest;
use App\Repositories\MarketplaceRepository;
use App\Validators\MarketplaceValidator;

/**
 * Class MarketplacesController.
 *
 * @package namespace App\Http\Controllers;
 */
class MarketplacesController extends Controller
{
    /**
     * @var MarketplaceRepository
     */
    protected $repository;

    /**
     * @var MarketplaceValidator
     */
    protected $validator;

    /**
     * MarketplacesController constructor.
     *
     * @param MarketplaceRepository $repository
     * @param MarketplaceValidator $validator
     */
    public function __construct(MarketplaceRepository $repository, MarketplaceValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $marketplaces = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $marketplaces,
            ]);
        }

        return view('marketplaces.index', compact('marketplaces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MarketplaceCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MarketplaceCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $marketplace = $this->repository->create($request->all());

            $response = [
                'message' => 'Marketplace created.',
                'data'    => $marketplace->toArray(),
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
        $marketplace = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $marketplace,
            ]);
        }

        return view('marketplaces.show', compact('marketplace'));
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
        $marketplace = $this->repository->find($id);

        return view('marketplaces.edit', compact('marketplace'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MarketplaceUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MarketplaceUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $marketplace = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Marketplace updated.',
                'data'    => $marketplace->toArray(),
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
                'message' => 'Marketplace deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Marketplace deleted.');
    }
}
