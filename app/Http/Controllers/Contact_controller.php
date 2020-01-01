<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class Contact_controller extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'description' => ['required','min:3','max:1000']
        ]);
    }

    public function sendEmail(Request $request){

        // Validamos los datos obtenidos
        $input = validator($request->all());

        if ($input->fails()) {
            session(['contact_error' => 'Los datos introducidos estaban mal.']);
            return redirect()->back();
        } else {

            //Obtenemos los datos
            $data = $request->all();

            // Enviamos el email
            Mail::send('email.contact', $data, function ($message) use ($data){
                $message->from($data['email'], $data['name']); // El email no cambia debido a que gmail tiene seguridad para evitar spam
                $message->to('weirloidenterprise@gmail.com', 'Weirloid Enterprise')->subject('Contacto desde la página web');
            });

            session(['contact_success' => 'El email se ha enviado correctamente.']);
            return redirect()->back();
        }
    }

}
