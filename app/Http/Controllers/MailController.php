<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;

class MailController extends Controller
{
    public function redirectmail()
    {
        $otpkode = Str::random(5);
        $mail_username  = "siakadtk123@gmail.com";
        $mail_password  = "Fathur160199Seven";
        $mail_send      = 'fathurwalkers44@gmail.com';
        try {
            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(true); // enable SMTP
            // $mail->IsMAIL(); // enable SMTP
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = 'html';
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587 / 465
            // $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
            // $mail->Host = "smtp.gmail.com";
            // $mail->Port = 587; // or 587
            $mail->Username = $mail_username;
            $mail->Password = $mail_password;

            // $mail = new PHPMailer(true);
            // $mail->isSMTP();
            // $mail->SMTPDebug = 2;
            // $mail->Debugoutput = 'html';
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            // $mail->Host = 'smtp.gmail.com';
            // $mail->Port = 587;
            // // $mail->Port = 465;
            // $mail->SMTPSecure = 'tls';
            // $mail->SMTPAuth = true;
            // $mail->Username = env('MAIL_USERNAME');
            // $mail->Password = env('MAIL_PASSWORD');

    
            // $mail->addAddress($pengguna->login_email, "VERIFIKASI SKCK");
            // $mail->addAddress("fathurwalkers44@gmail.com", "BEM Teknik Unidayan");

            $mail->setFrom($mail_username, "Verifikasi OTP");
            $mail->addAddress($mail_send);

            $mail->isHTML(true);
            $mail->Subject = "Verifikasi OTP";
            $mail->Body = "Kode OTP Anda adalah ";
            $mail->Body .= $otpkode;
            $mail->Body .= " .";
    
            $mail->send();

            return view('mail.page-konfirmasi', [
                'otpkode' => $otpkode
            ]);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        // return redirect()->route('dashboard')->with('berhasil_konfirmasi', 'SKCK telah di verifikasi!');

        // $randomString = Str::random(5);
        // return view('mail.page-konfirmasi', [
        //     'randomstring' => $randomString
        // ]);
    }

    public function konfirmasi()
    {
        //
    }
}
