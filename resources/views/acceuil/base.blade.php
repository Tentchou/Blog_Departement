<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!--  *****   Link To Font Awsome Icons   *****  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

	<!--  *****   Link To Owl Carousel   *****  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="librairie/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="librairie/boxicons-master/css/boxicons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    {{-- <link rel="stylesheet" href="{{ asset('css/header.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/projet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content-sidebar.css') }}">

    <title>@yield('title', 'votre page d\'acceuil')</title>



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

    <header>
        <br>
        <div id="mainHead">
            <div class="marque">
                <img src="image/fs.png" alt="logo" class="col-lg-1">
                <div>
                    <nav class="grand">Departement Mathématiques</nav>
                    Université de douala
                </div>
            </div>

            <div class="connextion">
            {{-- utilisateur non xonnecte --}}
                @guest
                    <a href="{{ route('login') }}"><button class="boutton foncee">Se connecter</button></a>
                    <a href="{{ route('register') }}"><button class="btn btn-outline-primary">S'inscrire</button></a>
                @else
                 <!-- Si l'utilisateur est connecté -->
                    @php
                        $email = auth()->user()->email;
                        $gravatarUrl = 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) . '?d=mp&s=40';
                        $initial = strtoupper(substr($email, 0, 1)); // Première lettre de l'email
                    @endphp

                        <div class="dropdown">
                            <!-- Image gravatar avec la première lettre de l'email -->
                            <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- Affiche le Gravatar s'il existe ou la première lettre si non -->
                                <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; font-size: 1.25rem;">
                                    {{ $initial }}
                                </div>
                                {{-- <strong class="ms-2">{{ auth()->user()->name ?? $email }}</strong> --}}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end text-small shadow" aria-labelledby="dropdownUser">
                                <!-- Option Logout -->
                                <li>
                                    <form action="{{ route('logout') }}" method="GET">
                                        @csrf
                                        @method('get')
                                        <button type="submit">Logout</button>
                                    </form>
                                </li>

                                <!-- Option Devenir membre si pas encore membre -->
                                @if(!auth()->user()->membre)
                                    <li><a class="dropdown-item" href="#">Devenir membre</a></li>
                                @endif

                                <!-- Option Dashboard pour les admins -->
                                @if(auth()->user()->role === 'admin')
                                    <li><a class="dropdown-item" href="{{ route('admin.articles.liste') }}">Dashboard</a></li>
                                @endif
                            </ul>
                        </div>
                @endguest

                <a href="{{ route('login') }}" class="bx bx-log-in hid" style="margin-right: 10px;text-decoration:none;"></a>
                <div class="bx bx-menu hid" id="btn"></div>

            </div>
        </div>
        <!-- ici c'est le menus de naviguations pensez à ajoutez liens  -->
        <!-- Pour ajouter un sous on joute un balise ul puis li pour lister les éléments -->
        <div id="menu">
            <nav>
                <ul>
                    <li><a href="#" class="nav-link">ACCEUIL</a></li>
                    <li ><a href="#" class="nav-link">PROJET</a></li>
                    <li><a href="#" class="nav-link">ACTUALITE </a></li>
                    <li><a href="#" class="nav-link">GROUPE </a></li>
                    <li><a href="#" class="nav-link">MON ESPACE</a></li>
                    <li><a href="{{ route('contact') }}" class="nav-link">CONTACT</a></li>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="sidebar" style="background-color:  #0d6efd;">
            <div class="logo-details">
              <img src="image/fs.png" alt="logo" class="icon" width="60px" height="60px">
              <div class="logo_name">Departement de mathématiques</div>
              <i class="bx bx-menu-alt-right" id="btn2"></i>
            </div>
            <ul class="nav-list">
              <li>
                <a href="#">
                    <!-- Mettre un lien pour  l'accueil-->
                  <i class="bx bx-grid-alt"></i> <span class="links_name">Accueil</span>
                </a>
              </li>
              <li>
                <a href="#" >
                    <!-- Mettre un lien pour  projet-->
                  <i class="bx bx-pie-chart-alt-2"></i> <span class="links_name">Projet</span>
                </a>
              </li>
              <li>
                <a href="#">
                    <!-- Mettre un lien pour  actuelite-->
                  <i class="bx bx-news"></i> <span class="links_name">Actualité</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="bx bx-globe"></i> <span class="links_name">Groupe</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="bx bx-user"></i> <span class="links_name">Mon espace</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="bx bxs-phone"></i> <span class="links_name">Contact</span>
                </a>
              </li>
              <li class="profile">
                <div class="profile-details">
                  <img src="profile.jpg" alt="profileImg" />
                  <div class="name_job">
                    @auth
                        <!-- Modifier par le nom de l'utilisateur -->
                        <div class="name">{{ auth()->user()->name }}</div>
                        <!-- Modifier par son email -->
                        <div class="adrr">{{ auth()->user()->email }}</div>
                    @endauth
                  </div>
                </div>
                <i class="bx bx-log-out" id="log_out"></i>
              </li>
            </ul>
        </div>

    </header>


    <main>
		<div class="container-fluid">

			<div class="row">

                <div class="col-md-3">

                    <div class="container my-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="image-gallery">
                                    <div class="header">
                                        <h1 class="gallery-title">News</h1>
                                        <form class="newsletter-form">
                                            <label for="email" class="form-label">Inscrivez-vous à notre newsletter</label>
                                            <div class="input-group">
                                                <form action="{{ route('subscribe') }}" method="POST">
                                                    @csrf
                                                    @method('post')
                                                    <input type="email" class="form-control" id="email" placeholder="Votre email" name="email">
                                                    <button class="btn btn-primary" type="submit">S'inscrire</button>
                                                </form>
                                            </div>
                                        </form>
                                    </div>


                                        <div class="image-content">
                                            @foreach ($news as $nouvelle )
                                            <a href="{{ route('news.show', $nouvelle->id) }}" style="font-size: 20px;">lire plus</a>
                                                <div class="image-item">
                                                    <img src="{{ str_starts_with($nouvelle->photo, 'http') ? $nouvelle->photo : asset('storage/'.$nouvelle->photo)  }}" alt="Image 1" class="img-fluid">
                                                    <div class="overlay">
                                                        <p class="description">{{ $nouvelle->demi_description }}</p>
                                                    </div>
                                                    <p class="card-text p-2">{{ $nouvelle->created_at }}</p>
                                                    <h3 class="title text-center p-2">{{ $nouvelle->title }}</h3>
                                                </div>

                                            @endforeach
                                        </div>


                                    <footer class="gallery-footer">
                                        <a href="#" class="social-icon"><i class='bx bxl-facebook-circle' style="font-size: 2rem; color: #4267B2;"></i></a>
                                        <a href="#" class="social-icon"><i class='bx bxl-twitter' style="font-size: 2rem; color: #1DA1F2;"></i></a>
                                        <a href="#" class="social-icon"><i class='bx bxl-instagram' style="font-size: 2rem; color: #C13584;"></i></a>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>

				</div>

                    <div class="col-md-9">

                        @yield('bases')

                    </div>
            </div>

        </div>
    </main>


    <div class="whatsapp-icon">
        <i class='bx bxl-whatsapp' id="whatsapp-icon" style="font-size: 50px; color: #1a8f4f;"></i>
    </div>

    <div class="whatsapp-info" id="whatsapp-info">
        <div class="close-button">
            <i class='bx bx-x' id="close-button"></i>
        </div>
        <h5>Nous contacter sur WhatsApp</h5>
        <p>Que pouvons-nous faire pour vous ?</p>
        <a href="(link unavailable)" target="_blank" class="btn btn-primary">
            <i class='bx bxl-whatsapp'></i> Discuter sur WhatsApp
        </a>
    </div>

    <footer>
        <div id="footInformation" class="row">
            <div  class="col-md-5" id="propos">
                <span>A propos</span> <br>
                <p>
                    Le departement de math-info de l’université de
                    Douala ,pour respecter son desir de modernisation
                    c'est doté d’un site web moderne permettant le
                    partage de connaissance scientifique
                    De ce fait ce site se veut alors comme un lieu de
                    partage des plus brianllan esprits du monde <br>

                    De plus il vous permettra de vous informez sur les
                    dernière actualité de la prestigieuse université de
                    Douala
                </p>
            </div>
            <div id="lien" class="col-md-2">
                <span>Lien utile</span> <br>
                <!-- Pensez à mettre les lien sur differentes section -->
                <p>
                    <nav><i class="bx bx-chevron-right" style="color: #fff;"></i> Accueil</nav>
                    <nav><i class="bx bx-chevron-right" style="color: #fff;"></i> Projet</nav>
                    <nav><i class="bx bx-chevron-right" style="color: #fff;"></i> Actualité</nav>
                    <nav><i class="bx bx-chevron-right" style="color: #fff;"></i> Groupe</nav>
                    <nav><i class="bx bx-chevron-right" style="color: #fff;"></i> Contact</nav><br>
                </p>
            </div>
            <div id="nosContact" class="col-md-5">
                <div id="footNewsletter">
                    <nav> Rejoignez notre newsletter et restez à l’affut des dernières nouvelles</nav> <br>
                <!-- formulaire pour la news letter -->
                    <form action="{{ route('subscribe') }}" method="POST">
                        @csrf
                        @method('post')
                        <input type="email" name="email" placeholder="Entrez votre email">

                        <button type="submit" class="">
                            <i class='bx bxs-send' style="color: #0d6efd; font-size:30px;"></i>
                        </button>
                    </form>
                </div>
                <br>
                <span id="reseau">Nos reseaux </span> <br><br>
                <nav><div class="bx bxl-facebook-circle" style="font-size: 2rem; color: #4267B2;"></div> Departement Mathématiques</nav>
                <nav><div class="bx bxl-linkedin-square" style='color: #0077B5; font-size: 2rem;'></div> Departement Mathématiques</nav>
                <nav><div class="bx bxs-phone" style='color: #28a745; font-size: 2rem;'></div>+237 699 99 99 99</nav>
                <!-- Les différents reseau sont des exemple à modifier pour mettre les bon contact -->
            </div>
        </div>
        <div id="footEnd" class="row">
            <div><div class="bx bx-copyright"></div>Copirigth 2024 Departement Math-info</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>


    <!--   *** Link To JQuery ***   -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <!--   *** Link To Owl Carousel ***   -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        // Partners Section Starts
$('.partners-slider').owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:3000,
    margin:10,
    nav:true,
    navText:["<i class='fa-solid fa-arrow-left'></i>",
             "<i class='fa-solid fa-arrow-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        500:{
            items:2
        },
        700:{
            items:3
        },
        1000:{
        	items:5
        }
    }
    })
    </script>
    <script src="{{ asset('js/apps.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/content-sidebar.js') }}"></script>
    <script src="{{ asset('js/header.js') }}"></script>
    <script>
         // Fonction pour fermer l'alerte de succès
         function closeAlert() {
            var alert = document.getElementById("alertSuccess");
            alert.style.display = "none";
        }
    </script>
</body>
</html>
