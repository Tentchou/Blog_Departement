<?php

namespace App\Http\Controllers;

use view;
use App\Models\Tag;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Laravel\Prompts\SearchPrompt;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\SearchArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $article = Article::query();
        // if($search = $request->search){
        //     $article->where(fn (Builder $query) => $query
        //             ->where('title', 'LIKE', '%' .$search.'%')
        //             ->orwhere('content', 'LIKE', '%'.$search.'%')
        //     );
        // }

        // return view('article.index', [
        //     'articles'=>$article->latest()->paginate(5),
        //     'categorie'=>Categorie::all(),

        // ]);
        //\
        return $this->ArticleView($request->search ? ['search' => $request->search] : []);
    }

    protected function ArticleView(array $filters){
          return view('article.index', [
             'articles'=>Article::filters($filters)->latest()->paginate(6),
             'categories'=>Categorie::all(),
          ]);
    }

    public function postByCategorie($id)
    {

        return view('article.index', [

            'articles'=>Article::where(
                'category_id', $id
            )->latest()->paginate(4),

            //'articles'=>$category->articles()->paginate(5),
            'categories'=>Categorie::all()

        ]);

       return $this->postView(['category'=>$id]);

    //    return $this->ArticleView(['category' =>$id]);
    }

    public function postByTag($id)
    {

        // return view('article.index', [

        //     // 'posts'=>$category->Posts()->paginate(10),
        //     'articles'=>Article::whereRelation(
        //         'tags','tags.id', $tags
        //     )->latest()->paginate(5),

        //    'categorie'=>Categorie::all()
        // ]);
        //return $this->postView(['tag'=>$id]);
        return $this->ArticleView(['tag' =>$id]);
    }


    // public function search(Request $request)
    // {
    //     $searchTerm = $request->input('recherche');
    //     $articles = Article::where('title', 'starts_with', $searchTerm)
    //         ->orWhere('content', 'starts_with', $searchTerm)
    //         ->get();
    //     return view('article.index', ['articles'=>$articles]);
    // }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(Article $articles)
    // {

    //     $comments = $articles->comments()->with('user')->get();
    //     return view('article.show', compact('articles', 'comments'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /////////////////////////////////////////////////////////////////
    /////////////////// TELECHARGER UN ARTICLE /////////////////////
    ///////////////////////////////////////////////////////////////


  public function downloadPdf($id)
    {
        $article = Article::findOrFail($id);

        $pdf = PDF::loadView('article.pdf', compact('article'));
        return $pdf->download('article-' . $article->title . '.pdf');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
