<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends PARANTAPI
{
	public function authorize()
	{
		return true; // Set to `true` to allow access, add logic if needed
	}

	public function rules()
	{
		return [
			'title' => 'required|string|max:255',
			'description' => 'nullable|string',
			'status' => 'boolean',
		];
	}

	public function messages()
	{
		return [
			'title.required' => 'The title is required.',
			'title.string' => 'The title must be a string.',
			'title.max' => 'The title cannot exceed 255 characters.',
		];
	}
}

