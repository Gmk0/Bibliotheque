<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Travail;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {


        $domaines = Domaine::take(20)->get();
        $travaux = Travail::latest()->take(10)->get();

        return view('user.home', ['domaines' => $domaines, 'travaux' => $travaux]);
    }

    public function voirTravail($matricule)
    {
        $travail = Travail::where('matricule', $matricule)->first();

        if ($travail) {
            // Le matricule a été trouvé dans la base de données
            return view('user.viewOne', compact('travail'));
        } else {
            // Le matricule n'a pas été trouvé dans la base de données
            return redirect()->back()->with('message', 'Aucun travail trouvé avec ce matricule.');
        }
    }

    //
}