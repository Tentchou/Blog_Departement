<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //commentaire erticle

    public function store(Request $request, $articles)
    {
        // Validation du commentaire
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        // Création du commentaire
        $comment = Comment::create([
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
            'article_id' => $articles,
        ]);

        // Redirection après l'ajout du commentaire
        return back()->withStatus('Commentaire publié avec succès!');
    }

    //commentaire news




    //////////////////////////////////////////////////////////

        public function show($article)
    {
        $articles = Article::withCount('comments')->findOrFail($article);
        //$comments = $articles->comments()->with('user')->get();
        $articles->increment('views');
        //$articles = Article::find($article);
        return view('article.show', compact('articles'));
    }



}
