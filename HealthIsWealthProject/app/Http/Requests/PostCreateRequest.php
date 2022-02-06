<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
      'post_name' => ['required','string','max:20'],
      'post_img' => 'mimes:jpeg,bmp,png',
      'detail'=>'required','string',
      'category_id' => 'required',
    ];
  }
}
