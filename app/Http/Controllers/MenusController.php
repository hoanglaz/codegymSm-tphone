<?php

namespace App\Http\Controllers;

use App\Entities\Category;
use App\Entities\MenuItem;
use App\Entities\Post;
use App\Entities\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MenuCreateRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Repositories\MenuRepository;
use App\Validators\MenuValidator;

/**
 * Class MenusController.
 *
 * @package namespace App\Http\Controllers;
 */
class MenusController extends Controller
{
    /**
     * @var MenuRepository
     */
    protected $repository;

    /**
     * @var MenuValidator
     */
    protected $validator;

    /**
     * MenusController constructor.
     *
     * @param MenuRepository $repository
     * @param MenuValidator $validator
     */
    public function __construct(MenuRepository $repository, MenuValidator $validator)
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
        $menus = $this->repository->paginate($limit = 10, $columns = ['*']);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $menus,
            ]);
        }

        return view('backend.menus.index', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MenuCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MenuCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $menu = $this->repository->create($request->all());

            $response = [
                'message' => 'Menu created.',
                'data'    => $menu->toArray(),
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
        $menu = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $menu,
            ]);
        }

        return view('backend.menus.show', compact('menu'));
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
        $data['menu'] = $this->repository->find($id);
        $data['posts'] = Post::paginate(5);
        $data['products'] = Product::paginate(5);
        $data['categories'] = Category::all();
        $data['items'] = MenuItem::where('menu_id',$id)->get()->all();
//        return view('menuItems.index', $data);
//        return view('menus.builder', $data);
        return view('backend.menus.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MenuUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MenuUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $menu = $this->repository->update(['data' => json_encode(json_decode($request->all()['data']),true)] , $id);

            $response = [
                'message' => 'Menu updated.',
                'data'    => $menu->toArray(),
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
                'message' => 'Menu deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Menu deleted.');
    }
}
