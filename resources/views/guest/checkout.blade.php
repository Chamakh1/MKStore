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
                            <a href="/" class="nav-item nav-link active">Acceuil</a>
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
            Validation de la commande
        </h1>
        <nav aria-label="breadcrumb" style="background: rgba(255,255,255,0.25); padding: 0.4rem 1.2rem; border-radius: 20px;">
            <ol class="breadcrumb mb-0" style="background: transparent; padding: 0; margin: 0; font-weight: 600; letter-spacing: 0.05em;">
                <li class="breadcrumb-item"><a href="#" style="color: #1C1C1C; text-decoration: none; opacity: 0.7;">Acceuil</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #1C1C1C; opacity: 1;">Commande</li>
            </ol>
        </nav>
    </div>
    <!-- Page Header End -->




<!-- Checkout Start -->
<form action="/checkout/store" method="POST">
    @csrf
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            
            <!-- Informations client -->
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Passer votre Commande</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Nom Complet <span style="color: red">*</span></label>
                            <input class="form-control" 
                                   name="name" 
                                   type="text" 
                                   value="{{ Auth::check() ? Auth::user()->name : old('name') }}" 
                                   placeholder="Entrez votre nom complet" 
                                   required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Adresse e-mail </label>
                            <input class="form-control" 
                                   name="email" 
                                   type="email" 
                                   value="{{ Auth::check() ? Auth::user()->email : old('email') }}" 
                                   placeholder="Entrez votre adresse e-mail">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Numéro de téléphone <span style="color: red">*</span> </label>
                            <input class="form-control" 
                                   type="text" 
                                   name="phone" 
                                   value="{{ Auth::check() && Auth::user()->phone ? Auth::user()->phone : old('phone') }}" 
                                   placeholder="EX: 21 123 456" 
                                   required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Adresse de livraison <span style="color: red">*</span></label>
                            <input class="form-control" 
                                   name="adresse" 
                                   type="text" 
                                   value="{{ old('adresse') }}" 
                                   placeholder="EX: Rue de la République, Tunis" 
                                   required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Code Postal <span style="color: red">*</span></label>
                            <input class="form-control" 
                                   type="text" 
                                   name="CodePostal" 
                                   value="{{ old('CodePostal') }}" 
                                   placeholder="EX: 1000" 
                                   required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Gouvernorat <span style="color: red">*</span></label>
                            <select class="custom-select" name="gouvernorat" required>
                                <option value="" disabled {{ old('gouvernorat') ? '' : 'selected' }}>-- Sélectionner un gouvernorat --</option>
                                @php
                                    $gouvernorats = ["Ariana","Béja","Ben Arous","Bizerte","Gabès","Gafsa","Jendouba","Kairouan","Kasserine","Kébili","Kef","Mahdia","Manouba","Médenine","Monastir","Nabeul","Sfax","Sidi Bouzid","Siliana","Sousse","Tataouine","Tozeur","Tunis","Zaghouan"];
                                @endphp
                                @foreach($gouvernorats as $g)
                                    <option value="{{ $g }}" {{ old('gouvernorat') == $g ? 'selected' : '' }}>{{ $g }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Résumé de la commande -->
            <div class="col-lg-4">
                <div class="card mb-5">
                    <div class="card-header border-0" style="background-color: #dde7e7a2;">
                        <h4 class="font-weight-semi-bold m-0">Résumé de la commande</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Produits</h5>

                        @php 
                            $subtotal = 0;
                        @endphp

                        @if($cart && isset($cart->items) && count($cart->items) > 0)
                            @foreach($cart->items as $item)
                                @php
                                    // ⚡ Support client connecté et invité
                                    $price = isset($item->product) ? $item->product->price : $item['unit_price'] ?? $item->unit_price;
                                    $name  = isset($item->product) ? $item->product->name  : $item['product_name'] ?? $item->product_name;
                                    $quantity = $item->quantity ?? $item['quantity'];
                                    $lineTotal = $price * $quantity;
                                    $subtotal += $lineTotal;
                                @endphp
                                <div class="d-flex justify-content-between">
                                    <p>{!! $name !!} (x{!! $quantity !!})</p>
                                    <p>{{ number_format($lineTotal, 2) }} DT</p>
                                </div>
                            @endforeach
                        @else
                            <p>Votre panier est vide</p>
                        @endif


                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Sous-total</h6>
                            <h6 class="font-weight-medium">{{ number_format($subtotal, 2) }} DT</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Livraison</h6>
                            <h6 class="font-weight-medium">8.00 DT</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{ number_format($subtotal + 8, 2) }} DT</h5>
                        </div>
                    </div>
                </div>

                <!-- Paiement -->
                <div class="card mb-5">
                    <div class="card-header border-0" style="background-color: #dde7e7a2;">
                        <h4 class="font-weight-semi-bold m-0">Paiement à la livraison</h4>
                    </div>
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-dark px-5 py-2 rounded-pill shadow-sm">
                            Valider la commande
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
<!-- Checkout End -->






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