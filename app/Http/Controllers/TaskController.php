<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Task::findOrFail($id);
        $project->delete();
        return redirect('/projects')->with('status', 'Task deleted successfully');
    }

    public function toggleStatus(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->is_completed = !$task->is_completed; // Status umschalten
        $task->save();

        return response()->json(['id' => $task->id, 'is_completed' => $task->is_completed]);
    }

    public function addTask(Request $request)
    {
        try {
            $task = new Task();
            $user = User::where('email', trim($request->user))->firstOrFail();
            $task->title = $request->name;
            $task->description = $request->description;
            $task->project_id = trim($request->project);
            $task->user_id = $user->id;
            $task->is_completed = false;
            $task->save();

            return redirect('/projects')->with('status', 'Task added successfully');
        } catch (\Exception $e) {
            return redirect('/projects')->with('error', $e->getMessage());
        }
    }
}
