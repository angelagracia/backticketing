<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChatMessageRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Bisa diatur lebih spesifik jika perlu pengecekan hak akses.
    }

    public function rules()
    {
        return [
            'ticket_id' => 'required|exists:tickets,id',
            'receiver_id' => 'required|integer',
            'message' => 'required|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'ticket_id.required' => 'ID tiket wajib diisi.',
            'ticket_id.exists' => 'ID tiket tidak ditemukan.',
            'receiver_id.required' => 'Penerima pesan wajib diisi.',
            'message.required' => 'Isi pesan tidak boleh kosong.',
            'message.max' => 'Pesan tidak boleh lebih dari :max karakter.',
        ];
    }
}
