<?php

namespace SimulatorOperation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class UnitCreateRequest extends FormRequest
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
            'station' => 'required|integer|unique:units',
            'numeral' => 'required|alpha_dash',
            'name' => 'required|alpha_dash|max:50',
            'serial_number' => 'required|string|max:15',
            'number_engines' => 'integer',
            'country' => 'required',
            'unit_type_id' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,bmp,png,jpg'
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

    /**
    * Configure the validator instance.
    *
    * @param  \Illuminate\Validation\Validator  $validator
    * @return void
    */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->any()) {
                $validator->errors()->add('flagNumberEngines', '0');
            }
        });
    }
}
