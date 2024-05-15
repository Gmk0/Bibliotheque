<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Travail;
use Illuminate\Http\Request;

class TravailController extends Controller
{
    //

    public function getAllTravail()
    {
        $travails = Travail::with('domaine')->get();


        return response()->json($travails, 200);
    }

    public function lastPubilcation()
    {
        $travails = Travail::with('domaine')->latest()->take(10)->get();


        return response()->json($travails, 200);
    }

    public function lasTdomaines()
    {
        $domaines = Domaine::latest()->take(10)->get();


        return response()->json($domaines, 200);
    }
    public function allDomaines()
    {
        $domaines = Domaine::all();


        return response()->json($domaines, 200);
    }

    public function getFaculte()
    {
        try {
        } catch (\Exception $e) {
        }
    }
}