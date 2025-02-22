<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();

        return view('tasks', ['tasks' => $tasks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $name = $request->get('name');

        $task = Task::create(['name' => $name]);

        return redirect()->route('tasks.list');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'done' => 'required|string',
        ]);

        try {
            /** @var Task $task */
            $task = Task::findOrFail($id);
            $task->update(['done' => $request->get('done')]);
            $task->save();

        } catch (\Exception $e) {
            // TODO: log and/or return error message instead of of silently failing
        }

        return redirect()->route('tasks.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            /** @var Task $task */
            $task = Task::findOrFail($id);
            $task->delete();

        } catch (\Exception $e) {
            // TODO: log and/or return error message instead of silently failing
        }

        return redirect()->route('tasks.list');
    }
}
