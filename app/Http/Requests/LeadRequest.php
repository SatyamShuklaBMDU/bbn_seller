<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
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
        return [
            'loan_amount'=>'required|numeric',
            'fname'=>'required|string|max:255',
            'lname'=>'required|string|max:255',
            'mobile_no'=>'required|numeric',
            'address'=>'required|string',
            'pincode'=>'required',
            'pan_card'=>'required|string',
            'aadhar_card'=>'required|string',
            'employment_type'=>'required',
            'email'=>'required|email',
            'product_id'=>'required',
            'type_id'=>'required',
            'refrences'=>'required|string'
            
        ];
    }
}
