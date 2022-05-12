<?php

namespace App\Http\Requests\User;

use App\Models\UserSetting;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->id == $this->route('id');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'radius_meters' => [
                'min:2000',
                'required',
                'integer'
            ],
            'pref_breeds' => [
                'string'
            ],
            'age_from' => [
                'min:1',
                'integer',
                'required'
            ],
            'age_to' => [
                'max:30',
                'integer',
                'required'
            ],
        ];
    }
}
