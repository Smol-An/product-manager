<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $product = $this->route('product');
        $userRole = config('products.role');

        if ($this->isMethod('post')) {
            return true;
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            if ($product && $this->user()->role === $userRole) {
                return true;
            }
            return $product && $this->user()->can('update', $product);
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productId = $this->route('product') ? $this->route('product')->id : 'NULL';

        return [
            'article' => 'required|regex:/^[a-zA-Z0-9]+$/|unique:products,article,' . $productId,
            'name' => 'required|min:10',
            'status' => 'required|in:available,unavailable',
            'data.color' => 'nullable|string',
            'data.size' => 'nullable|string',
        ];
    }
}
