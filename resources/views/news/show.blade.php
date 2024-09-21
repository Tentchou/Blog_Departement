@extends('base')

@section('bases')
     <!-- Actualité 3 -->

<div class="site-content">
     <div class="card-custom hidden">
        <img src="{{ str_starts_with($news->photo, 'http') ? $news->photo : asset('storage/'.$news->photo)  }}" class="card-img" alt="Image 2">
        <div class="card-body-custom">
            <h5 class="card-title"> {{ $news->title }} </h5>
            <p class="card-text"> {{ $news->description }}</p>
            <p class="card-date">Publié le <span class="date"> {{ $news->created_at }}</span></p>
            <span class="card-date">coment : ({{ $news->comment_news_count }})</span>
            <br><br>
            <a href=" {{ route('news.index') }}" class="btn btn-primary">retorur</a>
        </div>
    </div>
    <br><br>
    <hr>


    @if (auth()->check())
            <form action="{{ route('comments.storenews', $news->id) }}" method="post" class="d-flex align-items-center">
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


      {{-- AFFICHER UN COMMENTAIRE --}}
     {{-- {{ md5(strtolower(trim($comment->user->email))) }} --}}
     @foreach($news->comment_news as $comment)
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


@endsection
