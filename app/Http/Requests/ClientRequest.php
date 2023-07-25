<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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

        switch ($this->method()) {

            case 'POST':
                return [
                    'name'              => 'bail|required|string|min:2|max:255',
                    'phone'             => 'bail|required|numeric|digits_between:5,10',
                    'email'             => 'bail|required|email|max:255',
                    // 'email'              => ['bail','required','email', 'max:60', 'min:4', Rule::unique('clients')->whereNull('deleted_at')],
                    'city'              => 'bail|nullable|string|min:4|max:50',
                    'company'           => 'bail|required|string'
                ];
                break;
                           
            default:
            return [
                'email'             => 'bail|required|email|max:255',   
            ];
                
                break;
        }
       

    }
}
