<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ConfigCreateRequest;
use App\Http\Requests\ConfigUpdateRequest;
use App\Repositories\ConfigRepository;
use App\Validators\ConfigValidator;

/**
 * Class ConfigsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ConfigsController extends Controller
{
    /**
     * @var ConfigRepository
     */
    protected $repository;

    /**
     * @var ConfigValidator
     */
    protected $validator;

    /**
     * ConfigsController constructor.
     *
     * @param ConfigRepository $repository
     * @param ConfigValidator $validator
     */
    public function __construct(ConfigRepository $repository, ConfigValidator $validator)
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
        $configs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $configs,
            ]);
        }

        return view('backend.configs.index', compact('configs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ConfigCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ConfigCreateRequest $request)
    {
        try {

            //$this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $input = $request->all();
            foreach ($input['config']['info'] as $key => $val){
                $con['key'] = $key;
                $con['value'] = $val;
                $con['type'] = 'all';
                $config = $this->repository->create($con);
            }

            $response = [
                'message' => 'Config created.',
                'data'    => $config->toArray(),
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
        $config = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $config,
            ]);
        }

        return view('backend.configs.show', compact('config'));
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
        $config = $this->repository->find($id);

        return view('backend.configs.edit', compact('config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ConfigUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ConfigUpdateRequest $request, $id)
    {
        try {

            //$this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            //$config = $this->repository->update($request->all(), $id);
            $input = $request->all();
            $i = 0;
            foreach ($input['config']['info'] as $key => $val){
                $con['key'] = $key;
                $con['value'] = $val;
                $config = $this->repository->update($con, $id+$i);
                $i++;
                //$config = $this->repository->create($request->all());
            }
            $response = [
                'message' => 'Config updated.',
                'data'    => $config->toArray(),
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
                'message' => 'Config deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Config deleted.');
    }
}
