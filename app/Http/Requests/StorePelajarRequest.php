<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelajarRequest extends FormRequest
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
            'txtid' => 'required|unique:pelajars,idPelajar|min:7|max:7',
            'txtnamalengkap' => 'required',
            'txtjeniskelamin' => 'required',
            'txtalamat' => 'required',
            'txtemail' => 'required|email|unique:pelajars,email',
            'txtnohp' => 'required|numeric',
        ];
    }
    public function messages(): array
    {
        return [
            'txtid.required' => ':attribute Tidak Boleh Kosong',
            'txtnamalengkap.required' => ':attribute Tidak Boleh Kosong',
            'txtjeniskelamin.required' => ':attribute Tidak Boleh Kosong',
            'txtalamat.required' => ':attribute Tidak Boleh Kosong',
            'txtemail.required' => ':attribute Tidak Boleh Kosong',
            'txtnohp.required' => ':attribute Tidak Boleh Kosong',

            'txtid.unique' => ':attribute sudah terdaftar',
            'txtemail.unique' => ':attribute sudah terdaftar',
            'txtemail.email' => ':attribute tidak teridentifikasi',
            'txtnohp.numeric' => ':attribute harus berisi angka',
        ];
    }

    public function attributes(): array
    {
        return [
            'txtid' => 'Id Pelajar',
            'txtnamalengkap' => 'Nama Lengkap',
            'txtjeniskelamin' => 'Jenis Kelamin',
            'txtalamat' => 'Alamat',
            'txtemail' => 'Email',
            'txtnohp' => 'No Handphone',
        ];
    }
}
