<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LocalizationRequest extends FormRequest
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
        switch ($this->method())
        {
            case 'GET':
                return [
                    'id' => 'required|exists:localizations,user_id'
                ];

            case 'POST':
                return [
                    'latitude' => 'required',
                    'longitude' => 'required'
                ];

            default:
                break;
        }
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
            $validator->after(function ($validator) {
                $response = [
                    "message" => 'Missing Data',
                    "errors" => $validator->errors()
                ];

                throw new HttpResponseException(response()->json($response, 422));
            });
        }
    }
}
