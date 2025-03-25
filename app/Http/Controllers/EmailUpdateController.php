<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\EmailVerificationToken;
use App\Mail\VerifyNewEmail;

class EmailUpdateController extends Controller
{
    public function requestEmailChange(Request $request)
    {
        $request->validate([
            'new_email' => 'required|email|unique:users,email',
        ]);

        $user = Auth::user();
        $token = Str::random(60);

        // Simpan token untuk verifikasi
        EmailVerificationToken::updateOrCreate(
            ['user_id' => $user->id],
            ['new_email' => $request->new_email, 'token' => $token]
        );

        // Kirim email verifikasi
        Mail::to($request->new_email)->send(new VerifyNewEmail($user, $token));

        return back()->with('message', 'Silakan cek email baru Anda untuk verifikasi perubahan.');
    }

    public function verifyNewEmail($token)
    {
        $verification = EmailVerificationToken::where('token', $token)->first();

        if (!$verification) {
            return redirect('/profile')->with('error', 'Token tidak valid atau sudah kadaluarsa.');
        }

        $user = User::find($verification->user_id);
        $user->email = $verification->new_email;
        $user->email_verified_at = now();
        $user->save();

        // Hapus token setelah digunakan
        $verification->delete();

        return redirect('/profile')->with('success', 'Email Anda berhasil diperbarui!');
    }
}
