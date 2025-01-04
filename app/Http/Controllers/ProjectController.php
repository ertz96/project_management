<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectUser;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user(); // Get the currently authenticated user
        if ($user->name == 'admin') {
            $users = User::all();
            $projects = Project::all();
            $tasks = Task::all();
            $projectUsers = DB::table('project_user')->get();


            return view('pm.project_management_admin', ['projects' => $projects, 'tasks' => $tasks, 'users' => $users, 'projectUsers' => json_decode($projectUsers)]);
        } else {
            $projects = $user->projects; // Assuming a User has a 'projects' relationship
            $tasks = Task::where('user_id', $user->id)->get(); // Assuming tasks are related to users by user_id
            $projectUsers = DB::table('project_user')->where('user_id', '=', $user->id)->get();

            return view('pm.project_management', ['projects' => $projects, 'tasks' => $tasks, 'projectUsers' => json_decode($projectUsers)]);
        }
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
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect('/projects')->with('status', 'Project deleted successfully');
    }

    public function addProject(Request $request)
    {
        try {
            $project = new Project();
            $project->title = $request->name;
            $project->description = $request->description;
            $project->save();

            $userMails = explode(',', $request->user);
            foreach ($userMails as $userMail) {
                $projectUser = new ProjectUser();
                $user = User::where('email', trim($userMail))->firstOrFail();
                $projectUser->user_id = $user->id;
                $projectUser->project_id = $project->id;
                $projectUser->save();
            }

            return redirect('/projects')->with('status', 'Project created successfully');
        } catch (\Exception $e) {
            return redirect('/projects')->with('error', $e->getMessage());
        }
    }
}
