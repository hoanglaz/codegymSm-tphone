<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EnventCreateRequest;
use App\Http\Requests\EnventUpdateRequest;
use App\Repositories\EnventRepository;
use App\Validators\EnventValidator;

/**
 * Class EnventsController.
 *
 * @package namespace App\Http\Controllers;
 */
class EnventsController extends Controller
{
    /**
     * @var EnventRepository
     */
    protected $repository;

    /**
     * @var EnventValidator
     */
    protected $validator;

    /**
     * EnventsController constructor.
     *
     * @param EnventRepository $repository
     * @param EnventValidator $validator
     */
    public function __construct(EnventRepository $repository, EnventValidator $validator)
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
        $envents = $this->repository->paginate($limit = 10, $columns = ['*']);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $envents,
            ]);
        }

        return view('backend.events.index', compact('envents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EnventCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(EnventCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $data_import = $request->all();
            $data_import['user_id'] = Auth::user()->id;

            $envent = $this->repository->create($data_import);

            $response = [
                'message' => 'Envent created.',
                'data'    => $envent->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('events.index')->with('message', $response['message']);
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
        $envent = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $envent,
            ]);
        }

        return view('backend.events.show', compact('envent'));
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
        $event = $this->repository->find($id);

        return view('backend.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EnventUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EnventUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $envent = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Envent updated.',
                'data'    => $envent->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('events.index')->with('message', $response['message']);
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
                'message' => 'Envent deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Envent deleted.');
    }
    /**
     * Show template create.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $user = Auth::user();
//        dd($user->can('post.create'));
//        dd(Gate::abilities());
//        if (Gate::denies('post.create')){
//            return redirect()->route('roles.error')->with('message','Permissions denied!');
//        }
//        $data['roles_post'] = $this->repository->rolePost();
        return view('backend.events.create');
    }
}
