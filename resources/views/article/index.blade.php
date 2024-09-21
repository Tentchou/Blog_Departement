

@extends('base')

@section('bases')

    <div class="sidebar">
        <div class="sidebar-title">Catégories</div>
        <div class="sidebar-content">
            @foreach($categories as $category)
                <a href="{{ route('articles.categorie', $category->id) }}" class="category-button">{{ $category->name }}</a>
                <span class="category-count" style="color: #fff;">({{ $category->articles_count }})</span>
            @endforeach
        </div>
    </div>

    @forelse ($articles as $article )

            <div class="card-custom hidden">
                <img src="{{ str_starts_with($article->thumbnail, 'http') ? $article->thumbnail : asset('storage/'.$article->thumbnail)  }}" class="card-img" alt="Image 2">
                <div class="card-body-custom">
                    <h5 class="card-title"><a class="title" href="{{ route('articles.show', ['article'=>$article]) }}"></a>{{ $article->title }}</h5>
                    @if($article->category)
                        <p class="card-meta"><a href="{{ route('articles.categorie', $article->category->id) }}" style="text-decoration: underline; color:black; font-size:1rem;">{{ $article->category->name }}</a></p>
                    @endif

                    @if ($article->tags->isNotEmpty())

                        @foreach ($article->tags as $tag)
                            <a href="{{ route('articles.byTag', $tag->id) }}" class="btn btn-primary">{{ $tag->name }}</a>
                        @endforeach

                    @endif
                    <p class="card-text">{{ $article->excerpt }}</p>
                    <p class="card-date">Publié le <span class="date"> {{ $article->created_at }}</span></p>
                    <span class="card-date">coment : ({{ $article->comments_count }})</span>
                    <a href="{{ route('articles.show', $article) }}" class="card-button">Lire +</a>
                </div>
            </div>

            <hr>

    @empty
            <div class=" text-center mt-5">
                <p >Aucun resultat ne correspond au titre ou au contenu recherche</p>
            </div>

    @endforelse


   {{ $articles->links() }}

@endsection



        <!-- --------------------- Blog Carousel ----------------- -->

        <!-- ----------x---------- Blog Carousel --------x-------- -->
    <!-- ---------------------- Site Content -------------------------->

















    <!-- -----------x---------- Site Content -------------x------------>






