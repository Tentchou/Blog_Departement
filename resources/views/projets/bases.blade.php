<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title'. 'Nos differents projets')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/projet.css') }}">

</head>
<body>

    @if(session('success'))
        <div class="alert alert-success alert-overlay alert-dismissible fade show" role="alert" id="customAlert">
            <strong>Succès ! </strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class= "alert alert-danger alert-overlay alert-dismissible fade show" role="alert" id="customAlert">
            <ul>
                @foreach ($errors->all() as $error)
                <strong> Error ! </strong><li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Search Bar -->
    <div class="container mt-4">
        <form action="{{ route('projets.index') }}" method="GET" class="d-flex">
            <input class="form-control me-2" type="search" name="search" placeholder="Rechercher par titre ou description" aria-label="Rechercher" value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">
                <i class="bi bi-search"></i> <!-- Icone de recherche -->
            </button>
        </form>
    </div>

    @yield('base')

</body>
</html>
