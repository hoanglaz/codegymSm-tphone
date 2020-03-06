<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MenuItemCreateRequest;
use App\Http\Requests\MenuItemUpdateRequest;
use App\Repositories\MenuItemRepository;
use App\Validators\MenuItemValidator;

/**
 * Class MenuItemsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MenuItemsController extends Controller
{
    /**
     * @var MenuItemRepository
     */
    protected $repository;

    /**
     * @var MenuItemValidator
     */
    protected $validator;

    /**
     * MenuItemsController constructor.
     *
     * @param MenuItemRepository $repository
     * @param MenuItemValidator $validator
     */
    public function __construct(MenuItemRepository $repository, MenuItemValidator $validator)
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
        $menuItems = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $menuItems,
            ]);
        }

        return view('backend.menus.builder', compact('menuItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MenuItemCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MenuItemCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $menuItem = $this->repository->create($request->all());

            $response = [
                'message' => 'MenuItem created.',
                'data'    => $menuItem->toArray(),
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
        //$menuItem = $this->repository->find($id);
        if(!is_null($this->repository->findByField('parent_id',$id)->first())){
            return redirect()->route('menus.index')->with('message','Menu vẫn còn cấp menu con, không thể xóa!');
        }else{
        $menuItem = $this->repository->delete($id);
    }
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $menuItem,
            ]);
        }

        return redirect()->back()->with('message','Menu Item deleted!');
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
        $menuItem = $this->repository->find($id);

        return view('backend.menuItems.edit', compact('menuItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MenuItemUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MenuItemUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $menuItem = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'MenuItem updated.',
                'data'    => $menuItem->toArray(),
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
                'message' => 'MenuItem deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'MenuItem deleted.');
    }
}
