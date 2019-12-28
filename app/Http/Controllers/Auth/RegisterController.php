<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/clothesCatalog';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        // Creamos el usuario
        $user = new User;
        $user->name = rand(1000000000,9999999999);
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return $user;
    }

    public function register(Request $request)
    {
        // Validamos los datos obtenidos
        $input = validator($request->all());

        if ($input->fails()) {
            session(['error_code' => 1]);
            session(['sign_error' => 'Los datos introducidos estaban mal.']);
            return redirect()->back();
        } else {

            //Obtenemos los datos
            $data = $request->all();

            // Comprobamos que el usuario no esté registrado
            if(User::query()->where('email',$data['email'])->exists()){
                session(['error_code' => 1]);
                session(['sign_error' => 'Ya existe un usuario con ese email.']);
                return redirect()->back();
            } else {

                //Creamos el usuario
                $user = $this->create($data);

                // Autenticamos al usuario
                auth()->login($user);

                return redirect()->to('/');

            }
        }
    }
}
