<div class="container-fluid text-dark mt-5 pt-5" style="background-color: #dde7e7a2;">
    <div class="row px-xl-5 pt-5">
        <!-- Col 1 : Logo + Présentation -->
        <div class="col-lg-3 col-md-6 mb-5">
            <a href="/" class="d-inline-block mb-4">
                <img src="{{asset('mainassets/img/logo.png')}}" alt="Logo" style="height: 120px;">
            </a>
            <p class="text-dark small">
                Découvrez notre univers de cosmétiques naturels et raffinés.  
                Élégance, qualité et respect de la peau et de l’environnement.
            </p>
        </div>

        <!-- Col 2 : Liens utiles -->
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="font-weight-bold text-dark mb-4">Liens Utiles</h5>
            <ul class="list-unstyled">
                <li><a class="text-dark d-block mb-2" href="/"><i class="fa fa-angle-right mr-2"></i>Accueil</a></li>
                <li><a class="text-dark d-block mb-2" href="/shop"><i class="fa fa-angle-right mr-2"></i>Boutique</a></li>
                <li><a class="text-dark d-block mb-2" href="/categories"><i class="fa fa-angle-right mr-2"></i>Catégories</a></li>
                <li><a class="text-dark d-block mb-2" href="/about"><i class="fa fa-angle-right mr-2"></i>À propos</a></li>
                <li><a class="text-dark d-block" href="/contact"><i class="fa fa-angle-right mr-2"></i>Contact</a></li>
            </ul>
        </div>

        <!-- Col 3 : Informations -->
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="font-weight-bold text-dark mb-4">Informations</h5>
            <p class="mb-2"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
            <p class="mb-2"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
        </div>

        <!-- Col 4 : Newsletter + Réseaux sociaux -->
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="font-weight-bold text-dark mb-4">Restez Connectés</h5>
            <form class="mb-3">
                <div class="input-group">
                    <input type="email" class="form-control border-0" placeholder="Votre email">
                    <div class="input-group-append">
                        <button class="btn btn-dark">OK</button>
                    </div>
                </div>
            </form>
            <div class="d-flex">
                <a class="btn btn-outline-dark btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-dark btn-social mr-2" href="#"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-dark btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-dark btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

    <!-- Bas du footer -->
    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-12 text-center">
            <p class="mb-0 text-dark small">
                &copy; <a class="text-dark font-weight-bold" href="/">MK Store</a> - Tous droits réservés.  
                Design raffiné pour une expérience unique.
            </p>
        </div>
    </div>
</div>

<!-- CSS pour style raffiné -->
<style>
    .btn-social {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease-in-out;
    }
    .btn-social:hover {
        background-color: #000;
        color: #fff !important;
    }
    .footer-links a:hover {
        text-decoration: underline;
    }
</style>
