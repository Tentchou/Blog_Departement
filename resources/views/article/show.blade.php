
@extends('base')

@section('title', $articles->title)

@section('bases')

<div class="site-content">

    <br><br><br>

    <div class="posts">
        <br><br>

      <br>

      <div class="card-custom hidden">
        <img src="{{ str_starts_with($articles->thumbnail, 'http') ? $articles->thumbnail : asset('storage/'.$articles->thumbnail)  }}" class="card-img img-fluid" alt="Image 2" style=" min-width: 50px;
      min-height: 50px;
      object-fit: cover; ">
        <div class="card-body-custom">
            <h5 class="card-title"><a class="title" href="{{ route('articles.show', ['article'=>$articles]) }}"></a>{{ $articles->title }}</h5>
            @if($articles->category)
                <p class="card-meta"><a href="{{ route('articles.categorie', $articles->category->id) }}" style="text-decoration: underline; color:black; font-size:1rem;">{{ $articles->category->name }}</a></p>
            @endif

            @if ($articles->tags->isNotEmpty())

                @foreach ($articles->tags as $tag)
                    <a href="{{ route('articles.byTag', $tag->id) }}" class="btn btn-outline-primary">{{ $tag->name }}</a>
                @endforeach

            @endif
            <p class="card-text">{{ ($articles->content) }}</p>

            <span class="card-date">coment : ({{ $articles->comments_count }})</span><br><br>

            <p class="card-date">Publié le <span class="date"> {{ $articles->created_at }}</span></p>

            <div class="card-footer text-center">
                <!-- Vérifier si l'utilisateur est connecté -->
                @guest
                    <!-- Bouton désactivé si non connecté -->
                    <button class="btn btn-secondary" disabled>Connectez vous  pour télécharger </button> <a href="{{ route('login') }}">ici</a>
                @else
                    <!-- Vérifier si l'utilisateur est abonné -->
                    @if(Auth::user()->is_subscribed)
                        <!-- Si abonné, bouton pour télécharger l'article -->
                        <a href="{{ route('articles.downloadPdf', $articles->id) }}" class="btn btn-success">
                            <i class="fa fa-download"></i> Télécharger l'article (PDF)</a>
                    @else
                        <!-- Si l'utilisateur est connecté mais non abonné -->
                        <button class="btn btn-warning" id="showSubscribeForm"> <i class="fa fa-download"></i> download</button>

                        <!-- Formulaire d'abonnement, masqué au début -->
                        <div class="alert alert-warning mt-4 d-none" id="subscribeForm">
                            <button type="button" class="close" id="closeSubscribeForm">&times;</button>
                            <h4>Abonnez-vous pour télécharger l'article <i class="fa fa-download"></i></h4>
                            <form action="{{ route('subscribe') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Adresse Email</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                </div>
                                <button type="submit" class="btn btn-primary">S'abonner</button>
                            </form>
                        </div>
                    @endif
                @endguest
            </div>


            <!-- Script JavaScript pour gérer l'affichage et la fermeture de la div de formulaire -->





        </div>
    </div>
    <br><br>
    <hr>
        <br>


        @if (auth()->check())
            <form action="{{ route('comments.store', $articles->id) }}" method="post" class="d-flex align-items-center">
                @csrf
                <div class="form-group flex-grow-1 me-2">
                    <input type="text" name="content" class="form-control" placeholder="Écrire un commentaire...😊 ">

                    @error('content')
                         <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <button type="submit" class="btn btn-outline-primary">
                    <i class="bi bi-send"></i> <!-- Icône d'envoi -->
                </button>
            </form>
        @endif



    {{-- {{ md5(strtolower(trim($comment->user->email))) }} --}}
    @foreach($articles->comments as $comment)
        <div class="comment-box p-3 mb-3 rounded shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <!-- Gravatar -->
                    <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($comment->user->email))) }}" alt="User Avatar" class="rounded-circle me-3" width="50" height="50">

                    <div>
                        <!-- Nom de l'utilisateur -->
                        <h6 class="mb-0">{{ $comment->user->name }}</h6>
                        <!-- Commentaire -->
                        <p class="mb-0 text-muted">{{ $comment->content }}</p>
                    </div>
                </div>

                <!-- Date de publication à droite -->
                <small class="text-muted">{{ $comment->created_at->format('d M Y, H:i') }}</small>
            </div>
        </div>
    @endforeach



    </div>

    <script>
        document.getElementById('showSubscribeForm').addEventListener('click', function() {
            document.getElementById('subscribeForm').classList.remove('d-none');
        });

        document.getElementById('closeSubscribeForm').addEventListener('click', function() {
            document.getElementById('subscribeForm').classList.add('d-none');
        });
    </script>

@endsection
