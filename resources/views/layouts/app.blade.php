<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion des Actualités')</title>
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
    font-family: 'Arial', sans-serif;
  }

  .hero {
    background: url('math_background.jpg') no-repeat center center/cover;
    color: #fff;
  }

  .navbar {
    padding: 1rem;
  }

  .activities .card {
    transition: transform 0.3s ease;
  }

  .activities .card:hover {
    transform: scale(1.05);
  }

  footer {
    background-color: #343a40;
  }

  @media (max-width: 768px) {
        .hero h1 {
        font-size: 2.5rem;
    }
  }


</style>
<body>
    <section class="activities py-5">
        <div class="container">
          <h2 class="text-center mb-4">Nos Activités</h2>
          <div class="row g-4">
              @yield('content')
          </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
