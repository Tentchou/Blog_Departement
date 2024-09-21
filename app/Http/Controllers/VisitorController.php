<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visitor;


class VisitorController extends Controller
{
    //
    public function showVisitors()
    {
        // Compte le nombre total de visiteurs
        $totalVisitors = Visitor::count();

        // Objectif de visiteurs pour calculer le pourcentage
        $target = 100;

        // Calcul du pourcentage par rapport à l'objectif
        $percentage = ($totalVisitors / $target) * 100;

        // Passe les variables à la vue
        return view('bases', compact('totalVisitors', 'percentage'));
    }

    ////////////////////////////////////////////////////////////////////////////
    ///////////////////////// NOMBRE DE USERS //////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////


    Public function showUsersNUmber(){
        $totalUsers = User::count();

        $target = 100;
        $pourcentage  = ($totalUsers/$target)*100;
        return view('bases', compact('totalUsers', 'pourcentages'));
    }


}
