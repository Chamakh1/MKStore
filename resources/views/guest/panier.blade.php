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
            Panier
        </h1>
        <nav aria-label="breadcrumb" style="background: rgba(255,255,255,0.25); padding: 0.4rem 1.2rem; border-radius: 20px;">
            <ol class="breadcrumb mb-0" style="background: transparent; padding: 0; margin: 0; font-weight: 600; letter-spacing: 0.05em;">
                <li class="breadcrumb-item"><a href="/" style="color: #1C1C1C; text-decoration: none; opacity: 0.7;">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #1C1C1C; opacity: 1;">Panier</li>
            </ol>
        </nav>
    </div>
    <!-- Page Header End -->




<!-- Cart Start -->
<div class="container py-5 d-flex justify-content-center">
    <div class="col-lg-10">
        <div class="card  rounded-3 border-0">
            <div class="card-body p-4">
                <h3 class="text-center mb-4">Votre Panier</h3>
                
                <div class="table-responsive">
                    <table class="table align-middle text-center mb-4">
                        <thead class="table-light">
                            <tr>
                                <th>Produit</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Total</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($panier->items as $item)
                                <tr>
                                    <td class="d-flex align-items-center">
                                        @if($item->product && $item->product->image)
                                            <img src="{{ asset('uploads/' . $item->product->image) }}" 
                                                 alt="{{ $item->product->name }}" 
                                                 class="rounded me-2" 
                                                 style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <span class="text-muted me-2">No Image</span>
                                        @endif
                                        
                                        <span>{{ $item->product->name }}</span>
                                    </td>
                                    <td>{{ number_format($item->unit_price, 2) }} dt</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->line_total, 2) }} dt</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-danger rounded-circle"
                                                data-toggle="modal" 
                                                data-target="#deleteModal" 
                                                data-action="{{ route('panier.remove', $item->product_id) }}"
                                                data-name="{{ $item->product->name }}">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-muted">Votre panier est vide</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Totals -->
                <div class="border-top pt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-medium">Sous-total</span>
                        <span>{{ number_format($panier->subtotal ?? 0, 2) }} dt</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-medium">Frais de livraison</span>
                        <span>{{ number_format($panier->shipping_fee ?? 0, 2) }} dt</span>
                    </div>
                    <div class="d-flex justify-content-between border-top pt-2">
                        <h5 class="fw-bold">Total</h5>
                        <h5 class="fw-bold">{{ number_format($panier->total ?? 0, 2) }} dt</h5>
                    </div>
                </div>

                <!-- Checkout Button -->
                <form action="{{ route('checkout.index') }}" method="get" class="text-center mt-4">
                    <input type="hidden" name="cart_id" value="{{ $panier->id }}">
                    <button type="submit" class="btn btn-dark px-5 py-2 rounded-pill shadow-sm">
                        Valider la Commande
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Cart End -->




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
<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0 shadow rounded">
      <div class="modal-header  text-white rounded-top">
        <h5 class="modal-title" id="deleteModalLabel">Confirmer la suppression</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center mb-0">Êtes-vous sûr de vouloir supprimer <strong id="deleteProductName"></strong> ?</p>
      </div>
      <div class="modal-footer bg-light border-top-0 rounded-bottom justify-content-center">
        <form id="deleteForm" method="POST">
          @csrf
          <button type="button" class="btn btn-sm  rounded-pill" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-sm btn-danger rounded-pill">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
$(document).ready(function() {
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // bouton qui a déclenché le modal
        var action = button.data('action');  // récupérer la route
        var name = button.data('name');      // récupérer le nom du produit
        var modal = $(this);

        modal.find('#deleteProductName').text(name);
        modal.find('#deleteForm').attr('action', action);
    });
});
</script>



</body>

</html>