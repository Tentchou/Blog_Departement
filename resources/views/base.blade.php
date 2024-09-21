<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Liste des articles')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/articles.css') }}">

</head>
<body>

    <!-- Div des catégories -->

    <!-- Ajoutez d'autres catégories ici -->

<!-- Search Bar -->
    <div class="container mt-4">
        <form action="{{ route('articles.index') }}" method="GET" class="d-flex">
            <input class="form-control me-2" type="search" name="search" placeholder="Rechercher par titre ou contenu" aria-label="Rechercher" value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">
                <i class="bi bi-search"></i> <!-- Icone de recherche -->
            </button>
        </form>
    </div>

<!-- Exemple pour un article -->

     <div>
        @if(session('status'))
            <div class="alert alert-success alert-overlay alert-dismissible fade show" role="alert" id="customAlert">
                <strong>Succès !</strong> {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>


<div class="main-content">
    <div class="container d-flex flex-column align-items-center">
        <!-- Article 1 -->



           

            @yield('bases')





    </div>
</div>

<script src="{{ asset('js/script.js') }}">

</script>

</body>
</html>
