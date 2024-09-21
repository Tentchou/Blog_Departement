@extends('admin.Article.baseForm')

@section('title', 'ajouter une activite')

@section('bases')


<div class="card shadow-lg">
    <div class="card-header bg-primary text-white text-center">
        <h2>Enregistrement Activite</h2>
    </div>
    <div class="card-body">
        <form id="thesisForm" method="post" enctype="multipart/form-data" action="{{ route('admin.activite.updateactivite', $activites->id) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" placeholder="Entrer le titre" name="title"  value="{{ old('title', $activites->title) }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" placeholder="Entrer la description" name="description"> value="{{ old('description', $activites->description) }}"</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">Charger Activite</label>
                @if($activites->image)
                  <img src="{{ str_starts_with($activites->image, 'http') ? $activites->image : asset('storage/'.$activites->image)  }}" alt="{{ $activites->title }}" class="img-fluid mb-3" width="50%">
                @endif
                <input type="file" class="form-control" id="file" name="image">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Enregistrer Activite</button>
            </div>
        </form>
    </div>
</div>

@endsection