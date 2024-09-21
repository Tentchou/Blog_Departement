<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Visitor;
use App\Models\Activite;
use App\Models\Nouvelle;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{


    public function index(){

        return view('admin.Article.index', [

            'articles'=>Article::latest()->limit(10)->get(),
        ]);
    }

    public function indexAll(){
        return view('admin.Article.index', [
            'articles'=>Article::latest()->paginate(5),
        ]);
    }


    public function create()
    {
        $categories = Categorie::all();
        $tags = Tag::all();

        return view('admin.Article.form', compact('categories', 'tags'));
    }


    // app/Http/Controllers/ArticleController.php
    public function edit(Article $article)
    {
        $categories = Categorie::all();
        $tags = Tag::all();

        return view('admin.Article.update', compact('article', 'categories', 'tags'));
    }


    //creer

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug',
            'content' => 'required|string',
            'thumbnail' => 'required|nullable|image|max:2048', // Limite de taille de 2MB
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        // Génération du slug si non fourni
        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);

        // Extrait des 150 premiers mots du content
        //$validated['excerpt'] = Str::words($validated['content'], 150);
        $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 150); // Limiter à 255 caractères


        // Gestion de l'image
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $article = Article::create($validated);

        // Attachement des tags
        if (isset($validated['tags'])) {
            $article->tags()->attach($validated['tags']);
        }

        return redirect()->route('articles.show', $article)->withSuccess('Article created successfully.');
    }


    //update
    public function update(Request $request, Article $article)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255|unique:articles,slug,'.$article->id,
        'content' => 'required|string',
        'thumbnail' => 'nullable|image|max:2048', // Limite de taille de 2MB
        'category_id' => 'required|exists:categories,id',
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id',
    ]);

    // Génération du slug si non fourni
    $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);

    // Extrait des 150 premiers mots du content
   // $validated['excerpt'] = Str::words($validated['content'], 150);
    $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 150); // Limiter à 255 caractères


    // Gestion de l'image
    if ($request->hasFile('thumbnail')) {
        // Supprimer l'ancienne image si elle existe
        if ($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        // Stocker la nouvelle image
        $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
    }

    $article->update($validated);

    // Mise à jour des tags
    if (isset($validated['tags'])) {
        $article->tags()->sync($validated['tags']);
    } else {
        $article->tags()->detach(); // Détacher tous les tags si aucun n'est sélectionné
    }

    return redirect()->route('admin.articles.liste')->withSuccess('Article updated successfully.');
}



    public function destroy($id){

        $article = Article::find($id);

        $article->delete();

        return redirect()->route('admin.articles.liste')->withSuccess('article suprime avec seccess');

    }




    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////// GERER LES NEWS //////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function indexNews(){
        // $totalVisitors = Visitor::count();

        // // Objectif de visiteurs pour calculer le pourcentage
        // $target = 100;

        // // Calcul du pourcentage par rapport à l'objectif
        // $percentage = ($totalVisitors / $target) * 100;

        return view('admin.news.index', [
             'news'=>Nouvelle::latest()->limit(10)->get(),
            //  'percentage'=>$percentage,
            //  'totalVisitors'=>$totalVisitors,
        ]);
    }


    public function createNews(){
        $news = Nouvelle::latest();
        return view('admin.news.form', compact('news'));
    }

    public function destroyNews($id){

        $news = Nouvelle::find($id);

        $news->delete();

        return redirect()->route('admin.articles.news')->withSuccess('news suprime avec seccess');

    }

    public function storeNews(Request $request){

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|nullable|image|max:2048', // Limite de taille de 2MB

        ]);

        // Génération du slug si non fourni
       // $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);

        // Extrait des 150 premiers mots du content
        //$validated['excerpt'] = Str::words($validated['content'], 150);
        $validated['demi_description'] = Str::limit(strip_tags($validated['description']), 40); // Limiter à 255 caractères


        // Gestion de l'image
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $news = Nouvelle::create($validated);

        // Attachement des tags


        return redirect()->route('admin.articles.news')->withSuccess('news created successfully.');

    }


    public function editNews(Nouvelle $news){
        return view('admin.news.update', compact('news'));
    }



    public function updateNews(Request $request, Nouvelle $news)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'photo' => 'nullable|image|max:2048', // Limite de taille de 2MB

    ]);

    // Génération du slug si non fourni
    //$validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);
     // Gestion de l'image

    // Extrait des 150 premiers mots du content
   // $validated['excerpt'] = Str::words($validated['content'], 150);
    $validated['demi_description'] = Str::limit(strip_tags($validated['description']), 50); // Limiter à 255 caractères


    // Gestion de l'image
    if ($request->hasFile('photo')) {
        // Supprimer l'ancienne image si elle existe
        if ($news->photo && Storage::disk('public')->exists($news->photo)) {
            Storage::disk('public')->delete($news->photo);
        }

        // Stocker la nouvelle image
        $validated['photo'] = $request->file('photo')->store('photos', 'public');
    }

    $news->update($validated);

    // Mise à jour des tags
    // if (isset($validated['tags'])) {
    //     $article->tags()->sync($validated['tags']);
    // } else {
    //     $article->tags()->detach(); // Détacher tous les tags si aucun n'est sélectionné
    // }

    return redirect()->route('admin.articles.news')->withSuccess('news updated successfully.');
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////// GESTION USERS ///////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function createUsers(){
        $users = User::latest()->limit(10)->get();
        // // Compte le nombre total de visiteurs
        // $totalVisitors = Visitor::count();

        // // Objectif de visiteurs pour calculer le pourcentage
        // $target = 100;

        // // Calcul du pourcentage par rapport à l'objectif
        // $percentage = ($totalVisitors / $target) * 100;

        return view('admin.users.index', compact('users'));
    }

    public function indexUsers(){
        return view('admin.users.form');
    }


    public function deleteUsers($id){

        $users = User::find($id);

        $users->delete();

        return redirect()->route('admin.articles.liste')->withSuccess('article suprime avec seccess');

    }

    // users





    ////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// ACTIVITES //////////////////////////////
    //////////////////////////////////////////////////////////////////////////////



    public function indexActivite(){
        $activites = Activite::latest()->limit(10)->get();
        return view('admin.activites.index', compact('activites'));
    }

    public function createActivites()
    {
        return view('admin.activites.form');
    }

    public function storeActivites(Request $request)
    {
        // Valider les données
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'laboratoire_id' => 'nullable|exists:groupes,id', // Assurez-vous que le groupe existe
        ]);

        // Récupérer l'ID de l'utilisateur connecté
        $userId = Auth::id();

        // Créer l'article en associant le groupe_id à l'ID de l'utilisateur connecté
        Activite::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $validated['image'] ?? null,
            'laboratoire_id' => $userId, // Assigner l'ID de l'utilisateur connecté comme groupe_id
        ]);

        return redirect()->route('admin.articles.index')->withSuccess('Activite créé avec succès');
    }

    public function destroyActivite(Activite $activite)
    {
        $activite->delete();
        return redirect()->route('admin.activite.indexActivite')->withSuccess('Activité supprimée avec succès');
    }

    public function editActivite(Activite $activites){
        return view('admin.activites.update', compact('activites'));
    }

    public function updateActivite(Request $request, Activite $activite)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gérer l'upload de la nouvelle image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        $activite->update($validated);

        return redirect()->route('admin.activites.index')->withSuccess('Activité mise à jour avec succès');
    }
}
