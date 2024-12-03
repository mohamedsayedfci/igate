<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
	// Get all tasks
	public function index()
	{
		return response()->json(Task::all(), 200);
	}

	// Create a new task
	public function store(Request $request)
	{
		$validated = $request->validate([
			'title' => 'required|string|max:255',
			'description' => 'nullable|string',
			'status' => 'boolean',
		]);

		$task = Task::create($validated);
		return response()->json($task, 201);
	}

	// Show a specific task
	public function show($id)
	{
		$task = Task::find($id);

		if (!$task) {
			return response()->json(['error' => 'Task not found'], 404);
		}

		return response()->json($task, 200);
	}

	// Update a task
	public function update(Request $request, $id)
	{
		$task = Task::find($id);

		if (!$task) {
			return response()->json(['error' => 'Task not found'], 404);
		}

		$validated = $request->validate([
			'title' => 'required|string|max:255',
			'description' => 'nullable|string',
			'status' => 'boolean',
		]);

		$task->update($validated);
		return response()->json($task, 200);
	}

	// Delete a task
	public function destroy($id)
	{
		$task = Task::find($id);

		if (!$task) {
			return response()->json(['error' => 'Task not found'], 404);
		}

		$task->delete();
		return response()->json(['message' => 'Task deleted successfully'], 200);
	}
}

