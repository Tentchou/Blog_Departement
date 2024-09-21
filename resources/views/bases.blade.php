<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/dashbord.css') }}">
    <title>@yield('title', 'Dashboard Admin')</title>
</head>

<style>

    .side-menus a .active{
        background-color: #ca0505;
        color: #111;
    }
    .progress-circles {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    background: conic-gradient(green {{ $percentage }}%, #d3d3d3 0%);
    justify-content: center;
    align-items: center;
    font-size: 10px;
    font-weight: bold;
}
  /* Style pour la conteneur du cercle */
        .circle-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
        }

        /* Cercle de progression */
        .circle {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Demi-cercle gauche */
        .circle .left-half {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            clip: rect(0, 75px, 150px, 0); /* Cache la moitié gauche */
            background-color: #4caf50;
            transform: rotate(0deg);
        }

        /* Demi-cercle droit */
        .circle .right-half {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            clip: rect(0, 150px, 150px, 75px); /* Cache la moitié droite */
            background-color: #4caf50;
            transform: rotate({{ min($percentageSubscribed, 50) * 3.6 }}deg); /* Remplissage de la moitié droite */
        }

        /* Deuxième partie qui tourne si le pourcentage est > 50% */
        .circle .right-half::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #4caf50;
            clip: rect(0, 75px, 150px, 0); /* Partie gauche cachée */
            transform: rotate({{ $percentageSubscribed > 50 ? ($percentageSubscribed - 50) * 3.6 : 0 }}deg);
        }

        /* Texte au centre du cercle */
        .circle-text {
            position: absolute;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }
/* .progress-container {
            width: 300px;
            height: 30px;
            background-color: #f3f3f3;
            border-radius: 5px;
            overflow: hidden;
        }
        .progress-bar {
            height: 100%;
            background-color: #4caf50;
            width: {{ $percentageSubscribed }}%;
            text-align: center;
            color: white;
        } */

 /* Style pour le cercle de progression */
        /* .circle-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
        }

        .circle {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: conic-gradient(
                #4caf50 {{ $percentageSubscribed }}%,
                #f3f3f3 0%
            );
        }

        .circle-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 20px;
            font-weight: bold;
        } */



</style>

<body>

    <div class="side-menus">
        <div class="brand-names">
            <h1><a href="{{ route('acceuil.welcome') }}">School</a></h1>
        </div>
        <ul>
            <a href="{{ route('admin.articles.liste') }}" class="{{ Request::is('admin.articles.liste') ? 'active' : '' }}" ><li> <i class='bx bx-bar-chart' style='font-size: 30px; color: #ff9800;'></i>&nbsp;  <span>Dashboard</span></li></a>
            <a href="{{ route('admin.articles.index') }}" class="nav-link"><li><i class='bx bx-user' style='font-size: 30px; color: #2196f3;'></i>&nbsp;  <span>Users</span></li></a>
            <a href="{{ route('admin.articles.news') }}" class="nav-link"><li><i class='bx bx-news' style='font-size: 30px; color: #ff5722;'></i>&nbsp;  <span>News</span></li></a>
            <a href="{{ route('admin.activite.indexActivite') }}" class="nav-link"><li><i class='bx bx-calendar' style='font-size: 30px; color: #00bcd4;'></i> &nbsp;  <span>Activites</span></li></a>
            <li class="nav-link"><i class='bx bx-folder' style='font-size: 30px; color: #ffc107;'></i> &nbsp;  <span>Projects</span></li>
            <li><i class='bx bx-help-circle' style='font-size: 30px; color: #3f51b5;'></i> &nbsp;  <span>Help</span></li>
            <li><i class='bx bx-cog' style='font-size: 30px; color: #9c27b0;'></i> &nbsp;  <span>Setting</span></li>
            <a href="{{ route('logout') }}" class="nav-link"><li  class="log"><i class='bx bx-log-out' style='font-size: 30px; color: #f44336;'></i>&nbsp;  <span>Logout</span></li></a>
        </ul>
    </div>

    <div class="containers">


        <div class="headers">
           <div class="navs">
               <div class="searchs">
                  <input type="text" placeholder="search....">
                  <button type="submit"><i class='bx bx-search' style='font-size: 30px; color: #000000;'></i></button>
               </div>

               <div class="users">
                  <a href="" class="btns">Add news</a>


                  <div class="position-relative">

                    <div class=" notification-icon">
                        <i class='bx bx-bell notification-icon' id="notificationIcon"></i>
                        <span class="notification-badge" id="notificationCount">{{ $messages->count() }}</span>
                    </div>

                        <div class="notification-dropdown" id="notificationDropdown">
                            @foreach($messages as $message)
                                <div class="dropdown-item">
                                    <div>
                                        <p class="mb-0"><strong>{{ $message->name }}</strong></p>
                                        <small class="text-muted">{{ $message->created_at->format('d M Y, H:i') }}</small>
                                    </div>
                                    <div class="action-icons">
                                        <a href="{{ route('admin.message.show', $message->id) }}" ><i class='bx bx-show'></i></a>
                                        <a href="#" class="replyIcon" data-id="{{ $message->id }}" title="Reply"><i class='bx bx-reply'></i></a>
                                        <form action="{{ route('message.delete', $message->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0" title="Delete"><i class='bx bx-trash'></i></button>
                                        </form>
                                    </div>
                                    <div class="reply-form" id="replyForm{{ $message->id }}">
                                        <form action="{{ route('admin.reply', $message->id) }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <textarea class="form-control" name="reply_message" rows="4" placeholder="Your reply..." required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Send Reply</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- View Modal -->
                                <div class="modal fade" id="viewModal{{ $message->id }}" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-headers">
                                                <h5 class="modal-title" id="viewModalLabel">View Message from {{ $message->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Email:</strong> {{ $message->email }}</p>
                                                <p><strong>Message:</strong></p>
                                                <p>{{ $message->message }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                </div>



                @if(Auth::check() && Auth::user()->role === 'admin')
                    @php
                        $emailHash = md5(strtolower(trim(Auth::user()->email)));
                        $gravatarUrl = "https://www.gravatar.com/avatar/$emailHash";
                    @endphp

                  <div class="img-cases">
                      <img src="{{ $gravatarUrl }}" alt="" class="gravatar-img">
                      <div class="dropdown-menu">
                        <a href="">{{ Auth::user()->email }}</a>

                    </div>
                  </div>

                @endif
               </div>
           </div>
        </div>

        <div>
            @if(session('success'))
                <div class="alert alert-success alert-overlay alert-dismissible fade show" role="alert" id="customAlert">
                    <strong>Succès !</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
           @endif
        </div>

        <div class="contents">
            <div class="cardss">
                <div class="cards">
                    <div class="box">
                        <h1 style="color: #000000;">{{ $TotalsubscribedUsers }}</h1>
                        <h3>Abonnes</h3>
                    </div>
                    {{-- <div class="circle-container">
                        <div class="circle">
                            <div class="left-half"></div>
                            <div class="right-half"></div>
                            <div class="circle-text">{{ number_format($percentageSubscribed, 2) }}%</div>
                        </div>
                    </div> --}}
                    <div class="progress-circles" style=" background: conic-gradient(green {{ $percentageSubscribed }}%, #d3d3d3 0%);">
                        {{ number_format($percentageSubscribed, 2) }}%
                    </div>
                    {{-- <div class="progress-container">
                        <div class="progress-bar">{{ number_format($percentageSubscribed, 2) }}%</div>
                    </div> --}}
                    {{-- <div class="circle-container">
                        <div class="circle">
                            <div class="circle-text">{{ number_format($percentageSubscribed, 2) }}%</div>
                        </div>
                    </div> --}}

                    <div class="icon-cases">
                        <i class='bx bx-group' style='font-size: 50px; color: #2c0e6e;'></i>
                    </div>
                </div>

                <div class="cards">
                    <div class="box">
                        <h1 style="color: #000000;">{{ $totalUsers }}</h1>
                        <h3>Users</h3>
                    </div>
                    <div class="progress-circles" style=" background: conic-gradient(green {{ $pourcentage }}%, #d3d3d3 0%);">
                        {{ number_format($pourcentage, 2) }}%
                    </div>

                    <div class="icon-cases">
                        <i class='bx bx-group' style='font-size: 50px; color: #2c0e6e;'></i>
                    </div>
                </div>

                <div class="cards">
                    <div class="box">
                        <h1 style="color: #000000;">2194</h1>
                        <h3>Users</h3>
                    </div>

                    <div class="icon-cases">
                        <i class='bx bx-group' style='font-size: 50px; color: #4caf50;'></i>
                    </div>
                </div>



                <div class="cards">
                    <div class="box">
                        <h1 style="color: #000000;"> {{ $totalVisitors }}</h1>
                        <h3>Visites</h3>
                    </div>
                    <div class="progress-circles">
                        {{ number_format($percentage, 2) }}%
                    </div>

                    <div class="icon-cases">
                        <i class='bx bx-group' style='font-size: 50px; color: #4caf50;'></i>
                    </div>
                </div>

            </div>

            <div class="contents-2">

                <div class="recent-payments">

                    @yield('bases')

                </div>

                <div class="news-Users">

                        <div class="title">
                            <h2>Recent Users</h2>
                            <a href="" class="btns">View all</a>
                        </div>

                        <table>
                            <tr>
                                <th>Profile</th>
                                <th>Id</th>
                                <th>Name</th>
                            </tr>

                            @foreach ($users as $user )
                                <tr>
                                    <td><i class='bx bx-user' style='font-size: 24px; color: #333;'></i></td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                            @endforeach

                        </table>

                </div>

            </div>
        </div>
    </div>



    <script>
        // Sélectionner tous les liens de navigation
        const links = document.querySelectorAll('.nav-link');

        // Ajouter un événement de clic sur chaque lien
        links.forEach(link => {
            link.addEventListener('click', () => {
                // Enlever la classe 'active' de tous les liens
                links.forEach(l => l.classList.remove('active'));
                // Ajouter la classe 'active' au lien cliqué
                link.classList.add('active');
            });
        });

        document.getElementById('notificationIcon').addEventListener('click', function() {
            const dropdown = document.getElementById('notificationDropdown');
            const isDisplayed = window.getComputedStyle(dropdown).display === 'block';
            dropdown.style.display = isDisplayed ? 'none' : 'block';
        });

        // Close the dropdown if the user clicks outside of it
        document.addEventListener('click', function(event) {
            const target = event.target;
            const dropdown = document.getElementById('notificationDropdown');
            const icon = document.getElementById('notificationIcon');
            if (!icon.contains(target) && !dropdown.contains(target)) {
                dropdown.style.display = 'none';
            }
        });

        // Toggle reply form visibility
        document.querySelectorAll('.replyIcon').forEach(function(icon) {
            icon.addEventListener('click', function(event) {
                event.preventDefault();
                const messageId = this.getAttribute('data-id');
                const replyForm = document.getElementById('replyForm' + messageId);
                const isDisplayed = window.getComputedStyle(replyForm).display === 'block';
                replyForm.style.display = isDisplayed ? 'none' : 'block';
            });
        });

        const notificationIcon = document.getElementById('notificationIcon');
        const notificationDropdown = document.getElementById('notificationDropdown');
        const notificationCount = document.getElementById('notificationCount');

    notificationIcon.addEventListener('click', function () {
        // Afficher la liste déroulante des messages
        notificationDropdown.classList.toggle('show');

        // Réinitialiser le compteur de notifications à 0
        notificationCount.textContent = '0';

        // Appeler le serveur pour marquer les messages comme lus
        fetch('/admin/notifications/read', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    });


        // Fonction pour fermer l'alerte de succès
        function closeAlert() {
            var alert = document.getElementById("alertSuccess");
            alert.style.display = "none";
        }




   </script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
