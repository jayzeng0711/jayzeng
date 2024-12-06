<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class HomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $action = app('request')->route()->getActionMethod();
        if($action == 'index'){
            return [
                'id' => 'required|alpha',
            ];
        }
        
    }

    /**
     * 获取已定义验证规则的错误消息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id.required'=>':attribute 请输入8~16位混合数字、大小写字母',
            'id.alpha'=>':attribute 包含字母',
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'id',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // 取得錯誤資訊
        $responseData = ["code" => 201, "message" => $validator->getMessageBag()->first()];
        // 產生 JSON 格式的 response，(422 是 Laravel 預設的錯誤 http status，可自行更換)
        $response = response()->json($responseData, 200);
        // 丟出 exception
        throw new HttpResponseException($response);
    }
}
