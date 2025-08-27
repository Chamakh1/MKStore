<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="/" class="text-decoration-none d-block d-lg-none">
                    <img src="{{ asset('mainassets/img/logo.png') }}" alt="Logo" style="height: 70px;">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    
                    {{-- Liens à gauche --}}
                    <div class="navbar-nav mr-auto py-0">
                        <a href="/" class="nav-item nav-link active">Accueil</a>
                        <a href="/shop" class="nav-item nav-link">Boutique</a>
                        
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Catégories</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                @foreach ($categories as $category)
                                    <a href="/product/{{ $category->id }}/list" class="dropdown-item">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        
                        <a href="/panier" class="nav-item nav-link">Panier</a>
                        <a href="/about" class="nav-item nav-link">À propos</a>
                        <a href="/contact" class="nav-item nav-link">Contact</a>
                    </div>

                    {{-- Zone Authentification --}}
                    <div class="navbar-nav ml-auto py-0">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="nav-item nav-link">Connexion</a>
                            @endif
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-item nav-link">Créer un compte</a>
                            @endif
                        @else
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right m-0">
                                    <a href="/client/profile" class="dropdown-item">Profil</a>
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Déconnexion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>

                </div>
            </nav>

            {{-- Carrousel --}}
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item " style="height: 410px;">
                        <img class="img-fluid" src="{{ asset('mainassets/img/car.jpg') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Style, Innovation & Confort</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Offres Exclusives</h3>
                                <a href="/shop" class="btn btn-light py-2 px-3">Profiter Maintenant</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item active " style="height: 410px;">
                        <img class="img-fluid" src="{{ asset('mainassets/img/bg.jpg') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Style, Innovation & Confort</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Offres Exclusives</h3>
                                <a href="/shop" class="btn btn-light py-2 px-3">Profiter Maintenant</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 410px;">
                        <img class="img-fluid" src="{{ asset('mainassets/img/bg4.png') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Style, Innovation & Confort</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Offres Exclusives</h3>
                                <a href="/shop" class="btn btn-light py-2 px-3">Profiter Maintenant</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </a>
            </div>

        </div>
    </div>
</div>
