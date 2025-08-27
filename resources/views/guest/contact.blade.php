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
  <!-- Topbar Start -->

   @include('includes.guest.topbar')

   <!-- Topbar End -->


    <!-- Navbar Start -->

     <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <img class="m-0 display-5 font-weight-semi-bold" src="{{asset('mainassets/img/logo.png')}}" alt="Logo" class="img-fluid" style="height: 70px;">
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
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
                        
                                <a href="/panier" class="nav-item nav-link" >Panier</a>
                                
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
        
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid mb-5" style="background: linear-gradient(135deg, #A3B18A 0%, #C7D2D2 100%); min-height: 280px; display: flex; flex-direction: column; justify-content: center; align-items: center; color: #1C1C1C;">
        <h1 style="font-weight: 900; font-size: 4rem; letter-spacing: 0.15em; text-transform: uppercase; margin-bottom: 0.5rem; ">
            Contactez-nous
        </h1>
        <nav aria-label="breadcrumb" style="background: rgba(255,255,255,0.25); padding: 0.4rem 1.2rem; border-radius: 20px;">
            <ol class="breadcrumb mb-0" style="background: transparent; padding: 0; margin: 0; font-weight: 600; letter-spacing: 0.05em;">
                <li class="breadcrumb-item"><a href="/" style="color: #1C1C1C; text-decoration: none; opacity: 0.7;">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #1C1C1C; opacity: 1;">Contact</li>
            </ol>
        </nav>
    </div>
    <!-- Page Header End -->




<!-- Contact Start -->
<div class="container-fluid contact-section py-5">
    <div class="text-center mb-5">
        <h2 class="section-title-modern"><span>Contactez-nous</span></h2>
        <p class="section-subtitle">Nous sommes là pour répondre à toutes vos questions</p>
    </div>
    <div class="row px-xl-5">
        @if (session('success'))
            <div class="col-12 mb-4">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            
        @endif
        <!-- Form -->
        <div class="col-lg-7 mb-5">
            <div class="contact-form-modern  rounded-3 p-4">
            <form action="/contact/submit" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control form-control-modern" name="name" placeholder="Votre nom" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control form-control-modern" name="email" placeholder="Votre email" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control form-control-modern" name="subject" placeholder="Objet" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control form-control-modern" rows="6" name="message" placeholder="Votre message" required></textarea>
                </div>
                <button class="btn w-100 border rounded" type="submit" style="background: rgb(142, 142, 142); color: white;">
                    Envoyer
                </button>
            </form>

            </div>
        </div>

        <!-- Contact Info -->
        <div class="col-lg-5 mb-5">
            <div class="contact-info-card rounded-3 p-4">
                <h5 class="fw-bold mb-3">Nos coordonnées</h5>
                <p class="text-muted mb-4">
                    Nous sommes toujours heureux d’échanger avec vous, que ce soit pour un conseil, une collaboration ou simplement pour dire bonjour.
                </p>

                <div class="mb-4">
                    <h6 class="fw-bold">Restons connectés</h6>
                    <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Rue, New York, USA</p>
                    <p><i class="fa fa-envelope text-primary me-2"></i>info@example.com</p>
                    <p><i class="fa fa-phone-alt text-primary me-2"></i>+012 345 67890</p>
                </div>

                <div>
                    <h6 class="fw-bold">Écrivez-nous</h6>
                    <p>
                        Vous avez une question ou un projet en tête ? Envoyez-nous un message et nous reviendrons vers vous rapidement.
                    </p>
                    <p><i class="fa fa-envelope text-primary me-2"></i>contact@example.com</p>
                    <p><i class="fa fa-phone-alt text-primary me-2"></i>+33 1 23 45 67 89</p>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Contact End -->



 


    <!-- Footer Start -->
    @include('includes.guest.footer')
    <!-- Footer End -->


   


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