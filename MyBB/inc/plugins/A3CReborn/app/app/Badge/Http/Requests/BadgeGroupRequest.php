<?php

namespace App\Badge\Http\Requests;

use App\Badge\Model\BadgeGroup;
use Illuminate\Foundation\Http\FormRequest;

class BadgeGroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', BadgeGroup::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'additional_data' => 'nullable|json',
        ];
    }
}
