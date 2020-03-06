<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Gate;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PageCreateRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Repositories\PageRepository;
use App\Validators\PageValidator;

/**
 * Class PagesController.
 *
 * @package namespace App\Http\Controllers;
 */
class PagesController extends Controller
{
    /**
     * @var PageRepository
     */
    protected $repository;

    /**
     * @var PageValidator
     */
    protected $validator;

    /**
     * PagesController constructor.
     *
     * @param PageRepository $repository
     * @param PageValidator $validator
     */
    public function __construct(PageRepository $repository, PageValidator $validator)
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
        if (Gate::denies('page.view')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $pages = $this->repository->paginate($limit = 10, $columns = ['*']);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pages,
            ]);
        }

        return view('backend.pages.index', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PageCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PageCreateRequest $request)
    {
        try {
            if (Gate::denies('page.create')){
                return redirect()->route('roles.error')->with('message','Permissions denied!');
            }
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $page = $this->repository->create($request->all());

            $response = [
                'message' => 'Page created.',
                'data'    => $page->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('pages.index')->with('message', $response['message']);
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
        $page = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $page,
            ]);
        }

        return view('backend.pages.show', compact('page'));
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
        $page = $this->repository->find($id);
        if (Gate::denies('page.update',$page)){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        return view('backend.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PageUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PageUpdateRequest $request, $id)
    {
        try {
            if (Gate::denies('page.update',$this->repository->find($id))){
                return redirect()->route('roles.error')->with('message','Permissions denied!');
            }
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $page = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Page updated.',
                'data'    => $page->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('pages.index')->with('message', $response['message']);
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
        if (Gate::denies('page.update',$this->repository->find($id))){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        $deleted = $this->repository->delete($id);
        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Page deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Page deleted.');
    }
    /**
     * Show template create.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        if (Gate::denies('page.create')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        if ($request->type == 'post') {
            return view('backend.pages.create');
            # code...
        }elseif ($request->type =='building') {
            # code...
            return view('backend.pages.building');
        }else{
            return view('backend.pages.create');
        }
    }
}
