<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactReply;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Mail\ContactMessageReplied;
use App\Mail\ContactMessageReceived;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{

    ///////////////////////// RETOURNER LA VUE DE CONTACT ////////////////

    public function showForm(){
        return view('contact.contact');
    }

    ////////////////////////////// ENVOYER UN MESSAGE //////////////////
    // public function sendMessage(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email',
    //         'message' => 'required|string',
    //         'telephone'=>'required',
    //     ]);

    //     // Sauvegarde dans la base de données
    //     $contact = ContactMessage::create($request->all());

    //     // Envoi de l'email
    //     Mail::send('emails.contact_message_received', ['contact' => $contact], function ($mail) use ($contact) {
    //         $mail->to($contact->email)
    //             ->subject('Merci pour votre message');
    //     });

    //     return back()->with('success', 'Message envoyé avec succès.');
    // }
    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone'=>'required',
            'message' => 'required|string',
        ]);

        $contactMessage = ContactMessage::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'telephone'=>$request->input('telephone'),
        ]);

        Mail::to(config('mail.from.address'))->send(new ContactMessageReceived($contactMessage));

        return redirect()->back()->withSuccess('Message sent successfully!');
    }

    /////////////////////// RAMENER LES MESSAGES DANS LA BASE DE DONNEE ET DANS LA DASHBORD ADMIN ////////////


    public function replyMessage(Request $request, $id)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        $message = ContactMessage::findOrFail($id);

        // Enregistrer la réponse
        ContactReply::create([
            'contact_message_id' => $id,
            'admin_name' => 'Admin',
            'reply_message' => $request->input('reply_message'),
        ]);

        // Envoyer un e-mail de réponse
        Mail::to($message->email)->send(new ContactMessageReplied($message, $request->input('reply_message')));

        return redirect()->route('admin.articles.liste')->withSuccess('Reply sent successfully!');
    }

    // public function replyMessage(Request $request, $id)
    // {
    //     $contact = ContactMessage::findOrFail($id);

    //     // Validation de la réponse
    //     $request->validate([
    //         'reply_message' => 'required|string',
    //     ]);

    //     // Enregistrer la réponse dans la base de données
    //     ContactReply::create([
    //         'contact_message_id' => $contact->id,
    //         'reply_message' => $request->input('reply_message'),
    //         'admin_name' => 'Admin',
    //     ]);

    //     // Envoyer la réponse par email à l'utilisateur

    //     Mail::send('emails.contact_message_replied', ['contact' => $contact], function ($message) use ($contact) {
    //         $message->to($contact->email)
    //                 ->subject('Réponse à votre message');
    //     });

    //     return back()->with('success', 'Réponse envoyée et enregistrée.');
    // }




    public function delete($id){

        $message = ContactMessage::find($id);
        $message->delete();
        return back()->withSuccess('delete succeffuly');
    }

    // /////////////////////////// voir message ///////////////

    public function showMessage($id)
    {
        // Récupérer le message par son ID
        $message = ContactMessage::findOrFail($id);

        // Marquer le message comme lu lorsqu'il est consulté
        if (!$message->is_read) {
            $message->is_read = true;
            $message->save();
        }

        // Renvoyer la vue avec les détails du message
        return view('admin.message.message', compact('message'));
    }

    //
}
