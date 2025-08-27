<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin dashboard</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('dashassets/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('dashassets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('dashassets/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dashassets/img/favicons/favicon.ico')}}">
    <link rel="manifest" href="{{asset('dashassets/img/favicons/site.webmanifest')}}">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link href="{{asset('dashassets/css/phoenix.min.css')}}" rel="stylesheet" id="style-default">
    <link href="{{asset('dashassets/css/user.min.css')}}" rel="stylesheet" id="user-style-default">
    <style>
      body {
        opacity: 0;
      }
      .error-text-small {
        font-size: 12px;
        color: #dc3545; /* Rouge Bootstrap */
        margin-top: 0.25rem;
      }
    </style>
    
</head>
<body>
   
    <main class="main" id="top">
      <div class="container-fluid px-0">
      <!-- Sidebar -->
      @include('includes.admin.sidebar')
      <!-- End Sidebar -->

        <!--Navigation Bar -->
            @include('includes.admin.nav')
        <!--Navigation Bar -->

        <div class="content">

            <!-- Title and Actions -->
            <div class="row justify-content-between align-items-center mb-4">
              <div class="col-auto">
                
              </div>
              <div class="col-auto">
                <div class="btn-toolbar d-flex align-items-center gap-2">

                  <!-- Bouton Add Category -->
                  <div class="btn-group" role="group">
                   
                  </div>

                </div>
              </div>
            </div>

   


<div class="container mt-4">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-auto">
            <h1 class="mb-0">Order Details #{{ $order->id }}</h1>
        </div>
    </div>

    <!-- Informations client et commande -->
    <div class="card mb-4 mt-3">
        <div class="card-body">
            <h5 style="padding-bottom: 20px">Informations client</h5>
            <div></div>
            <p><strong>ID de la commande :</strong> {{ $order->id }}</p>
            
            <p><strong>Nom :</strong> {{ $order->name ?? ($order->user->name ?? 'Inconnu') }}</p>
            <p><strong>Email :</strong> {{ $order->email ?? ($order->user->email ?? 'Inconnu') }}</p>
            <p><strong>Téléphone :</strong> {{ $order->phone }}</p>
            <p><strong>Adresse :</strong> {{ $order->adresse }}</p>
            <p><strong>Code postal :</strong> {{ $order->CodePostal }}</p>
            <p><strong>Gouvernorat :</strong> {{ $order->gouvernorat }}</p>
            <p><strong>Status :</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Date de création :</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Date de mise à jour :</strong> {{ $order->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <!-- Totaux -->
    <div class="card mb-4">
        <div class="card-body">
            <h5>Résumé financier</h5>
            <p><strong>Sous-total :</strong> {{ number_format($order->subtotal, 2) }} dt</p>
            <p><strong>Remise :</strong> {{ number_format($order->discount_total, 2) }} dt</p>
            <p><strong>Frais de livraison :</strong> {{ number_format($order->shipping_fee, 2) }} dt</p>
            <p><strong>Total :</strong> {{ number_format($order->total, 2) }} dt</p>
        </div>
    </div>

    <!-- Produits commandés -->
    <div class="card">
        <div class="card-body">
            <h5>Produits commandés</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix unitaire</th>
                        <th>Quantité</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name ?? $item->product_name }}</td>
                            <td>{{ number_format($item->unit_price, 2) }} dt</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->line_total, 2) }} dt</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


         
</main>

    





  </body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script src="{{asset('dashassets/js/phoenix.js')}}"></script>
    <script src="{{asset('dashassets/js/ecommerce-dashboard.js')}}"></script>
    <script src="{{asset('dashassets/js/phoenix.js')}}"></script>
<script src="{{asset('dashassets/js/ecommerce-dashboard.js')}}"></script>

</html>