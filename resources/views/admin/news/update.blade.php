
@extends('admin.Article.baseForm')

@section('title', $news->title)

@section('bases')

<div class="card shadow-lg">
    <div class="card-header bg-primary text-white text-center">
        <h2>Modifier @yield('title')</h2>
    </div>
    <div class="card-body">

    <form action="{{ route('admin.articles.updateNews', $news) }}" method="POST" enctype="multipart/form-data" id="thesisForm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $news->title) }}" >
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="description" name="description" rows="5" >{{ old('content', $news->description) }}</textarea>
            @error('description')
               <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Thumbnail</label>

                <img src="{{ str_starts_with($news->photo, 'http') ? $news->photo: asset('storage/'.$news->photo)  }}" alt="{{ $news->title }}" class="img-fluid mb-3" width="50%">

            <input type="file" class="form-control" id="photo" name="photo">
            @error('photo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Update news</button>
    </form>
</div>
</div>

@endsection
