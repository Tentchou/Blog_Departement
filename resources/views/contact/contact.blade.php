@extends('acceuil.base');

@section('title', 'page de contact')


@section('bases')




    <div>
        @if(session('success'))
            <div class="alert-success" id="alertSuccess">
                <i class='bx bx-check-circle icon'></i>
                <div class="message">
                    {{ session('success') }}
                </div>
                <button class="close-btn" onclick="closeAlert()">&times;</button>
            </div>
       @endif
    </div>


    <div class="container">


        <!-- Carte Google Maps -->
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.82610933719!2d9.731688975909758!3d4.055856195917922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10610d9cb2d0ba4d%3A0x454fb96b6ff9597!2sUniversity%20of%20Douala!5e0!3m2!1sen!2scm!4v1726157195268!5m2!1sen!2scm" width="100%" height="600px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!-- Formulaire de contact -->
        <div class="form-container">

            <h1>Contactez-nous</h1>
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Votre nom" >
                    @error('name')
                      <div style="color: red; font-size:15px;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Votre email" >
                    @error('email')
                      <div style="color: red; font-size:15px;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="tel" name="telephone" placeholder="Votre email" >
                    @error('telephone')
                       <div style="color: red; font-size:15px;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea name="message" rows="4" placeholder="Votre message" ></textarea>
                    @error('message')
                      <div style="color: red; font-size:15px;">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </div>

        <!-- Informations de contact -->
        <div class="contact-info">
            <h2>Nous contacter</h2>
            <p><span class="icon">📞</span> <span class="phone-number">+237 671 234 567</span></p>
            <p><span class="icon">📞</span> <span class="phone-number">+237 690 123 456</span></p>
            <p><span class="icon">📧</span> contact@exemple.com</p>
            <p><span class="icon">📍</span> 123 AngeRaphael Douala, Cameroun</p>
        </div>
    </div>

    <script>
        // Fonction pour fermer l'alerte de succès
        function closeAlert() {
            var alert = document.getElementById("alertSuccess");
            alert.style.display = "none";
        }
    </script>

@endsection
