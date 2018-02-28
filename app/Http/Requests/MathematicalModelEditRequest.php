<?php

namespace SimulatorOperation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class MathematicalModelEditRequest extends FormRequest
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
            'name' => 'required|max:50|regex:/(^[A-Za-z0-9 ]+$)+/|exists:mathematical_models,name',
            'path' => 'required|file',
            //'unit_type_id' => 'required|exists:unit_types,id'
        ];
    }

    public function messages(){
        return [
            'name' => Lang::get('messages.name'),
            'path' => Lang::get('messages.file'),
        ];
    }
}
