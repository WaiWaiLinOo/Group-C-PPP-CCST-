<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCreateRequest extends FormRequest
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
        'user_name' => ['required','string','max:20'],
        'email' => 'required','string','email','max:255','unique:users',
        'password' => 'required', 'string', 'min:8',
        'dob'=>'required',
        'address' =>'required','string','min:2',
        'email'=>'required',
    ];
  }
}
