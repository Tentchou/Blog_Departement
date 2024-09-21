@extends('admin.Article.baseForm')

@section('title', $article->title)

@section('bases')

<div class="card shadow-lg">
    <div class="card-header bg-primary text-white text-center">
        <h2>Modifier @yield('title')</h2>
    </div>
    <div class="card-body">

    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data" id="thesisForm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $article->title) }}" >
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $article->slug) }}">
            @error('slug')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="description" name="content" rows="5" >{{ old('content', $article->content) }}</textarea>
            @error('content')
               <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            @if($article->thumbnail)
                <img src="{{ str_starts_with($article->thumbnail, 'http') ? $article->thumbnail : asset('storage/'.$article->thumbnail)  }}" alt="{{ $article->title }}" class="img-fluid mb-3" width="50%">
            @endif
            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
            @error('thumbnail')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select multiple class="form-select" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $article->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
            @error('tags')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</div>

@endsection
