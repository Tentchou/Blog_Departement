<?php

namespace App\Http\Controllers;


use App\Models\Nouvelle;
use App\Models\CommentNew;
use Illuminate\Http\Request;

class CommentNewsController extends Controller
{
    public function storeNews(Request $request, $nouvelle)
    {
        // Validation du commentaire
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        // Création du commentaire
        $comment = CommentNew::create([
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
            'nouvelle_id' => $nouvelle,
        ]);

        // Redirection après l'ajout du commentaire
        return back()->withStatus('Commentaire publié avec succès!');
    }


     /////////////////////////////////////////////////////////

     public function shownews($nouvelle)
     {
         $news = Nouvelle::withCount('comment_news')->findOrFail($nouvelle);
         //$comments = $articles->comments()->with('user')->get();
         //$articles = Article::find($article);
         return view('news.show', compact('news'));
     }

}
