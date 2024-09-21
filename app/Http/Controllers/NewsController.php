<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Nouvelle;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{

    public function indexWelcome(){
        //afficher unr entete
        $news = Nouvelle::orderBy('created_at', 'desc')->limit(3)->get();
        $articles = Article::orderBy('created_at', 'desc')->limit(3)->get();
        $categories = Categorie::all();
        return view('acceuil.welcome', compact('news', 'articles','categories'));
    }
    // Affiche une actualité en particulier avec les commentaires

    public function index()
    {
        $news = Nouvelle::orderBy('created_at', 'desc')->paginate(12);
        return view('news.index', compact('news'));
    }

    // Affiche une actualité en particulier
    public function show(Nouvelle $news)
    {

        $news->increment('views');
        return view('news.show', compact('news'));
    }
}
