<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'songname'=>'required|string|max:100',
            'album_id'=>'required',
            'file'=>'required|file|mimes:mp3',
            'image'=>'required|image|mimes:jpeg,png,jpg'

        ];
    }
}
