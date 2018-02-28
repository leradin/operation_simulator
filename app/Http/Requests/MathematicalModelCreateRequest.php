<?php

namespace SimulatorOperation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class MathematicalModelCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50|regex:/(^[A-Za-z0-9 ]+$)+/|unique:mathematical_models,name',
            'path' => 'required|file',
            'unit_type_id' => 'unique:mathematical_models,unit_type_id'
        ];
    }

    public function attributes(){
        return [
            'name' => Lang::get('messages.name'),
            'path' => Lang::get('messages.file'),
            'unit_type_id' => Lang::get('messages.unit_type'),
        ];
    }
}
