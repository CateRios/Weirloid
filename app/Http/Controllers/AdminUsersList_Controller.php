<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminUsersList_Controller extends Controller
{
    static function getAllUsers(){

        // Obtenemos a todos los usuarios menos el administrador
        $users = User::where('email','<>','admin')->paginate(4);

        if(count($users) != 0){
            return view('partials.adminUsersList')->with('users',$users);
        } else {
            echo "Aún no hay usuarios registrados.";
        }

    }
}
