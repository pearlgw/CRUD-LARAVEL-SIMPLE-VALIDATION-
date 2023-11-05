<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePelajarRequest extends FormRequest
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
            'txtnamalengkap' => 'required',
            'txtjeniskelamin' => 'required',
            'txtalamat' => 'required',
            'txtemail' => [
                'required',
                'email',
                Rule::unique('pelajars', 'email')->ignore($this->txtid, 'idPelajar')
            ],
            'txtnohp' => 'required|numeric',
        ];
    }
    public function messages(): array
    {
        return [
            'txtnamalengkap.required' => ':attribute Tidak Boleh Kosong',
            'txtjeniskelamin.required' => ':attribute Tidak Boleh Kosong',
            'txtalamat.required' => ':attribute Tidak Boleh Kosong',
            'txtemail.required' => ':attribute Tidak Boleh Kosong',
            'txtnohp.required' => ':attribute Tidak Boleh Kosong',

            'txtemail.unique' => ':attribute sudah terdaftar',
            'txtemail.email' => ':attribute tidak teridentifikasi',
            'txtnohp.numeric' => ':attribute harus berisi angka',
        ];
    }

    public function attributes(): array
    {
        return [
            'txtnamalengkap' => 'Nama Lengkap',
            'txtjeniskelamin' => 'Jenis Kelamin',
            'txtalamat' => 'Alamat',
            'txtemail' => 'Email',
            'txtnohp' => 'No Handphone',
        ];
    }
}
