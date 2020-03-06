<?php

namespace App\Http\Controllers;

use App\Entities\Course;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\LessonCreateRequest;
use App\Http\Requests\LessonUpdateRequest;
use App\Repositories\LessonRepository;
use App\Validators\LessonValidator;

/**
 * Class LessonsController.
 *
 * @package namespace App\Http\Controllers;
 */
class LessonsController extends Controller
{
    /**
     * @var LessonRepository
     */
    protected $repository;

    /**
     * @var LessonValidator
     */
    protected $validator;

    /**
     * LessonsController constructor.
     *
     * @param LessonRepository $repository
     * @param LessonValidator $validator
     */
    public function __construct(LessonRepository $repository, LessonValidator $validator)
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
        $lessons = $this->repository->paginate($limit = 10, $columns = ['*']);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $lessons,
            ]);
        }

        return view('backend.lessons.index', compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LessonCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(LessonCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['order'] = 1;
            $lesson = $this->repository->create($data);

            $response = [
                'message' => 'Lesson created.',
                'data'    => $lesson->toArray(),
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
        $lesson = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $lesson,
            ]);
        }

        return view('backend.lessons.show', compact('lesson'));
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
        $lesson = $this->repository->find($id);
        $courses = Course::get()->all();

        return view('backend.lessons.edit', compact('lesson','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LessonUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(LessonUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $lesson = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Lesson updated.',
                'data'    => $lesson->toArray(),
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
                'message' => 'Lesson deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Lesson deleted.');
    }
    public function create()
    {
        $data['courses'] = Course::get()->all();
       return view('backend.lessons.create',$data);
    }
}
