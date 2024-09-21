
@extends('bases')

@section('title', 'ajouter un news')

@section('bases')

<div class="card shadow-lg">
    <div class="card-header bg-primary text-white text-center">
        <h2>Soumission d'un news</h2>
    </div>

    <div class="card-body">


        <form action="{{ route('admin.articles.storeNews') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" >
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photos</label>
                <input type="file" class="form-control" id="photo" name="photo">
                @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">

                creer

            </button>

        </form>

    </div>
</div>

@endsection
