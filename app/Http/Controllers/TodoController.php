<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoResource;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * get all todos
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return TodoResource::collection(Todo::orderBy('created_at', 'desc')->get());
    }

    /**
     * save new todo
     * @param Request $request
     * @return TodoResource
     */
    public function store(Request $request)
    {
        $todo = Todo::create([
            'name' => $request->name
        ]);

        return new TodoResource($todo);
    }
}
