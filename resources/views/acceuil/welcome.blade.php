
@extends('acceuil.base')


@section('bases')

{{-- slide section --}}

<section>
     <!-- carousel -->
     <div class="carousel">
        <!-- list item -->
        <div class="list">
            <div class="item">
                <img src="{{ asset('imagesMaths/normal_eecc15a.jpg') }}">
                <div class="content">
                    <div class="author">LUNDEV</div>
                    <div class="title">DESIGN SLIDER</div>
                    <div class="topic">ANIMAL</div>
                    <div class="des">
                        <!-- lorem 50 -->
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('imagesMaths/Faculte.jpg') }}">
                <div class="content">
                    <div class="author">LUNDEV</div>
                    <div class="title">DESIGN SLIDER</div>
                    <div class="topic">ANIMAL</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('imagesMaths/doyen-modified.jpg') }}">
                <div class="content">
                    <div class="author">Douala</div>
                    <div class="title">AlGEBRE GEOMETRIQUE</div>
                    <div class="topic">Mathematique </div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('imagesMaths/image2-modified.jpg') }}">
                <div class="content">
                    <div class="author">LUNDEV</div>
                    <div class="title">DESIGN SLIDER</div>
                    <div class="topic">ANIMAL</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- list thumnail -->
        <div class="thumbnail">
            <div class="item">
                <img src="{{ asset('imagesMaths/IMG_20211209_161413_328-modified.jpg') }}">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('imagesMaths/test.jpg') }}">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('imagesMaths/trentenaire_banner .png') }}">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('imagesMaths/normal_dag282e.jpg') }}">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
        </div>
        <!-- next prev -->

        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <!-- time running -->
        <div class="time"></div>
    </div>
</section>



{{-- about section --}}
<!-- Section principale "À propos" -->
<section class="courses" id="courses" >
    <!--   *** Courses Header Starts ***   -->
	<div class="section-header">
		<div class="header-text">
			<h1>A propos de Nous</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		</div>
        <a href=""><button class="courses-btn btn btn-outline-primary">Lire plus</button></a>
	</div>
    <!-- Mission -->
    <div class="about-subsection">
        <div class="text">
            <h3>Notre Mission</h3>
            <p>Le département de Mathématiques et Informatique de l'Université de Douala est un pôle d'excellence dans le domaine des sciences exactes. Il offre une formation de qualité aux étudiants qui souhaitent poursuivre une carrière dans les domaines des mathématiques, de l'informatique, de la statistique et de la recherche opérationnelle.

                Les enseignants du département sont des experts dans leurs domaines respectifs et sont déterminés à transmettre leurs connaissances aux étudiants. Ils utilisent des méthodes pédagogiques modernes et des outils technologiques pour rendre l'apprentissage plus interactif et plus efficace.

                Le département propose des programmes de licence, de master et de doctorat qui couvrent une large gamme de sujets, allant des mathématiques pures et appliquées à l'informatique théorique et appliquée, en passant par la statistique et la recherche opérationnelle..</p>
        </div>
        <img src="https://via.placeholder.com/500x300" alt="Mission Image">
    </div>

</section>


<!--   *** Partners Section Starts ***   -->
<section class="partners">
	<div class="section-header">
		<div class="header-text">
			<h1>Nos partenaires</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		</div>
    </div>

	<div class="owl-carousel owl-theme partners-slider">

    	<div class="item brand-item">
    		<img src="{{ asset('images/logo.png') }}">
    	</div>
    	<div class="item brand-item">
    		<img src="{{ asset('assets/Blog-post/blog1.png') }}">
    	</div>
    	<div class="item brand-item">
    		<img src="{{ asset('assets/Blog-post/blog3.png') }}">
    	</div>
    	<div class="item brand-item">
    		<img src="images/brand-logos/torghar.png">
    	</div>
    	<div class="item brand-item">
    		<img src="images/brand-logos/nadershakot.png">
    	</div>
    	<div class="item brand-item">
    		<img src="images/brand-logos/almarah.png">
    	</div>

	</div>
</section>
<!--   *** Partners Section Ends ***   -->


{{-- end section about --}}

<!--   *** Courses Section Starts ***   -->
<section class="courses" id="courses">
	<!--   *** Courses Header Starts ***   -->
	<div class="section-header">
		<div class="header-text">
			<h1>Nos articles</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		</div>
		<a href="{{ route('articles.index') }}"><button class="courses-btn btn btn-outline-primary">View All</button></a>
	</div>
	<!--   *** Courses Header Ends ***   -->
	<!--   *** Courses Contents Starts ***   -->
	<div class="course-contents">
        @foreach ($articles as $article )
            <div class="course-card">
                <img src="{{ str_starts_with($article->thumbnail, 'http') ? $article->thumbnail : asset('storage/'.$article->thumbnail)  }}">
                <div class="category">

                    @if($article->category)
                      <div class="subject"><h3><a href="{{ route('articles.categorie', $article->category->id) }}">{{ $article->category->name }}</a></h3></div>
                    @endif
                    <span style="margin-top: 8px;"><i class='bx bxs-show' style="color: #0d6efd; font-size:24px;"></i>{{ $article->views }}</span>

                    <img src="{{ str_starts_with($article->thumbnail, 'http') ? $article->thumbnail : asset('storage/'.$article->thumbnail)  }}">
                </div>
                <h3 class="course-title">{{ $article->title }}</h3>
                <div class="course-desc">
                    <span style="font-size: 14px; color:#111;"><i class="fa-solid fa-video"></i>{{ $article->excerpt }}</span>

                </div>
                <div class="course-ratings">
                    <span><a href="{{ route('articles.show', $article->id) }}">lire plus</a></span>
                    <span style="color: gray;">{{ $article->created_at }}</span>
                </div>
            </div>
        @endforeach


	</div>
	<!--   *** Courses Contents Ends ***   -->
</section>
<!--   *** Courses Section Ends ***   -->






<section class="courses" id="courses">

    <div class="section-header">
		<div class="header-text">
			<h1>Actualites</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		</div>
		<a href="{{ route('articles.index') }}"><button class="courses-btn btn btn-outline-primary">View All</button></a>
	</div>


    <div class="course-contents">

        @foreach ($news as $nouvelle )
            <div class="course-card">
                <img src="{{ str_starts_with($nouvelle->photo, 'http') ? $nouvelle->photo : asset('storage/'.$nouvelle->photo)}}">
                <div class="category">
                    <div class="subject"><h3 style="color: #111; font-size:18px;"><i class='bx bxs-show' style="color: #0d6efd; font-size:24px;"></i>{{ $nouvelle->views }}</h3></div>
                    <img  src="{{ str_starts_with($nouvelle->photo, 'http') ? $nouvelle->photo : asset('storage/'.$nouvelle->photo)}}">
                </div>
                <h3 class="course-title">{{ $nouvelle->title }}</h3>
                <div class="course-desc">
                    <span style="font-size: 14px; color:#111;" ><i class="fa-solid fa-video"></i>{{ $nouvelle->demi_description }}</span>

                </div>
                <div class="course-ratings">
                    <span><a href="{{ route('news.show', $nouvelle->id) }}">Lire plus</a></span>
                    <span style="color: gray;">{{ $nouvelle->created_at }}</span>
                </div>

            </div>
        @endforeach
    </div>
</section>




@endsection
