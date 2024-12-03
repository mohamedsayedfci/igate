<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
	// Get all tasks
	public function index()
	{
		return  $this->sendResponse(Task::all());
	}

	// Create a new task
	public function store(StoreTaskRequest $request)
	{

		$task = Task::create($request->all());
		return  $this->sendResponse($task,' Task  added successfully',201);

	}

	// Show a specific task
	public function show($id)
	{
		$task = Task::find($id);

		if (!$task) {
			return $this->sendError('Task not found');

		}

		return  $this->sendResponse($task,' Task  successfully',201);
	}

	// Update a task
	public function update(UpdateTaskRequest $request, $id)
	{
		$task = Task::find($id);

		if (!$task) {
			return $this->sendError('Task not found');

		}




		$task->update($request->validate());
		return  $this->sendResponse($task,' Task updated successfully',201);
	}

	// Delete a task
	public function destroy($id)
	{
		$task = Task::find($id);

		if (!$task) {
			return $this->sendError('Task not found');
		}

		$task->delete();
		return  $this->sendResponse(null,' Task deleted successfully',201);

	}
}

