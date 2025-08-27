<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MK Store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('mainassets/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href=" {{asset('mainassets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('mainassets/css/style.css')}}" rel="stylesheet">
    
    <!-- Import Josefin Sans depuis Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">



</head>

<body>
    <!-- Topbar -->
    @include('includes.guest.topbar')

    <!-- Navbar -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="/" class="text-decoration-none d-block d-lg-none">
                        <img src="{{asset('mainassets/img/logo.png')}}" alt="Logo MK Store" style="height: 70px;">
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="/" class="nav-item nav-link">Acceuil</a>
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
                            <a href="/about" class="nav-item nav-link active">À propos</a>
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
            </div>
        </div>
    </div>

    <!-- Page Header -->
    <div class="container-fluid mb-5" style="background: linear-gradient(135deg, #A3B18A 0%, #C7D2D2 100%); min-height: 280px; display: flex; flex-direction: column; justify-content: center; align-items: center; color: #1C1C1C;">
        <h1 style="font-weight: 900; font-size: 4rem; letter-spacing: 0.15em; text-transform: uppercase; margin-bottom: 0.5rem;">
            À propos
        </h1>
        <nav aria-label="breadcrumb" style="background: rgba(255,255,255,0.25); padding: 0.4rem 1.2rem; border-radius: 20px;">
            <ol class="breadcrumb mb-0" style="background: transparent; padding: 0; margin: 0; font-weight: 600; letter-spacing: 0.05em;">
                <li class="breadcrumb-item"><a href="/" style="color: #1C1C1C; opacity: 0.7;">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #1C1C1C;">À propos</li>
            </ol>
        </nav>
    </div>

<!-- About Section -->
<div class="container py-5">
    <div class="row align-items-center">
        <!-- Image -->
        <div class="col-lg-6 mb-4 mb-lg-0" height="500px" width="auto">
            <img src="{{asset('mainassets/img/logo.png')}}" alt="À propos de MK Store" class="img-fluid">
        </div>
        <!-- Text -->
        <div class="col-lg-6">
            <h2 class="mb-4 fw-bold">Notre histoire</h2>
            <p class="text-muted mb-4">
                MK Store est né d’une volonté simple : offrir à chacun le raffinement et la qualité 
                sans compromis. Chaque produit incarne l’élégance, le style et la fiabilité, tout en 
                restant accessible grâce à des prix justes et raisonnables.
            </p>

            <p class="text-muted mb-4">
                Nous croyons que le luxe ne réside pas seulement dans le prix, mais dans 
                l’attention portée aux détails, le soin de la sélection et le respect du client.  
                C’est pourquoi nos collections reflètent une alliance subtile entre classe intemporelle, 
                modernité et excellence.
            </p>
            <h3 class="mt-4 fw-bold">Notre engagement</h3>
            <ul class="list-unstyled">
                <li><i class="fa fa-check text-primary mr-2"></i>Produits élégants et de qualité certifiée</li>
                <li><i class="fa fa-check text-primary mr-2"></i>Prix raisonnables, accessibles à tous</li>
                <li><i class="fa fa-check text-primary mr-2"></i>Livraison rapide et sécurisée</li>
                <li><i class="fa fa-check text-primary mr-2"></i>Service client attentif et dévoué</li>
            </ul>
        </div>
    </div>
</div>

<!-- Mission & Vision -->
<div class="container-fluid bg-light py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Notre vision & mission</h2>
        <p class="text-muted mb-5">
            Offrir à nos clients une expérience unique où élégance, qualité et accessibilité 
            se rencontrent pour redéfinir les standards du shopping moderne.
        </p>
        <div class="row">
            <div class="col-md-6">
                <div class="p-4 bg-white rounded shadow-sm h-100">
                    <i class="fa fa-bullseye fa-2x text-primary mb-3"></i>
                    <h5>Notre mission</h5>
                    <p class="text-muted">
                        Mettre l’élégance et la qualité à la portée de tous, grâce à une sélection 
                        raffinée de produits qui allient excellence et prix raisonnables.
                    </p>
                </div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <div class="p-4 bg-white rounded shadow-sm h-100">
                    <i class="fa fa-eye fa-2x text-primary mb-3"></i>
                    <h5>Notre vision</h5>
                    <p class="text-muted">
                        Devenir une référence où élégance et classe s’unissent à l’accessibilité, 
                        en créant une communauté qui valorise le beau, le raffiné et le juste prix.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Footer -->
    @include('includes.guest.footer')

  <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('mainassets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('mainassets/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('mainassets/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('mainassets/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('mainassets/js/main.js')}}"></script>

</body>
</html>
