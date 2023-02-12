<?php
 
namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;
 
class StoreBbsRequest extends FormRequest
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
            'title'     => 'required|max:255',
            'body'  => 'required|max:65535',
        ];
    }
 
    public function messages()
    {
        return [
            'title.required'    => 'タイトルを入力して下さい。',
            'title.max'         => 'タイトルは:max文字以内で入力してください。',
            'body.required' => '本文を入力して下さい。',
            'body.max'      => '本文は:max文字以内で入力して下さい。',
        ];
    }
}