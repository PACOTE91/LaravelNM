<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMailable;

class ContactoController extends Controller
{

    public function index()
    {
        $header = "Formulario de Contacto";
        return view("mail.index", compact("header"));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5'],
            'surname' => ['required', 'min:5'],
            'email' => ['required', 'email'],
            'suggest' => ['required', 'min:5']
        ]);

        $correo =  new ContactoMailable($request->all());
        Mail::to('pacomartinezalhabia@gmail.com')->send($correo);
        return redirect()->route('/');
    }
}