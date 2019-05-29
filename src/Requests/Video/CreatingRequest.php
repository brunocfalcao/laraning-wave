<?php

namespace Laraning\Wave\Requests\Video;

use Illuminate\Foundation\Http\FormRequest;

class CreatingRequest extends FormRequest
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
            'title'                => 'required|string',
            'description_short'    => 'required|string',
            'description_long'     => 'required|string',
            'duration'             => 'nullable|date_format:i:s',
            'vimeo_id'             => 'nullable|string',
            'series_id'            => 'nullable|integer|exists:series,id',
            'image_path'           => 'required|image|dimensions:min_height:720|dimensions:min_width:1280',
        ];
    }
}
