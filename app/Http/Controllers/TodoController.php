<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::orderBy('created_at' , 'desc')->paginate(8);

        return view('todos.index', [ 
            'todos' => $todos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->title);

        // validation rules
        $rules = [
            'title' => 'required|string|unique:todos,title|min:2|max:150',
            'body'=> 'required|string|min:5|max:1000'
        ];

        $messages = [
            'title.unique' => 'Todo title must be unique'
        ];

        $request->validate($rules, $messages);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->save();

        return redirect()->route('todos.index')->with('status', 'Created a new Todo ');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::findOrFail($id);

        return view('todos.show', [
            'todo' => $todo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = Todo::findOrFail($id);

        return view('todos.edit' ,[
            'todo'=>$todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'title' => 'required|string|unique:todos,title|min:2|max:150',
            'body'=> 'required|string|min:5|max:1000'
        ];

        $messages = [
            'title.unique' => 'Todo title must be unique'
        ];

        $request->validate($rules, $messages);

        $todo = todo::findOrFail($id);
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->save();

        return redirect()->route('todos.index')->with('status', 'Edited a Todo ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()
            ->route('todos.index')
            ->with('status', 'Todo Deleted!');
    }
}
