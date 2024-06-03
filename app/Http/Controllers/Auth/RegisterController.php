<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        /*
            // validate requeste input data
            $validatedData = Validator::make(
                // data to validate
                $request->all(),

                // validation rules
                [
                    'firstName' => 'required|string|max:255',
                    'lastName' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'phoneNumber' => 'required|string',
                    'birthDate' => 'required|date',
                    'password' => 'required|confirmed|min:8',
                ],

                // custome error messages
                [
                    'firstName.required' => 'Votre nom est obligatoire, veuillez le remplir',
                    'firstName.max' => 'Votre nom ne doit pas dépassé 255 caractère',

                    'lastName.required' => 'Votre prénom est obligatoire, veuillez le remplir',
                    'lastName.max' => 'Votre prénom ne doit pas dépassé 255 caractère',

                    'email.required' => 'Votre email est obligatoire, veuillez le remplir',
                    'email.email' => 'Votre adresse mail n\'est pas valide',
                    'email.max' => 'Vodre adresse mail ne doit pas dépassé 255 caractère',
                    'email.unique' => 'Votre adresse mail renseigné n\'est pas disponible, veuillez le changer',

                    'phoneNumber.required' => 'Votre numéro de téléphone est obligatoire, veuillez le remplir',

                    'birthDate.required' => 'Votre date de naissance est obligatoire, veuillez le remplir',

                    'password.required' => 'Votre mot de passe est obligatoire, veuillez le remplir',
                    'password.confirmed' => 'La confirmation de votre mot de passe ne correspond pas',
                    'password.min' => 'Votre mot de passe doit être d\'au moins 8 caractères',
                ]
            );
        */

        $validatedData = $request->validate(
            [
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phoneNumber' => 'required|string|unique:users',
                'birthDate' => 'required|date',
                'password' => 'required|confirmed',
            ],
            [
                'firstName.required' => 'Veuillez entrer votre nom',
                'firstName.max' => 'Votre nom ne doit pas dépassé 255 caractère',

                'lastName.required' => 'Veuillez entrer votre prénom',
                'lastName.max' => 'Votre prénom ne doit pas dépassé 255 caractère',

                'email.required' => 'Veuillez entrer votre mail',
                'email.email' => 'Votre adresse mail n\'est pas valide',
                'email.max' => 'Vodre adresse mail ne doit pas dépassé 255 caractère',
                'email.unique' => 'Votre adresse mail n\'est pas disponible',

                'phoneNumber.required' => 'Veuillez entrer votre téléphone',
                'phoneNumber.unique' => 'Votre numéros n\'est pas disponible',

                'birthDate.required' => 'Veuillez entrer votre date de naissance',

                'password.required' => 'Veuillez saisir votre mot de passe ',
                'password.confirmed' => 'La confirmation du mot de passe est incorrect',
            ]
        );

        $user = User::create([
            'first_name' => $validatedData['firstName'],
            'last_name' => $validatedData['lastName'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phoneNumber'],
            'birth_date' => $validatedData['birthDate'],
            'password' => bcrypt($validatedData['password'])
        ]);

        event(new Registered($user));
        
        // redirect to login page
        return redirect()->route('auth.login');
    }
}
