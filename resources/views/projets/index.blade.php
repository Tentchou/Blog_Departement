@extends('contenu')

@section('title', 'Pages de projets')

@section('contenu')

    <!-- Search Bar -->
    <div class="container mt-4">
        <form action="{{ route('projets.index') }}" method="GET" class="d-flex">
            <input class="form-control me-2" type="search" name="search" placeholder="Rechercher par titre ou description" aria-label="Rechercher" value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">
                <i class="bi bi-search"></i> <!-- Icone de recherche -->
            </button>
        </form>
    </div>


  <!-- Projects Section -->
  <section id="projects" class="container my-5">
    <h2 class="text-center mb-5">Our Featured Projects</h2>

    <h3 class="mb-4">Tous les Grands Titres des Projets</h3>

        <div class="row">

            @foreach($grandTitres as $grandTitre)
                <div class="col-md-12 mb-3">
                    <!-- Bouton stylisé pour chaque grand titre -->
                    <a href="{{ route('projets.BigTitle', ['grandTitre' => $grandTitre]) }}" class="btn btn-primary w-100">
                        {{ $grandTitre->title }}
                    </a>
                </div>
            @endforeach



            <!-- Project 1 -->
            @forelse($projets as $projet)
                <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <img src="{{ $projet->image }}" class="card-img-top" alt="Project Image">
                            <div class="card-body">
                                @if ($projet->categorieProject)
                                   <a href="{{ route('projets.categorie',$projet->categorieProject->id ) }}">{{ $projet->categorieProject->name }}</a>
                                @endif
                                <h5 class="card-title">{{ $projet->title }}</h5>
                                <p class="card-text">{{ $projet->petite_description }}...</p>
                                <h6 style="color: gray; font-size:3px;">{{ $projet->created_at }}</h6>
                                <br>
                                <a href="#" class="btn btn-outline-primary">Learn More</a>

                            </div>
                        </div>

                </div>
            @empty

               <p style="color: gray; text-align:center; ">aucun resultat ne correspond a cette recherche</p>

            @endforelse
        </div>

        {{ $projets->links() }}

  </section>

    <!-- Contact Section -->
    <div id="contact" class="bg-dark text-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Contact Us</h2>
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                @method('post')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Your Name" name="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" placeholder="Your Email" name="email">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" placeholder="Your telephone number" name="telephone">
                    @error('name')
                            <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="5" placeholder="Message" name="message"></textarea>
                    @error('name')
                            <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary btn-block">Send Message</button>
            </form>
        </div>
    </div>

@endsection
