<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TousController extends Controller
{

    public function VoirProjet(){
        return view('projets.index');
    }
    //
}
