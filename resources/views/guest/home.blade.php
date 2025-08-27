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

<!-- Import Tex Gyre Termes (via Google Fonts pas dispo, donc via font-face CDN) -->



</head>

<body>
  <!-- Topbar Start -->

   @include('includes.guest.topbar')

   <!-- Topbar End -->


    <!-- Navbar Start -->

    @include('includes.guest.navbar')
    <!-- Navbar End -->


    <!-- Features start -->
    
    <div class="container py-5">
    <div class="row text-center">
        <div class="col-md-3 mb-4">
        <div class="feature-card p-4 shadow-sm rounded" style="background-color: #fff;">
            <i class="fas fa-leaf fa-3x mb-3" style="color: #A3B18A;"></i> <!-- vert pastel -->
            <h5 class="font-weight-medium mb-2">Ingrédients Naturels</h5>
            <p class="text-muted small">Des formules bio et respectueuses de votre peau.</p>
        </div>
        </div>
        <div class="col-md-3 mb-4">
        <div class="feature-card p-4 shadow-sm rounded" style="background-color: #fff;">
            <i class="fas fa-truck fa-3x mb-3" style="color: #C7D2D2;"></i> <!-- bleu pastel -->
            <h5 class="font-weight-medium mb-2">Livraison Rapide</h5>
            <p class="text-muted small">Sur toutes vos commandes, sans délai inutile.</p>
        </div>
        </div>
        <div class="col-md-3 mb-4">
        <div class="feature-card p-4 shadow-sm rounded" style="background-color: #fff;">
            <i class="fas fa-sync-alt fa-3x mb-3" style="color: #F2E9B6;"></i> <!-- jaune pastel clair -->
            <h5 class="font-weight-medium mb-2">Retour sous 30 jours</h5>
            <p class="text-muted small">Satisfait ou remboursé, sans prise de tête.</p>
        </div>
        </div>
        <div class="col-md-3 mb-4">
        <div class="feature-card p-4 shadow-sm rounded" style="background-color: #fff;">
            <i class="fas fa-headset fa-3x mb-3" style="color: #F7A1A1;"></i> <!-- rouge pastel clair -->
            <h5 class="font-weight-medium mb-2">Support 24/7</h5>
            <p class="text-muted small">Notre équipe est toujours à votre écoute.</p>
        </div>
        </div>
    </div>
    </div>


<!-- Features End -->


        <!-- Categories Text Start -->
        <div class="container-fluid pt-5" style="background-color: #dde7e7a2;">
        <h2 class="mb-4 text-center font-weight-bold" style="color: #1C1C1C; font-family: 'Josefin Sans', sans-serif;">
            Explorez nos catégories
        </h2>
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 col-md-10 text-center" style="color: #1C1C1C; font-size: 18px; font-weight: 500; line-height: 1.5;">
            <p>Parcourez notre vaste sélection de produits, soigneusement choisis pour répondre à tous vos besoins et enrichir votre quotidien. Que vous recherchiez confort, beauté, praticité ou innovation, nous avons ce qu’il vous faut.</p>
            <p class="mb-5">Profitez de produits naturels, innovants et adaptés à chaque besoin, avec une touche d'élégance et de qualité exceptionnelle.</p>

            </div>
        </div>
        </div>
        <!-- Categories Text End -->


<!-- Categories Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3 justify-content-center">
        @foreach ($categories as $category)
            @php
                // Choisir l'image selon le nom de la catégorie
switch (strtolower($category->name)) {
    case 'maquillage':
        $image = asset('mainassets/img/makeup.png');
        break;
    case 'soin des cheveux':
        $image = asset('mainassets/img/haircare.png');
        break;
    case 'soin de la peau':
        $image = asset('mainassets/img/sckincare.png');
        break;
    case 'parfums':
        $image = asset('mainassets/img/fragnences.png');
        break;
    case 'outils et accessoires':
        $image = asset('mainassets/img/tools.png');
        break;
    case 'Électroménager':
        $image = asset('mainassets/img/electro1.jpg');
        break;
    case 'enfants & Éducation':
        $image = asset('mainassets/img/enfant.png');
        break;
    case 'vêtements':
        $image = asset('mainassets/img/vetement.png');
        break;    
    case 'Électronique':
        $image = asset('mainassets/img/electronique.jpg');
        break;    
    default:
        $image = asset('mainassets/img/default.PNG'); // image par défaut
        break;
}


            @endphp

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
                <div class="text-center">
                    <!-- Cercle image -->
                    <div class="rounded-circle overflow-hidden mx-auto" 
                         style="width:180px; height:180px; border:3px solid #ddd;">
                        <img src="{{ $image }}" alt="{{ $category->name }}" 
                             class="w-100 h-100" 
                             style="object-fit: cover;">
                    </div>
                    <!-- Titre -->
                    <h6 class="mt-3 font-weight-bold">{{ $category->name }}</h6>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Categories End -->










    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Nouveaux produits</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
           
            @foreach ($products as $product) 

            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            @if($product->image)
                              <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}"  class="img-fluid w-100">
                            @else
                              <span class="text-muted">No Image</span>
                            @endif
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{ $product->price }} dt</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="/product/detail/{{ $product->id }}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-dark mr-1"></i>Voir le détail</a>
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
        </div>
    </div>
    <!-- Products End -->


    <!-- Subscribe Start -->
<!--<div class="container-fluid my-5 py-5" 
     style="background: linear-gradient(135deg, #f8f8f8, #ece9e6);">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-12">
            <div class="text-center mb-4">
                <h2 class="font-weight-bold mb-3" style="color:#333;">Restez informé</h2>
                <p style="color:#555; font-size: 1.1rem;">
                    Recevez nos dernières offres, nouveautés et conseils directement dans votre boîte mail.
                </p>
            </div>
                    <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4" style="background-color: #A39E93; color: white;">Subscribe</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>-->
<!-- Subscribe End -->




 






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
</body>


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

</html>