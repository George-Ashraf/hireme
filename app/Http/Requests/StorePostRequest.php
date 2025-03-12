<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'skills'            => 'nullable|string',
            'salary'            => 'nullable|numeric|min:0|max:999999.99',
            'job_title'         => 'nullable|string|max:255',
            'location'          => 'nullable|string|max:255',
            'work_type'         => 'nullable|in:remote,hybrid,onsite',
            'description'       => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'responsibility'    => 'nullable|string',
            'qualification'     => 'nullable|string',
            'benefits'          => 'nullable|string',
            'experience_level'  => 'nullable|in:junior,mid_level,senior',
            'closed_date'       => 'nullable|date|after_or_equal:today',
            'category_id'       => 'nullable|exists:categories,id',
            'user_id'           => 'nullable|exists:users,id',
        ];

    }

    function messages(): array{

        return [
            'salary.numeric'           => 'Salary must be a valid number.',
            'salary.min'               => 'Salary cannot be negative.',
            'salary.max'               => 'Salary exceeds the maximum allowed value.',
            'work_type.in'             => 'Work type must be one of: remote, hybrid, onsite.',
            'status.in'                => 'Status must be either pending or published.',
            'image.image'              => 'Uploaded file must be an image.',
            'image.mimes'              => 'Allowed image types: jpeg, png, jpg, gif.',
            'image.max'                => 'Image size must not exceed 2MB.',
            'experience_level.in'      => 'Experience level must be junior, mid_level, or senior.',
            'closed_date.after_or_equal' => 'The closing date must be today or in the future.',
            'category_id.exists'       => 'Selected category does not exist.',
            'user_id.exists'           => 'Invalid user ID.'
        ];
    }
}
