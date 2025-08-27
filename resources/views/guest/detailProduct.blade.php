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

    <style>
.social-share {
    font-family: 'Arial', sans-serif;
}
.social-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;  /* réduit */
    height: 32px; /* réduit */
    border-radius: 50%;
    color: #fff;
    text-decoration: none;
    font-size: 16px; /* réduit */
    
}

/* Couleurs par réseau */
.facebook { background: #1877F2; }
.x        { background: #1DA1F2; }
.instagram {
    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
}
.linkedin  { background: #0077B5; }
</style>

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
                            <a href="index.html" class="nav-item nav-link active">Acceuil</a>
                            <a href="shop.html" class="nav-item nav-link">Boutique</a>
                            
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
                                        Deconnexion
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
            Détail du produit
        </h1>
        <nav aria-label="breadcrumb" style="background: rgba(255,255,255,0.25); padding: 0.4rem 1.2rem; border-radius: 20px;">
            <ol class="breadcrumb mb-0" style="background: transparent; padding: 0; margin: 0; font-weight: 600; letter-spacing: 0.05em;">
                <li class="breadcrumb-item"><a href="/" style="color: #1C1C1C; text-decoration: none; opacity: 0.7;">Acceuil</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #1C1C1C; opacity: 1;">Détail de porduit</li>
            </ol>
        </nav>
    </div>
    <!-- Page Header End -->




    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            @if(!empty($product) && !empty($product->image))
                                <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid w-100">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif

                        </div>
              
                    </div>

                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $product->name }}</h3>
                <div class="d-flex mb-3">
             
                    
                </div>
                <p>{{$product->description}}</p>
                <h3 class="font-weight-semi-bold mb-4">{{ $product->price }} dt</h3>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    
                @endif
               
                <form action="/panier/add" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="d-flex align-items-center mb-4 pt-2">
                <div class="d-flex align-items-center gap-3 my-4">
                    <!-- Input group modernisé -->
                    <div class="quantity-selector d-flex align-items-center border rounded-pill px-2 bg-light">
                        <button class="btn btn-icon p-1" aria-label="Diminuer quantité" type="button">
                            <i class="fas fa-minus fs-7 text-muted"></i>
                        </button>
                        <input 
                            type="number" 
                            class="form-control border-0 bg-transparent text-center shadow-none py-2" 
                            value="1" 
                            min="1" 
                            style="width: 50px;"
                            aria-label="Quantité"
                            name="quantity"
                        >
                        <button type="button" class="btn btn-icon p-1" aria-label="Augmenter quantité">
                            <i class="fas fa-plus fs-7 text-muted"></i>
                        </button>
                    </div>

                <button class="btn rounded-pill px-4 py-2 fw-medium add-to-cart" type="submit" style="background-color: #A3B18A; color: white;">
                    <i class="fas fa-shopping-bag me-2"></i>
                    Ajouter au panier
                </button>


                </div>
                </div>
                </form>
            <div class="social-share mt-3 d-flex align-items-center gap-2">
                <span class="fw-medium ">Partager :</span>
                <a href="https://www.facebook.com/" class="social-btn facebook m-2" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://x.com/" class="social-btn x m-2" target="_blank">
                    <i class="fab fa-twitter"></i> <!-- X remplace Twitter -->
                </a>
                <a href="https://www.instagram.com/" class="social-btn instagram m-2" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.linkedin.com/" class="social-btn linkedin m-2" target="_blank">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>





            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    
                    
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p class="mb-4">{{$product->description}}</p>
                    </div>
            


                    
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Autre Produits</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($products as $p )
                    
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ asset('uploads/' . $p->image) }}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $p->name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ $p->price }} dt</h6><h6 class="text-muted ml-2"><del></del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="/product/detail/{{ $p->id }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-dark mr-1"></i>Voir Détail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-dark mr-1"></i>Ajouter au panier</a>
                        </div>
                    </div>

                    @endforeach
              
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


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


    <script>
document.querySelectorAll('.quantity-selector').forEach(quantitySelector => {
  const input = quantitySelector.querySelector('input[type="number"]');
  const btnMinus = quantitySelector.querySelector('button[aria-label="Diminuer quantité"]');
  const btnPlus = quantitySelector.querySelector('button[aria-label="Augmenter quantité"]');

  btnMinus.addEventListener('click', () => {
    let currentValue = parseInt(input.value) || 1;
    if (currentValue > parseInt(input.min) || 1) {
      input.value = currentValue - 1;
    }
  });

  btnPlus.addEventListener('click', () => {
    let currentValue = parseInt(input.value) || 1;
    input.value = currentValue + 1;
  });
});

        </script>
</body>

</html>