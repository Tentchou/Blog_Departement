<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .article-img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .content {
            margin: 20px;
        }
        .footer {
            margin-top: 40px;
            font-size: 12px;
        }
    </style>
    <!-- Lien vers Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header text-center mb-4">
            <h1 class="text-center"> <span class="text-center font-bold">Titre : </span>{{ $article->title }}</h1>
            <p class="text-muted">Catégorie : {{ $article->category->name }}</p>
            <p class="text-muted">Date de publication : {{ $article->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <!-- Affichage dynamique de l'image (thumbnail) de l'article -->
        @if($article->thumbnail)
            <div class="text-center">
                <img src="{{ public_path('storage/' . $article->thumbnail) }}" alt="Image de l'article" class="article-img img-fluid shadow-lg">
            </div>
        @endif

        <div class="content mt-4">
            <h2>Description</h2>
            <p>{{ $article->content }}</p>
        </div>

        <div class="footer text-center mt-5">
            <p>Généré le : {{ now()->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</body>
</html>
