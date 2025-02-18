<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Todo::latest()->get();
    
        return view('home', compact('data'));
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:4'
        ]);

        Todo::create($validated);

        return redirect()->route('todos.index')
                         ->with('success', 'Created Successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $todos = Todo::findOrFail($id);
        $todos->delete();

        return redirect()->route('todos.index')
                         ->with('success', 'Deleted Successfully.');
    }

    /**
     * toggle todo list as favorite or not.
     */
    public function favorite($id, Request $request)
    {
        $todo = Todo::findOrFail($id);

        if($request->isMethod('post')) {
            $todo->update(['favorite' => 1]);
        }

        $todos = Todo::where('favorite', 1)->get();

        return view('favorite', compact('todos'));
    }

    /**
     * toggle todo list as completed or not.
     */
    public function completed()
    {
        $todos = Todo::where('completed', true)->get();

        return view('completed', compact('todos'));
    }
}
