<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    use AuthenticatesUsers;


    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function login(Request $request){
        // Validamos los datos obtenidos
        $input = validator($request->all());

        if ($input->fails()) {
            session(['error_code' => 1]);
            session(['sign_error' => 'Los datos introducidos estaban mal.']);
            return redirect()->back();
        } else {

            //Obtenemos los datos
            $data = $request->all();

            // Verificamos los datos
            if (auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) {

                // Si nuestros datos son correctos mostramos la página de inicio
                return redirect()->to('/');

            } else {
                session(['error_code' => 3]);
                session(['sign_error' => 'No existe usuario con los datos introducidos.']);
                return redirect()->back();
            }
        }
    }

    public function logout(){

        // Cerramos la sesión
        Auth::logout();

        return redirect()->to('/');
    }
}
