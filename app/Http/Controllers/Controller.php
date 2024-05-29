<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Muestra la lista de tareas
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Muestra el formulario para crear una nueva tarea
    public function create()
    {
        return view('tasks.create');
    }

    // Guarda una nueva tarea en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();

        return redirect()->route('tasks.index')
                         ->with('success', 'Task created successfully.');
    }

    // Elimina una tarea existente
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')
                         ->with('success', 'Task deleted successfully.');
    }
}
