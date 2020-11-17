<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Validators\LinkValidator;
use Illuminate\Support\Facades\DB;
use App\Repositories\LinkRepository;
use App\Http\Requests\LinkCreateRequest;
use App\Http\Requests\LinkUpdateRequest;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class LinksController.
 *
 * @package namespace App\Http\Controllers;
 */
class LinksController extends Controller
{
    /**
     * @var LinkRepository
     */
    protected $repository;

    /**
     * @var LinkValidator
     */
    protected $validator;

    /**
     * LinksController constructor.
     *
     * @param LinkRepository $repository
     * @param LinkValidator $validator
     */
    public function __construct(LinkRepository $repository, LinkValidator $validator)
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
        $links = $this->repository->all();
        $categories = DB::table('categories')->get();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $links,
            ]);
        }

        return view('admin.links.index', compact('links', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LinkCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(LinkCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $link = $this->repository->create($request->all());

            $response = [
                'message' => 'Link created.',
                'data'    => $link->toArray(),
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
        $link = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $link,
            ]);
        }

        return view('admin.links.show', compact('link'));
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
        $link = $this->repository->find($id);
        $categories = DB::table('categories')->get();

        return view('admin.links.edit', compact('link', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LinkUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(LinkUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $link = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Link updated.',
                'data'    => $link->toArray(),
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
                'message' => 'Link deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Link deleted.');
    }
}
