<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    public function index()
    {
        return Inertia::render('TaskList/Index', [
            'lists' => TaskList::all()->map(fn($taskList) => [
                'id' => $taskList->id,
                'name' => $taskList->name,
            ]),
        ]);
    }

    public function show($id)
    {
        return Inertia::render('TaskList/Show', [
            'list' => TaskList::findOrFail($id)->only(['id', 'name']),
        ]);
    }
}
