<?php

namespace App\Http\Requests;

use App\Enums\TaskStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class TaskUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'project_id' => $this->project->id,
            'created_user_id' => auth()->user()->id,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:500'],
            'project_id' => ['required', 'uuid', 'exists:projects,id'],
            'status' => ['required', 'integer', new Enum(TaskStatusEnum::class)],
            'deadline' => ['nullable', 'date'],
            'estimated_hours' => ['nullable', 'numeric'],
            'assigned_user_id' => ['nullable', 'exists:users,id'],
            'created_user_id' => ['required', 'exists:users,id'],
        ];
    }
}
