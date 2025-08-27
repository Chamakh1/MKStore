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
                        <img class="m-0 display-5 font-weight-semi-bold" src="{{asset('mainassets/img/MK.png')}}" alt="Logo" class="img-fluid" style="height: 70px;">
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="/" class="nav-item nav-link active">Home</a>
                            <a href="/shop" class="nav-item nav-link">Shop</a>
                            
                            <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Catégories</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                @foreach ($categories as $category)
                                    <a href="/product/{{ $category->id }}/list" class="dropdown-item">{{ $category->name }}</a> 
                                @endforeach
                            </div>
                        </div>
                        
                                <a href="#" class="nav-item nav-link" >Panier</a>
                                
                            <a href="/about" class="nav-item nav-link">À propos</a>
                            <a href="/contact" class="nav-item nav-link">Contact</a>
                        </div>
                    {{-- Zone Authentification --}}
                    <div class="navbar-nav ml-auto py-0">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                            @endif
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
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
                                        Logout
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
            Profile
        </h1>
        <nav aria-label="breadcrumb" style="background: rgba(255,255,255,0.25); padding: 0.4rem 1.2rem; border-radius: 20px;">
            <ol class="breadcrumb mb-0" style="background: transparent; padding: 0; margin: 0; font-weight: 600; letter-spacing: 0.05em;">
                <li class="breadcrumb-item"><a href="#" style="color: #1C1C1C; text-decoration: none; opacity: 0.7;">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #1C1C1C; opacity: 1;">Profile</li>
            </ol>
        </nav>
    </div>
    <!-- Page Header End -->




<!-- Edit Form start -->
<div class="container-fluid contact-section py-5">
    <div class="text-center mb-4">
        <h2 class="section-title-modern"><span>Modifier Votre Profile</span></h2>
        <p class="text-muted" style="max-width: 500px; margin: auto;">
            Ici, vous pouvez mettre à jour vos informations personnelles. Assurez-vous 
            que vos données sont correctes pour profiter pleinement de nos services.
        </p>
    </div>

            <!-- Image ou avatar -->
            <div class="text-center mb-4">
                <img src="{{ asset('dashassets/img/team/avatar2.PNG') }}" 
                    alt="Votre avatar" 
                    class="rounded-circle " 
                    style="width: 120px; height: 120px; object-fit: cover;">
            </div>


            <div class="row justify-content-center">  
               
                    <div class="col-lg-6 col-md-8 col-sm-10 mb-5">
                         
                        <div class="contact-form-modern rounded-3 p-4 shadow" style="background-color: #f9f9f9;">
@if ($message = Session::get('success'))
    <div class="alert alert-success-custom d-flex align-items-center p-3 mb-4 rounded shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10" stroke="green" fill="none"/>
            <path d="M8 12l2 2 4-4" stroke="green" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="fw-semibold">{{ $message }}</span>
    </div>
@endif
                            
                        <form class="card-body" method="POST" action="/client/updateProfile">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom complet</label>
                                <input type="text" class="form-control form-control-modern" id="name" name="name" value="{{ $u->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-modern" id="email" name="email" value="{{ $u->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Password</label>
                                <input type="password" class="form-control form-control-modern" id="password" name="password" placeholder="new password..." >
                            </div>
                            <button type="submit" class="btn btn-modern w-100 ">Enregistrer les modifications</button>
                        </form>
                        </div>
                    </div>
            </div>        


<!-- Edit Profile End -->



 


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