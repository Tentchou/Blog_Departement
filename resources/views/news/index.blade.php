@extends('layouts.app')

@section('title', 'Liste des Actualités')


@section('content')


@foreach ($news as $nouvelle )
<div class="col-lg-4 col-md-6">
    <div class="card h-100">

                <img src="{{ str_starts_with($nouvelle->photo, 'http') ? $nouvelle->photo : asset('storage/'.$nouvelle->photo)  }}" class="card-img-top" height="300" alt="...">

                <div class="card-body">
                    <h5 class="card-title">{{ $nouvelle->title }}</h5>
                    <p class="card-text">{{ $nouvelle->demi_description }}</p>
                    <p class="card-text">{{ $nouvelle->created_at }}</p>
                    <a href="{{ route('news.show', $nouvelle->id) }}" class="btn btn-primary">savoir plus</a>
                </div>

        </div>
    </div>
@endforeach

     {{ $news->links() }}

@endsection
