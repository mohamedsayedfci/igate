<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends PARANTAPI
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


}

