<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function showResetForm(Request $request, $token){
        return view('auth.resetPassword')->with('email',$request->get('email'))
                                                ->with('token', $token);
    }

    public function reset(Request $request){

        //Vaidamos lo que nos llega
        $validator = Validator::make($request->all(), [
            'email' => 'email',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            session(['resetPassword_error' => 'Los datos introducidos no son válidos.']);
            return redirect()->back();
        }

        $password = $request->password;

         // Validamos el token
        $tokenData = DB::table('password_resets')->where('email', $request->get('email'))->first();

        if (!$tokenData){

            if (!Hash::check($tokenData->token,Hash::make($request->token))){
                session(['resetPassword_error' => 'Lo sentimos pero no es válido.']);
                return redirect()->back();
            }
        }

        $user = User::where('email', $request->get('email'))->first();

        // Redirect the user back if the email is invalid
        if (!$user) {
            session(['resetPassword_error' => 'No existe el usuario.']);
            return redirect()->back();
        }

        //Actualizamos la contraseña
        $user->password = \Hash::make($password);
        $user->save();

        //Eliminamos el token
        DB::table('password_resets')->where('email', $user->email)->delete();

        session(['resetPassword_success' => 'La contraseña se cambió correctamente.']);
        return redirect()->back();
    }

}
