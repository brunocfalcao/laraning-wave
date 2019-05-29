<?php

namespace Laraning\Wave\Requests\Series;

use Illuminate\Foundation\Http\FormRequest;

class UpdatingRequest extends FormRequest
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
            'title'             => 'required|string',
            'description_short' => 'required|string',
            'description_long'  => 'required|string',
            'image_path'        => 'image|dimensions:min_width=1280|dimensions:min_height=720',
        ];
    }
}
