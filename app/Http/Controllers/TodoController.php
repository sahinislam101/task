<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->input('status', '');

        $query = Todo::query();

        if ($status === 'active') {
            $query->where('is_completed', true);
        } elseif ($status === 'inactive') {
            $query->where('is_completed', false);
        }

        $todos = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();


        return Inertia::render('todo/Index', [
            'todos' => $todos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('todo/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        Todo::create($request->validated());

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return Inertia::render('todo/Edit',[
            'todo' => $todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todo->update($request->validated());

        return redirect()->route('todos.index')
            ->with('success', 'Todo Updatrd Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index')
            ->with('success', 'Todo Deleted Successfully');
    }
}
