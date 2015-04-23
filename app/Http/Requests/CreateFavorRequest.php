<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateFavorRequest extends Request
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
            'name' => 'required',
            'description' => 'required',
            'start_location' => 'required',
            'end_location' => 'required',
            'price' => 'required',
            'end_time' => 'required',
            'category' => 'required'
        ];
    }

}
