<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovieRequest extends FormRequest
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
            'title' => 'required',
            'name_eng' => 'required',     
            'thoiluong' => 'required',     
            'image' => 'required|image',     
            'genre' => 'required|array',
            'genre.*' => 'exists:genres,id',
        ];
    }
    public function messages()
    {
        return [
            'genre.required' => 'Vui lòng chọn ít nhất một thể loại.',
            'genre.array' => 'Dữ liệu thể loại không hợp lệ.',
            'genre.*.exists' => 'Thể loại không tồn tại.',
        ];
    }
}
