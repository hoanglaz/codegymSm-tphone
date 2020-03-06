<?php

namespace App\Http\Controllers;

use App\Entities\Category;
use App\Entities\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\HomeCreateRequest;
use App\Http\Requests\HomeUpdateRequest;
use App\Repositories\HomeRepository;
use App\Validators\HomeValidator;

/**
 * Class HomesController.
 *
 * @package namespace App\Http\Controllers;
 */
class HomesController extends Controller
{
    /**
     * @var HomeRepository
     */
    protected $repository;

    /**
     * @var HomeValidator
     */
    protected $validator;

    /**
     * HomesController constructor.
     *
     * @param HomeRepository $repository
     * @param HomeValidator $validator
     */
    public function __construct(HomeRepository $repository, HomeValidator $validator)
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
        $homes = $this->repository->all();
        $categories = Category::where('type','product')->get()->all();
        $config = Config::all();
        foreach ($config as $key => $val){
            $configs[$val->key] = $val;
        }
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $homes,
            ]);
        }

        return view('backend.homes.index', compact('homes','categories','configs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  HomeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(HomeCreateRequest $request)
    {
        try {

           // $this->validator->with($request->all()['home']['slogan1'])->passesOrFail(ValidatorInterface::RULE_CREATE);

            $data = $request->all();
            if(isset($data['home']['product1'])){
//dd($data['home']);
                foreach ($data['home'] as $key => $val){
                    $pro['type'] = 'product';
                    $pro['data'] = $val;
                    $pro['name'] = $key;
                    $home = $this->repository->create($pro);
                }
            }else{
                foreach ($data['home']['config'] as $key => $conf){
                    $input['name'] =  $key;
                    $input['data'] =  $conf;
                    $input['type'] =  'config';
                    $home = $this->repository->create($input);
                }
                foreach ($data['home']['slider1'] as $key => $conf){
                    $input['name'] =  $key;
                    $input['data'] =  $conf;
                    $input['type'] =  'slider1';
                    $home = $this->repository->create($input);
                }
                foreach ($data['home']['slider2'] as $key => $conf){
                    $input['name'] =  $key;
                    $input['data'] =  $conf;
                    $input['type'] =  'slider2';
                    $home = $this->repository->create($input);
                }
            }
            //$home = $this->repository->create($request->all());

            $response = [
                'message' => 'Home created.',
                'data'    => $home->toArray(),
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
        $home = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $home,
            ]);
        }

        return view('backend.homes.show', compact('home'));
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
        $home = $this->repository->find($id);

        return view('backend.homes.edit', compact('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  HomeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(HomeUpdateRequest $request, $id)
    {
        try {

            //$this->validator->with($request->all()['home']['slogan1'])->passesOrFail(ValidatorInterface::RULE_UPDATE);

            //$home = $this->repository->update($request->all(), $id);
            $data = $request->all();
            $i = 0;
            if(isset($data['home']['product1'])){
               // $this->validator->with($request->all()['home']['product1'])->passesOrFail(ValidatorInterface::RULE_UPDATE);

                foreach ($data['home'] as $key => $val){
                    $pro['data'] = $val;
                    $pro['name'] = $key;
                    $home = $this->repository->update($pro, $id + $i);
                    $i++;
                }
            }else {
               // $this->validator->with($request->all()['home']['config'])->passesOrFail(ValidatorInterface::RULE_UPDATE);

                foreach ($data['home']['config'] as $key => $conf) {
                    $input['name'] = $key;
                    $input['data'] = $conf;
                    $input['type'] = 'config';
                    $home = $this->repository->update($input, $id + $i);
                    $i++;
                }
                foreach ($data['home']['slider1'] as $key => $conf) {
                    $input['name'] = $key;
                    $input['data'] = $conf;
                    $input['type'] = 'slider1';
                    $home = $this->repository->update($input, $id + $i);
                    $i++;
                }
                foreach ($data['home']['slider2'] as $key => $conf) {
                    $input['name'] = $key;
                    $input['data'] = $conf;
                    $input['type'] = 'slider2';
                    $home = $this->repository->update($input, $id + $i);
                    $i++;
                }
            }
            $response = [
                'message' => 'Home updated.',
                'data'    => $home->toArray(),
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
                'message' => 'Home deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Home deleted.');
    }
}
