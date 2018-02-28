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
            'station' => 'required|integer|exists:units,station',
            'numeral' => 'required|alpha_num',
            'name' => 'required|alpha_dash',
            'serial_number' => 'required|string',
            'number_engines' => 'required|integer',
            'country' => 'required|string',
            'unit_type_id' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,bmp,png,jpg'
        ];
    }

     public function attributes(){
        return [
            'station' => Lang::get('messages.station'),
            'numeral' => Lang::get('messages.numeral'),
            'name' => Lang::get('messages.country'),
            'serial_number' => Lang::get('messages.serial_number'),
            'number_engines' => Lang::get('messages.number_engines'),
            'country' => Lang::get('messages.country'),
            'unit_type_id' => Lang::get('messages.unit_type'),
            'image' => Lang::get('messages.image')
        ];
    }
}
