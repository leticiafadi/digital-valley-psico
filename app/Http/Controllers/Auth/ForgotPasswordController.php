<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\ResetPasswordRequestForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Mail;

use App\Models\usuarios\PasswordReset;
use App\Mail\SendEmailToken;

class ForgotPasswordController extends Controller{


    use SendsPasswordResetEmails;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest');
    }

    public function showLinkRequestForm(){
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(ResetPasswordRequestForm $request){
        
        $reset = PasswordReset::create([
            "email" => $request->email,
            "token" => time('h:m:s').env('APP_KEY').$request->email
        ]);

        Mail::to($request->email)->send(new SendEmailToken($reset->token));

        return redirect()->to('/login')->with("success", "Pedido de senha realizado com sucesos, verifique sua caixa de Email.");
        
    }


    public function resetForm(Request $request, $token){
        $reset = PasswordReset::where('token', $token)->firstOrFail();

        return view('auth.passwords.reset',['token'=> $token, 'email' => $reset->email ]);

    }
}
