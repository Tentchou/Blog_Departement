<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SubscriptionConfirmed;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{

    public function subscribe(Request $request)
    {
        // Valider l'email
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = auth()->user();

        // Mettre à jour l'utilisateur comme abonné
        $user->is_subscribed = true;
        $user->save();

        // Envoyer un email de confirmation
        Mail::to($request->email)->send(new SubscriptionConfirmed($user));

        return redirect()->back()->withStatus('Votre souscription a été effectuée avec succès. Un email de confirmation vous a été envoyé.');
    }
    //
}
