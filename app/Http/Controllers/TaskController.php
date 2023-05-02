<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
    return response()->json(['data' => $tasks]);

    }

    // Retrieve tasks for a specific user

    public function specific(User $user)
{
    $tasks = $user->tasks;
    return response()->json(['data' => $tasks]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->user_id = $request->input('user_id');
        $task->save();
        return response()->json(['data' => $task]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return response()->json(['data' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->user_id = $request->input('user_id');
        $task->save();
        return response()->json(['data' => $task]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
    return response()->json(['message' => 'Task deleted successfully.']);
    }
}
