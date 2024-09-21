<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Article;
use App\Models\Project;
use App\Models\Visitor;
use App\Models\Nouvelle;
;
use App\Models\GrandTitre;
use App\Models\ContactMessage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }




    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Blade::directive('datetime', function (string $expression) {
            return "<?php echo ($expression)->format('d/m/Y H:i:s'); ?>";
        });
        //
        Paginator::useBootstrapFive();

        $ipAddress = request()->ip();

        Visitor::firstOrCreate(['ip_address' => $ipAddress]);

        // Attache la fonction à plusieurs vues
        View::composer(['admin.news.index','bases','admin.Article.index','admin.users.index','admin.activites.index'], function ($view) {
            $view->with('users', \App\Models\User::latest()->limit(10)->get());
        });

        //visites
        View::composer(['admin.news.index','bases','admin.Article.index','admin.users.index','admin.activites.index'], function($view){
            $view->with([
                    // $totalVisitors = Visitor::count();

            // Objectif de visiteurs pour calculer le pourcentage

                   'percentage'=>(Visitor::count()/100)*100,
                   'totalVisitors'=>Visitor::count(),


                   //gerer les messages dans la vue admin

                    'messages' => ContactMessage::where('is_read', false)->get(),
                     // Récupérer les messages non lus
        // $unreadMessages = ;
        // $unreadCount = $unreadMessages->count();



            ]);
        });

        View::composer(['admin.news.index','bases','admin.Article.index','admin.users.index','admin.activites.index'], function($view){
            $view->with([
                    // $totalVisitors = Visitor::count();

            // Objectif de visiteurs pour calculer le pourcentage

                   'pourcentage'=>(User::count()/100)*100,
                   'totalUsers'=>User::count(),

            ]);
        });

        //utilisateurs abonnes

        View::composer(['admin.news.index','bases','admin.Article.index','admin.users.index','admin.activites.index'], function($view){
            $view->with([
                    // $totalVisitors = Visitor::count();

            // Objectif de visiteurs pour calculer le pourcentage

                   'percentageSubscribed'=> User::count() > 0 ? (User::where('is_subscribed', true)->count() / 100) * 100 : 0,
                   'TotalsubscribedUsers'=>User::where('is_subscribed', true)->count(),

            ]);
        });
        ///////////////////////////////////////////
        //////////// ACCEUIL /////////////////////////
        //////////////////////////////////////////////

        View::composer(['acceuil.base','acceuil.welcome'], function($view){
            $view->with([
                    // $totalVisitors = Visitor::count();

            // Objectif de visiteurs pour calculer le pourcentage
                 'news'=>Nouvelle::orderBy('created_at', 'desc')->limit(3)->get(),
                 'articles'=>Article::orderBy('created_at', 'desc')->limit(3)->get(),
            ]);
        });

        ////////////////////////////// PROJET ET AUTRE VUES /////////////////

        View::composer(['acceuil.base', 'projets.index'], function($view){

            $view->with([

                'projets'=>Project::with('categorieProject')->latest()->paginate(6),
                'grandTitres'=>GrandTitre::all(),

            ]);

        });




        // Calculer le pourcentage d'utilisateurs abonnés



    }
}
