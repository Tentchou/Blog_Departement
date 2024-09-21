<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\GrandTitre;
use Illuminate\Http\Request;
use App\Models\CategorieProject;
use Illuminate\Database\Eloquent\Builder;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $project = Project::query();
        if($search = $request->search){
            $project->where(fn (Builder $query) => $query
                    ->where('title', 'LIKE', '%' .$search.'%')
                    ->orwhere('description', 'LIKE', '%'.$search.'%')
            );
        }

        //   // Récupérer tous les projets avec leurs catégories associées
        //   $projects = Project::with('category')->get();

        //   // Passer les projets à la vue
        //   return view('projects.index', compact('projects'));

        return view('contenu', [
            'projets'=>Project::with('categorieProject')->latest()->paginate(6),
            'grandTitres'=>GrandTitre::all(),

        ]);



    }

    protected function ProjectView(array $filters){
        return view('contenu', [
           'projets'=>Project::filters($filters)->latest()->paginate(6),
           'categorie_project'=>CategorieProject::all(),
        ]);
    }

    // filtrer par categories

    public function postByCategorie($id)
    {

        return view('contenu', [

            'projets'=>Project::where(
                'categorie_project_id', $id
            )->latest()->paginate(4),

            //'articles'=>$category->articles()->paginate(5),
            'categories_project'=>CategorieProject::all(),

            'grandTitres'=>GrandTitre::all()

        ]);

       return $this->postView(['categorie_project'=>$id]);

    //    return $this->ArticleView(['category' =>$id]);
    }

    public function postByBigTitle($id)
    {

        // // Récupérer tous les projets avec le même grand titre
        // $projects = Project::where('grand_titre_id', $grandTitre)->get();

        // // Passer les projets et le grand titre à la vue
        // return view('projets.index', compact('projects', 'grand_titre_id'));

            return view('contenu', [

            'projets'=>Project::where(
                'grand_titre_id', $id
            )->latest()->paginate(4),

            //'articles'=>$category->articles()->paginate(5),
            'grandTitres'=>GrandTitre::all()

        ]);

       return $this->postView(['grand_titre'=>$id]);

    //    return $this->ArticleView(['category' =>$id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
