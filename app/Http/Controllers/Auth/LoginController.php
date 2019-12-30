<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

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

    /**
     * Handle Social login request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    /*
    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }
    */

    /**
     * Obtain the user information from Social Logged in.
     * @param $social
     * @return Response
     */
    /*
    public function handleProviderCallback($social)
    {
        $userSocial = Socialite::driver($social)->user();
        $user = User::where(['email' => $userSocial->getEmail()])->first();
        if($user){
            Auth::login($user);
            return redirect()->action('HomeController@index');
        }else{
            return view('auth.register',['name' => $userSocial->getName(), 'email' => $userSocial->getEmail()]);
        }
    }
     */

}
