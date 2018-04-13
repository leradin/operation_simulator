<?php

namespace SimulatorOperation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class UnitEditRequest extends FormRequest
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
            'name' => 'required|max:50',//exists:mathematical_models,name',
            //'path' => 'required|file',
            'unit_type_id' => 'exists:mathematical_models,unit_type_id'
        ];
    }

     public function attributes(){
        return [
            'station' => Lang::get('messages.station'),
            'numeral' => Lang::get('messages.numeral'),
            'name' => Lang::get('messages.name'),
            'serial_number' => Lang::get('messages.serial_number'),
            'number_engines' => Lang::get('messages.number_engines'),
            'country' => Lang::get('messages.country'),
            'unit_type_id' => Lang::get('messages.unit_type'),
            'image' => Lang::get('messages.image')
        ];
    }
}
