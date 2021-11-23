<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoListCreateRequest;
use App\Http\Requests\TodoListUpdateRequest;
use App\Models\TodoList;
use App\Traits\ApiResponder;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    use ApiResponder;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $todoLists = TodoList::paginate();
        return $this->successResponse($todoLists);
    }

    public function store(TodoListCreateRequest $request)
    {
        $todoList = TodoList::create($request->only('user_id', 'title', 'description', 'start_at'));

        return $this->successResponse($todoList);
    }

    public function show($id)
    {
        $todoList = TodoList::findOrFail($id);

        return $this->successResponse($todoList);
    }

    public function update(TodoListUpdateRequest $request, $id)
    {
        $todoList = TodoList::findOrFail($id);
        $todoList->update($request->only('user_id', 'status', 'title', 'description', 'start_at'));

        return $this->successResponse($todoList);
    }

    public function destroy($id)
    {
        $todoList = TodoList::findOrFail($id);
        $todoList->delete();

        return $this->successResponse(null, Response::HTTP_ACCEPTED, 'todo deleted');
    }
}
