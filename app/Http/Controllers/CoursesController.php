<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CourseCreateRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Repositories\CourseRepository;
use App\Validators\CourseValidator;

/**
 * Class CoursesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CoursesController extends Controller
{
    /**
     * @var CourseRepository
     */
    protected $repository;

    /**
     * @var CourseValidator
     */
    protected $validator;

    /**
     * CoursesController constructor.
     *
     * @param CourseRepository $repository
     * @param CourseValidator $validator
     */
    public function __construct(CourseRepository $repository, CourseValidator $validator)
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
        $courses = $this->repository->paginate($limit = 10, $columns = ['*']);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $courses,
            ]);
        }

        return view('backend.courses.index', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CourseCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CourseCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $data_input = $request->all();
            $data_input['user_id'] = Auth::user()->id;
            $course = $this->repository->create($request->all());

            $response = [
                'message' => 'Course created.',
                'data'    => $course->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('courses.index')->with('message', $response['message']);
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
        $course = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $course,
            ]);
        }

        return view('backend.courses.show', compact('course'));
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
        $course = $this->repository->find($id);

        return view('backend.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CourseUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CourseUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $course = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Course updated.',
                'data'    => $course->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('courses.index')->with('message', $response['message']);
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
                'message' => 'Course deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Course deleted.');
    }
    public function create()
    {
//        $user = Auth::user();
//        dd($user->can('post.create'));
//        dd(Gate::abilities());
//        if (Gate::denies('post.create')){
//            return redirect()->route('roles.error')->with('message','Permissions denied!');
//        }
//        $data['roles_post'] = $this->repository->rolePost();
        return view('backend.courses.create');
    }
}
