<?php

namespace App\Http\Livewire\Auth;

use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{

    public $etudiant = [
        'matricule' => "",
        'nom' => "",
        'postnom' => "",
        'prenom' => "",
        'faculte' => "",
        "email" => "",
        'user_id' => "",
        'password' => "",
    ];
    public $email;
    public $matricule;

    public function  register()
    {
        try {

            $this->validate([
                'etudiant.nom' => 'required',
                'etudiant.postnom' => 'required',
                'etudiant.prenom' => 'required',
                'matricule' => 'required|unique:etudiants',
                'email' => 'required|email|unique:users',
                'etudiant.faculte' => 'required',
                'etudiant.password' => 'required|confirmed',
            ]);



            $user = User::create([
                'name' => $this->etudiant['nom'] . ' ' . $this->etudiant['nom'],
                'email' => $this->email,
                'password' => Hash::make($this->etudiant['password']),
            ]);

            $etudiant = Etudiant::create([
                'matricule' => $this->matricule,
                'nom' => $this->etudiant['nom'],
                'postnom' => $this->etudiant['postnom'],
                'prenom' => $this->etudiant['prenom'],
                'faculte' => $this->etudiant['faculte'],
                'user_id' => $user->id,

            ]);

            auth()->login($user);

            return redirect('/');
        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}