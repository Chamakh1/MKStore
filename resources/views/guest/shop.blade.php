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
/* Pagination : fond blanc pour tous les boutons */
.pagination .page-item .page-link {
    background-color: white !important;
    color: #000 !important; /* texte noir */
    border: 1px solid #dee2e6; /* même bordure que bootstrap */
}

/* Pagination : bouton actif */
.pagination .page-item.active .page-link {
    background-color: white !important;
    color: #000 !important;
    border-color: #dee2e6 !important;
}

/* Pagination : survol */
.pagination .page-item .page-link:hover {
    background-color: #f0f0f0 !important; /* léger gris au survol */
    color: #000 !important;
}
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
            Boutique 
        </h1>
        <nav aria-label="breadcrumb" style="background: rgba(255,255,255,0.25); padding: 0.4rem 1.2rem; border-radius: 20px;">
            <ol class="breadcrumb mb-0" style="background: transparent; padding: 0; margin: 0; font-weight: 600; letter-spacing: 0.05em;">
                <li class="breadcrumb-item"><a href="/" style="color: #1C1C1C; text-decoration: none; opacity: 0.7;">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #1C1C1C; opacity: 1;">Boutique</li>
            </ol>
        </nav>
    </div>
    <!-- Page Header End -->

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">

            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Rechercher par nom">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                            Trier par
                                        </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($products as $product) 
                        
                    
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{ asset('uploads/' . $product->image) }}" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>{{ $product->price }} dt</h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="/product/detail/{{ $product->id }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-dark mr-1"></i>Voir détail</a>
                                <form action="/panier/add" method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-sm text-dark p-0">
                                        <i class="fas fa-shopping-cart text-dark mr-1"></i>Ajouter au panier
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @endforeach
              
                <div class="d-flex justify-content-end align-items-center mt-4 w-100">
                    <!-- Texte à droite -->
                    <div class="me-3">
                        @if ($products->total())
                            <p class="mb-0 small text-muted">
                                Affichage de {{ $products->firstItem() }} à {{ $products->lastItem() }} sur {{ $products->total() }} résultats
                            </p>
                        @else
                            <p class="mb-0 small text-muted">Aucun produit trouvé</p>
                        @endif
                    </div>

                    <!-- Pagination à droite -->
                    <div class="custom-pagination">
                        {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>



                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


    <!-- Footer Start -->
    @include('includes.guest.footer')
    <!-- Footer End -->


   
<!-- Modal de notification ajout au panier -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0 shadow rounded">
      <div class="modal-header">
        <h5 class="modal-title" id="cartModalLabel">Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p id="cartModalMessage" class="mb-0"></p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-sm  rounded-pill" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>





    


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
$(document).ready(function() {
    @if(session('success'))
        $('#cartModalMessage').text("{{ session('success') }}");
        $('#cartModalHeader').removeClass('bg-danger').addClass('bg-success');
        $('#cartModal').modal('show');
    @elseif(session('error'))
        $('#cartModalMessage').text("{{ session('error') }}");
        $('#cartModalHeader').removeClass('bg-success').addClass('bg-danger');
        $('#cartModal').modal('show');
    @endif
});
</script>
</body>

</html>