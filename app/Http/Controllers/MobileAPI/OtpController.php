<?php

namespace App\Http\Controllers\MobileApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
    
    public function sendOtp(Request $request)
    {
        $email = $request->input('email');
        // Generate OTP
        $otp = mt_rand(10000, 99999);

        $data = [
            'otp' => $otp
        ];

        // Kirim OTP melalui email
        Mail::to($email)->send(new OtpMail($data));

        //return response()->json(['message' => 'OTP telah dikirim'], 200);

        return response()->json(['status' => 'success', 'data' => ['otp'=>'' . $otp]], 200);
    //
    }

}
