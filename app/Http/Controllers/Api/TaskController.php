<?php

namespace App\Http\Controllers\Api;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{


    
    /**
     * Get all tasks belonging to the user
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$tasks = Task::where('creator_id', '=', Auth::id())->get();
        $tasks = Task::all();//for testing
        return response($tasks, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'bail|required|string|max:255',
            'description' => 'required|string',
            'assigned_id' => 'required|integer',
            'category_id' => 'required|integer',
            'due_date' => 'required|date|after_or_equal:today',
            'end_repeat_date' => 'nullable|date|after_or_equal:tomorrow',
            'reminder' => 'nullable|date|after_or_equal:today',
        ]);
        $task = new Task();
        $task->number = mt_rand(100000,999999); //random six digit number
        $task->assigned_id = $request->input('assigned_id');
        $task->creator_id = Auth::id();//logged in user id
        $task->category_id = $request->input('category_id');
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->isprivate = $request->input('isprivate');
        $task->priority = $request->input('priority');
        $task->due_date = $request->input('due_date');
        $task->repeat = $request->input('repeat');
        $task->end_repeat_date = $request->input('end_repeat_date');
        $task->reminder = $request->input('reminder');
        $task->save();
        return response()->json(['message' => 'Task Added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return response( $task , 200 );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'bail|required|string|max:255',
            'description' => 'requiredstring|',
            'assigned_id' => 'required|integer',
            'category_id' => 'required|integer',
            'due_date' => 'required|date|after_or_equal:today',
            'end_repeat_date' => 'nullable|date|after_or_equal:tomorrow',
            'reminder' => 'nullable|date|after_or_equal:today',
        ]);
        $task = Task::find($id);
        $task->title = $request->input('title');
        $task->assigned_id = $request->input('assigned_id');
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->isprivate = $request->input('isprivate');
        $task->priority = $request->input('priority');
        $task->due_date = $request->input('due_date');
        $task->repeat = $request->input('repeat');
        $task->end_repeat_date = $request->input('end_repeat_date');
        $task->reminder = $request->input('reminder');
        $task->percent = $request->input('percent');
        $task->last_update = date("Y-m-d H:i:s", time());
        $task->save();
        return response()->json(['message' => 'Task Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->json(['message' => 'Task Deleted']);
    }

    /**
     * Make task as private
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function makePrivate(Request $request, $id)
    {

    }

}
